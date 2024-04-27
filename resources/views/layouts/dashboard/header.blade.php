

<div  class="wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
    <header class="topbar navbar fixed-top" data-navbarbg="skin5">
        
        <!-- <div> -->
        
            <!-- <div class="navbar-logo">
                <a href="{{ url('/home')}}">
                    <img src="" alt="Admin-logo" width="100" height="50" class="navbar-brand-full ng-star-inserted">
                </a>
            </div> -->
            <div class="btn-icon mobile-nav-toggle" type="">
                <i class="fas fa-bars" id="sidebarIcon"></i>
                <i class="fas fa-arrow-right close-icon" id="closeIcon" style="display: none;"></i>
            </div>
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-dropdown open">
                    <div class="nav-link-dropdown nav-link" role="button" data-toggle="dropdown" aria-expand="true" >
                        <i class="fa fa-cog"></i>
                    </div>
                    <div class="account_dropdown" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(-144px, 40px); margin-top: 5px; width: 185px;">
						<div class="account_dropdown_body">
                            <div class="account_dropdown_header">
                                <span class="account_dropdown_name text-center">Admin</span>
                            </div>

                            <div class="account_dropdown_item pt-3">
                                <a href="#" id="passwordModalOpener">
                                    <i class="fas fa-key" aria-hidden="true">
                                        <span class="account_dropdown_name">Change Password</span>
                                    </i>
                                </a>
                            </div>
                            <div class="account_dropdown_item pt-2">
                                <a href="{{ url('/logout')}}">
                                    <i class="fas fa-sign-out-alt">
                                        <span class="account_dropdown_name">Logout</span>
                                    </i>
                                </a>
                            </div>
                        </div>
                    </div>        
                </li>
            </ul> 

            
                
                        <!-- Modal for changing password -->
                            <div class="modal" id="passwordModal" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" style="font-weight:bold; font-size:18px;" id="passwordModal">{{ __('Change Password') }}</h5>
                                            <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button> -->
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="{{ url('/updatepassword')}}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="password" class=" col-form-label" style="font-weight:bold;">{{ __('Current Password') }}</label>

                                                            <input id="oldpassword" type="password" class="form-control @error('CurrentPassword') is-invalid @enderror" name="CurrentPassword" required autocomplete="current-password" placeholder="Enter Current Password...">
                    
                                                                @error('CurrentPassword')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 mt-3">
                                                        <div class="form-group">
                                                            <label for="password" class=" col-form-label" style="font-weight:bold;">{{ __('New Password') }}</label>

                                                            <input id="newpassword" type="password" class="form-control @error('NewPassword') is-invalid @enderror" name="NewPassword" required autocomplete="new-password" placeholder="Enter New Password...">
                    
                                                                @error('NewPassword')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                        </div>
                                                    </div>

                                                </div>
                    
                                                <div class="form-group row mb-0 mt-4" style="border-top: 1px solid #f5f5f5;">
                                                    <div class="col-md-8 offset-md-4 pt-3">
                                                        <button type="submit" class="btn btn-primary" style="margin:0px; float:right; padding: 8px 20px; font-size: 15px;">
                                                            {{ __('Update') }}
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
        <!-- </div> -->
    </header>
</div>

