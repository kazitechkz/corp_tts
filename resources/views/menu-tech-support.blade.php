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
