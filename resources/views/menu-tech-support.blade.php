<nav id="sidebar">
    <div class="p-4 pt-5">
        <a  href="{{route('techSupportEmployeeHome')}}" class="img logo rounded-circle mb-5" style="background-image: url({{auth()->user()->img}});"></a>
        <div class="menu-title text-center">{{auth()->user()->name}} </div>
        <div class="menu-title text-center mb-3">{{auth()->user()->email}} </div>
        <ul class="metismenu list-unstyled" id="side-menu">
            <li class="menu-title">Меню </li>
            <li>
                <a href="{{route('techSupportEmployeeHome')}}"  class="{{request()->routeIs('techSupportEmployeeHome') ? 'waves-effect-active' : 'waves-effect'}}">
                    <div class="d-inline-block icons-sm mr-1"><i class="fas fa-home"></i></div>
                    <span>Главная</span>
                </a>
            </li>
            <li>
                <a href="{{route('techSupportEmployeeTickets')}}" class="{{request()->routeIs('techSupportEmployeeTickets') ? 'waves-effect-active' : 'waves-effect'}}">
                    <div class="flex align-items-center">
                        <span><i class="fas fa-comment"></i> Тикеты </span>
                    </div>
                </a>
            </li>
            <li>
                <a href="{{route('ticket-management')}}" class="{{request()->routeIs('ticket-management') ? 'waves-effect-active' : 'waves-effect'}}">
                    <div class="d-inline-block icons-sm mr-1"><i class="fas fa-chart-line"></i></div>
                    <span>Моя Статистика</span>
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
