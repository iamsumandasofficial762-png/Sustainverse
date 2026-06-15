<x-admin-header title="Admin | Menu">
</x-admin-header>

        <!-- page header end -->
        <div class="page-body-wrapper">

            <x-side-navbar>
                
            </x-side-navbar>

            <x-message>
            </x-message>

            <div class="page-body">

                <!-- content here -->
                <section class="content">
                    <!-- Container-fluid start -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <h4>Menu Management</h4>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <!-- Container-fluid end -->
                </section>

                <!-- MENU EDIT SECTION -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="main-box" id="mainBox">
                                @foreach ($nav_lists as $nav)
                                    <li class="card parent-item">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="d-flex justify-content-start align-items-center">
                                                    <h4>{{ $nav->menu_name }}</h4>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="d-flex justify-content-end">
                                                    @if ($nav->id != 1)
                                                        <a href="{{ route('single.menu',str_replace('', '-', $nav->menu_name)) }}"
                                                            class="btn btn-danger remove-row square-btn">
                                                            <i class="fa-solid fa-edit"></i>
                                                        </a>
                                                    @endif
                                                    
                                                    <button type="button" onclick="toggleSubmenu({{ $nav->id }})" class="btn btn-sm"><i class="fa-solid fa-angle-down"></i></button>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                        <!-- SUB MENU -->
                                    @if ($nav->id != 1)
                                        @if (!empty($nav->cat_ids))
                                            <ul class="sub-menu d-none" id="menuBox-{{ $nav->id }}">
                                                @foreach ($categories as $category)
                                                    @if (in_array($category->id, $nav->cat_ids))
                                                    <li class="card">
                                                        <div class="main-list"> 
                                                            <h5>{{ $category->category_name }}</h5>
                                                        </div>
                                                    </li>

                                                    <ul class="child-menu">   
                                                        @if ($category->children->count())
                                                            @foreach ($category->children as $sub)
                                                            <li class="card">
                                                                <div class="main-list">
                                                                    <h5>{{ $sub->category_name }}</h5>
                                                                </div>
                                                            </li>
                                                            @endforeach
                                                        @endif
                                                    </ul>

                                                    
                                                    @endif
                                                @endforeach
                                            </ul>
                                        @endif
                                    @else
                                        <ul class="sub-menu d-none" id="menuBox-{{ $nav->id }}">
                                            <li class="card">
                                                <div class="main-list"> 
                                                    <h5>SustainVerse</h5>
                                                </div>
                                            </li>

                                            <ul class="child-menu">   
                                                <li class="card">
                                                    <div class="main-list">
                                                        <h5>Vision & Mission</h5>
                                                    </div>
                                                </li>

                                                <li class="card">
                                                    <div class="main-list">
                                                        <h5>Founders & Advisory Board</h5>
                                                    </div>
                                                </li>

                                                <li class="card">
                                                    <div class="main-list">
                                                        <h5>Our Ecosystem</h5>
                                                    </div>
                                                </li>
                                            </ul>

                                            <li class="card">
                                                <div class="main-list"> 
                                                    <h5>Future Vision</h5>
                                                </div>
                                            </li>

                                            <ul class="child-menu">   
                                                <li class="card">
                                                    <div class="main-list">
                                                        <h5>Green Impact Fund</h5>
                                                    </div>
                                                </li>
                                            </ul>

                                            <li class="card">
                                                <div class="main-list"> 
                                                    <h5>Connect</h5>
                                                </div>
                                            </li>

                                            <ul class="child-menu">   
                                                <li class="card">
                                                    <div class="main-list">
                                                        <h5>Contact Us</h5>
                                                    </div>
                                                </li>
                                            </ul>
                                        </ul>
                                    @endif
                                @endforeach

                            </ul>
                        </div>

                </section>


            </div>

            <!-- footer start -->
<x-admin-footer>
</x-admin-footer>

<style>
    .leading-5 {
        margin-top:18px;
    }
    .w-5.h-5 {
        width:20px;
    }
</style>


