@props(['title' => null])

<!DOCTYPE html>
<html lang="zxx">
<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Page Title -->
    <title>{{ $title ?? ($__env->yieldContent('title') ?: 'Solarex - Solar & Renewable Energy') }}</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/images/fav-icon.png') }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/fav-icon.png') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap/css/bootstrap.min.css') }}">

    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/all.min.css') }}">

    <!-- Slick Slider -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/slick-slider/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/slick-slider/slick-theme.css') }}">

    <!-- MetisMenu -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/metismenu/metismenu.css') }}">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/magnific-popup/magnific-popup.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body class="body-wrapper home-one" data-scroll-animation="true">

<div class="overlay"></div>

<!-- Header Start -->
<header class="srex-header srex-header--home-one header-menu">
    <div class="container-fluid">
        <nav class="main-nav ud-main-menu ud-main-menu--home-one d-flex align-items-center justify-content-between">
            <div class="ud-main-menu__logo">
                <a href="{{ route('dashboard.index') }}">
                    <img src="{{ asset('assets/images/logo/sustain verse logo.png') }}" alt="SustainVerse" class="logo-box">
                </a>
            </div>
            <ul class="nav-list">
                <!-- ABOUT -->
                <li class="nav-item has-mega" id="hover-about">
                    <a href="{{ route('dashboard.index') }}">About<i class="fa-solid fa-angle-down"></i></a>

                    <div class="mega-menu about-menu">
                        <div class="mega-grid">

                            <div class="mega-col side-border">
                                <h4><strong><i class="fa-solid fa-landmark srex-info-box__item__number me-1"></i>SustainVerse</strong></h4>
                                <a href="{{ route('vision.index') }}">Vision & Mission</a>
                                <a href="{{ route('founders.index') }}">Founders & Advisory Board</a>
                                <a href="{{ route('ecosystem.index') }}">Our Ecosystem</a>
                            </div>

                            <div class="mega-col side-border">
                                <h4><strong><i class="fa-regular fa-lightbulb me-1"></i> Future Vision</strong></h4>
                                <a href="{{ route('impact.index') }}">Green Impact Fund</a>
                            </div>

                            <div class="mega-col side-border">
                                <h4><strong><i class="fas fa-phone srex-info-box__item__number me-1"></i>Connect</strong></h4>
                                <a href="{{ route('contact.index') }}">Contact Us</a>
                            </div>

                            <div class="mega-col highlight-box">
                                <h4><strong><i class="fa-solid fa-screwdriver-wrench me-1"></i>Utility</strong></h4>
                                <div class="news-btn-box">
                                    <a class="btn outline mt-2" href="{{ route('coming-soon.index') }}"><i class="fas fa-phone srex-info-box__item__number me-2"></i>Partner With SustainVerse</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </li>
                <!-- NEWS-->
                <li class="nav-item has-mega">
                    @foreach ($menus as $menu)
                        @if (2 == $menu->id)
                            <a href="">{{ $menu->menu_name}}<i class="fa-solid fa-angle-down"></i></a>
                        
                            <div class="mega-menu news-menu">
                                <div class="mega-grid">
                                    <!-- 1st row -->
                                    @foreach ($categories as $cat)
                                        @if (in_array($cat->id, ($menu->cat_ids ?? [])))
                                            <div class="mega-col side-border">
                                                <a href="{{ route('blog.category', $cat->category_slug) }}" class="fs-6"><strong><i class="fa-regular fa-newspaper me-1"></i>{{ $cat->category_name }}</strong></a>
                                                
                                                <!-- SUB CATEGORIES -->
                                                @foreach ($categories as $subCat)
                                                    @if ($subCat->parent_id == $cat->id)
                                                        <a href="{{ route('blog.subcategory', ['category' => $cat->category_slug, 'subcategory' => $subCat->category_slug]) }}">
                                                            {{ $subCat->category_name }}
                                                        </a>
                                                    @endif
                                                @endforeach
                                            </div>
                                        @endif  
                                    @endforeach
                                    <div class="mega-col highlight-box">
                                        <h4><strong><i class="fa-solid fa-screwdriver-wrench me-1"></i>Utility</strong></h4>
                                        <div class="news-btn-box">
                                            <a class="btn outline" href="{{ route('coming-soon.index') }}">Submit Press release</a>
                                            <a class="btn outline mt-2" href="{{ route('coming-soon.index') }}">Subscribe to Newsletter</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    @endif
                    @endforeach
                </li>
                <!-- INSIGHTS  -->
                <li class="nav-item has-mega">
                    @foreach ($menus as $menu)
                        @if (3 == $menu->id)
                            <a href="">{{ $menu->menu_name}}<i class="fa-solid fa-angle-down"></i></a>
                        
                            <div class="mega-menu reviews-menu">

                                    <div class="mega-grid">
                                    <!-- 1st row -->
                                    @foreach ($categories as $cat)
                                        @if (in_array($cat->id, ($menu->cat_ids ?? [])))
                                            <div class="mega-col side-border">
                                                <a href="{{ route('blog.category', $cat->category_slug) }}" class="fs-6"><strong><i class="fas fa-binoculars me-1"></i>{{ $cat->category_name }}</strong></a>
                                                
                                                <!-- SUB CATEGORIES -->
                                                @foreach ($categories as $subCat)
                                                    @if ($subCat->parent_id == $cat->id)
                                                        <a href="{{ route('blog.subcategory', ['category' => $cat->category_slug, 'subcategory' => $subCat->category_slug]) }}">
                                                            {{ $subCat->category_name }}
                                                        </a>
                                                    @endif
                                                @endforeach
                                            </div>
                                        @endif  
                                    @endforeach
                                    <div class="mega-col highlight-box">
                                        <h4><strong><i class="fa-solid fa-screwdriver-wrench me-1"></i>Utility</strong></h4>
                                        <div class="news-btn-box">
                                            <a class="btn outline" href="{{ route('coming-soon.index') }}">Submit News Tip</a>
                                            <a class="btn outline mt-2" href="{{ route('coming-soon.index') }}">Subscribe to Newsletter</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    @endif
                    @endforeach
                </li>
                <!-- LEAD VIEWS -->
                <li class="nav-item has-mega">
                    <a href="">Lead Views<i class="fa-solid fa-angle-down"></i></a>

                    <div class="mega-menu solution-menu">
                        <div class="mega-grid">
                            <!-- 1st row -->
                            <div class="mega-col side-border">
                                <h4><strong><i class="fas fa-pen-fancy me-1"></i>SV Leadership</strong></h4>
                                
                                <!-- SUB CATEGORIES -->
                                <a href="{{ route('coming-soon.index') }}">
                                    Editorial
                                </a>
                            </div>

                            <div class="mega-col side-border">
                                <h4><strong><i class="far fa-comments me-1"></i>Conversations</strong></h4>
                                
                                <!-- SUB CATEGORIES -->
                                <a href="{{ route('coming-soon.index') }}">
                                    Interviews
                                </a>
                            </div>

                            <div class="mega-col side-border">
                                <h4><strong><i class="fas fa-clipboard me-1"></i>Ongoing Voices</strong></h4>
                                
                                <!-- SUB CATEGORIES -->
                                <a href="{{ route('blog.index') }}">
                                    Blogs
                                </a>
                                <a href="{{ route('coming-soon.index') }}">
                                    Profiles
                                </a>
                            </div>

                            <div class="mega-col highlight-box">
                                <h4><strong><i class="fa-solid fa-screwdriver-wrench me-1"></i>Utility</strong></h4>
                                <div class="news-btn-box">
                                    <a class="btn outline" href="{{ route('coming-soon.index') }}">Pitch an Interview</a>
                                    <a class="btn outline mt-2" href="{{ route('coming-soon.index') }}">Profile</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <!-- SOLUTIONS -->
                <li class="nav-item has-mega">
                    @foreach ($menus as $menu)
                        @if (5 == $menu->id)
                            <a href="">{{ $menu->menu_name}}<i class="fa-solid fa-angle-down"></i></a>
                            <div class="mega-menu event-menu">
                                <div class="mega-grid">
                                    <!-- 1st row -->
                                    @foreach ($categories as $cat)
                                        @if (in_array($cat->id, ($menu->cat_ids ?? [])))
                                            <div class="mega-col side-border">
                                                <a href="{{ route('blog.category', $cat->category_slug) }}" class="fs-6"><strong><i class="far fa-lightbulb me-1"></i>{{ $cat->category_name }}</strong></a>
                                                
                                                <!-- SUB CATEGORIES -->
                                                @foreach ($categories as $subCat)
                                                    @if ($subCat->parent_id == $cat->id)
                                                        <a href="{{ route('blog.subcategory', ['category' => $cat->category_slug, 'subcategory' => $subCat->category_slug]) }}">
                                                            {{ $subCat->category_name }}
                                                        </a>
                                                    @endif
                                                @endforeach
                                            </div>
                                        @endif  
                                    @endforeach
                                    
                                    <div class="mega-col highlight-box">
                                        <h4><strong><i class="fa-solid fa-screwdriver-wrench me-1"></i>Utility</strong></h4>
                                        <div class="news-btn-box">
                                            <a class="btn outline" href="{{ route('coming-soon.index') }}">Request Advisory</a>
                                            <a class="btn outline mt-2" href="{{ route('coming-soon.index') }}">List a CSR Project</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    @endif
                    @endforeach
                </li>
                <!-- EVENTS & COMMUNITY -->
                <li class="nav-item has-mega">
                    @foreach ($menus as $menu)
                        @if (6 == $menu->id)
                            <a href="">{{ $menu->menu_name}}<i class="fa-solid fa-angle-down"></i></a>
                            <div class="mega-menu education-menu">
                                <div class="mega-grid">
                                    <!-- 1st row -->

                                    <div class="mega-col side-border">
                                        <h4><strong><i class="fa-regular fa-flag me-1"></i>Flagship</strong></h4>
                                        
                                        <!-- SUB CATEGORIES -->
                                        <a href="{{ route('coming-soon.index') }}">
                                            SV Summit India
                                        </a>

                                        <a href="{{ route('coming-soon.index') }}">
                                            SV Summit UAE
                                        </a>
                                    </div>

                                    <div class="mega-col side-border">
                                        <h4><strong><i class="fa-solid fa-award me-1"></i>Recognition</strong></h4>
                                        
                                        <!-- SUB CATEGORIES -->
                                        <a href="{{ route('coming-soon.index') }}">
                                            Awards for Excellence
                                        </a>

                                        <a href="{{ route('coming-soon.index') }}">
                                            Hall of Fame
                                        </a>
                                    </div>

                                    <div class="mega-col side-border">
                                        <h4><strong><i class="far fa-calendar-alt me-1"></i>Others’ Events</strong></h4>
                                        
                                        <!-- SUB CATEGORIES -->
                                        <a href="{{ route('coming-soon.index') }}">
                                            WSDS
                                        </a>

                                        <a href="{{ route('coming-soon.index') }}">
                                            ICC Sustainability Conclave
                                        </a>
                                        <a href="{{ route('coming-soon.index') }}">
                                            Bharat Sustainability Expo
                                        </a>
                                    </div>
                                    
                                    <div class="mega-col highlight-box">
                                        <h4><strong><i class="fa-solid fa-screwdriver-wrench me-1"></i>Utility</strong></h4>
                                        <div class="news-btn-box">
                                            <a class="btn outline mt-2" href="{{ route('coming-soon.index') }}">Nominate</a>
                                            <a class="btn outline mt-2" href="{{ route('coming-soon.index') }}">Register</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    @endif
                    @endforeach
                </li>
                <!-- EDUCATION & CAREERS -->
                <li class="nav-item has-mega">
                    @foreach ($menus as $menu)
                        @if (7 == $menu->id)
                            <a href="">{{ $menu->menu_name}}<i class="fa-solid fa-angle-down"></i></a>
                            <div class="mega-menu leads-menu">
                                <div class="mega-grid">
                                    <!-- 1st row -->
                                    <div class="mega-col side-border">
                                        <h4><strong><i class="fa-solid fa-book me-1"></i>Learn</strong></h4>
                                        
                                        <!-- SUB CATEGORIES -->
                                        <a href="{{ route('coming-soon.index') }}">
                                            Masterclasses
                                        </a>
                                        <a href="{{ route('coming-soon.index') }}">
                                            PG Diploma
                                        </a>
                                        <a href="{{ route('coming-soon.index') }}">
                                            Degree Programs
                                        </a>
                                    </div>

                                    <div class="mega-col side-border">
                                        <h4><strong><i class="fa-solid fa-suitcase me-1"></i>Work</strong></h4>
                                        
                                        <!-- SUB CATEGORIES -->
                                        <a href="{{ route('coming-soon.index') }}">
                                            Internships
                                        </a>
                                        <a href="{{ route('coming-soon.index') }}">
                                            Jobs
                                        </a>
                                        <a href="{{ route('coming-soon.index') }}">
                                            Careers at SustainVerse
                                        </a>
                                    </div>
                                    
                                    <div class="mega-col highlight-box">
                                        <h4><strong><i class="fa-solid fa-screwdriver-wrench me-1"></i>Utility</strong></h4>
                                        <div class="news-btn-box">
                                            <a class="btn outline mt-2" href="{{ route('coming-soon.index') }}">Apply to Masterclass</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </li>
                <!-- MARKETPLACE -->
                <li class="nav-item has-mega">
                    @foreach ($menus as $menu)
                        @if (8 == $menu->id)
                            <a href="https://marketplace.sustainverse.org/" target="_blank" >{{ $menu->menu_name}}<i class="fa-solid fa-angle-down"></i></a>

                            <!-- <div class="mega-menu marketplace-menu">
                                <div class="mega-grid">
                                    <div class="mega-col d-flex align-items-center justify-content-center" style="min-height: 180px;">
                                        <p class="mb-0 fw-bold text-center" style="font-size: 2.5rem; line-height: 1.2;">
                                            COOMING SOON 
                                        </p>
                                    </div>
                                </div>
                            </div> -->
                        @endif
                    @endforeach
                </li>
            </ul>

            <div class="ud-hamburger-menu d-block d-lg-none">
                <div class="ud-hamburger-menu__btn">
                    <span></span>
                </div>
            </div>
        </nav>

    </div>

    <!-- Side Popup -->
    <div class="ud-side-popup ud-side-popup--home-one" id="mobileMenu">
        <div class="ud-side-popup__header">
            <div class="ud-side-popup__header-logo">
                <a href="{{ route('dashboard.index') }}">
                    <img src="{{ asset('assets/images/logo/sustain verse logo.png') }}" alt="Solarex">
                </a>
            </div>
            <button class="side-popup-close">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <div class="ud-side-popup__body">
            <ul class="metismenu" id="side-menu">
                <!-- HOME -->
                <li>
                    <a href="{{ route('dashboard.index') }}" class="fs-5">Home <i class="fa-solid fa-home"></i></a>
                </li>

                <!-- ABOUT -->
                @foreach ($menus as $menu)
                    @if (1 == $menu->id)
                        <li>
                            <a href="" class="fs-5">{{ $menu->menu_name }} <i class="fa-solid fa-angle-down"></i></a>
                            <ul class="sub-menu collapse primary-box">
                                <li>
                                    <a href="" class="fs-5">
                                        SustainVerse<i class="fa-solid fa-angle-down"></i>
                                    </a>

                                    <ul class="secondary-box">
                                        <li>
                                            <a href="{{ route('vision.index') }}" class="fs-5">
                                                Vision & Mission
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('founders.index') }}" class="fs-5">
                                                Founders & Advisory Board
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('ecosystem.index') }}" class="fs-5">
                                                Our Ecosystem
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="" class="fs-5">
                                        Future Vision<i class="fa-solid fa-angle-down"></i>
                                    </a>

                                    <ul class="secondary-box">
                                        <li>
                                            <a href="{{ route('impact.index') }}" class="fs-5">
                                                Green Impact Fund
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="" class="fs-5">
                                        Connect<i class="fa-solid fa-angle-down"></i>
                                    </a>

                                    <ul class="secondary-box" class="fs-5">
                                        <li>
                                            <a href="{{ route('contact.index') }}">
                                                Contact Us
                                            </a>
                                        </li>
                                        <!-- <li>
                                            <a href="{{ route('coming-soon.index') }}">
                                                Coming Soon
                                            </a>
                                        </li> -->
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    @endif
                @endforeach

                <!-- NEWS -->
                @foreach ($menus as $menu)
                    @if (2 == $menu->id)
                        <li>
                            <a href="" class="fs-5">{{ $menu->menu_name }} <i class="fa-solid fa-angle-down"></i></a>
                            <ul class="sub-menu collapse primary-box">
                                @foreach ($categories as $cat)
                                    @if (in_array($cat->id, ($menu->cat_ids ?? [])))
                                        <li>
                                            <a href="{{ route('blog.category', $cat->category_slug) }}" class="fs-5">{{ $cat->category_name }} <i class="fa-solid fa-angle-down"></i></a>

                                            <ul class="secondary-box">
                                                @foreach ($categories as $subCat)
                                                    @if ($subCat->parent_id == $cat->id)
                                                    <li>
                                                        <a class="secondary-box-anchor" 
                                                            href="{{ route('blog.subcategory', ['category' => $cat->category_slug, 'subcategory' => $subCat->category_slug]) }}">
                                                            {{ $subCat->category_name }}
                                                        </a>
                                                    </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                    @endif
                @endforeach

                <!-- INSIGHTS -->
                @foreach ($menus as $menu)
                    @if (3 == $menu->id)
                        <li>
                            <a href="" class="fs-5">{{ $menu->menu_name }} <i class="fa-solid fa-angle-down"></i></a>
                            <ul class="sub-menu collapse primary-box">
                                @foreach ($categories as $cat)
                                    @if (in_array($cat->id, ($menu->cat_ids ?? [])))
                                        <li>
                                            <a href="{{ route('blog.category', $cat->category_slug) }}" class="fs-5">{{ $cat->category_name }} <i class="fa-solid fa-angle-down"></i></a>

                                            <ul class="secondary-box">
                                                @foreach ($categories as $subCat)
                                                    @if ($subCat->parent_id == $cat->id)
                                                    <li>
                                                        <a class="secondary-box-anchor" 
                                                            href="{{ route('blog.subcategory', ['category' => $cat->category_slug, 'subcategory' => $subCat->category_slug]) }}">
                                                            {{ $subCat->category_name }}
                                                        </a>
                                                    </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                    @endif
                @endforeach
                <!-- LEAD VIEWS -->
                <li>
                    <a href="" class="fs-5">Lead Views<i class="fa-solid fa-angle-down"></i></a>
                    <ul class="sub-menu collapse primary-box">
                        <li>
                            <a href="{{ route('coming-soon.index') }}" class="fs-5">SV Leadership<i class="fa-solid fa-angle-down"></i></a>

                            <ul class="secondary-box">
                                <li>
                                    <a class="secondary-box-anchor" 
                                        href="{{ route('coming-soon.index') }}">
                                        Editorial
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="{{ route('coming-soon.index') }}" class="fs-5">Conversations<i class="fa-solid fa-angle-down"></i></a>

                            <ul class="secondary-box">
                                <li>
                                    <a class="secondary-box-anchor" 
                                        href="{{ route('coming-soon.index') }}">
                                        Interviews
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="{{ route('coming-soon.index') }}" class="fs-5">Ongoing Voices<i class="fa-solid fa-angle-down"></i></a>

                            <ul class="secondary-box">
                                <li>
                                    <a class="secondary-box-anchor" 
                                        href="{{ route('blog.index') }}">
                                        Blogs
                                    </a>
                                </li>

                                <li>
                                    <a class="secondary-box-anchor" 
                                        href="{{ route('coming-soon.index') }}">
                                        Profiles
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <!-- SOLUTIONS -->
                @foreach ($menus as $menu)
                    @if (5 == $menu->id)
                        <li>
                            <a href="" class="fs-5">{{ $menu->menu_name }} <i class="fa-solid fa-angle-down"></i></a>
                            <ul class="sub-menu collapse primary-box">
                                @foreach ($categories as $cat)
                                    @if (in_array($cat->id, ($menu->cat_ids ?? [])))
                                        <li>
                                            <a href="{{ route('blog.category', $cat->category_slug) }}" class="fs-5">{{ $cat->category_name }} <i class="fa-solid fa-angle-down"></i></a>

                                            <ul class="secondary-box">
                                                @foreach ($categories as $subCat)
                                                    @if ($subCat->parent_id == $cat->id)
                                                    <li>
                                                        <a class="secondary-box-anchor" 
                                                            href="{{ route('blog.subcategory', ['category' => $cat->category_slug, 'subcategory' => $subCat->category_slug]) }}">
                                                            {{ $subCat->category_name }}
                                                        </a>
                                                    </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                    @endif
                @endforeach

                <!-- EVENTS & COMMUNITYBOUT -->
                <li>
                    <a href="" class="fs-5">Events & Community<i class="fa-solid fa-angle-down"></i></a>
                    <ul class="sub-menu collapse primary-box">
                        <li>
                            <a href="{{ route('coming-soon.index') }}" class="fs-5">Flagship<i class="fa-solid fa-angle-down"></i></a>

                            <ul class="secondary-box">
                                <li>
                                    <a class="secondary-box-anchor" 
                                        href="{{ route('coming-soon.index') }}">
                                        SV Summit India
                                    </a>
                                </li>

                                <li>
                                    <a class="secondary-box-anchor" 
                                        href="{{ route('coming-soon.index') }}">
                                        SV Summit UAE
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="{{ route('coming-soon.index') }}" class="fs-5">Recognition<i class="fa-solid fa-angle-down"></i></a>

                            <ul class="secondary-box">
                                <li>
                                    <a class="secondary-box-anchor" 
                                        href="{{ route('coming-soon.index') }}">
                                        Awards for Excellence
                                    </a>
                                </li>

                                <li>
                                    <a class="secondary-box-anchor" 
                                        href="{{ route('coming-soon.index') }}">
                                        Hall of Fame
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="{{ route('coming-soon.index') }}" class="fs-5">Others’ Events<i class="fa-solid fa-angle-down"></i></a>

                            <ul class="secondary-box">
                                <li>
                                    <a class="secondary-box-anchor" 
                                        href="{{ route('coming-soon.index') }}">
                                        WSDS
                                    </a>
                                </li>

                                <li>
                                    <a class="secondary-box-anchor" 
                                        href="{{ route('coming-soon.index') }}">
                                        ICC Sustainability Conclave
                                    </a>
                                </li>

                                <li>
                                    <a class="secondary-box-anchor" 
                                        href="{{ route('coming-soon.index') }}">
                                        Bharat Sustainability Expo
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <!-- EDUCATION & CAREERS -->
                <li>
                    <a href="" class="fs-5">Education & Careers<i class="fa-solid fa-angle-down"></i></a>
                    <ul class="sub-menu collapse primary-box">
                        <li>
                            <a href="{{ route('coming-soon.index') }}" class="fs-5">Learn<i class="fa-solid fa-angle-down"></i></a>

                            <ul class="secondary-box">
                                <li>
                                    <a class="secondary-box-anchor" 
                                        href="{{ route('coming-soon.index') }}">
                                        Masterclasses
                                    </a>
                                </li>

                                <li>
                                    <a class="secondary-box-anchor" 
                                        href="{{ route('coming-soon.index') }}">
                                        PG Diploma
                                    </a>
                                </li>

                                <li>
                                    <a class="secondary-box-anchor" 
                                        href="{{ route('coming-soon.index') }}">
                                        Degree Programs
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="{{ route('coming-soon.index') }}" class="fs-5">Work<i class="fa-solid fa-angle-down"></i></a>

                            <ul class="secondary-box">
                                <li>
                                    <a class="secondary-box-anchor" 
                                        href="{{ route('coming-soon.index') }}">
                                        Internships
                                    </a>
                                </li>

                                <li>
                                    <a class="secondary-box-anchor" 
                                        href="{{ route('coming-soon.index') }}">
                                        Jobs
                                    </a>
                                </li>

                                <li>
                                    <a class="secondary-box-anchor" 
                                        href="{{ route('coming-soon.index') }}">
                                        Careers at SustainVerse
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <!-- MARKETPLACE -->
                <li>
                    <a href="https://marketplace.sustainverse.org/" class="fs-5">Marketplace</a>
                </li>

                <li><a href="{{ url('/#faq-section') }}" class="side-popup-close fs-5">FAQ</a></li>
                <li><a href="{{ url('/#contact-section') }}" class="side-popup-close fs-5">Contact</a></li>
            </ul>
        </div>
    </div>
</header>
<!-- Header End -->
