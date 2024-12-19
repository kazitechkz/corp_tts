@extends("layout")



@section("content")

    <div class="main-content">

        <div class="page-content">

            <div class="container">
                <div class="row">
                    <div class="col-12 my-3">
                        <address class="flex items-center not-italic">
                            <div class="inline-flex items-center mr-3 text-sm text-gray-900">
                                <img class="mr-2 w-16 h-16 rounded-full" src="{{$user->img}}" alt="{{$user->name}}">
                                <div>
                                    <a href="#" rel="author" class="text-xl font-bold text-gray-900">{{$user->name}}</a>
                                    <p class="text-base text-gray-500 ">
                                        {{$user->position}}
                                        @if($user->department_id)
                                            ({{$user->department->title}})
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </address>
                    </div>
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
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
