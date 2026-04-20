<div>
    <!-- page sidebar start -->
    <div class="page-sidebar">
        <div class="logo-wrap">
            <a href="#" class="d-flex justify-content-center">
                <img src="{{ asset('assets/images/logo-ebs.png') }}" class="img-fluid for-light" alt=""  style="height: 80px; width: 200px;">
            </a>
            <div class="back-btn d-lg-none d-inline-block">
                <i data-feather="chevrons-left"></i>
            </div>
        </div>

        <div class="main-sidebar">

            <div class="user-profile">
                <div class="media">
                    <div class="change-pic">
                        <img src="{{ asset('assets/images/icon-7797704_640.png') }}" class="img-fluid" alt="">
                    </div>

                    <div class="media-body">
                        <a href="user-profile.html">
                            <h6 style="color: #d1d0cb;"> 
                               admin
                            </h6>
                        </a>
                        <span class="font-roboto" style="color: #333;">admin@gmail.com</span>
                    </div>
                </div>
            </div>

            <div id="mainsidebar">
                <ul class="sidebar-menu custom-scrollbar">

                    <li class="sidebar-item">
                        
                        <ul class="nav-submenu">
                            
                            <li>
                                <a href="{{ route('admin.index') }}" class="sidebar-link list">
                                    <i data-feather="layout" style="color: #d1d0cb;"></i> 
                                    <span style="color: #d1d0cb;">Dashboard</span>
                                </a>
                            </li>

                            <li class="sidebar-item">
                                <a href="javascript:void(0)" class="sidebar-link">
                                    <i data-feather="file-text" style="color: #d1d0cb;"></i>
                                    <span style="color: #d1d0cb;">Posts</span>
                                </a>
                                <ul class="nav-submenu menu-content">
                                    <li>
                                        <a href="{{ route('posts.list') }}" class="sidebar-link list" style="color: #d1d0cb;">
                                            <i data-feather="chevrons-right" style="color: #d1d0cb;"></i>
                                            <span style="color: #d1d0cb;">All post</span>
                                        </a>
                                    </li>
                                    
                                    <li>
                                        <a href="{{ route('posts.add') }}" class="sidebar-link list" style="color: #d1d0cb;">
                                            <i data-feather="chevrons-right" style="color: #d1d0cb;"></i> 
                                            
                                            <span style="color: #d1d0cb;">Add posts</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{ route('posts.categories') }}" class="sidebar-link list" style="color: #d1d0cb;">
                                            <i data-feather="chevrons-right" style="color: #d1d0cb;"></i> 
                                            
                                            <span style="color: #d1d0cb;">Categories</span>
                                        </a>
                                    </li>
                                    
                                    <li>
                                        <a href="{{ route('posts.tags') }}" class="sidebar-link list" style="color: #d1d0cb;">
                                            <i data-feather="chevrons-right" style="color: #d1d0cb;"></i> 
                                            
                                            <span style="color: #d1d0cb;">Tags</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="{{ route('menu.index') }}" class="sidebar-link list">
                                    <i data-feather="menu" style="color: #d1d0cb;"></i>
                                    <span style="color: #d1d0cb;">Menu</span>
                                </a>
                            </li>
                            
                            <li>
                                <a href="{{ route('home.index') }}" class="sidebar-link list">
                                    <i data-feather="home" style="color: #d1d0cb;"></i>
                                    <span style="color: #d1d0cb;"> Home </span>
                                </a>
                            </li>

                            

                            
                        </ul>

                    </li>

                </ul>
            </div>

        </div>
    </div>
    <!-- page sidebar end -->
</div>

<style>
    .list {
        color: #000 !important;
    }
</style>
