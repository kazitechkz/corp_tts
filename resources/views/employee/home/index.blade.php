@extends('layout-employee')
@section('content')

    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div>

        <div class="page-content">

            <div class="container">
                <div class="row my-3">
                    <div class="col-12">
                        <p class="text-lg md:text-xl lg:text-2xl xl:text-3xl font-weight-bold text-black pl-8">
                            Портал «ТемирТрансСервис»
                        </p>
                    </div>
                </div>
                <div class="grid grid-cols-12 my-3 gap-5">
                    @if($news)
                        <div class="col-span-12 lg:col-span-8">
                            <a href="{{route("news-show",$news->id)}}">
                                <section class="relative  h-[300px] md:h-[400px] lg:h-[600px] lg:mx-5">
                                    <div id="carouselNews" class="carousel slide" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                            <li data-target="#carouselNews" data-slide-to="0" class="active"></li>
                                            @if($news->galleries->isNotEmpty())
                                                @foreach($news->galleries as $gallery)
                                                    <li data-target="#carouselNews" data-slide-to="{{$loop->iteration}}"></li>
                                                @endforeach
                                            @endif

                                        </ol>
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <div class="rounded-xl z-10 h-[300px] md:h-[400px] lg:h-[600px] brightness-50 w-full bg-cover bg-center bg-no-repeat"
                                                     style="background-image:url({{$news->img}})"></div>
                                            </div>
                                            @if($news->galleries->isNotEmpty())
                                                @foreach($news->galleries as $gallery)
                                                    <div class="carousel-item">
                                                        <div class="rounded-xl z-10 h-[300px] md:h-[400px] lg:h-[600px] brightness-50 w-full bg-cover bg-center bg-no-repeat"
                                                             style="background-image:url({{$gallery->getFile("image_url")}})"></div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselNews" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselNews" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                    <div class="absolute z-20 bottom-0 w-full p-4">
                                        <p class="text-white font-weight-bold text-md lg:text-lg xl:text-2xl">
                                            {{$news->title}}
                                        </p>
                                        <div class="lg:flex justify-content-between align-items-center">
                                            <p class="text-white text-xs lg:text-md my-3 lg:w-3/4">
                                                {{strlen($news->subtitle) > 30 ? trim($news->subtitle,30) . "..." : $news->subtitle}}
                                            </p>
                                            <a href="{{route("news-show",$news->id)}}" class="btn btn-warning text-white">
                                                Читать
                                            </a>
                                        </div>

                                    </div>
                                </section>
                            </a>
                            @endif
                            @if($questionnaires->isNotEmpty())
                                <section class="my-4 p-3">
                                    <div class="w-full">
                                        <p class="text-lg md:text-xl font-weight-bold text-black text-uppercase inline-block mb-4">
                                            Опросники
                                        </p>
                                        @foreach($questionnaires as $questionnaire)
                                            <div class="max-w-sm w-full lg:max-w-full lg:flex my-3 rounded-2xl">
                                                <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover bg-center bg-white rounded-t py-2 lg:rounded-t-none lg:rounded-l text-center overflow-hidden" style="background-image: url('/images/question.webp')">
                                                </div>
                                                <div class="border border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal w-full">
                                                    <a href="{{route("employee-questionnaire-show",$questionnaire->id)}}" class="block mb-8">
                                                        <p class="text-sm text-gray-600 flex items-center">
                                                            {{$questionnaire->start_at->format("d/m/Y H:i")}}
                                                            @if($questionnaire->end_at)
                                                                - {{$questionnaire->end_at->format("d/m/Y H:i")}}
                                                            @endif
                                                        </p>
                                                        <div class="text-gray-900 font-bold text-xl mb-2">{{$questionnaire->title}}</div>
                                                        <p class="text-xs text-gray-700 text-base">
                                                            {!! $questionnaire->description !!}
                                                        </p>
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </section>
                            @endif
                            @if($events->isNotEmpty())
                                <section class="my-4 p-3">
                                    <div class="w-full">
                                        <p class="text-lg md:text-xl font-weight-bold text-black text-uppercase inline-block mb-4">
                                            Мероприятия
                                        </p>
                                        @foreach($events as $event)
                                            <div class="max-w-sm w-full lg:max-w-full lg:flex my-3 rounded-2xl">
                                                <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover bg-center bg-white rounded-t py-2 lg:rounded-t-none lg:rounded-l text-center overflow-hidden" style="background-image: url({{$event->getFile("image_url")}})">
                                                </div>
                                                <div class="border border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal w-full">
                                                    <a href="{{route("event-show",$event->id)}}" class="block mb-8">
                                                        <p class="text-sm text-gray-600 flex items-center">
                                                            {{$event->start_date->format("d/m/Y H:i")}}
                                                            @if($event->end_date)
                                                               - {{$event->end_date->format("d/m/Y H:i")}}
                                                            @endif
                                                        </p>
                                                        <p class="text-sm text-gray-600 flex items-center mb-3">
                                                            <i class="fas fa-location"></i>
                                                            {{$event->address}}
                                                        </p>
                                                        <div class="text-gray-900 font-bold text-xl mb-2">
                                                            {{\Illuminate\Support\Str::limit($event->title,30)}}
                                                        </div>
                                                        <p class="text-xs text-gray-700 text-base">
                                                            {!! \Illuminate\Support\Str::limit(strip_tags($event->description),80) !!}
                                                        </p>
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </section>
                            @endif

                        </div>
                        <div class="col-span-12 lg:col-span-4">
                            @if($tasks->isNotEmpty())
                            <div class="flex align-items-center justify-content-center mb-3">
                                <div class="w-full max-w-[400px] shadow-lg bg-white min-h-[350px] rounded-2xl relative p-4">
                                    <div class="header-card-title flex justify-content-between">
                                        <p class="text-md lg:text-lg text-rose-500 font-weight-bold">Важные задания</p>
                                        <a href="{{route("employee-tasks")}}">
                                            <i class="fas fa-eye text-rose-500"></i>
                                        </a>
                                    </div>
                                    @foreach($tasks as $task)
                                        <div class="card-row-body my-3">
                                            <div class="flex align-items-center">
                                                <div class="min-w-8 w-1/12">
                                                    <img class="w-6 h-6 p-1 rounded-full ring-2 ring-gray-300 dark:ring-gray-500 mr" src="{{$task->user->img}}">
                                                </div>
                                                <a href="{{route("employee-task-detail",$task->id)}}" class="min-w-8 justify-content-between flex w-10/12">
                                                    <div class="word-break pl-2 w-2/3">
                                                        <p class="text-md">
                                                            {{$task->user->name}}
                                                        </p>
                                                        <small class="text-xs my-2">
                                                            {{$task->task}}
                                                        </small>
                                                    </div>
                                                    <small class="text-xs ml-2 text-left w-1/3">
                                                        {{$task->created_at->diffForHumans()}}
                                                    </small>
                                                </a>

                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="absolute bottom-0 left-0 w-full min-h-[30px] mt-3 bg-rose-500 rounded-br-2xl rounded-bl-2xl text-left">
                                    </div>
                                </div>
                            </div>
                            @endif
                                <livewire:employee.users.birthday-task />
                                @if($forums->isNotEmpty())
                                    <div class="flex align-items-center justify-content-center mb-3">
                                        <div class="w-full max-w-[400px] shadow-lg bg-white min-h-[300px] rounded-2xl relative p-4">
                                            <div class="header-card-title flex justify-content-between">
                                                <p class="text-md lg:text-lg text-yellow-500 font-weight-bold">Форумы</p>
                                                <a href="{{route("forum-list")}}">
                                                    <i class="fas fa-eye text-yellow-500"></i>
                                                </a>
                                            </div>
                                            @foreach($forums as $forum)
                                                <div class="card-row-body my-3">
                                                    <div class="flex align-items-center">
                                                        <div class="min-w-8 w-1/12">
                                                            <img class="w-6 h-6 p-1 rounded-full ring-2 ring-gray-300 dark:ring-gray-500 mr" src="{{$forum->user->img}}">
                                                        </div>
                                                        <div class="min-w-8 justify-content-between flex w-10/12">
                                                            <div class="word-break pl-2  w-3/4">
                                                                <a href="{{route("forumDetail",$forum->id)}}" class="text-md">
                                                                    {{\Illuminate\Support\Str::limit($forum->title,30)}}
                                                                </a><br/>
                                                                <small class="text-xs my-2">
                                                                    {!! \Illuminate\Support\Str::limit(strip_tags($forum->description),30) !!}
                                                                </small>
                                                            </div>
                                                            <small class="text-xs ml-2 text-left min-w-[40px]  w-1/4">
                                                                {{$forum->created_at->diffForHumans()}}
                                                            </small>
                                                        </div>

                                                    </div>
                                                </div>
                                            @endforeach
                                            <div class="absolute bottom-0 left-0 w-full min-h-[30px] mt-3 bg-yellow-500 rounded-br-2xl rounded-bl-2xl">

                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                </div>
            </div>
        </div>
    </div>

@endsection
