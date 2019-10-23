
<div class="small-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 date-sec">
                <div id="Date"></div>
            </div>
            <div class="col-lg-3 offset-lg-5">
                    <div class="social-icon"> <a target="_blank" href="#" class=" fa fa-facebook"></a> <a target="_blank" href="#" class=" fa fa-twitter"></a> <a target="_blank" href="#" class=" fa fa-google-plus"></a> <a target="_blank" href="#" class=" fa fa-linkedin"></a> <a target="_blank" href="#" class=" fa fa-youtube"></a> <a target="_blank" href="#" class=" fa fa-vimeo-square"></a> </div>
            </div>
        </div>
    </div>
</div>
<div class="top-head left">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-8">
                    <center><h1>Sector Information System</h1>
                <h3 class="text-primary">Chhoetse Dzong: Trongsa</center></h3>
            </div>
            <div class="col-md-6 col-lg-3 ml-auto admin-bar hidden-sm-down">
                    <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name}} <span class="caret"></span>
                                    </a>
            
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="logout"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
            
                                        <form id="logout-form" action="logout" method="GET" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
            </div>
        </div>
    </div>
</div>
<hr>