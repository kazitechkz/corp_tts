@extends('layout-employee')
@push('styles')
    <link rel="stylesheet" href="{{asset('css/lightbox.css')}}">
    <style>

    </style>
@endpush
@section('content')

    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div>

        <div class="page-content">
        <div class="container mb-5">
            <div class="row">
                <div class="col-12 col-md-9 my-2">
                    <p class="text-lg font-bold lg:text-xl xl:text-2xl">
                        Новость: {{$news->title}}
                    </p>
                </div>
                <div class="col-12 col-md-3 my-2 flex justify-content-end align-items-end">
                    <a href="{{route("employee-news")}}" class="btn btn-warning text-white">
                        <i class="fas fa-newspaper mr-2"></i>Все Новости
                    </a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mt-5">
                @if($news)
                    <div class="col-12">
                        <!-- Simple card -->
                        <div class="card bg-transparent">
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
                                        <a href="{{$news->img}}" data-lightbox="example-set">
                                            <img class="d-none" src="{{$news->img}}" alt="">
                                            <div data-lightbox="example-set" class="rounded-xl z-10 h-[300px] md:h-[400px] lg:h-[600px] w-full bg-contain bg-center bg-no-repeat"
                                                 style="background-image:url({{$news->img}})"></div>
                                        </a>
                                    </div>
                                    @if($news->galleries->isNotEmpty())
                                        @foreach($news->galleries as $gallery)
                                            <div class="carousel-item">
                                                <a href="{{$gallery->getFile("image_url")}}" data-lightbox="gallery-set">
                                                    <img class="d-none" src="{{$gallery->getFile("image_url")}}" alt="">
                                                    <div data-lightbox="gallery-set" class="rounded-xl z-10 h-[300px] md:h-[400px] lg:h-[600px] w-full bg-contain bg-center bg-no-repeat"
                                                         style="background-image:url({{$gallery->getFile("image_url")}})"></div>
                                                </a>
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

                            <div class="card-body">
                                <p class="text-lg font-bold lg:text-xl xl:text-2xl text-black d-inline-block mb-4">{{$news->title}}</p><br/>
                                <p class="text-lg card-subtitle font-size-16 mt-0 font-size-32 text-black d-inline-block mb-4">{{$news->subtitle}}</p><br/>
                                <p class="text-md text-gray-400 d-inline-block mb-4">{{$news->created_at->diffForHumans()}}</p><br/>
                                <hr/>
                                <div class="card-text text-md my-4">
                                    {!! $news->description !!}
                                </div>
                            </div>
                        </div>
                    </div>

                @endif

            </div>
            <!-- end row -->

        </div>
        <!-- End Page-content -->
        </div>
    </div>
    <!-- end main content-->

@endsection
@push('scripts')
    <script src="{{asset('js/lightbox.js')}}"></script>
@endpush
