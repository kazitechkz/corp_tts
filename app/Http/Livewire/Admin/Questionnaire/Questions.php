<?php

namespace App\Http\Livewire\Admin\Questionnaire;

use App\Models\Questionnaire;
use App\Models\QuestionnaireAnswer;
use App\Models\QuestionnaireQuestion;
use Livewire\Component;

class Questions extends Component
{
    public $questionnaire;
    public $questions;
    public $activeQuestion;
    public $activeAnswer;
    public $question;
    public $answer;
    public $context;
    public $type;
    public $max_answer;
    public $order;

    public function mount(Questionnaire $questionnaire)
    {
        $this->questionnaire = $questionnaire;
        $this->getQuestions();
    }

    public function getQuestions()
    {
        $this->questions = QuestionnaireQuestion::withCount(["questionnaire_answers"])->where(["questionnaire_id" => $this->questionnaire->id])->orderBy("order","ASC")->get();
    }

    public function saveQuestions()
    {
        $this->validate(["question"=>"required|max:255","context"=>"sometimes|nullable|max:50000","order"=>"required|integer|min:1|max:1000","max_answer"=>"required|integer|min:1|max:20"]);
        QuestionnaireQuestion::add(["question"=>$this->question,"questionnaire_id"=>$this->questionnaire->id,"context"=>$this->context,"order"=>$this->order,"max_answer"=>$this->max_answer]);
        $this->question = null;
        $this->context = null;
        $this->max_answer = null;
        $this->order = null;
        toastSuccess("Вопрос добавлен!");
        $this->getQuestions();
    }

    public function createQuestion()
    {
        $this->question = null;
        $this->context = null;
        $this->activeQuestion = null;
        $this->type = null;
        $this->max_answer = null;
        $this->order = null;
    }

    public function deleteQuestion($id)
    {
        if(QuestionnaireQuestion::find($id)){
            QuestionnaireQuestion::destroy([$id]);
            toastSuccess("Вопрос удален!");
            $this->activeQuestion = null;
            $this->activeAnswer = null;
            $this->answer = null;
            $this->question = null;
            $this->context = null;
            $this->type = null;
            $this->max_answer = null;
            $this->order = null;
        }
        $this->getQuestions();
    }

    public function showQuestion($id)
    {
        $this->type = "show";
        $this->activeQuestion = QuestionnaireQuestion::with(["questionnaire_answers"])->find($id);
        $this->getQuestions();
    }

    public function editQuestion($id)
    {
        $this->type = "edit";
        $this->activeQuestion = QuestionnaireQuestion::with(["questionnaire_answers"])->find($id);
        if($this->activeQuestion){
            $this->question = $this->activeQuestion->question;
            $this->context = $this->activeQuestion->context;
            $this->max_answer = $this->activeQuestion->max_answer;
            $this->order = $this->activeQuestion->order;
        }
        $this->getQuestions();
    }

    public function editAnswer($id)
    {
        $this->activeAnswer = QuestionnaireAnswer::find($id);
        if($this->activeAnswer){
            $this->answer = $this->activeAnswer->answer;
        }
    }
    public function updateAnswer()
    {
        if($this->activeAnswer){
            $this->validate(["answer"=>"required"]);
            $this->activeAnswer->edit(["answer"=>$this->answer]);
            $this->answer = null;
            $this->activeAnswer = null;
            $this->showQuestion($this->activeQuestion->id);
        }
    }
    public function createAnswer()
    {
        $this->activeAnswer = null;
        $this->answer = null;
    }
    public function deleteAnswer($id)
    {
        if(QuestionnaireAnswer::find($id)){
            QuestionnaireAnswer::destroy([$id]);
            toastSuccess("Ответ удален!");
        }
        $this->showQuestion($this->activeQuestion->id);

    }

    public function changeQuestion()
    {
        if($this->activeQuestion){
            $this->validate(["question"=>"required|max:255","context"=>"sometimes|nullable|max:50000","order"=>"required|integer|min:1|max:1000","max_answer"=>"required|integer|min:1|max:20"]);
            $this->activeQuestion->edit(["question"=>$this->question,"questionnaire_id"=>$this->questionnaire->id,"context"=>$this->context,"order"=>$this->order,"max_answer"=>$this->max_answer]);
            $this->question = null;
            $this->context = null;
            $this->type = null;
            $this->activeQuestion=null;
            $this->max_answer = null;
            $this->order = null;
        }
        $this->getQuestions();
    }

    public function saveAnswer()
    {
        if($this->activeQuestion){
            $this->validate(["answer"=>"required"]);
            QuestionnaireAnswer::add(["answer"=>$this->answer,"question_id"=>$this->activeQuestion->id]);
            $this->answer = null;
        }
        $this->showQuestion($this->activeQuestion->id);
    }

    public function render()
    {
        return view('livewire.admin.questionnaire.questions');
    }
}
