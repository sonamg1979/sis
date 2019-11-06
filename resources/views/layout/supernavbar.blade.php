
<style>
    .menu-area{background: #F3F7F4}
    .dropdown-menu{padding:0;margin:0;border:0 solid transition!important;border:0 solid rgba(0,0,0,.15);border-radius:0;-webkit-box-shadow:none!important;box-shadow:none!important}
    .mainmenu a, .navbar-default .navbar-nav > li > a, .mainmenu ul li a , .navbar-expand-lg .navbar-nav .nav-link{color:#646469;font-size:14px;text-transform:capitalize;padding:5px 15px;font-family:'Roboto',sans-serif;display: block !important;}
    .mainmenu .active a,.mainmenu .active a:focus,.mainmenu .active a:hover,.mainmenu li a:hover,.mainmenu li a:focus ,.navbar-default .navbar-nav>.show>a, .navbar-default .navbar-nav>.show>a:focus, .navbar-default .navbar-nav>.show>a:hover{color: #000;background: #F9FBE1;outline: 0;}
    /*==========Sub Menu=v==========*/
    .mainmenu .collapse ul > li:hover > a{background: #F3F3F9;}
    .mainmenu .collapse ul ul > li:hover > a, .navbar-default .navbar-nav .show .dropdown-menu > li > a:focus, .navbar-default .navbar-nav .show .dropdown-menu > li > a:hover{background: #F3F3F9;}
    .mainmenu .collapse ul ul ul > li:hover > a{background: #F3F3F9;}

    .mainmenu .collapse ul ul, .mainmenu .collapse ul ul.dropdown-menu{background:#fff;}
    .mainmenu .collapse ul ul ul, .mainmenu .collapse ul ul ul.dropdown-menu{background:#fff}
    .mainmenu .collapse ul ul ul ul, .mainmenu .collapse ul ul ul ul.dropdown-menu{background:#fff}

    /******************************Drop-down menu work on hover**********************************/
    .mainmenu{background: none;border: 0 solid;margin: 0;padding: 0;min-height:15px;width: 100%;}
    @media only screen and (min-width: 767px) {
    .mainmenu .collapse ul li:hover> ul{display:block}
    .mainmenu .collapse ul ul{position:absolute;top:100%;left:0;min-width:250px;display:none}
    /*******/
    .mainmenu .collapse ul ul li{position:relative}
    .mainmenu .collapse ul ul li:hover> ul{display:block}
    .mainmenu .collapse ul ul ul{position:absolute;top:0;left:100%;min-width:250px;display:none}
    /*******/
    .mainmenu .collapse ul ul ul li{position:relative}
    .mainmenu .collapse ul ul ul li:hover ul{display:block}
    .mainmenu .collapse ul ul ul ul{position:absolute;top:0;left:-100%;min-width:250px;display:none;z-index:1}

    }
    @media only screen and (max-width: 767px) {
    .navbar-nav .show .dropdown-menu .dropdown-menu > li > a{padding:16px 15px 16px 35px}
    .navbar-nav .show .dropdown-menu .dropdown-menu .dropdown-menu > li > a{padding:16px 15px 16px 45px}
    }
</style>
<div id="menu_area" class="menu-area">
    <div class="container">
        <div class="row">
            <nav class="navbar navbar-light navbar-expand-sm mainmenu">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                @guest
                @else
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="active"><a href="/admin/dashboard">Home <span class="sr-only">(current)</span></a></li>

                        
                        <!---Agriculture--->
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Users</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li class="dropright">
                                <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Data Administrator</a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a href="/users/create">Add</a></li>
                                <li><a href="/users">View</a></li>
                                </ul>
                            </li>
                            <li class="dropright">
                                    <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">General Users</a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a href="/nusers/create">Add</a></li>
                                    <li><a href="/nusers">View</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        @else
                            
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
        
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="super/logout"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
        
                                    <form id="logout-form" action="{{ 'App\Super' == Auth::getProvider()->getModel() ? route('super.logout') : route('logout') }}" method="GET" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                    @endguest
                </div>
            </nav>
        </div>
    </div>
</div>
<hr>