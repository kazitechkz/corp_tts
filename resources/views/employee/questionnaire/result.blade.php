
@extends('layout-employee')
@section('content')

    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div>

        <div class="page-content">
            <div class="container mb-5">
                <div class="row">
                    <div class="col-12 col-md-6 my-2">
                        <p class="text-lg font-bold lg:text-xl xl:text-2xl">
                            Опросник
                        </p>
                        <p class="text-md font-bold lg:text-lg">
                            {{$questionnaire->title}}
                        </p>
                    </div>
                    <div class="col-12 col-md-6 my-2 text-right">
                        <a href="{{route("list-questionnaires")}}" class="btn btn-warning text-white px-4 py-2">
                            Назад в Опросники
                        </a>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12 my-2 card p-4 rounded-xl">
                        <form>

                            @foreach($questions as $question)
                                <div class="row border border-gray-200 p-3">
                                    <div class="col-12">
                                        <p class="text-xl font-bold mb-3">
                                            <i class="fas fa-check-circle text-green-400 mr-2"></i>
                                            {{$question->question}} (вы можете указать до {{$question->max_answer}} ответов)
                                        </p>
                                        <p class="mb-2">
                                            {!! $question->context !!}
                                        </p>
                                        <hr>
                                        @foreach($question->questionnaire_answers as $answer)
                                            <div class="flex items-center my-2">
                                                <input
                                                    @if(array_key_exists($answer->id,$result_answer))
                                                        checked
                                                    @endif
                                                    disabled
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300
                                                     @if(array_key_exists($answer->id,$result_answer))
                                                        bg-green-500
                                                       @endif
                                                      cursor-pointer "
                                                    name="answer[{{ $answer->question_id }}][]"
                                                    id="{{$answer->answer}}{{$answer->id}}"
                                                    type="{{$question->max_answer > 1 ? 'checkbox' : 'radio'}}" value="{{ $answer->id }}">
                                                <label
                                                    for="{{$answer->answer}}{{$answer->id}}"
                                                       class="ms-2 text-sm font-medium text-gray-900 cursor-pointer
                                                        @if(array_key_exists($answer->id,$result_answer))
                                                        text-green-500
                                                       @endif
                                                       ">
                                                    {{$answer->answer}}
                                                </label>
                                            </div>
                                        @endforeach
                                            <div class="form-group">
                                                <label for="my_answer">Мой ответ</label>
                                                <input disabled type="text"
                                                       class="form-control"
                                                       id="my_answer"
                                                       name="text_answers[{{$question->id}}]"
                                                       @if(array_key_exists($question->id,$given_answer))
                                                           value="{{$given_answer[$question->id]}}"
                                                       @endif
                                                       placeholder="Введите ваш ответ">
                                            </div>
                                    </div>
                                </div>
                            @endforeach
                                @if(in_array(auth()->user()->department_id,json_decode($questionnaire->departments)) && ($questionnaire->start_at < \Illuminate\Support\Carbon::now()) && ($questionnaire->end_at > \Carbon\Carbon::now()))
                                        <div class="flex justify-content-end my-2">
                                            <a href="{{route("employee-questionnaire-repass",$questionnaire->id)}}" class="btn btn-success btn-lg">
                                                Пересдать
                                            </a>
                                        </div>
                                @endif
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- end main content-->

@endsection
