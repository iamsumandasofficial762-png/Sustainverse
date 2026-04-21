<x-header title="Founder - SustainVerse">

</x-header>
<!-- content here -->
<section class="section-top">
    <div class="container">
        <div class="col-lg-10 offset-lg-1 text-center">
            <div class="section-top-title">
                <h1>Founders & Advisory</h1>
                <ul>
                    <li><a href="{{ route('dashboard.index') }}">Home</a></li>
                    <li> > <a href="{{ route('founders.index') }}">Founders-advisory</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- content here -->
<!-- About US Start-->
<section class="srex-about-us-three srex-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-12">
                <div class="srex-about-us-three__left">
                    <div class="row">
                        <div class="col-lg-6">
                            <img src="{{ asset('assets/images/home-three/about-us/about-1.png') }}" alt="About One">
                        </div>
                        <div class="col-lg-6">
                            <img src="{{ asset('assets/images/home-three/about-us/about-2.png') }}" alt="About Two">
                        </div>
                        <div class="col-lg-6 srex-about-us-three__left__img-3-col">
                            <img
                                class="srex-about-us-three__left__img-3"
                                src="{{ asset('assets/images/home-three/about-us/about-3.png') }}"
                                alt="About Three">
                        </div>
                        <div class="col-lg-6">
                            <div class="srex-about-us-three__left__box">
                                <img src="{{ asset('assets/images/home-three/founder.png') }}" alt="Windmill">
                                <!-- <h3>Founders & <br> Advisory</h3> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-12 px-0">
                <div class="srex-section__head">
                    <!-- <h5 class="srex-section__head__badge wow ud-fade-in-up" data-wow-delay="200ms">
                        About US
                    </h5> -->

                    <h2 class="srex-section__head__title wow ud-fade-in-up" data-wow-delay="200ms">
                        Guided by Wisdom, Driven by Innovation.
                    </h2>

                    <div class="srex-tabs founders-tabs-static">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active"
                                    id="pills-all-tab"
                                    data-bs-toggle="pill"
                                    data-bs-target="#pills-all"
                                    type="button"
                                    role="tab"
                                    aria-controls="pills-all"
                                    aria-selected="true">
                                    All
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link"
                                    id="pills-power-tab"
                                    data-bs-toggle="pill"
                                    data-bs-target="#pills-power"
                                    type="button"
                                    role="tab"
                                    aria-controls="pills-power"
                                    aria-selected="false">
                                    Strategic Power
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link"
                                    id="pills-ecosolar-tab"
                                    data-bs-toggle="pill"
                                    data-bs-target="#pills-ecosolar"
                                    type="button"
                                    role="tab"
                                    aria-controls="pills-ecosolar"
                                    aria-selected="false">
                                    Renewable Assets
                                </button>
                            </li>
                        </ul>

                        <p class="srex-section__head__desc">
                            Integrating global intelligence and environmental responsibility to build a resilient tomorrow.
                        </p>

                        <div class="tab-content founders-tabs-static__content" id="pills-tabContent">
                            <div class="tab-pane fade show active"
                                id="pills-all"
                                role="tabpanel"
                                aria-labelledby="pills-all-tab"
                                tabindex="0">
                                <div class="srex-icon-list">
                                    <ul>
                                        <li><i class="fa-solid fa-check"></i><p>Making Resilient Infrastructure</p></li>
                                        <li><i class="fa-solid fa-check"></i><p>Building Operational Excellence</p></li>
                                        <li><i class="fa-solid fa-check"></i><p>Improving Social Empowerment</p></li>
                                        <li><i class="fa-solid fa-check"></i><p>Using Low-Carbon Solutions</p></li>
                                        <li><i class="fa-solid fa-check"></i><p>Establishing Ecological Stewardship</p></li>
                                        <li><i class="fa-solid fa-check"></i><p>Promising Long-Term Value</p></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="tab-pane fade"
                                id="pills-power"
                                role="tabpanel"
                                aria-labelledby="pills-power-tab"
                                tabindex="0">
                                <div class="srex-icon-list">
                                    <ul>
                                        <li><i class="fa-solid fa-check"></i><p>Making Resilient Infrastructure</p></li>
                                        <li><i class="fa-solid fa-check"></i><p>Building Operational Excellence</p></li>
                                        <li><i class="fa-solid fa-check"></i><p>Improving Social Empowerment</p></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="tab-pane fade"
                                id="pills-ecosolar"
                                role="tabpanel"
                                aria-labelledby="pills-ecosolar-tab"
                                tabindex="0">
                                <div class="srex-icon-list">
                                    <ul>
                                        <li><i class="fa-solid fa-check"></i><p>Using Low-Carbon Solutions</p></li>
                                        <li><i class="fa-solid fa-check"></i><p>Establishing Ecological Stewardship</p></li>
                                        <li><i class="fa-solid fa-check"></i><p>Promising Long-Term Value</p></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About US End-->

<section class="team-section">
    <h2 class="team-title fs-1">Meet our team</h2>

    <div class="team-container">
        <div class="row">
            <!--  -->
            <div class="col-md-3 d-flex justify-content-center mb-3">
                <div class="team-card">
                    <div class="shape-overlay"></div>

                    <div class="img-area">
                        <img src="{{ asset('assets/images/home-one/avatar.png') }}" alt="Lyn Bryan">
                    </div>

                    <div class="info-area">
                        <h4>Ujjwalk chowdhury</h4>
                        <span class="designation">CEO</span>
                        <p>Driving innovation in clean energy and sustainable infrastructure with over a decade of leadership experience in green technology.</p>

                        <div class="social-links">
                            <a href=""><i class="fab fa-facebook-f"></i></a>
                            <a href=""><i class="fab fa-twitter"></i></a>
                            <a href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
            <div class="col-md-3 d-flex justify-content-center mb-3">
                <div class="team-card">
                    <div class="shape-overlay"></div>

                    <div class="img-area">
                        <img src="{{ asset('assets/images/home-one/avatar.png') }}" alt="Lyn Bryan">
                    </div>

                    <div class="info-area">
                        <h4>Rahul das</h4>
                        <span class="designation">Chief Technology Officer (CTO)</span>
                        <p>Passionate about building scalable tech solutions that power renewable ecosystems and smart energy systems.</p>

                        <div class="social-links">
                            <a href=""><i class="fab fa-facebook-f"></i></a>
                            <a href=""><i class="fab fa-twitter"></i></a>
                            <a href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
            <div class="col-md-3 d-flex justify-content-center mb-3">
                <div class="team-card">
                    <div class="shape-overlay"></div>

                    <div class="img-area">
                        <img src="{{ asset('assets/images/home-one/avatar.png') }}" alt="Lyn Bryan">
                    </div>

                    <div class="info-area">
                        <h4>Tanushree chandra</h4>
                        <span class="designation">Marketing Specialist</span>
                        <p>Blends data and creativity to build campaigns that stick. Ananya focuses on growing brand presence while making eco-conscious living feel exciting, not complicated.</p>

                        <div class="social-links">
                            <a href=""><i class="fab fa-facebook-f"></i></a>
                            <a href=""><i class="fab fa-twitter"></i></a>
                            <a href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
            <div class="col-md-3 d-flex justify-content-center mb-3">
                <div class="team-card">
                    <div class="shape-overlay"></div>

                    <div class="img-area">
                        <img src="{{ asset('assets/images/home-one/avatar.png') }}" alt="Lyn Bryan">
                    </div>

                    <div class="info-area">
                        <h4>Sweta Roy</h4>
                        <span class="designation">Content Creator</span>
                        <p>Turns ideas into stories people actually want to read. From blogs to video scripts, Kabir crafts content that makes sustainability feel less like a lecture and more like a movement.</p>

                        <div class="social-links">
                            <a href=""><i class="fab fa-facebook-f"></i></a>
                            <a href=""><i class="fab fa-twitter"></i></a>
                            <a href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<x-footer>

</x-footer>
