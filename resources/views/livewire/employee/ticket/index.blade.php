<div class="container">
    <!-- Грид с фильтрами -->
    <div class="grid grid-cols-12 gap-4">
        <div class="col-span-12">
            <div id="accordion-collapse" data-accordion="collapse">
                <h2 id="accordion-nested-collapse-heading-3">
                    <button
                        type="button"
                        class="flex items-center justify-between w-full p-3 text-sm font-medium rtl:text-right text-white bg-[#ffa41c] border border-[#ffa41c] focus:ring-4 focus:ring-[#ffa41c] hover:bg-[#ff8f00] rounded-md gap-2"
                        data-accordion-target="#accordion-nested-collapse-body-3"
                        aria-expanded="false"
                        aria-controls="accordion-nested-collapse-body-3"
                    >
                        <span>Фильтры</span>
                        <svg
                            data-accordion-icon
                            class="w-3 h-3 rotate-180 shrink-0"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 10 6"
                        >
                            <path
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 5 5 1 1 5"
                            />
                        </svg>
                    </button>
                </h2>
                <div
                    id="accordion-nested-collapse-body-3"
                    class="hidden bg-white"
                    aria-labelledby="accordion-nested-collapse-heading-3"
                >
                    <!-- Грид внутри фильтров -->
                    <div class="grid grid-cols-12 gap-4 p-4">
                        <!-- Фильтр статуса -->
                        <div class="col-span-12 md:col-span-4">
                            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900">
                                Выберите статус задачи
                            </label>
                            <select
                                wire:model="status_id"
                                id="countries"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            >
                                <option value="{{ null }}" selected>Выберите статус</option>
                                @foreach ($statuses as $status)
                                    <option value="{{ $status->id }}">{{ $status->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Фильтр даты -->
                        <div class="col-span-12 md:col-span-4">
                            <div>
                                <label for="created_date" class="block text-sm font-medium text-gray-700">
                                    Дата создания
                                </label>
                                <input
                                    wire:model="date"
                                    type="date"
                                    id="created_date"
                                    name="created_date"
                                    class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                />
                            </div>
                        </div>

                        <!-- Фильтр чекбокса -->
                        <div class="col-span-12 md:col-span-4 flex items-center">
                            <div class="m-0 p-0">
                                <input
                                    wire:model="exclude_ended"
                                    type="checkbox"
                                    id="checkbox"
                                    class="w-4 h-4 rounded border-gray-300 text-blue-600 focus:ring-2 focus:ring-blue-500 checked:bg-blue-600 checked:border-transparent"
                                />
                                <label for="checkbox" class="ml-2 text-sm font-medium text-gray-900">
                                    Убрать завершенные
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Грид с тикетами -->
    <div class="grid grid-cols-12 gap-4">
        @foreach ($tickets as $ticket)
            <div class="col-span-12">
                <a class="block w-full" href="{{ route('tech-support-ticket-show', $ticket->id) }}">
                    <div class="w-full">
                        <div class="shadow-2xl rounded-lg p-4 bg-white">
                            <div class="flex">
                                <!-- Аватар -->
                                <div class="px-3">
                                    <div class="avatar-image">
                                        <img
                                            class="w-24 h-24 rounded-full overflow-hidden ring-2 ring-[#f8b739]"
                                            src="{{ auth()->user()->img }}"
                                            alt="{{ auth()->user()->name }}"
                                        />
                                    </div>
                                </div>
                                <!-- Контент -->
                                <div class="flex-1">
                                    <p class="text-2xl font-bold text-gray-600 mb-1">
                                        {{ $ticket->title }}
                                    </p>
                                    <div class="my-3 w-full border-t-2 border-[#ffa41c]"></div>
                                    @if($ticket->created_at)
                                        <p class="text-md text-gray-600">
                                            <b>Дата создания:</b>
                                            {{ \Illuminate\Support\Carbon::createFromDate($ticket->created_at)->format('H:i:s d.m.Y') }}
                                        </p>
                                    @endif
                                    @if($ticket->updated_at)
                                        <p class="text-md text-gray-600">
                                            <b>Дата обновления:</b>
                                            {{ \Illuminate\Support\Carbon::createFromDate($ticket->updated_at)->format('H:i:s d.m.Y') }}
                                        </p>
                                    @endif
                                    @if($ticket->deadline_date)
                                        <p class="text-md text-gray-600">
                                            <b>Крайний срок:</b>
                                            {{ \Illuminate\Support\Carbon::createFromDate($ticket->deadline_date)->format('H:i:s d.m.Y') }}
                                        </p>
                                    @endif
                                </div>
                            </div>

                            <!-- Метки -->
                            <div class="my-3 flex">
                                @if($ticket->deadline)
                                    <div class="mr-2">
                            <span class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded">
                                <i class="fas fa-circle mr-1 text-xs"></i>{{ $ticket->deadline->title }}
                            </span>
                                    </div>
                                @endif
                                @if($ticket->category)
                                    <div class="mr-2">
                            <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded">
                                <i class="fas fa-circle mr-1 text-xs"></i>{{ $ticket->category->title }}
                            </span>
                                    </div>
                                @endif
                                @if($ticket->status)
                                    <div class="mr-2">
                            <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded">
                                <i class="fas fa-circle mr-1 text-xs"></i>{{ $ticket->status->title }}
                            </span>
                                    </div>
                                @endif
                                @if($ticket->is_answered)
                                    <div class="mr-2">
                            <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">
                                <i class="fas fa-check mr-1 text-xs"></i>Отвечен
                            </span>
                                    </div>
                                @else
                                    <div class="mr-2">
                            <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded">
                                <i class="fas fa-times mr-1 text-xs"></i>Ждет ответа
                            </span>
                                    </div>
                                @endif
                            </div>

                            <!-- Информация об исполнителе -->
                            @if($ticket->executor)
                                <div class="flow-root shadow-lg bg-white rounded-full px-3">
                                    <ul role="list" class="divide-y divide-gray-200">
                                        <li class="py-3 sm:py-4">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0">
                                                    <img
                                                        class="w-8 h-8 rounded-full overflow-hidden"
                                                        src="{{ $ticket->executor->img }}"
                                                        alt="{{ $ticket->executor->name }}"
                                                    />
                                                </div>
                                                <div class="flex-1 min-w-0 ms-4">
                                                    <p class="text-sm font-medium text-gray-900 truncate">
                                                        {{ $ticket->executor->name }}
                                                    </p>
                                                    <p class="text-sm text-gray-500 truncate">
                                                        {{ $ticket->executor->email }} <br />
                                                        {{ $ticket->executor->phone }}
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                </a>
            </div>

        @endforeach

        <!-- Пагинация -->
        <div class="col-span-12 flex justify-center my-2">
            {{ $tickets->links() }}
        </div>
    </div>

    <!-- Загрузка -->
    <div wire:loading>
        <p>Загрузка данных...</p>
    </div>
</div>
