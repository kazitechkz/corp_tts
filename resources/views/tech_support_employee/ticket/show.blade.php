@extends('layout-cto-employee')
@section('content')

    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div>

        <div class="page-content">
            <div class="container mb-5">
                <div class="row">
                    <div class="col-12 col-lg-9 my-2">
                        <p class="text-lg font-bold lg:text-xl xl:text-2xl">
                            Обращение в техническую поддержку № {{$ticket->id}}
                        </p>
                    </div>
                    <div class="col-12 col-lg-3 my-2 text-right">
                        <a href="{{route("techSupportEmployeeTickets")}}" class="btn btn-warning text-white">
                            <i class="fas fa-eye"></i> Все тикеты
                        </a>
                    </div>
                </div>
            </div>
            <!-- Page-Title -->
            <div class="container mb-5">
                <div class="row">
                    <div class="col-12">
                        <div class="shadow-2xl rounded-lg p-3 bg-white relative">
                            <div class="row">
                                <div class="px-3">
                                    <div class="avatar-image">
                                        <img
                                            class="w-24 h-24 rounded-full overflow-hidden ring-2 ring-[#f8b739]"
                                            src="{{$ticket->user->img}}"
                                            alt="{{$ticket->user->name}}">
                                    </div>
                                </div>
                                <div class="col-12 col-md-9">
                                    @if($ticket->user)
                                        <div class="flex">
                                            <div class="w-full">
                                                <p class="text-2xl font-bold text-gray-600 mb-1">
                                                    {{$ticket->user->name}}
                                                </p>
                                                <p class="text-md text-gray-600">
                                                    <b>Email:</b>{{$ticket->user->email}}
                                                </p>
                                                @if($ticket->user->department)
                                                    <p class="text-md text-gray-600">
                                                        <b>Департамент:</b> {{$ticket->user->department->title}}
                                                    </p>
                                                @endif
                                                @if($ticket->user->phone)
                                                    <p class="text-md text-gray-600">
                                                        <b>Телефон:</b> {{$ticket->user->phone}}
                                                    </p>
                                                @endif
                                                @if($ticket->user->position)
                                                    <p class="text-md text-gray-600">
                                                        <b>Позиция:</b> {{$ticket->user->position}}
                                                    </p>
                                                @endif
                                                <div class="my-3 w-full border-top border-2 border-[#ffa41c]"></div>
                                                @if($ticket->created_at)
                                                    <p class="text-md text-gray-600">
                                                        <b>Дата создания:</b> {{\Illuminate\Support\Carbon::createFromDate($ticket->created_at)->format('H:i:s d.m.Y')}}
                                                    </p>
                                                @endif
                                                @if($ticket->updated_at)
                                                    <p class="text-md text-gray-600">
                                                        <b>Дата обновления:</b> {{\Illuminate\Support\Carbon::createFromDate($ticket->updated_at)->format('H:i:s d.m.Y')}}
                                                    </p>
                                                @endif
                                                @if($ticket->deadline_date)
                                                    <p class="text-md text-gray-600">
                                                        <b>Крайний срок:</b> {{\Illuminate\Support\Carbon::createFromDate($ticket->deadline_date)->format('H:i:s d.m.Y')}}
                                                    </p>
                                                @endif
                                            </div>

                                        </div>
                                    @endif
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
                                </div>
                            </div>
                            @if($ticket->status_id != 3)
                                <div class="row mt-4">
                                    <div class="col-12">
                                        <form action="{{route("tech-support-employee-ticket-update",$ticket->id)}}" method="post">
                                            @method('PUT')
                                            @csrf
                                            <input type="hidden" value="3" name="status_id">
                                            <div class="flex justify-end">
                                                <button type="submit" class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                                    <i class="fas fa-check"></i> Закрыть тикет
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            @elseif($ticket->status_id == 3)
                                <div class="row mt-4">
                                    <div class="col-12">
                                        <form action="{{route("tech-support-employee-ticket-update",$ticket->id)}}"  method="post">
                                            @method('PUT')
                                            @csrf
                                            <input type="hidden" value="4" name="status_id">
                                            <div class="flex justify-end">
                                                <button type="submit" class="text-white bg-yellow-700 hover:bg-yellow-800 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
                                                    <i class="fas fa-clock"></i> Переоткрыть тикет
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            @endif

                        </div>

                    </div>
                </div>
            </div>
            <!-- end row -->
            <!-- end page title end breadcrumb -->
            <livewire:tech-support-employee.ticket-show :ticket="$ticket"/>

            <!-- end page-content-wrapper -->
        </div>
        <!-- End Page-content -->

    </div>
    <!-- end main content-->
    <!-- Main modal -->
@endsection
@push("scripts")
    <script>
        function confirmClose() {
            var agree = confirm("Вы уверены?");
            if (agree)
                $("#closeTicketForm").submit();
            else
                return false;
        }
    </script>
@endpush
