@extends('layout-cto')
@section('content')
    <div>
        <div class="page-content">
            <div class="page-content-wrapper">
                <div class="container">

                    <div class="grid grid-cols-12 my-5 border-[1px] p-4 shadow-2xl">
                        <div class="col-span-12 md:col-span-6 lg:col-span-4">
                            <h5 class="mb-2 text-xl font-semibold tracking-tight text-gray-600">
                                Новые заявки
                            </h5>
                            @if($new_tickets)
                                @if(count($new_tickets))
                                    @foreach($new_tickets as $new_ticket)
                                        <div class="my-3">
                                            <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                                <img
                                                    class="w-12 h-12 rounded-full overflow-hidden ring-2 ring-[#f8b739] mb-2"
                                                    src="{{$new_ticket->user->img}}"
                                                    alt="{{$new_ticket->user->name}}">
                                                <a href="{{route("cto-ticket",$new_ticket->id)}}">
                                                    <h5 class="mb-2 text-xl font-semibold tracking-tight text-gray-600">
                                                        {{$new_ticket->title}}
                                                    </h5>
                                                </a>
                                                <div class="my-3">
                                                    @if($new_ticket->deadline)
                                                        @if($new_ticket->deadline_id == 1)
                                                            <div class="mr-2">
                                                <span
                                                    class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">
                                                    <i class="fas fa-circle mr-1 text-xs"></i>{{$new_ticket->deadline->title}}
                                                </span>
                                                            </div>
                                                        @elseif($new_ticket->deadline_id == 2)
                                                            <div class="mr-2">
                                                <span
                                                    class="bg-orange-100 text-orange-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-orange-900 dark:text-orange-300">
                                                    <i class="fas fa-circle mr-1 text-xs"></i> {{$new_ticket->deadline->title}}
                                                </span>
                                                            </div>
                                                        @elseif($new_ticket->deadline_id == 3)
                                                            <div class="mr-2">
                                                <span
                                                    class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">
                                                    <i class="fas fa-circle mr-1 text-xs"></i>{{$new_ticket->deadline->title}}
                                                </span>
                                                            </div>

                                                        @else
                                                            <div class="mr-2">
                                                <span
                                                    class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                                                    <i class="fas fa-circle mr-1 text-xs"></i>{{$new_ticket->deadline->title}}
                                                </span>
                                                            </div>
                                                        @endif
                                                    @endif
                                                    @if($new_ticket->category)
                                                        <div class="mr-2">
                                                <span
                                                    class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                                                    <i class="fas fa-circle mr-1 text-xs"></i>{{$new_ticket->category->title}}
                                                </span>
                                                        </div>
                                                    @endif
                                                    @if($new_ticket->status)
                                                        @if($new_ticket->status_id == 1)
                                                            <div class="mr-2">
                                                        <span
                                                            class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">
                                                            <i class="fas fa-circle mr-1 text-xs"></i>{{$new_ticket->status->title}}
                                                        </span>
                                                            </div>
                                                        @elseif($new_ticket->status_id == 2)
                                                            <div class="mr-2">
                                                <span
                                                    class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                                                    <i class="fas fa-circle mr-1 text-xs"></i> {{$new_ticket->status->title}}
                                                </span>
                                                            </div>
                                                        @elseif($new_ticket->status_id == 3)
                                                            <div class="mr-2">
                                                    <span
                                                        class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                                                        <i class="fas fa-circle mr-1 text-xs"></i>{{$new_ticket->status->title}}
                                                    </span>
                                                            </div>

                                                        @else
                                                            <div class="mr-2">
                                                <span
                                                    class="bg-orange-100 text-orange-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-orange-900 dark:text-orange-300">
                                                    <i class="fas fa-circle mr-1 text-xs"></i>{{$new_ticket->status->title}}
                                                </span>
                                                            </div>
                                                        @endif
                                                    @endif
                                                    @if($new_ticket->is_answered)
                                                        <div class="mr-2">
                                                    <span
                                                        class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                                                        <i class="fas fa-check mr-1 text-xs"></i>Отвечен
                                                    </span>
                                                        </div>
                                                    @else
                                                        <div class="mr-2">
                                                    <span
                                                        class="bg-warning text-white text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-warning text-white">
                                                        <i class="fas fa-times-circle mr-1 text-xs"></i>Ждет ответа
                                                    </span>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="flex -space-x-4 rtl:space-x-reverse">
                                                    <img class="w-10 h-10 border-2 border-white rounded-full dark:border-gray-800" src="{{$new_ticket->user->img}}"
                                                         alt="{{$new_ticket->user->name}}">
                                                    @if($new_ticket->executor)
                                                        <img class="w-10 h-10 border-2 border-white rounded-full dark:border-gray-800" src="{{$new_ticket->executor->img}}"
                                                             alt="{{$new_ticket->executor->name}}">
                                                    @endif
                                                </div>

                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            @endif
                        </div>
                        <div class="col-span-12 md:col-span-6 lg:col-span-4">
                            <h5 class="mb-2 text-xl font-semibold tracking-tight text-gray-600">
                                В работе
                            </h5>
                            @if($in_works)
                                @if(count($in_works))
                                    @foreach($in_works as $in_work)
                                        <div class="my-3">
                                            <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                                <img
                                                    class="w-12 h-12 rounded-full overflow-hidden ring-2 ring-[#f8b739] mb-2"
                                                    src="{{$in_work->user->img}}"
                                                    alt="{{$in_work->user->name}}">
                                                <a href="{{route("cto-ticket",$in_work->id)}}">
                                                    <h5 class="mb-2 text-xl font-semibold tracking-tight text-gray-600">
                                                        {{$in_work->title}}
                                                    </h5>
                                                </a>
                                                <div class="my-3">
                                                    @if($in_work->deadline)
                                                        @if($in_work->deadline_id == 1)
                                                            <div class="mr-2">
                                                <span
                                                    class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">
                                                    <i class="fas fa-circle mr-1 text-xs"></i>{{$in_work->deadline->title}}
                                                </span>
                                                            </div>
                                                        @elseif($in_work->deadline_id == 2)
                                                            <div class="mr-2">
                                                <span
                                                    class="bg-orange-100 text-orange-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-orange-900 dark:text-orange-300">
                                                    <i class="fas fa-circle mr-1 text-xs"></i> {{$in_work->deadline->title}}
                                                </span>
                                                            </div>
                                                        @elseif($in_work->deadline_id == 3)
                                                            <div class="mr-2">
                                                <span
                                                    class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">
                                                    <i class="fas fa-circle mr-1 text-xs"></i>{{$in_work->deadline->title}}
                                                </span>
                                                            </div>

                                                        @else
                                                            <div class="mr-2">
                                                <span
                                                    class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                                                    <i class="fas fa-circle mr-1 text-xs"></i>{{$in_work->deadline->title}}
                                                </span>
                                                            </div>
                                                        @endif
                                                    @endif
                                                    @if($in_work->category)
                                                        <div class="mr-2">
                                                <span
                                                    class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                                                    <i class="fas fa-circle mr-1 text-xs"></i>{{$in_work->category->title}}
                                                </span>
                                                        </div>
                                                    @endif
                                                    @if($in_work->status)
                                                        @if($in_work->status_id == 1)
                                                            <div class="mr-2">
                                                        <span
                                                            class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">
                                                            <i class="fas fa-circle mr-1 text-xs"></i>{{$in_work->status->title}}
                                                        </span>
                                                            </div>
                                                        @elseif($in_work->status_id == 2)
                                                            <div class="mr-2">
                                                <span
                                                    class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                                                    <i class="fas fa-circle mr-1 text-xs"></i> {{$in_work->status->title}}
                                                </span>
                                                            </div>
                                                        @elseif($in_work->status_id == 3)
                                                            <div class="mr-2">
                                                    <span
                                                        class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                                                        <i class="fas fa-circle mr-1 text-xs"></i>{{$in_work->status->title}}
                                                    </span>
                                                            </div>

                                                        @else
                                                            <div class="mr-2">
                                                <span
                                                    class="bg-orange-100 text-orange-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-orange-900 dark:text-orange-300">
                                                    <i class="fas fa-circle mr-1 text-xs"></i>{{$in_work->status->title}}
                                                </span>
                                                            </div>
                                                        @endif
                                                    @endif
                                                    @if($in_work->is_answered)
                                                        <div class="mr-2">
                                                    <span
                                                        class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                                                        <i class="fas fa-check mr-1 text-xs"></i>Отвечен
                                                    </span>
                                                        </div>
                                                    @else
                                                        <div class="mr-2">
                                                    <span
                                                        class="bg-warning text-white text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-warning text-white">
                                                        <i class="fas fa-times-circle mr-1 text-xs"></i>Ждет ответа
                                                    </span>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="flex -space-x-4 rtl:space-x-reverse">
                                                    <img class="w-10 h-10 border-2 border-white rounded-full dark:border-gray-800" src="{{$in_work->user->img}}"
                                                         alt="{{$in_work->user->name}}">
                                                    @if($in_work->executor)
                                                        <img class="w-10 h-10 border-2 border-white rounded-full dark:border-gray-800" src="{{$in_work->executor->img}}"
                                                             alt="{{$in_work->executor->name}}">
                                                    @endif
                                                </div>

                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            @endif
                        </div>
                        <div class="col-span-12 md:col-span-6 lg:col-span-4">
                            <h5 class="mb-2 text-xl font-semibold tracking-tight text-gray-600">
                                Доработка
                            </h5>
                            @if($reopeneds)
                                @if(count($reopeneds))
                                    @foreach($reopeneds as $reopened)
                                        <div class="my-3">
                                            <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                                <img
                                                    class="w-12 h-12 rounded-full overflow-hidden ring-2 ring-[#f8b739] mb-2"
                                                    src="{{$reopened->user->img}}"
                                                    alt="{{$reopened->user->name}}">
                                                <a href="{{route("cto-ticket",$reopened->id)}}">
                                                    <h5 class="mb-2 text-xl font-semibold tracking-tight text-gray-600">
                                                        {{$reopened->title}}
                                                    </h5>
                                                </a>
                                                <div class="my-3">
                                                    @if($reopened->deadline)
                                                        @if($reopened->deadline_id == 1)
                                                            <div class="mr-2">
                                                <span
                                                    class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">
                                                    <i class="fas fa-circle mr-1 text-xs"></i>{{$reopened->deadline->title}}
                                                </span>
                                                            </div>
                                                        @elseif($reopened->deadline_id == 2)
                                                            <div class="mr-2">
                                                <span
                                                    class="bg-orange-100 text-orange-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-orange-900 dark:text-orange-300">
                                                    <i class="fas fa-circle mr-1 text-xs"></i> {{$reopened->deadline->title}}
                                                </span>
                                                            </div>
                                                        @elseif($reopened->deadline_id == 3)
                                                            <div class="mr-2">
                                                <span
                                                    class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">
                                                    <i class="fas fa-circle mr-1 text-xs"></i>{{$reopened->deadline->title}}
                                                </span>
                                                            </div>

                                                        @else
                                                            <div class="mr-2">
                                                <span
                                                    class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                                                    <i class="fas fa-circle mr-1 text-xs"></i>{{$reopened->deadline->title}}
                                                </span>
                                                            </div>
                                                        @endif
                                                    @endif
                                                    @if($reopened->category)
                                                        <div class="mr-2">
                                                <span
                                                    class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                                                    <i class="fas fa-circle mr-1 text-xs"></i>{{$reopened->category->title}}
                                                </span>
                                                        </div>
                                                    @endif
                                                    @if($reopened->status)
                                                        @if($reopened->status_id == 1)
                                                            <div class="mr-2">
                                                        <span
                                                            class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">
                                                            <i class="fas fa-circle mr-1 text-xs"></i>{{$reopened->status->title}}
                                                        </span>
                                                            </div>
                                                        @elseif($reopened->status_id == 2)
                                                            <div class="mr-2">
                                                <span
                                                    class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                                                    <i class="fas fa-circle mr-1 text-xs"></i> {{$reopened->status->title}}
                                                </span>
                                                            </div>
                                                        @elseif($reopened->status_id == 3)
                                                            <div class="mr-2">
                                                    <span
                                                        class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                                                        <i class="fas fa-circle mr-1 text-xs"></i>{{$reopened->status->title}}
                                                    </span>
                                                            </div>

                                                        @else
                                                            <div class="mr-2">
                                                <span
                                                    class="bg-orange-100 text-orange-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-orange-900 dark:text-orange-300">
                                                    <i class="fas fa-circle mr-1 text-xs"></i>{{$reopened->status->title}}
                                                </span>
                                                            </div>
                                                        @endif
                                                    @endif
                                                    @if($reopened->is_answered)
                                                        <div class="mr-2">
                                                    <span
                                                        class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                                                        <i class="fas fa-check mr-1 text-xs"></i>Отвечен
                                                    </span>
                                                        </div>
                                                    @else
                                                        <div class="mr-2">
                                                    <span
                                                        class="bg-warning text-white text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-warning text-white">
                                                        <i class="fas fa-times-circle mr-1 text-xs"></i>Ждет ответа
                                                    </span>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="flex -space-x-4 rtl:space-x-reverse">
                                                    <img class="w-10 h-10 border-2 border-white rounded-full dark:border-gray-800" src="{{$reopened->user->img}}"
                                                         alt="{{$reopened->user->name}}">
                                                    @if($reopened->executor)
                                                        <img class="w-10 h-10 border-2 border-white rounded-full dark:border-gray-800" src="{{$reopened->executor->img}}"
                                                             alt="{{$reopened->executor->name}}">
                                                    @endif
                                                </div>

                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            @endif
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
