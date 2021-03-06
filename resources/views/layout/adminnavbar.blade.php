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

<div class="text-center text-primary"><h2>Sector Information System</h2></div>
<div class="text-center text-dark"><h5>Data Administrator</h5></div>

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
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Employee</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a href="/profile/create">Add New Employee</a></li>
                            <li><a href="/profile">Employee List</a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Employee History</a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a href="/history/create">Add</a></li>
                                <li><a href="/history">View</a></li>
                                </ul>
                            </li>
                            </ul>
                        </li>
                        @if(session('SEC')==1 && session('SUBSEC')==14)
                            <li class="dropdown">
                                <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Culture</a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a href="/culture/create">Add Cultural Heritage</a></li>
                                    <li><a href="/culture">View</a></li>
                                </ul>
                            </li>
                        @endif
                        @if(session('SEC')==1 && session('SUBSEC')==5)
                            <li class="dropdown">
                                <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Site Engineer</a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a href="/engineer/create">Add Site Visit</a></li>
                                    <li><a href="/engineer">View Visit History</a></li>
                                </ul>
                            </li>
                            @endif
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Primary Focus</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a href="/focus/create">Add Primary Focus</a></li>
                                <li><a href="/focus">View</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                                <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Events</a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a href="/events/create">Add New</a></li>
                                    <li><a href="/events">View</a></li>
                                </ul>
                            </li>
                        <!---Acitivity--->
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Activity</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a href="/activity/create">Add New</a></li>
                                <li><a href="/activity">View</a></li>
                            </ul>
                        </li>
                        <!---Population--->
                        @if(session('SEC')==2)
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Population</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a href="/population/create">Add New</a></li>
                                <li><a href="/population">View</a></li>
                            </ul>
                        </li>
                        @endif
                        <!---Education--->
                        @if(session('SEC')==5)
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Education</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li class="dropright">
                                <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">School Information</a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a href="/school/create">Add</a></li>
                                <li><a href="/school">View</a></li>
                                </ul>
                            </li>
                            <li class="dropright">
                                <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Staff Information</a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a href="/staff/create">Add</a></li>
                                <li><a href="/staff">View</a></li>
                                </ul>
                            </li>
                            <li class="dropright">
                                <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Student Information</a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a href="/student/create">Add</a></li>
                                <li><a href="/student">View</a></li>
                                </ul>
                            </li>
                            </ul>
                        </li>
                        @endif
                        <!---Health--->
                        @if(session('SEC')==6)
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Health</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li class="dropright">
                                <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">General Information</a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a href="/general/create">Add</a></li>
                                <li><a href="/general">View</a></li>
                                </ul>
                            </li>
                            <li class="dropright">
                                    <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Morbidity</a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a href="/morbidity/create">Add</a></li>
                                    <li><a href="/morbidity">View</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        @endif
                        <!---Agriculture--->
                        @if(session('SEC')==3)
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Agriculture</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li class="dropright">
                                <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Irrigation Channel Information</a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a href="/agrigeneral/create">Add</a></li>
                                <li><a href="/agrigeneral">View</a></li>
                                </ul>
                            </li>
                            <li class="dropright">
                                <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Crop/Productions</a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a href="/agriproduction/create">Add</a></li>
                                <li><a href="/agriproduction">View</a></li>
                                </ul>
                            </li>
                            <li class="dropright">
                                <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Farm Group</a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a href="/farmgroup/create">Add</a></li>
                                <li><a href="/farmgroup">View</a></li>
                                </ul>
                            </li>
                            <li class="dropright">
                                <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Land holding & Facilities</a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a href="/agrifacility/create">Add</a></li>
                                <li><a href="/agrifacility">View</a></li>
                                </ul>
                            </li>
                            <li class="dropright">
                                <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Farm Road</a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a href="/farmroad/create">Add</a></li>
                                <li><a href="/farmroad">View</a></li>
                                </ul>
                            </li>
                            <li class="dropright">
                                <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Electric Fencing</a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a href="/electricfencing/create">Add</a></li>
                                <li><a href="/electricfencing">View</a></li>
                                </ul>
                            </li>
                            <li class="dropright">
                                <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Land Development</a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a href="/landdevelopment/create">Add</a></li>
                                <li><a href="/landdevelopment">View</a></li>
                                </ul>
                            </li>
                            </ul>
                        </li>
                        @endif
                        <!---Livestock--->
                        @if(session('SEC')==4)
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Livestock</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li class="dropright">
                                        <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Farmers group and Cooperatives</a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a href="/livestockgroup/create">Add</a></li>
                                        <li><a href="/livestockgroup">View</a></li>
                                        </ul>
                                    </li>
                            <li class="dropright">
                                <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">livestock infrastructure</a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a href="/livestockinfra/create">Add</a></li>
                                <li><a href="/livestockinfra">View</a></li>
                                </ul>
                            </li>
                            <li class="dropright">
                                    <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Production Details</a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a href="/livestockproduction/create">Add</a></li>
                                    <li><a href="/livestockproduction">View</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        @endif
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
                                    <a class="dropdown-item" href="admin/logout"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
        
                                    <form id="logout-form" action="{{ 'App\Admin' == Auth::getProvider()->getModel() ? route('admin.logout') : route('logout') }}" method="GET" style="display: none;">
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

