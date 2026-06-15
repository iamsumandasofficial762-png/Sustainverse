<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="csrf-token" content="{{ csrf_token() }}" />
<meta name="description" content="Sheltos - Signup page" />
<meta name="keywords" content="sheltos" />
<meta name="author" content="sheltos" />

<link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />
<link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />
<link rel="icon" href="{{ asset('assets/images/fav-icon.png') }}" type="image/png" />
<title>{{ $attributes->get('title', 'Admin Panel') }}</title>

<!--Google font-->
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,500,500i,600,600i,700,700i,800,800i" rel="stylesheet" />
<link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet" />
<link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i" rel="stylesheet" />

<!-- animate css -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css') }}" />

<!-- Template css -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/admin.css') }}" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>

<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer" />
</head>

<body>
<!-- Loader start -->
<div class="loader-wrapper">
    <div class="row loader-img">
        <div class="col-12" style="height: 200px; width: 200px;">
            <img src="{{ asset('assets/images/loader/Sandy Loading.gif') }}" class="img-fluid" alt=""  style="height: 100%; width: 100%;">
        </div>
    </div>
</div>
<!-- Loader end -->

<div class="page-wrapper">

    <!-- page header start -->
    <div class="page-main-header row">
        <div id="sidebar-toggle" class="toggle-sidebar col-auto">
            <i data-feather="chevrons-left"></i>
        </div>

        <div class="nav-right col p-0">
            <ul class="header-menu">

                <li>
                    <a href="#!" onclick="javascript:toggleFullScreen()">
                        <i data-feather="maximize"></i>
                    </a>
                </li>

                <li class="onhover-dropdown">
                    <a href="javascript:void(0)">
                        <i data-feather="save"></i>
                    </a>

                    <div class="notification-dropdown onhover-show-div">
                        <div class="dropdown-title">
                            <h6>Recent Attachments</h6>
                            <a href="reports.html">Show all</a>
                        </div>

                        <ul>
                            <li>
                                <div class="media">
                                    <div class="icon-notification bg-success-light">
                                        <i class="fas fa-file-word"></i>
                                    </div>
                                    <div class="media-body">
                                        <a href="reports.html">
                                            <h6>Doc_file.doc</h6>
                                        </a>
                                        <span>800MB</span>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="media">
                                    <div class="icon-notification bg-primary-light">
                                        <i class="fas fa-file-image"></i>
                                    </div>
                                    <div class="media-body">
                                        <a href="reports.html">
                                            <h6>Apartment.jpg</h6>
                                        </a>
                                        <span>500kb</span>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="media">
                                    <div class="icon-notification bg-warning-light">
                                        <i class="fas fa-file-pdf"></i>
                                    </div>
                                    <div class="media-body">
                                        <a href="reports.html">
                                            <h6>villa_report.pdf</h6>
                                        </a>
                                        <span>26MB</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="onhover-dropdown notification-box">
                    <a href="javascript:void(0)">
                        <i data-feather="bell"></i>
                        <span class="label label-shadow label-pill notification-badge">3</span>
                    </a>

                    <div class="notification-dropdown onhover-show-div">
                        <div class="dropdown-title">
                            <h6>Notifications</h6>
                            <a href="favourites.html">Show all</a>
                        </div>

                        <ul>
                            <li>
                                <div class="media">
                                    <div class="icon-notification bg-primary-light">
                                        <i class="fab fa-xbox"></i>
                                    </div>

                                    <div class="media-body">
                                        <h6>Item damaged</h6>
                                        <span>8 hours ago, Tadawis 24</span>
                                        <p class="mb-0">"the table is broken:("</p>

                                        <ul class="user-group">
                                            <li>
                                                <a href="javascript:void(0)">
                                                    <img src="{{ asset('assets/images/about/4.jpg') }}" class="img-fluid" alt="">
                                                </a>
                                            </li>

                                            <li class="reply">
                                                <a href="javascript:void(0)">
                                                    Reply
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="media">
                                    <div class="icon-notification bg-success-light">
                                        <i class="fas fa-file-invoice-dollar"></i>
                                    </div>

                                    <div class="media-body">
                                        <h6>Payment received</h6>
                                        <span>2 hours ago, Bracka 15</span>

                                        <ul class="user-group">
                                            <li>
                                                <a href="javascript:void(0)">
                                                    <img src="{{ asset('assets/images/about/1.jpg') }}" class="img-fluid" alt="">
                                                </a>
                                            </li>

                                            <li>
                                                <a href="javascript:void(0)">
                                                    <img src="{{ asset('assets/images/about/2.jpg') }}" class="img-fluid" alt="">
                                                </a>
                                            </li>

                                            <li>
                                                <a href="javascript:void(0)">
                                                    <img src="{{ asset('assets/images/about/3.jpg') }}" class="img-fluid" alt="">
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="media">
                                    <div class="icon-notification bg-warning-light">
                                        <i class="fas fa-comment-dots"></i>
                                    </div>

                                    <div class="media-body">
                                        <h6>New inquiry</h6>
                                        <span>1 Days ago, Krowada 7</span>
                                        <p class="mb-0">"is the villa still available?"</p>

                                        <ul class="user-group">
                                            <li>
                                                <a href="javascript:void(0)">
                                                    <img src="{{ asset('assets/images/about/2.jpg') }}" class="img-fluid" alt="">
                                                </a>
                                            </li>

                                            <li>
                                                <a href="javascript:void(0)">
                                                    <img src="{{ asset('assets/images/about/3.jpg') }}" class="img-fluid" alt="">
                                                </a>
                                            </li>

                                            <li class="reply">
                                                <a href="javascript:void(0)">
                                                    Reply
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>
                </li>

                <li class="onhover-dropdown">
                    <a href="javascript:void(0)">
                        <i data-feather="mail"></i>
                    </a>

                    <div class="notification-dropdown chat-dropdown onhover-show-div">
                        <div class="dropdown-title">
                            <h6>Messages</h6>
                            <a href="user-profile.html">View all</a>
                        </div>

                        <ul>
                            <li>
                                <div class="media">
                                    <div class="chat-user">
                                        <img src="{{ asset('assets/images/avatar/1.jpg') }}" class="img-fluid" alt="">
                                    </div>

                                    <div class="media-body">
                                        <a href="user-profile.html">
                                            <h6>Bob Frapples</h6>
                                        </a>

                                        <span>Template Represents simply...</span>
                                    </div>

                                    <div class="status online">online</div>
                                </div>
                            </li>

                            <li>
                                <div class="media">
                                    <div class="chat-user">
                                        <img src="{{ asset('assets/images/avatar/3.jpg') }}" class="img-fluid" alt="">
                                    </div>

                                    <div class="media-body">
                                        <a href="user-profile.html">
                                            <h6>Greta Life</h6>
                                        </a>

                                        <span>Template Represents simply...</span>
                                    </div>

                                    <div class="status away">Away</div>
                                </div>
                            </li>

                            <li>
                                <div class="media">
                                    <div class="chat-user">
                                        <img src="{{ asset('assets/images/avatar/4.jpg') }}" class="img-fluid" alt="">
                                    </div>

                                    <div class="media-body">
                                        <a href="user-profile.html">
                                            <h6>Greta Life</h6>
                                        </a>

                                        <span>Template Represents simply...</span>
                                    </div>

                                    <div class="status online">online</div>
                                </div>
                            </li>

                            <li>
                                <div class="media">
                                    <div class="chat-user">
                                        <img src="{{ asset('assets/images/avatar/7.jpg') }}" class="img-fluid" alt="">
                                    </div>

                                    <div class="media-body">
                                        <a href="user-profile.html">
                                            <h6>Greta Life</h6>
                                        </a>

                                        <span>Template Represents simply...</span>
                                    </div>

                                    <div class="status busy">Busy</div>
                                </div>
                            </li>

                        </ul>
                    </div>
                </li>

                <li class="profile-avatar onhover-dropdown">
                    <div>
                        <img src="{{ asset('assets/images/icon-7797704_640.png') }}" class="img-fluid" alt="">
                    </div>

                    <ul class="profile-dropdown onhover-show-div">
                        <li><a href="user-profile.html"><span>Account </span><i data-feather="user"></i></a></li>

                        <li><a href="listing.html"><span>Listing</span><i data-feather="file-text"></i></a></li>

                        <li>
                            <a href="#" onclick="document.getElementById('logoutForm').submit(); return false;">
                                <span>Log out</span><i data-feather="log-in"></i>
                            </a>

                            <form id="logoutForm" action="{{ route('logout') }}" method="post">
                                @csrf
                            </form>
                        </li>

                    </ul>
                </li>
            </ul>
        </div>
        
    </div>

</div>
