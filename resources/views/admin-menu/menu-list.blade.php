<x-admin-header title="Admin | Menu">
</x-admin-header>

        <!-- page header end -->
        <div class="page-body-wrapper">

            <x-side-navbar>
                
            </x-side-navbar>

            <x-message>
            </x-message>

            <div class="page-body menu-management-page">

                <!-- content here -->
                <section class="content">
                    <!-- Container-fluid start -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card menu-management-header">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col-md-10">
                                            <h4 class="mb-1">Menu Management</h4>
                                            <p class="mb-0 text-muted">Manage website navigation items and submenu structure</p>
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
                            <div class="menu-management-card">
                            <ul class="main-box menu-tree" id="mainBox">
                                @foreach ($nav_lists as $nav)
                                    <li class="card parent-item menu-tree-item menu-tree-parent">
                                        <div class="row align-items-center w-100 g-2">
                                            <div class="col">
                                                <div class="menu-tree-title">
                                                    <span class="menu-tree-icon"><i class="fa-solid fa-folder"></i></span>
                                                    <div>
                                                        <h4>{{ $nav->menu_name }}</h4>
                                                        <span class="menu-level-badge">Parent</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="menu-tree-actions">
                                                    @if ($nav->id != 1)
                                                        <a href="{{ route('single.menu',str_replace('', '-', $nav->menu_name)) }}"
                                                            class="btn btn-danger remove-row square-btn menu-action-btn">
                                                            <i class="fa-solid fa-edit"></i>
                                                        </a>
                                                    @endif
                                                    
                                                    <button type="button" onclick="toggleSubmenu({{ $nav->id }})" class="btn btn-sm menu-toggle-btn"><i class="fa-solid fa-angle-down"></i></button>
                                                    
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
                                                    <li class="card menu-tree-item menu-tree-sub">
                                                        <div class="main-list"> 
                                                            <span class="menu-tree-icon"><i class="fa-solid fa-list"></i></span>
                                                            <div>
                                                                <h5>{{ $category->category_name }}</h5>
                                                                <span class="menu-level-badge">Submenu</span>
                                                            </div>
                                                        </div>
                                                    </li>

                                                    <ul class="child-menu">   
                                                        @if ($category->children->count())
                                                            @foreach ($category->children as $sub)
                                                            <li class="card menu-tree-item menu-tree-child">
                                                                <div class="main-list">
                                                                    <span class="menu-tree-icon"><i class="fa-regular fa-circle-dot"></i></span>
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
                                            <li class="card menu-tree-item menu-tree-sub">
                                                <div class="main-list"> 
                                                    <span class="menu-tree-icon"><i class="fa-solid fa-list"></i></span>
                                                    <div>
                                                        <h5>SustainVerse</h5>
                                                        <span class="menu-level-badge">Submenu</span>
                                                    </div>
                                                </div>
                                            </li>

                                            <ul class="child-menu">   
                                                <li class="card menu-tree-item menu-tree-child">
                                                    <div class="main-list">
                                                        <span class="menu-tree-icon"><i class="fa-regular fa-circle-dot"></i></span>
                                                        <h5>Vision & Mission</h5>
                                                    </div>
                                                </li>

                                                <li class="card menu-tree-item menu-tree-child">
                                                    <div class="main-list">
                                                        <span class="menu-tree-icon"><i class="fa-regular fa-circle-dot"></i></span>
                                                        <h5>Founders & Advisory Board</h5>
                                                    </div>
                                                </li>

                                                <li class="card menu-tree-item menu-tree-child">
                                                    <div class="main-list">
                                                        <span class="menu-tree-icon"><i class="fa-regular fa-circle-dot"></i></span>
                                                        <h5>Our Ecosystem</h5>
                                                    </div>
                                                </li>
                                            </ul>

                                            <li class="card menu-tree-item menu-tree-sub">
                                                <div class="main-list"> 
                                                    <span class="menu-tree-icon"><i class="fa-solid fa-list"></i></span>
                                                    <div>
                                                        <h5>Future Vision</h5>
                                                        <span class="menu-level-badge">Submenu</span>
                                                    </div>
                                                </div>
                                            </li>

                                            <ul class="child-menu">   
                                                <li class="card menu-tree-item menu-tree-child">
                                                    <div class="main-list">
                                                        <span class="menu-tree-icon"><i class="fa-regular fa-circle-dot"></i></span>
                                                        <h5>Green Impact Fund</h5>
                                                    </div>
                                                </li>
                                            </ul>

                                            <li class="card menu-tree-item menu-tree-sub">
                                                <div class="main-list"> 
                                                    <span class="menu-tree-icon"><i class="fa-solid fa-list"></i></span>
                                                    <div>
                                                        <h5>Connect</h5>
                                                        <span class="menu-level-badge">Submenu</span>
                                                    </div>
                                                </div>
                                            </li>

                                            <ul class="child-menu">   
                                                <li class="card menu-tree-item menu-tree-child">
                                                    <div class="main-list">
                                                        <span class="menu-tree-icon"><i class="fa-regular fa-circle-dot"></i></span>
                                                        <h5>Contact Us</h5>
                                                    </div>
                                                </li>
                                            </ul>
                                        </ul>
                                    @endif
                                @endforeach

                            </ul>
                            </div>
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

    .menu-management-page .menu-management-header .card-header {
        padding: 24px 30px;
    }

    .menu-management-page .menu-management-header h4 {
        font-size: 25px;
        font-weight: 700;
    }

    .menu-management-card {
        width: 100%;
        max-width: 980px;
        margin: 0 0 30px;
        padding: 22px;
        background: #fff;
        border: 1px solid #edf0f5;
        border-radius: 8px;
        box-shadow: 0 8px 24px rgba(15, 23, 42, 0.06);
    }

    .menu-management-page .main-box {
        width: 100%;
    }

    .menu-management-page .menu-tree,
    .menu-management-page .sub-menu,
    .menu-management-page .child-menu {
        list-style: none;
        margin-bottom: 0;
    }

    .menu-management-page .parent-item,
    .menu-management-page .sub-menu,
    .menu-management-page .child-menu {
        position: relative;
    }

    .menu-management-page .menu-tree-item {
        margin-bottom: 12px;
        padding: 14px 18px;
        border: 1px solid #e6ebf2;
        border-radius: 8px;
        background: #fff;
        box-shadow: 0 4px 14px rgba(15, 23, 42, 0.04);
        transition: box-shadow 0.2s ease, transform 0.2s ease, border-color 0.2s ease;
    }

    .menu-management-page .menu-tree-item:hover {
        border-color: #d9e2ec;
        box-shadow: 0 8px 20px rgba(15, 23, 42, 0.08);
        transform: translateY(-1px);
    }

    .menu-management-page .menu-tree-parent {
        min-height: 64px;
    }

    .menu-management-page .menu-tree-sub {
        background: #f8fafc;
        min-height: 52px;
    }

    .menu-management-page .menu-tree-child {
        background: #fbfcfe;
        min-height: 48px;
        font-size: 14px;
    }

    .menu-tree-title,
    .menu-management-page .main-list,
    .menu-tree-actions {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .menu-tree-title h4,
    .menu-management-page .main-list h5 {
        margin: 0;
        color: #111827;
        line-height: 1.25;
    }

    .menu-tree-title h4 {
        font-size: 20px;
        font-weight: 700;
    }

    .menu-management-page .main-list h5 {
        font-size: 16px;
        font-weight: 650;
    }

    .menu-management-page .menu-tree-child .main-list h5 {
        font-size: 14px;
        font-weight: 600;
    }

    .menu-tree-icon {
        width: 28px;
        height: 28px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        flex: 0 0 28px;
        border-radius: 8px;
        background: #eef6ff;
        color: #1d8f2c;
        font-size: 13px;
    }

    .menu-level-badge {
        display: inline-flex;
        margin-top: 3px;
        padding: 2px 8px;
        border-radius: 999px;
        background: #eef2f7;
        color: #64748b;
        font-size: 11px;
        font-weight: 700;
        line-height: 1.3;
    }

    .menu-management-page .sub-menu {
        margin-left: 32px;
        margin-top: 0;
        padding: 0 0 4px 20px;
        border-left: 2px solid #000;
        background: rgba(248, 250, 252, 0.55);
        border-radius: 0 8px 8px 0;
    }

    .menu-management-page .parent-item.menu-tree-item:has(+ .sub-menu:not(.d-none)) {
        margin-bottom: 0;
    }

    .menu-management-page .child-menu {
        margin-left: 28px;
        padding-left: 18px;
        border-left: 2px solid #000;
    }

    .menu-management-page .parent-item::before,
    .menu-management-page .sub-menu::before,
    .menu-management-page .child-menu::before {
        display: none;
    }

    .menu-management-page .sub-menu > li::before {
        left: -20px;
        width: 24px;
        height: 2px;
        background: #000;
        top: 50%;
        transform: translateY(-50%);
    }

    .menu-management-page .child-menu > li::before {
        left: -18px;
        width: 22px;
        height: 2px;
        background: #000;
        top: 50%;
        transform: translateY(-50%);
    }

    .menu-management-page .sub-menu,
    .menu-management-page .child-menu,
    .menu-management-page .sub-menu li::before,
    .menu-management-page .child-menu li::before {
        border-color: #000 !important;
    }

    .menu-management-page .square-btn,
    .menu-action-btn,
    .menu-toggle-btn {
        width: 40px;
        height: 40px;
        padding: 0;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
    }

    .menu-toggle-btn {
        color: #0f172a;
        background: #f8fafc;
        border: 1px solid #e6ebf2;
    }

    .menu-action-btn:hover,
    .menu-toggle-btn:hover {
        transform: translateY(-1px);
        box-shadow: 0 6px 14px rgba(15, 23, 42, 0.1);
    }

    @media (max-width: 767px) {
        .menu-management-card {
            padding: 14px;
        }

        .menu-management-page .menu-tree-item {
            padding: 12px 14px;
        }

        .menu-management-page .sub-menu {
            margin-left: 12px;
            padding-left: 12px;
        }

        .menu-management-page .child-menu {
            margin-left: 10px;
            padding-left: 12px;
        }

        .menu-management-page .sub-menu > li::before {
            left: -12px;
            width: 16px;
        }

        .menu-management-page .child-menu > li::before {
            left: -12px;
            width: 16px;
        }

        .menu-tree-title h4 {
            font-size: 17px;
        }

        .menu-management-page .main-list h5 {
            font-size: 14px;
        }

        .menu-management-page .square-btn,
        .menu-action-btn,
        .menu-toggle-btn {
            width: 36px;
            height: 36px;
        }
    }
</style>


