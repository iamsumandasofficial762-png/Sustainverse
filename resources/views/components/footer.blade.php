<!-- Footer Start -->
<footer class="srex-footer-one">
    <div class="container">

        <!-- Top -->
        <div class="row justify-content-between align-items-center srex-footer-one__top">
            <div class="col-6 col-lg-6 col-md-6">
                <img src="{{ asset('assets/images/logo/sustain-verse-logo-dark.png') }}" alt="Logo" style="width: 220px;">
            </div>

            <div class="col-lg-6 col-6 col-md-6">
                <ul class="srex-footer__social_links">
                    <li><a href="https://www.facebook.com/share/1CY5GxaZ7B/" target="_blank" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a></li>
                    <li><a href="https://secure.instagram.com/accounts/login/" target="_blank" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a></li>
                    <li><a href="https://x.com/twitt_login?lang=en" target="_blank" aria-label="Twitter"><i class="fa-brands fa-twitter"></i></a></li>
                </ul>
            </div>
        </div>

        <hr>

        <!-- Links -->
        <div class="srex-footer__links">
            <div class="row">

                <!-- Contact -->
                <div class="col-12 col-lg-3 col-md-6">
                    <div class="srex-footer__links__wrapper">
                        <h3 class="srex-footer_for_main">CONTACT US</h3>
                        <ul class="srex-footer__contact">

                            <li>
                                <div class="srex-footer__contact__icon">
                                    <i class="fa-solid fa-phone"></i>
                                </div>
                                <div class="srex-footer__contact__text">
                                    <p><a href="tel:+919876543210">+91 9876543210</a></p>
                                    <p><a href="tel:+919876543210">+91 9876543210</a></p>
                                </div>
                            </li>

                            <li>
                                <div class="srex-footer__contact__icon">
                                    <i class="fa-solid fa-paper-plane"></i>
                                </div>
                                <div class="srex-footer__contact__text">
                                    <p>
                                        Shrachi EK Tower, EKT/5/Office-B,<br>
                                        Newtown, Kolkata, West Bengal 700161
                                    </p>
                                </div>
                            </li>

                            <li>
                                <div class="srex-footer__contact__icon">
                                    <i class="fa-solid fa-envelope"></i>
                                </div>
                                <div class="srex-footer__contact__text">
                                    <p><a href="mailto:info@sustainverse.org">info@sustainverse.org</a></p>
                                    <p><a href="mailto:support@sustainverse.org">support@sustainverse.org</a></p>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>

                <!-- Useful Links -->
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="srex-footer__links__wrapper">
                        <ul class="srex-footer__links__list">
                            <li><h3 class="srex-footer_for_main">SUSTAINVERSE</h3></li>
                            <li><a href="{{ route('vision.index') }}" class="ms-3">Vision & Mission</a></li>
                            <li><a href="{{ route('founders.index') }}" class="ms-3">Founders & Advisory Board</a></li>
                            <li><a href="{{ route('ecosystem.index') }}" class="ms-3">Our Ecosystem</a></li>
                            <li><h3 class="srex-footer_for_main">FUTURE VISION</h3></li>
                            <li><a href="{{ route('impact.index') }}" class="ms-3">Green Impact Fund</a></li>
                            <li><h3 class="srex-footer_for_main">CONNECT</h3></li>
                            <li><a href="{{ route('contact.index') }}" class="ms-3">Contact Us</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Services -->
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="srex-footer__links__wrapper">
                        <h3 class="srex-footer_for_main">CATEGORY</h3>
                        <ul class="srex-footer__links__list">
                            <li><a href="{{ route('blog.category', 'india') }}" class="ms-3">India</a></li>
                            <li><a href="{{ route('blog.category', 'uae') }}" class="ms-3">UAE</a></li>
                            <li><a href="{{ route('blog.category', 'africa') }}" class="ms-3">Africa</a></li>
                            <li><a href="{{ route('blog.category', 'asia') }}" class="ms-3">Ashia</a></li>
                            <li><a href="{{ route('blog.category', 'special-days') }}" class="ms-3">Speacial day</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-6 col-lg-3 col-md-6">
                    <div class="srex-footer__links__wrapper">
                        <ul class="srex-footer__links__list">
                            <li><h3 class="srex-footer_for_main">LEAD VIEWS</h3></li>
                            <li><a href="{{ route('coming-soon.index') }}" class="ms-3">Editorial</a></li>
                            <li><a href="{{ route('coming-soon.index') }}" class="ms-3">interviews</a></li>
                            <li><a href="{{ route('blog.index') }}" class="ms-3">Blog</a></li>
                            <li><a href="{{ route('coming-soon.index') }}" class="ms-3">Profile</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>

        <hr>

        <!-- Bottom -->
        <div class="srex-footer__bottom">
            <div class="row">
                <div class="col-12 col-md-5">
                    <p>&copy; {{ date('Y') }} Ebluesoft | All Rights Reserved</p>
                </div>
                <!-- <div class="col-12 col-md-2">
                    <ul class="srex-footer__bottom__links">
                        <li>
                            <div class="visiter-box">
                                <a href="{{ route('dashboard.index') }}" class="visiter-box-text">
                                    <h6>
                                        Unique IP Address:
                                        <span id="totalVisitorCount" data-target="{{ (int) $totalVisitors }}">1,00,000</span>
                                    </h6>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div> -->
                <div class="col-12 col-md-2 d-flex justify-content-center align-items-center">
                    <div class="visitor-card text-center">
                        <div class="visitor-icon">
                            🌍
                        
                            <h3 class="visitor-count">
                                <span id="totalVisitorCount" data-target="{{ (int) $totalVisitors }}">
                                    {{ number_format($totalVisitors) }}
                                </span>+
                            </h3>
                        </div>
                        <p class="visitor-label">Global Visitors</p>
                    </div>
                </div>
                <div class="col-12 col-md-5">
                    <ul class="srex-footer__bottom__links">
                        <li><a href="{{ route('dashboard.index') }}">About</a></li>
                        <li><a href="{{ route('blog.index') }}">All Post</a></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</footer>
<!-- Footer End -->


<!-- Scripts -->
<script src="{{ asset('assets/vendors/jquery/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/vendors/bootstrap/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/vendors/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/vendors/slick-slider/slick.js') }}"></script>
<script src="{{ asset('assets/vendors/wow/wow.min.js') }}"></script>
<script src="{{ asset('assets/vendors/metismenu/metismenu.js') }}"></script>
<script src="{{ asset('assets/vendors/magnific-popup/magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/vendors/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('assets/vendors/counterup/counterup.js') }}"></script>
<script src="{{ asset('assets/vendors/jquery-mixitup/jquery-mixitup.min.js') }}"></script>

<!-- Custom JS -->
<script src="{{ asset('assets/js/custom.js') }}"></script>


<!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- Owl Carousel CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

<!-- jQuery (Required) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Owl Carousel JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>




<!-- CATEGORY SEARCH -->
<script>
    $('#searchCategory').on('keyup', function () {
        console.log("hello world")
        let query = $(this).val().trim();

        if (query.length > 2) {
            $.ajax({
                url: "{{ route('live.cat.search') }}",
                method: "GET",
                data: { query: query },
                success: function (data) {

                    $('#searchCatResults').html(data).show();
                }
            });
        } else {
            $('#searchCatResults').hide();
        }
    });
</script>

<!-- carousal -->
<script>
    $(document).ready(function () {
        $('.energy-carousel').owlCarousel({
            loop: true,
            margin: 16,
            nav: true,
            dots: true,
            autoplay: true,
            autoplayTimeout: 4000,
            autoplayHoverPause: true,
            smartSpeed: 600,

            responsive: {
                0: {
                    items: 1
                },
                576: {
                    items: 1
                },
                768: {
                    items: 2
                },
                992: {
                    items: 3
                },
                1200: {
                    items: 4
                }
            }
        });
    });

</script>

<!-- SLIDER -->
<script>
  const track = document.querySelector('.carousel-track');
  const slides = document.querySelectorAll('.slide');
  const nextBtn = document.querySelector('.next');
  const prevBtn = document.querySelector('.prev');

  let index = 0;

  function updateSlide() {
    track.style.transform = `translateX(-${index * 100}%)`;
  }

  nextBtn.addEventListener('click', () => {
    index = (index + 1) % slides.length;
    updateSlide();
  });

  prevBtn.addEventListener('click', () => {
    index = (index - 1 + slides.length) % slides.length;
    updateSlide();
  });

  // Auto-slide (optional)
  setInterval(() => {
    index = (index + 1) % slides.length;
    updateSlide();
  }, 5000);
</script>

<!-- FOR OPEN BERGER MENU -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    const hamburger = document.querySelector(".ud-hamburger-menu");
    const sidePopup = document.querySelector(".ud-side-popup");
    const closeBtn = document.querySelector(".side-popup-close");

    hamburger?.addEventListener("click", () => {
        sidePopup.classList.add("active");
    });

    closeBtn?.addEventListener("click", () => {
        sidePopup.classList.remove("active");
    });
});
</script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const counter = document.getElementById("totalVisitorCount");
    if (!counter) return;

    const start = 100000;
    const end = Number(counter.dataset.target || 0);

    if (!Number.isFinite(end)) return;

    if (end >= start) {
        counter.textContent = end.toLocaleString("en-IN");
        return;
    }

    const duration = 1800;
    const startTime = performance.now();

    function animate(now) {
        const progress = Math.min((now - startTime) / duration, 1);
        const current = Math.ceil(start - (start - end) * progress);
        counter.textContent = current.toLocaleString("en-IN");

        if (progress < 1) {
            requestAnimationFrame(animate);
        } else {
            counter.textContent = end.toLocaleString("en-IN");
        }
    }

    requestAnimationFrame(animate);
});
</script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    var megaItems = document.querySelectorAll(".nav-list .has-mega");
    if (!megaItems.length) return;

    var closeDelay;

    function closeAllMenus() {
        megaItems.forEach(function (item) {
            item.classList.remove("mega-open");
        });
    }

    function openMenu(item) {
        clearTimeout(closeDelay);
        closeAllMenus();
        positionPanel(item);
        item.classList.add("mega-open");
    }

    function scheduleClose(item) {
        clearTimeout(closeDelay);
        closeDelay = setTimeout(function () {
            item.classList.remove("mega-open");
        }, 120);
    }

    megaItems.forEach(function (item) {
        var panel = item.querySelector(".mega-menu");
        if (!panel) return;
        var trigger = item.querySelector("a");

        item.addEventListener("mouseenter", function () {
            openMenu(item);
        });

        item.addEventListener("mouseleave", function () {
            scheduleClose(item);
        });

        item.addEventListener("focusin", function () {
            openMenu(item);
        });

        item.addEventListener("focusout", function (event) {
            if (!item.contains(event.relatedTarget)) {
                scheduleClose(item);
            }
        });

        if (trigger) {
            trigger.addEventListener("click", function (event) {
                event.preventDefault();

                if (item.classList.contains("mega-open")) {
                    item.classList.remove("mega-open");
                    return;
                }

                openMenu(item);
            });
        }
    });

    function positionPanel(item) {
        var panel = item.querySelector(".mega-menu");
        if (!panel) return;

        var header = document.querySelector(".header-menu");
        var headerBottom = 0;

        if (header) {
            var headerRect = header.getBoundingClientRect();
            headerBottom = Math.max(0, headerRect.bottom);
        }

        panel.style.left = "0px";
        panel.style.top = headerBottom + "px";
    }

    function realignOpenMenu() {
        megaItems.forEach(function (item) {
            if (item.classList.contains("mega-open")) {
                positionPanel(item);
            }
        });
    }

    window.addEventListener("resize", realignOpenMenu);
    window.addEventListener("scroll", realignOpenMenu, { passive: true });

    document.addEventListener("keydown", function (event) {
        if (event.key === "Escape") {
            closeAllMenus();
        }
    });

    document.addEventListener("click", function (event) {
        if (!event.target.closest(".nav-list .has-mega")) {
            closeAllMenus();
        }
    });
});
</script>


</body>
</html>
