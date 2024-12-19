@extends('layout-employee')
@section('content')

    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div>

        <div class="page-content">
            <div class="container mb-5">
                <div class="row">
                    <div class="col-12 col-lg-9 my-2">
                        <p class="text-lg font-bold lg:text-xl xl:text-2xl">
                            Мое обращение в техническую поддержку № {{$ticket->id}}
                        </p>
                    </div>
                    <div class="col-12 col-lg-3 my-2 text-right">
                        <a href="{{route("tech-support-ticket-list")}}" class="btn btn-warning text-white">
                            <i class="fas fa-eye"></i> Мои тикеты
                        </a>
                    </div>
                </div>
            </div>
            <!-- Page-Title -->
            <div class="container mb-5">
                <div class="row">
                    <div class="col-12">
                        <div class="shadow-2xl rounded-lg p-3 bg-white">
                            <div class="row">
                                <div class="px-3">
                                    <div class="avatar-image">
                                        <img
                                            class="w-24 h-24 rounded-full overflow-hidden ring-2 ring-[#f8b739]"
                                            src="{{auth()->user()->img}}"
                                            alt="{{auth()->user()->name}}">
                                    </div>
                                </div>
                                <div class="col-12 col-md-10">
                                    <div class="flex">
                                        <div class="w-full">
                                            <p class="text-2xl font-bold text-gray-600 mb-1">
                                                {{auth()->user()->name}}
                                            </p>
                                            <p class="text-md text-gray-600">
                                                <b>Email:</b>{{auth()->user()->email}}
                                            </p>
                                            @if(auth()->user()->department)
                                                <p class="text-md text-gray-600">
                                                    <b>Департамент:</b> {{auth()->user()->department}}
                                                </p>
                                            @endif
                                            @if(auth()->user()->phone)
                                                <p class="text-md text-gray-600">
                                                    <b>Телефон:</b> {{auth()->user()->phone}}
                                                </p>
                                            @endif
                                            @if(auth()->user()->position)
                                                <p class="text-md text-gray-600">
                                                    <b>Позиция:</b> {{auth()->user()->position}}
                                                </p>
                                            @endif
                                            <div class="my-3 w-full border-top border-2 border-[#ffa41c]"></div>
                                            @if($ticket->created_at)
                                                <p class="text-md text-gray-600">
                                                    <b>Дата
                                                        создания:</b> {{\Illuminate\Support\Carbon::createFromDate($ticket->created_at)->format('H:i:s d.m.Y')}}
                                                </p>
                                            @endif
                                            @if($ticket->updated_at)
                                                <p class="text-md text-gray-600">
                                                    <b>Дата
                                                        обновления:</b> {{\Illuminate\Support\Carbon::createFromDate($ticket->updated_at)->format('H:i:s d.m.Y')}}
                                                </p>
                                            @endif
                                            @if($ticket->deadline_date)
                                                <p class="text-md text-gray-600">
                                                    <b>Крайний
                                                        срок:</b> {{\Illuminate\Support\Carbon::createFromDate($ticket->deadline_date)->format('H:i:s d.m.Y')}}
                                                </p>
                                            @endif

                                        </div>

                                    </div>
                                    <div class="my-3 flex">
                                        @if($ticket->deadline)
                                            @if($ticket->deadline_id == 1)
                                                <div class="mr-2">
                                                <span
                                                    class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">
                                                    <i class="fas fa-circle mr-1 text-xs"></i>{{$ticket->deadline->title}}
                                                </span>
                                                </div>
                                            @elseif($ticket->deadline_id == 2)
                                                <div class="mr-2">
                                                <span
                                                    class="bg-orange-100 text-orange-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-orange-900 dark:text-orange-300">
                                                    <i class="fas fa-circle mr-1 text-xs"></i> {{$ticket->deadline->title}}
                                                </span>
                                                </div>
                                            @elseif($ticket->deadline_id == 3)
                                                <div class="mr-2">
                                                <span
                                                    class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">
                                                    <i class="fas fa-circle mr-1 text-xs"></i>{{$ticket->deadline->title}}
                                                </span>
                                                </div>

                                            @else
                                                <div class="mr-2">
                                                <span
                                                    class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                                                    <i class="fas fa-circle mr-1 text-xs"></i>{{$ticket->deadline->title}}
                                                </span>
                                                </div>
                                            @endif
                                        @endif
                                        @if($ticket->category)
                                            <div class="mr-2">
                                                <span
                                                    class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                                                    <i class="fas fa-circle mr-1 text-xs"></i>{{$ticket->category->title}}
                                                </span>
                                            </div>
                                        @endif
                                        @if($ticket->status)
                                            @if($ticket->status_id == 1)
                                                <div class="mr-2">
                                                        <span
                                                            class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">
                                                            <i class="fas fa-circle mr-1 text-xs"></i>{{$ticket->status->title}}
                                                        </span>
                                                </div>
                                            @elseif($ticket->status_id == 2)
                                                <div class="mr-2">
                                                <span
                                                    class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                                                    <i class="fas fa-circle mr-1 text-xs"></i> {{$ticket->status->title}}
                                                </span>
                                                </div>
                                            @elseif($ticket->status_id == 3)
                                                <div class="mr-2">
                                                    <span
                                                        class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                                                        <i class="fas fa-circle mr-1 text-xs"></i>{{$ticket->status->title}}
                                                    </span>
                                                </div>

                                            @else
                                                <div class="mr-2">
                                                <span
                                                    class="bg-orange-100 text-orange-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-orange-900 dark:text-orange-300">
                                                    <i class="fas fa-circle mr-1 text-xs"></i>{{$ticket->status->title}}
                                                </span>
                                                </div>
                                            @endif
                                        @endif
                                        @if($ticket->is_answered)
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
                                    @if($ticket->executor)
                                        <div class="flow-root shadow-lg bg-white rounded-full px-3">
                                            <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                                                <li class="py-3 sm:py-4">
                                                    <div class="flex items-center">
                                                        <div class="flex-shrink-0">
                                                            <img class="w-8 h-8 rounded-full overflow-hidden"
                                                                 src="{{$ticket->executor->img}}"
                                                                 alt="{{$ticket->executor->name}}">
                                                        </div>
                                                        <div class="flex-1 min-w-0 ms-4">
                                                            <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-700">
                                                                {{$ticket->executor->name}}
                                                            </p>
                                                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                                {{$ticket->executor->email}} <br/>
                                                                {{$ticket->executor->phone}}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            @endif
                                        </div>
                                </div>
                                @if($ticket->status_id == 1)
                                    <div class="col-12 flex justify-end">
                                        <form action="{{route("tech-support-ticket-delete",$ticket->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                                Удалить
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>


                    </div>
                </div>
                <!-- end row -->
                <!-- end page title end breadcrumb -->
                <livewire:employee.ticket.show :ticket="$ticket"/>

                <!-- end page-content-wrapper -->
            </div>
            <!-- End Page-content -->

        </div>
        <!-- end main content-->
        <!-- Main modal -->
        <!-- Модальное окно -->
        <div id="modal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center hidden">
            <div class="py-2 flex flex-col justify-center sm:py-12">
                <div class="py-3 sm:max-w-xl sm:mx-auto p-3">
                    <div class="bg-white min-w-1xl flex flex-col rounded-xl shadow-lg">
                        <div class="px-12 py-5">
                            <h2 class="text-gray-800 text-3xl font-semibold">Тикет завершен!</h2>
                        </div>
                        <form action="{{route("tech-support-ticket-update-ticket",$ticket->id)}}" method="post">
                            @csrf
                            @method("PUT")
                            <input type="hidden" name="reopened_by_user" value="0">
                            <div class="bg-gray-200 w-full flex flex-col items-center">
                                <div class="flex flex-col items-center py-6 space-y-3">
                                    <span class="text-lg text-gray-800">Оцените работу техподдержки</span>
                                    <div class="flex space-x-3">
                                        <div x-data="{ currentVal: 4 }" class="flex items-center gap-1">
                                            <label for="veryDissatisfied"
                                                   class="cursor-pointer transition hover:scale-125 has-[:focus]:scale-125">
                                                <span class="sr-only">very dissatisfied</span>
                                                <input x-model="currentVal" id="veryDissatisfied" type="radio"
                                                       class="sr-only" name="rating" value="1">
                                                <span class="text-2xl"
                                                      :class="currentVal > 0 ? 'grayscale-0' : 'grayscale'">🥴</span>
                                            </label>

                                            <label for="dissatisfied"
                                                   class="cursor-pointer transition hover:scale-125 has-[:focus]:scale-125">
                                                <span class="sr-only">dissatisfied</span>
                                                <input x-model="currentVal" id="dissatisfied" type="radio"
                                                       class="sr-only" name="rating" value="2">
                                                <span class="text-2xl"
                                                      :class="currentVal > 1 ? 'grayscale-0' : 'grayscale'">😕</span>
                                            </label>

                                            <label for="neutral"
                                                   class="cursor-pointer transition hover:scale-125 has-[:focus]:scale-125">
                                                <span class="sr-only">neutral</span>
                                                <input x-model="currentVal" id="neutral" type="radio" class="sr-only"
                                                       name="rating" value="3">
                                                <span class="text-2xl"
                                                      :class="currentVal > 2 ? 'grayscale-0' : 'grayscale'">😐</span>
                                            </label>

                                            <label for="satisfied"
                                                   class="cursor-pointer transition hover:scale-125 has-[:focus]:scale-125">
                                                <span class="sr-only">satisfied</span>
                                                <input x-model="currentVal" id="satisfied" type="radio" class="sr-only"
                                                       name="rating" value="4">
                                                <span class="text-2xl"
                                                      :class="currentVal > 3 ? 'grayscale-0' : 'grayscale'">😊</span>
                                            </label>

                                            <label for="verySatisfied"
                                                   class="cursor-pointer transition hover:scale-125 has-[:focus]:scale-125">
                                                <span class="sr-only">very satisfied</span>
                                                <input x-model="currentVal" id="verySatisfied" type="radio"
                                                       class="sr-only" name="rating" value="5">
                                                <span class="text-2xl"
                                                      :class="currentVal > 4 ? 'grayscale-0' : 'grayscale'">😍</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit"
                                        class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                    Оценить
                                </button>
                            </div>
                        </form>
                        <form action="{{route("tech-support-ticket-update-ticket",$ticket->id)}}" method="post">
                            @csrf
                            @method("PUT")
                            <div class="bg-red-200 w-full flex flex-col items-center">
                                <div class="flex flex-col items-center py-6 space-y-3">
                                    <span class="text-lg text-gray-800">Или переоткройте тикет</span>
                                    <input type="hidden" name="reopened_by_user" value="1">
                                    <button type="submit"
                                            class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                        Переоткрыть тикет
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        @endsection
        @push("scripts")
            @if($ticket->reopened_by_user === null and $ticket->status_id == 3)
                <script>
                    document.addEventListener("DOMContentLoaded", function () {
                        const modal = document.getElementById('modal');
                        modal.classList.remove('hidden');
                    });
                </script>
    @endif
    @endpush
