<nav id="sidebar">
    <div class="p-4 pt-5">
        <a  href="{{route("cto-profile")}}" class="img logo rounded-circle mb-5" style="background-image: url({{auth()->user()->img}});"></a>
        <div class="menu-title text-center">{{auth()->user()->name}} </div>
        <div class="menu-title text-center mb-3">{{auth()->user()->email}} </div>
        <ul class="metismenu list-unstyled" id="side-menu">
            <li class="menu-title">Меню </li>
            <li>
                <a href="{{route('techSupportHome')}}"  class="{{request()->routeIs('techSupportHome') ? 'waves-effect-active' : 'waves-effect'}}">
                    <div class="d-inline-block icons-sm mr-1"><i class="fas fa-home"></i></div>
                    <span>Главная</span>
                </a>
            </li>
            <li>
                <a href="{{route("tech-support-executors")}}" class="{{request()->routeIs("tech-support-executors") ? 'waves-effect-active' : 'waves-effect'}}">
                    <div class="d-inline-block icons-sm mr-1"><i class="fas fa-user-shield"></i></div>
                    <span>Распределение для работников тех. поддержки </span>
                </a>
            </li>
            <li>
                <a href="{{route('cto-ticket-category.index')}}" class="{{request()->routeIs('cto-ticket-category.index') ? 'waves-effect-active' : 'waves-effect'}}">
                    <div class="d-inline-block icons-sm mr-1"><i class="fas fa-boxes"></i></div>
                    <span>Категория техподдержки</span>
                </a>
            </li>
            <li>
                <a href="{{route('cto-ticket-status.index')}}" class="{{request()->routeIs('cto-ticket-status.index') ? 'waves-effect-active' : 'waves-effect'}}">
                    <div class="d-inline-block icons-sm mr-1"><i class="fas fa-check-circle"></i></div>
                    <span>Статус техподдержки</span>
                </a>
            </li>
            <li>
                <a href="{{route('cto-ticket-deadline.index')}}" class="{{request()->routeIs('cto-ticket-status.index') ? 'waves-effect-active' : 'waves-effect'}}">
                    <div class="d-inline-block icons-sm mr-1"><i class="fas fa-clock"></i></div>
                    <span>Срок исполнения техподдержки</span>
                </a>
            </li>
            <li>
                <a href="{{route('techSupportCanban')}}" class="{{request()->routeIs('techSupportCanban') ? 'waves-effect-active' : 'waves-effect'}}">
                    <div class="flex align-items-center">
                        <span><i class="fas fa-comment"></i> Тикеты </span>
                    </div>
                </a>
            </li>
            <li>
                <a href="{{route('techSupportTickets')}}" class="{{request()->routeIs('techSupportTickets') ? 'waves-effect-active' : 'waves-effect'}}">
                    <div class="d-inline-block icons-sm mr-1"><i class="fas fa-chart-line"></i></div>
                    <span>Отчеты</span>
                </a>
            </li>
            <hr>
            <li>
                <a href="{{route('logout')}}" class="{{request()->routeIs('logout') ? 'waves-effect-active' : 'waves-effect'}}">
                    <div class="d-inline-block icons-sm mr-1"><i class="fas fa-sign-out-alt"></i></div>
                    <span>Выход</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
