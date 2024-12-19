<nav id="sidebar">
    <div class="p-4 pt-5">
        <a  href="{{route('techSupportHome')}}" class="img logo rounded-circle mb-5" style="background-image: url({{auth()->user()->img}});"></a>
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
                    <div class="d-inline-block icons-sm mr-1"><i class="fas fa-user-lock"></i></div>
                    <span>Распределение для работников тех. поддержки </span>
                </a>
            </li>
            <li>
                <a href="{{route('cto-ticket-category.index')}}" class="{{request()->routeIs('cto-ticket-category.index') ? 'waves-effect-active' : 'waves-effect'}}">
                    <div class="d-inline-block icons-sm mr-1"><i class="fas fa-toolbox"></i></div>
                    <span>Категория техподдержки</span>
                </a>
            </li>
            <li>
                <a href="{{route('cto-ticket-status.index')}}" class="{{request()->routeIs('cto-ticket-status.index') ? 'waves-effect-active' : 'waves-effect'}}">
                    <div class="d-inline-block icons-sm mr-1"><i class="fas fa-toolbox"></i></div>
                    <span>Статус техподдержки</span>
                </a>
            </li>
            <li>
                <a href="{{route('cto-ticket-deadline.index')}}" class="{{request()->routeIs('cto-ticket-status.index') ? 'waves-effect-active' : 'waves-effect'}}">
                    <div class="d-inline-block icons-sm mr-1"><i class="fas fa-toolbox"></i></div>
                    <span>Срок исполнения техподдержки</span>
                </a>
            </li>
            <li>
                <a href="{{route('ticket.index')}}" class="{{request()->routeIs('ticket.index') ? 'waves-effect-active' : 'waves-effect'}}">
                    <div class="flex align-items-center">
                        <span><i class="fas fa-comment"></i> Техподдержка </span>
                    </div>
                </a>
            </li>
            <li>
                <a href="{{route('ticket-management')}}" class="{{request()->routeIs('ticket-management') ? 'waves-effect-active' : 'waves-effect'}}">
                    <div class="d-inline-block icons-sm mr-1"><i class="fas fa-chart-line"></i></div>
                    <span>Статистика техподдержки</span>
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
