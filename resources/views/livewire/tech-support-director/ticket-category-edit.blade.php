
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
        <form id="js-form" action="{{route("cto-ticket-category.update",$model->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="example-text-input" class=" col-form-label">Наименование категории *</label>
                <div>
                    <input  wire:model="title" class="form-control  @error('title') is-invalid @enderror" name="title" type="text" value="{{$title}}" id="example-text-input">
                </div>
            </div>

            <div class="form-group">
                <label for="example-text-input" class=" col-form-label">Значение категории *</label>
                <div>
                    <input wire:model="value" class="form-control  @error('value') is-invalid @enderror" name="value" type="text" value="{{$value}}" id="example-text-input">
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

