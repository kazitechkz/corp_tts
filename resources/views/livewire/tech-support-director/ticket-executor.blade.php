<div class="w-full p-4 bg-white border border-gray-200 rounded-lg">
    <div class="grid-cols-12">
        @if($executors)
            @if(count($executors) > 0)
                <div class="col-span-12">
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Пользователь
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Отвественен за категории
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Действия
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($executors as $executor)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <li class="py-3 sm:py-4">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0">
                                                    <img class="w-8 h-8 rounded-full" src="{{$executor->img}}"
                                                         alt="{{$executor->name}}">
                                                </div>
                                                <div class="flex-1 min-w-0 ms-4">
                                                    <p class="text-sm font-medium text-black">
                                                        {{$executor->name}}
                                                    </p>
                                                    <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                        {{$executor->email}}
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                    </th>
                                    <td class="px-6 py-4">
                                        @if($executor->ticket_executors)
                                            @foreach($executor->ticket_executors as $ticket_executor)
                                                @if($ticket_executor->ticketCategory)
                                                    <div class="block flex justify-content-center my-4">
                                                        <div class="flex">
                                                            <div>
                                                                <span
                                                                    class="inline-block bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                                                                    {{$ticket_executor->ticketCategory->title}}
                                                                </span>
                                                            </div>
                                                            <div>
                                                                <span
                                                                    wire:click="deleteExecution({{ $ticket_executor->id }})"
                                                                    class="bg-red-100 text-red-800 text-sm font-medium rounded cursor-pointer  px-2.5 py-0.5 dark:bg-red-900 dark:text-red-300">
                                                                    <i class="fas fa-times"></i>
                                                                </span>
                                                            </div>

                                                        </div>

                                                    </div>

                                                @endif
                                            @endforeach

                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        <button wire:click="openModal({{ $executor->id }})" type="button"
                                                class="inline-flex items-center px-3 py-1 text-sm font-medium text-white bg-blue-700 rounded-lg end-2 bottom-2 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            <i class="fas fa-plus text-white"></i>
                                        </button>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Modal -->
                    <div x-data="{ open: @entangle('showModal') }" x-show="open"
                         class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 z-50">
                        <div class="bg-white rounded-lg shadow-lg p-6 w-1/3">
                            <h2 class="text-lg font-bold mb-4">Добавить категорию к пользователю тех.саппорта</h2>

                            <!-- Modal Content -->
                            <div>
                                @if($user)
                                    <div class="form-group">
                                        <label for="active_user" class=" col-form-label">Пользователь</label>
                                        <div>
                                            <select wire:model="user_id"
                                                    class="form-control @error('user_id') is-invalid @enderror"
                                                    name="user_id">
                                                <option value="{{$user->id}}">
                                                    {{$user->name}}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="active_user" class=" col-form-label">Категория</label>
                                        <div>
                                            <select wire:model="category_id"
                                                    class="form-control @error('category_id') is-invalid @enderror"
                                                    name="category_id">
                                                <option value="{{null}}">
                                                    Выберите категорию
                                                </option>
                                                @foreach($ticketCategories as $ticketCategory)
                                                    @if(!in_array($ticketCategory->id,$busy_category_ids))
                                                        <option value="{{$ticketCategory->id}}">
                                                            {{$ticketCategory->title}}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @if($user_id and $category_id)
                                        <button wire:click="saveTicketExecutor"
                                                class="bg-blue-500 text-white px-4 py-2 rounded">Сохранить
                                        </button>
                                    @endif

                                @endif


                                <!-- Buttons -->
                                <div class="mt-6 flex justify-end">
                                    <button wire:click="closeModal" class="bg-gray-300 px-4 py-2 rounded mr-2">Отмена
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                    @endif

                    @endif
                </div>
    </div>
</div>

