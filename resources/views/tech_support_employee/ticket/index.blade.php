@extends('layout-cto-employee')
@section('content')
    <div>
        <div class="page-content">
            <div class="page-content-wrapper">
                <div class="container">
                    <div class="grid grid-cols-12">
                        <div class="col-span-12">
                            <!-- Page-Title -->
                            <div class="page-title-box">
                                <div class="container-fluid">
                                    <div class="row align-items-center">
                                        <div class="col-12 col-md-8">
                                            <h4 class="page-title mb-1">Список тикетов</h4>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-12 my-5 border-[1px] p-4 shadow-2xl">
                        <div class="col-span-12">
                            <div class="text-sm font-medium text-center text-gray-500 border-b border-gray-200">
                                <ul class="flex flex-wrap -mb-px justify-content-center">
                                    <li class="mr-2">
                                        <button class="inline-block p-4 border-b-2 rounded-t-lg"
                                                id="tab-1"
                                                data-tab-target="#content-1"
                                                aria-selected="true">
                                            Общие тикеты
                                        </button>
                                    </li>
                                    <li class="mr-2">
                                        <button class="inline-block p-4 border-b-2 rounded-t-lg"
                                                id="tab-2"
                                                data-tab-target="#content-2">
                                            Мои тикеты
                                        </button>
                                    </li>
                                </ul>
                            </div>
                            <div id="tab-content">
                                <div id="content-1" class="p-4">
                                    <livewire:tech-support-employee.ticket-table/>
                                </div>
                                <div id="content-2" class="hidden p-4">
                                    <livewire:tech-support-employee.my-ticket-table/>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push("scripts")
    <script>
        document.querySelectorAll('[data-tab-target]').forEach(button => {
            button.addEventListener('click', () => {
                const target = document.querySelector(button.getAttribute('data-tab-target'));

                // Убираем активные классы у всех вкладок и контента
                document.querySelectorAll('[data-tab-target]').forEach(btn => btn.classList.remove('border-blue-500', 'text-blue-500'));
                document.querySelectorAll('#tab-content > div').forEach(content => content.classList.add('hidden'));

                // Добавляем активный класс выбранной вкладке и отображаем контент
                button.classList.add('border-blue-500', 'text-blue-500');
                target.classList.remove('hidden');
            });
        });

    </script>
@endpush
