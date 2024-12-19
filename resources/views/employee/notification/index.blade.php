@extends('layout-employee')
@section('content')

    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div>

        <div class="page-content">
            <div class="container mb-5">
                <div class="row">
                    <div class="col-12 col-md-6 my-2 flex align-items-center">
                        <p class="text-lg font-bold lg:text-xl xl:text-2xl">
                            Оповещения
                        </p>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row mt-5">
                    <div class="col-12 p-3 shadow-lg bg-white rounded-lg">
                        <livewire:employee.notification.notification-table/>
                    </div>
                </div>
                <!-- end row -->

            </div>
            <!-- End Page-content -->
        </div>
    </div>
    <!-- end main content-->

@endsection


