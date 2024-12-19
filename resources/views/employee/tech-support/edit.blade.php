@extends('layout-employee')
@section('content')
    <div class="row my-2 py-4">
        <div class="col-12 my-4">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="col-12 bg-white shadow-lg rounded-lg p-3">
            <form id="js-form" action="{{route("tech-support-ticket-update",$ticket->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="example-text-input" class=" col-form-label">Категория обращения *</label>
                    <div>
                        <select class="form-control @error('category_id') is-invalid @enderror" name="category_id">
                            <option value="{{null}}">
                                Выберите категорию
                            </option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" {{ $category->id == $ticket->category_id ? 'selected' : '' }}>
                                    {{$category->title}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="example-text-input" class=" col-form-label">Важность обращения *</label>
                    <div>
                        <select class="form-control @error('deadline_id') is-invalid @enderror" name="deadline_id">
                            <option value="{{null}}">
                                Выберите важность
                            </option>
                            @foreach($deadlines as $deadline)
                                <option value="{{$deadline->id}}" {{ $deadline->id == $ticket->deadline_id ? 'selected' : '' }}>
                                    {{$deadline->title}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="example-text-input" class=" col-form-label">Тема обращения *</label>
                    <div>
                        <input  class="form-control  @error('title') is-invalid @enderror" name="title" type="text" value="{{$ticket->title}}" id="example-text-input">
                    </div>
                </div>
                <div class="form-group">
                    <label for="example-text-input" class=" col-form-label">Описание Обращения *</label>
                    <div>
                        <textarea id="editor" name="description">
                            {{$ticket->description}}
                        </textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="example-text-input" class=" col-form-label">Файл курса (необязателен)</label>
                    <div>
                        <input class="form-control h-[55px] @error('file_url') is-invalid @enderror" name="file_url" type="file" id="example-text-input">
                    </div>
                </div>
                <div class="text-right">
                    <button class="btn btn-success text-white">
                        Обновить
                    </button>
                </div>
            </form>
        </div>

    </div>
@endsection
@push("scripts")
    <script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script>

    <script>
        $(document).ready(function (){
            ClassicEditor
                .create( document.querySelector( '#editor' ),
                    {
                        ckfinder: {
                            uploadUrl: '{{route('image.upload').'?_token='.csrf_token()}}',
                        }
                    }
                )
                .catch( error => {
                    console.error( error );
                } );
        })

    </script>
@endpush
