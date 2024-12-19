@extends('layout-cto')
@section('content')
    <div>
        <div class="page-content">
            <div class="page-content-wrapper">
                <div class="container">
                    <div class="grid grid-cols-12">
                        <div class="col-span-12">
                            <!-- Page-Title -->
                            <div class="page-title-box">
                                <div class="container-fluid">
                                    <div class="row align-items-center">
                                        <div class="col-12 col-md-8">
                                            <h4 class="page-title mb-1">Список сроков исполнения техподдержки</h4>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="float-right d-none d-md-block">
                                                <div class="dropdown">
                                                    <a href="{{route("cto-ticket-deadline.create")}}" class="btn btn-light btn-rounded">
                                                        Добавить <i class="mdi mdi mdi-plus-thick  mr-1"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-12 my-5 border-[1px] p-4 shadow-2xl">
                        <div class="col-span-12">
                            <livewire:tech-support-director.ticket-deadline-table/>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection