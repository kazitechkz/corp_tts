@extends("layout")



@section("content")

    <div class="main-content">

        <div class="page-content">

            <!-- Page-Title -->
            <div class="page-title-box">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <h4 class="page-title mb-1">Пользователи опросника {{$questionnaire->title}}</h4>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{route("questionnaire.index")}}">Опросник</a></li>
                                <li class="breadcrumb-item active">Пользователи опросника {{$questionnaire->title}}</li>
                            </ol>
                        </div>
                    </div>

                </div>
            </div>
            <!-- end page title end breadcrumb -->
            @if($users->isNotEmpty())
                <div class="page-content-wrapper mt-[40px]">
                    <div class="container">
                        <div class="row">
                            <div class="bg-white col-12 border-gray-200 border py-4">
                                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                    <div class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-orange-300">
                                        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                                            <thead class="text-xs text-white uppercase bg-orange-300">
                                            <tr>
                                                <th scope="col" class="px-6 py-3">
                                                    ФИО
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Департамент
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Позиция
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Результат
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Удалить
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($users as $user)
                                                <tr class="bg-white border-b hover:bg-gray-50 ">
                                                    <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap">
                                                        <img class="w-10 h-10 rounded-full" src="{{$user->img}}">
                                                        <div class="ps-3">
                                                            <div class="text-base font-semibold">{{$user->name}}</div>
                                                            <div class="font-normal text-gray-500">{{$user->email}}</div>
                                                        </div>
                                                    </th>
                                                    <td class="px-6 py-4">
                                                        @if($user->department)
                                                            {{$user->department->title}}

                                                            @if($user->department->company)
                                                                ({{$user->department->company->title}})
                                                            @endif

                                                        @else
                                                            -
                                                        @endif
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        <div class="flex items-center">
                                                            {{$user->position}}
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        <a href="{{route("questionnaire-questions-user-result",["id"=>$questionnaire->id,"userId"=>$user->id])}}" class="font-medium text-white btn btn-info">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        <a href="{{route("questionnaire-questions-user-delete",["id"=>$questionnaire->id,"userId"=>$user->id])}}" class="font-medium text-white btn btn-danger">
                                                            <i class="fas fa-window-close"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                            <div class="bg-white col-12 border-gray-200 border py-4 flex justify-center items-center">
                                {{$users->links()}}
                            </div>
                            <!-- end row -->
                        </div>
                        <!-- end container-fluid -->
                    </div>
                    <!-- end page-content-wrapper -->
                </div>
            @endif

        <!-- End Page-content -->


    </div>
@endsection
