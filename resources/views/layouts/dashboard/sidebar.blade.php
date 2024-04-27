<nav class="sidebar-content sidebar">
        <div class="topbar navbar navbar-logo">
            <a href="{{ url('/dashboard')}}" style="margin:auto;">
                <img src="" alt="Admin-logo" width="100" height="50" class="navbar-brand-full ng-star-inserted">
            </a>
        </div>
             
    <div class="sidebar-nav-list">
        <div class="scrolldiv" style="position:relative; overflow:hidden; width:100%; height:100%;" >
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="fa fa-search"></span>
                </div>
                <form id="searchForm">
                    <input type="search" class="form-control search-menu" id="searchInput" name="search"  value="" placeholder="Member Search">
                </form>
            </div>
            <div class="inner-navbar main-menu" style="width:100%; height:100%; ">
                <ul class="sidebar-item sidebar-left-item" item-border="true" item-border-style="solid">
                    <li class="sidebar-hasmenu {{ 'dashboard' == request()->path() ? 'active' : '' }}">
                            <a href="{{ url('/dashboard') }}">
                                <span class="sidebar-micon">
                                    <i class="fa fa-dashboard"></i>
                                </span>
                                <span class="sidebar-mtext">{{__('Dashboard')}}</span>
                            </a>
                    </li>

                    <li class="sidebar-hasmenu {{ 'viewmembers' == request()->path() ? 'active' : '' }}">
                        <a href="{{ url('/viewmembers')}}">
                            <span class="sidebar-micon">
                                <i class="fa fa-users"></i>
                            </span>
                            <span class="sidebar-mtext">{{__('Users')}}</span>
                        </a>
                    </li>

                    <li class="sidebar-hasmenu {{ 'userschallenge' == request()->path() ? 'active' : '' }}">
                        <a href="{{ url('/userschallenge')}}">
                            <span class="sidebar-micon">
                                <i class="fa fa-user"></i>
                            </span>
                            <span class="sidebar-mtext">{{__('UserChallenge')}}</span>
                        </a>
                    </li>

                    <li class="sidebar-hasmenu {{ 'useremail' == request()->path() ? 'active' : '' }}">
                        <a href="{{ url('/useremail') }}">
                            <span class="sidebar-micon">
                                <i class="fa fa-envelope"></i>
                            </span>
                            <span class="sidebar-mtext">{{__('Private Mail & Email')}}</span>
                        </a>
                    </li>

                    <li class="sidebar-hasmenu {{ 'stores' == request()->path() ? 'active' : '' }}">
                        <!-- <div class="sidebar_content"> -->
                            <a href="#stores" style="display:flex;" class="sidebar_content">
                                <span class="sidebar-micon">
                                    <i class="fa fa-empire"></i>
                                </span>
                                <span class="sidebar-mtext" style="margin-left:30px;">{{__('Data Repository')}}</span>
                                <div class="sidebar_dropdownicons" style="margin-left:10rem; padding-top:5px;">
                                    <i class="fa fa-angle-down arrow">
                                    </i>
                                </div>
                            </a>
                        <!-- </div> -->
                            <div class="sidebar_dropdown" style="{{ 'stores' == request()->path() ? 'display:block;' : 'display:none;' }}">
                                <div class="sidebar_dropdown_body">
                                    <div class="sidebar_dropdown_item">
                                        <a class="sidebar_dropdown_name" href="{{url ('/stores')}}">
                                            {{__('Store')}}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        
                    </li>

                    <li class="sidebar-hasmenu {{ 'challenge' == request()->path() ? 'active' : '' }}">
                        <a href="{{ url('/challenge') }}">
                            <span class="sidebar-micon">
                                <i class="fa fa-newspaper-o"></i>
                            </span>
                            <span class="sidebar-mtext">{{__('Challenge')}}</span>
                        </a>
                    </li>


                    <li class="sidebar-hasmenu {{ 'message' == request()->path() ? 'active' : '' }}">
                        <a href="{{ url('/message') }}">
                            <span class="sidebar-micon">
                                <i class="fas fa-comment-alt"></i>
                            </span>
                            <span class="sidebar-mtext">{{__('Message')}}</span>
                        </a>
                    </li>

                    <li class="sidebar-hasmenu {{ 'feedback' == request()->path() ? 'active' : '' }}">
                        <a href="{{ url('/feedback') }}">
                            <span class="sidebar-micon">
                                <i class="fa fa-comments-o"></i>
                            </span>
                            <span class="sidebar-mtext">{{__('Feedback')}}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>