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
                            Сообщение
                        </p>
                        <p class="text-md font-bold lg:text-lg">
                            {{$notification->topic}}
                        </p>
                    </div>
                    <div class="col-12 col-md-6 my-2 text-right">
                        <a href="{{route("employee-notifications")}}" class="btn btn-warning text-white px-4 py-2">
                            Назад в сообщения
                        </a>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row mt-5">
                    <div class="col-12 p-3 shadow-lg bg-white rounded-lg">
                        <p class="text-sm text-gray-600">
                            {{$notification->message}}
                        </p>
                    </div>
                </div>
                <!-- end row -->

            </div>
            <!-- End Page-content -->
        </div>
    </div>
    <!-- end main content-->

@endsection


