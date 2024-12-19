
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
        <form id="js-form" action="{{route("cto-ticket-status.update",$model->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method("PUT")
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
            <div class="flex items-center">
                <input wire:model="is_first" name="is_first" checked id="is_first" type="checkbox" value="{{true}}" class="w-4 h-4 text-blue-600 rounded focus:ring-blue-500  focus:ring-2">
                <label for="is_first" class="ms-2 text-sm font-medium text-gray-800 dark:text-gray-800">Первый этап?</label>
            </div>
            <div class="flex items-center">
                <input wire:model="is_last" name="is_last" checked id="is_last" type="checkbox" value="{{true}}" class="w-4 h-4 text-blue-600 rounded focus:ring-blue-500  focus:ring-2">
                <label for="is_last" class="ms-2 text-sm font-medium text-gray-800 dark:text-gray-800">Последний этап?</label>
            </div>
            <div class="form-group">
                <label for="example-text-input" class=" col-form-label">Предыдущий этап</label>
                <div>
                    <select wire:model="prev_id" class="form-control @error('prev_id') is-invalid @enderror" name="prev_id">
                        <option value="{{null}}">
                            Выберите категорию
                        </option>
                        @foreach($tickets_status as $ticket_status)
                            <option value="{{$ticket_status->id}}">
                                {{$ticket_status->title}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="example-text-input" class=" col-form-label">Следующий этап</label>
                <div>
                    <select wire:model="next_id" class="form-control @error('next_id') is-invalid @enderror" name="next_id">
                        <option value="{{null}}">
                            Выберите категорию
                        </option>
                        @foreach($tickets_status as $ticket_status)
                            <option value="{{$ticket_status->id}}">
                                {{$ticket_status->title}}
                            </option>
                        @endforeach
                    </select>
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

