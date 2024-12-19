
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
        <form id="js-form" action="{{route("cto-ticket-deadline.store")}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="example-text-input" class=" col-form-label">Наименование категории *</label>
                <div>
                    <input  wire:model="title" class="form-control  @error('title') is-invalid @enderror" name="title" type="text" value="{{old("title")}}" id="example-text-input">
                </div>
            </div>

            <div class="form-group">
                <label for="example-text-input" class=" col-form-label">Значение категории *</label>
                <div>
                    <input wire:model="value" class="form-control  @error('value') is-invalid @enderror" name="value" type="text" value="{{old("value")}}" id="example-text-input">
                </div>
            </div>
            <div class="form-group">
                <label for="example-text-input" class=" col-form-label">Ограничение по времени в часах *</label>
                <div>
                    <input wire:model="time_limit_hour" class="form-control  @error('time_limit_hour') is-invalid @enderror" name="time_limit_hour" type="number" value="{{old("time_limit_hour")}}" id="example-text-input">
                </div>
            </div>

            <div class="text-right">
                <button class="btn btn-success text-white">
                    Создать
                </button>
            </div>
        </form>
    </div>

</div>

