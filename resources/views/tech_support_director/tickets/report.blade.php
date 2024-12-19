@extends('layout-cto')
@section('content')
    <div>
        <div class="page-content">
            <div class="page-content-wrapper">
                <div class="container">
                    <div class="grid grid-cols-12 gap-3 mt-4 pt-4">
                        <div class="col-span-12 lg:col-span-3 md:col-span-4">
                            <div
                                class="min-w-0 shadow-lg rounded-lg overflow-hidden bg-white dark:bg-gray-800"
                            >
                                <div class="p-4 flex items-center">
                                    <div
                                        class="p-3 rounded-full text-green-500 dark:text-green-100 bg-green-100 dark:bg-green-500 mr-4"
                                    >
                                        <i class="fas fa-ticket-alt"></i>
                                    </div>
                                    <div>
                                        <p class="mb-2 text-sm font-medium text-gray-600">
                                            Всего
                                        </p>
                                        <p class="text-lg font-semibold text-gray-700">
                                            {{\App\Models\Ticket::count()}}
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-span-12 lg:col-span-3 md:col-span-4">
                            <div
                                class="min-w-0 shadow-lg rounded-lg overflow-hidden bg-white dark:bg-gray-800"
                            >
                                <div class="p-4 flex items-center">
                                    <div
                                        class="p-3 rounded-full text-yellow-100 bg-yellow-500 mr-4"
                                    >
                                        <i class="fas fa-ticket-alt"></i>
                                    </div>
                                    <div>
                                        <p class="mb-2 text-sm font-medium text-gray-600">
                                            Новые заявки
                                        </p>
                                        <p class="text-lg font-semibold text-gray-700">
                                            {{\App\Models\Ticket::where(["status_id"=>1])->count()}}
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-span-12 lg:col-span-3 md:col-span-4">
                            <div
                                class="min-w-0 shadow-lg rounded-lg overflow-hidden bg-white dark:bg-gray-800"
                            >
                                <div class="p-4 flex items-center">
                                    <div
                                        class="p-3 rounded-full text-blue-100 bg-blue-500 mr-4"
                                    >
                                        <i class="fas fa-ticket-alt"></i>
                                    </div>
                                    <div>
                                        <p class="mb-2 text-sm font-medium text-gray-600">
                                            В работе
                                        </p>
                                        <p class="text-lg font-semibold text-gray-700">
                                            {{\App\Models\Ticket::where(["status_id"=>2])->count()}}
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-span-12 lg:col-span-3 md:col-span-4">
                            <div
                                class="min-w-0 shadow-lg rounded-lg overflow-hidden bg-white dark:bg-gray-800"
                            >
                                <div class="p-4 flex items-center">
                                    <div
                                        class="p-3 rounded-full text-orange-100 bg-orange-500 mr-4"
                                    >
                                        <i class="fas fa-ticket-alt"></i>
                                    </div>
                                    <div>
                                        <p class="mb-2 text-sm font-medium text-gray-600">
                                            Переоткрыты
                                        </p>
                                        <p class="text-lg font-semibold text-gray-700">
                                            {{\App\Models\Ticket::where(["status_id"=>4])->count()}}
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-span-12 lg:col-span-3 md:col-span-4">
                            <div
                                class="min-w-0 shadow-lg rounded-lg overflow-hidden bg-white dark:bg-gray-800"
                            >
                                <div class="p-4 flex items-center">
                                    <div
                                        class="p-3 rounded-full text-green-100 bg-green-500 mr-4"
                                    >
                                        <i class="fas fa-ticket-alt"></i>
                                    </div>
                                    <div>
                                        <p class="mb-2 text-sm font-medium text-gray-600">
                                            Завершены
                                        </p>
                                        <p class="text-lg font-semibold text-gray-700">
                                            {{\App\Models\Ticket::where(["status_id"=>3])->count()}}
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-span-12 lg:col-span-3 md:col-span-4">
                            <div
                                class="min-w-0 shadow-lg rounded-lg overflow-hidden bg-white dark:bg-gray-800"
                            >
                                <div class="p-4 flex items-center">
                                    <div
                                        class="p-3 rounded-full text-violet-100 bg-violet-500 mr-4"
                                    >
                                        <i class="fas fa-clock"></i>
                                    </div>
                                    <div>
                                        <p class="mb-2 text-sm font-medium text-gray-600">
                                            Вовремя
                                        </p>
                                        <p class="text-lg font-semibold text-gray-700">
                                            {{\App\Models\Ticket::where(["at_time"=>true])->count()}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 lg:col-span-3 md:col-span-4">
                            <div
                                class="min-w-0 shadow-lg rounded-lg overflow-hidden bg-white dark:bg-gray-800"
                            >
                                <div class="p-4 flex items-center">
                                    <div
                                        class="p-3 rounded-full text-red-100 bg-red-500 mr-4"
                                    >
                                        <i class="fas fa-clock"></i>
                                    </div>
                                    <div>
                                        <p class="mb-2 text-sm font-medium text-gray-600">
                                            Не успели
                                        </p>
                                        <p class="text-lg font-semibold text-gray-700">
                                            {{\App\Models\Ticket::where(["at_time"=>false])->count()}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 lg:col-span-3 md:col-span-4">
                            <div
                                class="min-w-0 shadow-lg rounded-lg overflow-hidden bg-white dark:bg-gray-800"
                            >
                                <div class="p-4 flex items-center">
                                    <div
                                        class="p-3 rounded-full text-red-100 bg-red-500 mr-4"
                                    >
                                        <i class="fas fa-clock"></i>
                                    </div>
                                    <div>
                                        <p class="mb-2 text-sm font-medium text-gray-600">
                                            Очень срочно
                                        </p>
                                        <p class="text-lg font-semibold text-gray-700">
                                            {{\App\Models\Ticket::where(["deadline_id"=>1])->count()}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 lg:col-span-3 md:col-span-4">
                            <div
                                class="min-w-0 shadow-lg rounded-lg overflow-hidden bg-white dark:bg-gray-800"
                            >
                                <div class="p-4 flex items-center">
                                    <div
                                        class="p-3 rounded-full text-yellow-100 bg-yellow-500 mr-4"
                                    >
                                        <i class="fas fa-clock"></i>
                                    </div>
                                    <div>
                                        <p class="mb-2 text-sm font-medium text-gray-600">
                                            Срочно
                                        </p>
                                        <p class="text-lg font-semibold text-gray-700">
                                            {{\App\Models\Ticket::where(["deadline_id"=>2])->count()}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 lg:col-span-3 md:col-span-4">
                            <div
                                class="min-w-0 shadow-lg rounded-lg overflow-hidden bg-white dark:bg-gray-800"
                            >
                                <div class="p-4 flex items-center">
                                    <div
                                        class="p-3 rounded-full text-indigo-100 bg-indigo-500 mr-4"
                                    >
                                        <i class="fas fa-clock"></i>
                                    </div>
                                    <div>
                                        <p class="mb-2 text-sm font-medium text-gray-600">
                                            Не срочно
                                        </p>
                                        <p class="text-lg font-semibold text-gray-700">
                                            {{\App\Models\Ticket::where(["deadline_id"=>3])->count()}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 lg:col-span-3 md:col-span-4">
                            <div
                                class="min-w-0 shadow-lg rounded-lg overflow-hidden bg-white dark:bg-gray-800"
                            >
                                <div class="p-4 flex items-center">
                                    <div
                                        class="p-3 rounded-full text-blue-100 bg-blue-500 mr-4"
                                    >
                                        <i class="fas fa-users"></i>
                                    </div>
                                    <div>
                                        <p class="mb-2 text-sm font-medium text-gray-600">
                                            Сотрудников
                                        </p>
                                        <p class="text-lg font-semibold text-gray-700">
                                            {{\App\Models\User::where(["role_id"=>5])->count()}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 lg:col-span-3 md:col-span-4">
                            <div
                                class="min-w-0 shadow-lg rounded-lg overflow-hidden bg-white dark:bg-gray-800"
                            >
                                <div class="p-4 flex items-center">
                                    <div
                                        class="p-3 rounded-full text-blue-100 bg-blue-500 mr-4"
                                    >
                                        <i class="fas fa-chart-bar"></i>
                                    </div>
                                    <div>
                                        <p class="mb-2 text-sm font-medium text-gray-600">
                                            Рейтинг
                                        </p>
                                        <p class="text-lg font-semibold text-gray-700">
                                            {{round(\App\Models\Ticket::where("rating","!=",null)->avg("rating"), 2)}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-12 my-5 border-[1px] p-4 shadow-2xl">
                        <div class="col-span-12">
                            <livewire:tech-support-director.all-ticket-table/>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
