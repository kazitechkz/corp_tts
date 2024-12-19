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
                        <a href="{{route("ticket.index")}}" class="btn btn-warning text-white">
                            <i class="fas fa-eye"></i> Все тикеты
                        </a>
                    </div>
                </div>
            </div>
            <!-- Page-Title -->
            <div class="container mb-5">
                <div class="grid grid-cols-12">
                    <div class="col-span-12">
                        <div class="shadow-2xl rounded-lg p-3 bg-white">
                            <div class="flex">
                                    <div class="user-avatar">
                                        <img class="w-24 h-24 p-1 rounded-full ring-2 ring-gray-300 dark:accent-orange-500 overflow-hidden"
                                             src="{{$ticket->user->img}}" alt="{{$ticket->user->name}}">
                                    </div>
                                <div class="ml-5 md:ml-2">
                                    <p class="text-2xl font-bold text-gray-600 mb-1">
                                        {{$ticket->user->name}}
                                    </p>
                                    <p class="text-md text-gray-600">
                                        Email:{{$ticket->user->email}}
                                    </p>
                                    @if($ticket->user->department)
                                        <p class="text-md text-gray-600">
                                            Департамент: {{$ticket->user->department}}
                                        </p>
                                    @endif
                                    @if($ticket->user->phone)
                                        <p class="text-md text-gray-600">
                                            Телефон: {{$ticket->user->phone}}
                                        </p>
                                    @endif
                                    @if($ticket->user->position)
                                        <p class="text-md text-gray-600">
                                            Позиция: {{$ticket->user->position}}
                                        </p>
                                    @endif

                                </div>

                            </div>
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
        function confirmClose()
        {
            var agree=confirm("Вы уверены?");
            if (agree)
                $("#closeTicketForm").submit();
            else
                return false ;
        }
    </script>
@endpush
