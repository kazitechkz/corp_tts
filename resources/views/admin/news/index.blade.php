@extends("layout")
@push("styles")
    <style>
        figure img {
            max-width: 500px;
        }
        .description {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap; /* Однострочное отображение с многоточием */
            max-width: 700px; /* Установите максимальную ширину, которую вы хотите для текста */
            display: block; /* блочный элемент для полного контроля над шириной */
        }
    </style>
@endpush
@section("content")


    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">

            <!-- Page-Title -->
            <div class="page-title-box">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="page-title mb-1">Список новостей</h4>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="/admin">Главная</a></li>
                                <li class="breadcrumb-item active">Список новостей</li>
                            </ol>
                        </div>
                        <div class="col-md-4">
                            <div class="float-right d-none d-md-block">
                                <div class="dropdown">
                                    <a href="{{route("news.create")}}" class="btn btn-light btn-rounded dropdown-toggle">
                                        <i class="mdi mdi mdi-plus-thick  mr-1"></i> Добавить
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- end page title end breadcrumb -->

            <div class="page-content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="header-title">Новсти</h4>
                                    <p class="card-title-desc">Здесь вы можете увидеть список текущих новостей.</p>
                                    @if($news->isNotEmpty())
                                        <div class="table-rep-plugin">
                                            <div class="table-responsive mb-0" data-pattern="priority-columns">
                                                <table id="tech-companies-1" class="table table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th>Изображение</th>
                                                        <th data-priority="1">Заголовок</th>
                                                        <th data-priority="2">Подзагловок</th>
                                                        <th data-priority="3">Описание</th>
                                                        <th data-priority="3">Дата создания</th>
                                                        <th data-priority="4">Действия</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($news as $item)
                                                        <tr>
                                                            <td><img class="rounded-circle header-profile-user" src="{{$item->img}}"></td>
                                                            <td>{{$item->title}}</td>
                                                            <td>{{$item->subtitle}}</td>
                                                            <td>
                                                                <div class="description">
                                                                    {!! $item->description !!}
                                                                </div>
                                                            </td>
                                                            <td>{{$item->created_at->diffForHumans()}}</td>
                                                            <td>
                                                                <div class="btn-group" role="group">
                                                                    <a href="{{route("news.show",$item->id)}}" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="View">
                                                                        <i class="mdi mdi-eye"></i>
                                                                    </a>
                                                                    <a href="{{route("news.edit",$item->id)}}" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                                                        <i class="mdi mdi-pencil"></i>
                                                                    </a>
                                                                    <form action="{{route('news.destroy',$item->id)}}" method="post">
                                                                        @method('delete')
                                                                        @csrf
                                                                        <button type="submit" class="btn btn-outline-secondary btn-sm" onclick="return (prompt('Вы уверены? Напишите 0000 чтобы удаить') == '0000' ? true : false)" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                                                            <i class="mdi mdi-trash-can"></i>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                    </tbody>
                                                </table>
                                                {{$news->links()}}
                                            </div>

                                        </div>
                                    @else
                                        <p class="font-size-16 text-danger">Новостей еще нет</p>
                                    @endif
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                </div>
                <!-- end container-fluid -->
            </div>
            <!-- end page-content-wrapper -->
        </div>
        <!-- End Page-content -->


    </div>
    <!-- end main content-->

@endsection

