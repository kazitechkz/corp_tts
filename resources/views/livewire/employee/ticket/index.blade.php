<div class="container">
    <div class="grid grid-cols-12 gap-4">
        <div class="col-span-12 lg:col-span-3">

        </div>
            <div class="col-span-12 lg:col-span-9">
                @foreach($tickets as $ticket)
                <a href="{{route("tech-support-ticket-show",$ticket->id)}}" class="block p-3 bg-white border border-gray-200 rounded-lg shadow mb-3">
                    <div class="flex align-items-center">
                        <div
                            class="flex items-center
                                        h-10 w-10
                                        justify-center
                                        rounded-full flex-shrink-0
                                        bg-center bg-no-repeat bg-cover
                                        "
                            style="background-image:url({{$ticket->user->img}})"
                        >
                        </div>
                        <p class="ml-2 font-bold">
                            {{$ticket->user->name}}
                        </p>
                    </div>
                    <div class="px-2">
                        <p class="text-md font-bold lg:text-lg">
                            {{$ticket->title}}
                        </p>
                        <p class="text-blue-400 dark:text-blue-400">
                            #{{$ticket->category->title}} <br/>
                            Создан {{$ticket->created_at->format("H:i d/m/Y")}}
                        </p>
                        @if($ticket->updated_at)
                        <p class="text-blue-400 dark:text-blue-400">
                            Обновлен {{$ticket->updated_at->format("H:i d/m/Y")}}
                        </p>
                        @endif
                        <p>
                            <i class="fas fa-comment text-info"></i>
                            {{$ticket->ticket_messages_count}}
                        </p>
                    </div>
                    <div class="flex mt-3">
                        @if($ticket->is_answered)
                            <button type="button" class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-3 py-2.5 text-center me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-900">
                                <i class="fas fa-check mr-2"></i>
                                Отвечен
                            </button>
                        @else
                            <button type="button" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-3 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                <i class="fas fa-times-circle mr-2"></i>
                                Не отвечен
                            </button>
                        @endif
                        @if($ticket->is_resolved)
                            <button type="button" class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-3 py-2.5 text-center me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-900">
                                <i class="fas fa-check mr-2"></i>
                                Решен!
                            </button>
                        @else
                            <button type="button" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-3 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                <i class="fas fa-times-circle mr-2"></i>
                                Не решен
                            </button>
                        @endif
                        <!-- Modal toggle -->
                    </div>
                </a>
                @endforeach
            </div>
        <div class="col-span-12 flex justify-center my-2">
            {{$tickets->links()}}
        </div>
        </div>

    </div>
</div>
