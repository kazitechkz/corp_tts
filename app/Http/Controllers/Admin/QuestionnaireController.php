<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionnaireCreateRequest;
use App\Http\Requests\QuestionnaireEditRequest;
use App\Models\GivenAnswersToQuestionnaire;
use App\Models\Questionnaire;
use App\Models\QuestionnaireAnswer;
use App\Models\QuestionnaireQuestion;
use App\Models\QuestionnaireResult;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class QuestionnaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.questionnaire.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.questionnaire.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionnaireCreateRequest $request)
    {
        try{
            $input = $request->all();
            $input["start_at"] = Carbon::createFromFormat('d/m/Y H:i',$request["start_at"]);
            if($input["end_at"]){
                $input["end_at"] = Carbon::createFromFormat('d/m/Y H:i',$request["end_at"]);
            }
            Questionnaire::add($input);
            toastSuccess("Успешно добавлен опросник");
        }
        catch (\Exception $exception){
            toastError($exception->getMessage());
        }
        return redirect()->route("questionnaire.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $questionnaire = Questionnaire::find($id);
        if($questionnaire){
            return view("admin.questionnaire.show",compact("questionnaire"));
        }
        toastWarning("К сожалению, опрос не найден");
        return redirect()->back();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $questionnaire = Questionnaire::find($id);
        if($questionnaire){
            return view("admin.questionnaire.edit",compact("questionnaire"));
        }
        toastWarning("К сожалению, опрос не найден");
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionnaireEditRequest $request, $id)
    {
        try{
            $questionnaire = Questionnaire::find($id);
            if(!$questionnaire){
                toastWarning("К сожалению, опрос не найден");
                return redirect()->back();
            }
            $input = $request->all();
            $input["start_at"] = Carbon::createFromFormat('d/m/Y H:i',$request["start_at"]);
            if($input["end_at"]){
                $input["end_at"] = Carbon::createFromFormat('d/m/Y H:i',$request["end_at"]);
            }
            $questionnaire->edit($input);
            toastSuccess("Успешно изменен опросник '".$questionnaire->title ."'");
        }
        catch (\Exception $exception){
            toastError($exception->getMessage());
        }
        return redirect()->route("questionnaire.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $questionnaire = Questionnaire::find($id);
        if($questionnaire){
            toastSuccess("Удален опросник '".$questionnaire->title ."'");
            $questionnaire->delete();
        }
        else{
            toastWarning("К сожалению, опрос не найден");
        }
        return redirect()->back();
    }


    public function questions($id)
    {
        $questionnaire = Questionnaire::find($id);
        if($questionnaire){
            $questionnaire->load("questionnaire_questions");
            return view("admin.questionnaire.question",compact("questionnaire"));
        }
        toastWarning("К сожалению, опрос не найден");
        return redirect()->back();
    }

    public function users($id)
    {
        $questionnaire = Questionnaire::find($id);
        if($questionnaire){
            $users_ids_one = QuestionnaireResult::where(["questionnaire_id" => $id])->pluck("user_id")->toArray();
            $users_ids_two = GivenAnswersToQuestionnaire::where(["questionnaire_id" => $id])->pluck("user_id")->toArray();
            $users = User::whereIn("id",array_merge($users_ids_two,$users_ids_one))->with(["department.company"])->paginate(15);
            return view("admin.questionnaire.users",compact("questionnaire","users"));
        }
        toastWarning("К сожалению, опрос не найден");
        return redirect()->back();
    }

    public function result($id,$userId)
    {
        $questionnaire = Questionnaire::withCount("questionnaire_questions")->find($id);
        if(!$questionnaire){
            abort(404);
        }
        $user = User::with(["department.company"])->find($userId);
        $questions = QuestionnaireQuestion::where(["questionnaire_id" => $id])->with("questionnaire_answers")->orderBy("order","ASC")->get();
        $result_answer = QuestionnaireResult::where(["user_id" => $userId,"questionnaire_id" => $id])->get()->pluck("answer_id","answer_id")->toArray();
        $given_answer = GivenAnswersToQuestionnaire::where(["user_id" => $userId,"questionnaire_id" => $id])->get()->pluck("given_answer","question_id")->toArray();
        return view("admin.questionnaire.result",compact("questionnaire","questions","result_answer","given_answer","userId","user"));
    }
    public function delete($id,$userId)
    {
        QuestionnaireResult::where(["user_id" => $userId,"questionnaire_id" => $id])->delete();
        GivenAnswersToQuestionnaire::where(["user_id" => $userId,"questionnaire_id" => $id])->delete();
        return  redirect()->back();

    }

    public function stat($id)
    {
        $questionnaire = Questionnaire::find($id);
        if($questionnaire){
            $questionnaire->load("questionnaire_questions.questionnaire_answers");
            $stats = DB::table('questionnaire_results')
                ->where(["questionnaire_id"=>$questionnaire->id])
                ->select('answer_id',
                    DB::raw('COUNT(*) as total_answers'),
                    DB::raw('SUM(1) as total_points'))
                ->groupBy('answer_id')
                ->get()->groupBy("answer_id")->toArray();
            $stats_questions = DB::table('questionnaire_results')
                ->where(["questionnaire_id"=>$questionnaire->id])
                ->select('question_id',
                    DB::raw('COUNT(*) as total_answers'),
                    DB::raw('SUM(1) as total_points'))
                ->groupBy('question_id')
                ->get()->groupBy("question_id")->toArray();
            $count = QuestionnaireResult::where(["questionnaire_id" => $id])->distinct("user_id")->count();
            $user_count = QuestionnaireResult::where(["questionnaire_id" => $id])->distinct("user_id")->count();
            $department_count = QuestionnaireResult::where(["questionnaire_id" => $id])->distinct("department_id")->count();
            $results = DB::table('questionnaire_results')
                ->distinct("user_id")
                ->select([
                    DB::raw('DATE(created_at) as date'),
                    DB::raw('COUNT(DISTINCT user_id) as count')
                ])
                ->groupBy('date')
                ->get();
            $givenAnswers = GivenAnswersToQuestionnaire::where(["questionnaire_id" => $questionnaire->id])->select("given_answer","question_id")->get()->groupBy("question_id")->toArray();
            return view("admin.questionnaire.stat",compact("questionnaire","stats","count","user_count","department_count","results","stats_questions","givenAnswers"));
        }
        toastWarning("К сожалению, опрос не найден");
        return redirect()->back();
    }
}
