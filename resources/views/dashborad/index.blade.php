<x-header title="Home - SustainVerse">
    
</x-header>
		<section class="hero-section">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-8">
						@if (!empty($primary_post))
							<div class="primary-hero">
								<a href="{{ route('blog.single',$primary_post->slug)}}">
									<img src="{{ asset($primary_post->image) }}" alt="blog">

									<div class="hero-overlay">
										<h2 class="title">{{ $primary_post->title }}</h2>
										<div class="cat-badge mt-2">
											@foreach ($primary_post->categories->take(4) as $category)
												<span class="category">{{ $category->category_name }}</span>
											@endforeach
										</div>
									</div>
								</a>
							</div>
						@endif
					</div>
					<div class="col-md-4">
						<div class="row">
							<div class="col-md-12">
								@if (!empty($secondary_post))
									<div class="secondary-hero">
										<a href="{{ route('blog.single',$secondary_post->slug)}}">
											<img src="{{ asset($secondary_post->image) }}" alt="blog">

											<div class="hero-overlay">
												<h2 class="title">{{ $secondary_post->title }}</h2>
												<div class="cat-badge mt-2">
													@foreach ($secondary_post->categories->take(4) as $category)
														<span class="category">{{ $category->category_name }}</span>
													@endforeach
												</div>
											</div>
										</a>
									</div>
								@endif
							</div>
							<div class="col-md-12">
							@if ($sections->id == 1)
                                @if (!empty($sections->post_id))
									@foreach ($all_blogs as $blog)
										@if ($sections->post_id == $blog->id)
											<div class="sponser-hero">
												<a href="{{ route('blog.single',$blog->slug)}}">
													<img src="{{ asset($blog->image) }}" alt="blog">
													
													<div class="sponser-overlay">
														<div class="diagonal-box fs-6">SPONSORED</div>
													</div>

													<div class="hero-overlay">
														<h2 class="title">{{ $blog->title }}</h2>
														<div class="cat-badge mt-2">
															@foreach ($blog->categories->take(4) as $category)
																<span class="category">{{ $category->category_name }}</span>
															@endforeach
														</div>
													</div>
												</a>
											</div>
										@endif
									@endforeach
								@endif
							@endif
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<section class="flip-section pt-3">
			<div class="container-fluid">
				<div class="srex-section__head text-center mb-5">
					<h5 class="srex-section__head__badge wow ud-fade-in-up" data-wow-delay="200ms">
						<img
							src="assets/images/badge-icon.svg"
							alt="Badge Icon"
						>
						Our Regional Focus
					</h5>
					<h2 class="srex-section__head__title wow ud-fade-in-up" data-wow-delay="200ms">
						Powering Regions. Shaping Futures.
					</h2>
				</div>
				@php
					$regionalNewsTabs = ($regionalNewsTabs ?? collect())->values();
				@endphp

				@if ($regionalNewsTabs->isNotEmpty())
					<div class="regional-news">
						<ul class="nav nav-pills regional-news__tabs" id="regional-news-tabs" role="tablist">
							@foreach ($regionalNewsTabs as $tab)
								<li class="nav-item" role="presentation">
									<button
										class="nav-link {{ $loop->first ? 'active' : '' }}"
										id="regional-news-{{ $tab['slug'] }}-tab"
										data-bs-toggle="pill"
										data-bs-target="#regional-news-{{ $tab['slug'] }}"
										type="button"
										role="tab"
										aria-controls="regional-news-{{ $tab['slug'] }}"
										aria-selected="{{ $loop->first ? 'true' : 'false' }}"
									>
										<span class="regional-news__tab-icon">
											@if ($tab['icon'])
												<img src="{{ asset($tab['icon']) }}" alt="{{ $tab['label'] }}">
											@else
												<i class="fa-solid fa-calendar-days"></i>
											@endif
										</span>
										<span>{{ $tab['label'] }}</span>
									</button>
								</li>
							@endforeach
						</ul>

						<div class="tab-content regional-news__content" id="regional-news-tab-content">
							@foreach ($regionalNewsTabs as $tab)
								@php
									$categoryUrl = $tab['category']
										? route('blog.category', $tab['category']->category_slug)
										: route('blog.index');
								@endphp
								<div
									class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
									id="regional-news-{{ $tab['slug'] }}"
									role="tabpanel"
									aria-labelledby="regional-news-{{ $tab['slug'] }}-tab"
									tabindex="0"
								>
									<div class="regional-news__panel">
										<div class="regional-news__panel-head">
											<div class="regional-news__title">
												<span class="regional-news__title-icon">
													@if ($tab['icon'])
														<img src="{{ asset($tab['icon']) }}" alt="{{ $tab['label'] }}">
													@else
														<i class="fa-solid fa-calendar-days"></i>
													@endif
												</span>
												<h3>{{ $tab['label'] }}</h3>
											</div>

											<!-- <a href="{{ $categoryUrl }}" class="regional-news__view-link">
												View all <i class="fa-solid fa-chevron-right"></i>
											</a> -->
										</div>

										<div class="regional-news__posts">
											@forelse ($tab['posts'] as $blog)
												<a href="{{ route('blog.single', $blog->slug) }}" class="regional-news__post">
													<span class="regional-news__post-img">
														<img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}">
													</span>
													<span class="regional-news__post-body">
														<span class="regional-news__post-title">{{ $blog->title }}</span>
														<span class="regional-news__post-meta">
															{{ $blog->created_at ? $blog->created_at->diffForHumans() : 'Recently' }}
															<span class="regional-news__dot"></span>
															{{ $tab['label'] }}
														</span>
													</span>
												</a>
											@empty
												<div class="regional-news__empty">
													No posts found for {{ $tab['label'] }} yet.
												</div>
											@endforelse
										</div>

										<a href="{{ $categoryUrl }}" class="regional-news__more">
											View all {{ $tab['label'] }} news <i class="fa-solid fa-chevron-right"></i>
										</a>
									</div>
								</div>
							@endforeach
						</div>
					</div>
				@endif
				<div class="row regional-flip-cards--legacy">
					<div class="col-md-3 d-flex justify-content-center">
						<div class="flip-card mb-3">
							<div class="flip-card-inner">
								<div class="flip-card-front india-card">
									<div class="row">
										<div class="col-md-12 d-flex justify-content-center mb-3">
											<div class="flip-card-icon">
												<img
													src="{{ asset('assets/images/home-one/service/india.png')}}"
													class="srex-info-box__item__logo"
													alt="PowerSun Assistance"
												>
											</div>
										</div>
										<div class="col-md-12 d-flex justify-content-center">
											<h2 class="heading-card-india">
												INDIA
											</h2>
											
										</div>
									</div>
								</div>

								<div class="flip-card-back">
									<ul class="info-list">
										<li class="item">Cultural Diversity</li>
										<li class="item">Rapid Economic Growth</li>
										<li class="item">Democratic Power</li>
										<li class="view-more">
											<a href="{{ route('coming-soon.index') }}">View more →</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-3 d-flex justify-content-center">
						<div class="flip-card mb-3">
							<div class="flip-card-inner">
								<div class="flip-card-front uae-card">
									<div class="row">
										<div class="col-md-12 d-flex justify-content-center mb-3">
											<div class="flip-card-icon">
												<img
													src="{{ asset('assets/images/home-one/service/uae.png')}}"
													class="srex-info-box__item__logo"
													alt="PowerSun Assistance"
												>
											</div>
										</div>
										<div class="col-md-12 d-flex justify-content-center">
											<h2 class="heading-card-uae">
												UAE
											</h2>
										</div>
									</div>
								</div>

								<div class="flip-card-back">
									<ul class="info-list">
										<li class="item">Economic Powerhouse</li>
										<li class="item">Global Innovation Hub</li>
										<li class="item">Cultural Blend</li>
										<li class="view-more">
											<a href="{{ route('coming-soon.index') }}">View more →</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-3 d-flex justify-content-center">
						<div class="flip-card mb-3">
							<div class="flip-card-inner">
								<div class="flip-card-front africa-card">
									<div class="row">
										<div class="col-md-12 d-flex justify-content-center mb-3">
											<div class="flip-card-icon">
												<img
													src="{{ asset('assets/images/home-one/service/africa.png')}}"
													class="srex-info-box__item__logo"
													alt="PowerSun Assistance"
												>
											</div>
										</div>
										<div class="col-md-12 d-flex justify-content-center">
											<h2 class="heading-card-africa">
												AFRICA
											</h2>
										</div>
									</div>
								</div>

								<div class="flip-card-back">
									<ul class="info-list">
										<li class="item">Immense Cultural & Linguistic Diversity</li>
										<li class="item">Rich Natural Resources & Biodiversity</li>
										<li class="item">Fast-Growing Population & Emerging Economies</li>
										<li class="view-more">
											<a href="{{ route('coming-soon.index') }}">View more →</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-3 d-flex justify-content-center">
						<div class="flip-card mb-3">
							<div class="flip-card-inner">
								<div class="flip-card-front asia-card">
									<div class="row">
										<div class="col-md-12 d-flex justify-content-center mb-3">
											<div class="flip-card-icon">
												<img
													src="{{ asset('assets/images/home-one/service/asia.png')}}"
													class="srex-info-box__item__logo"
													alt="PowerSun Assistance"
												>
											</div>
										</div>
										<div class="col-md-12 d-flex justify-content-center">
											<h2 class="heading-card-asia">
												ASIA
											</h2>
										</div>
									</div>
								</div>

								<div class="flip-card-back">
									<ul class="info-list">
										<li class="item">Largest & Most Populated Continent</li>
										<li class="item">Cradle of Ancient Civilizations</li>
										<li class="item">Extreme Geographic Diversity</li>
										<li class="view-more">
											<a href="{{ route('coming-soon.index') }}">View more →</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</section>

		<!-- About US Start-->
		<section class="srex-about-us-one srex-section dashboard-about-us">
			<div class="srex-about-us-one__container">
				<div class="row align-items-center">
					<div class="col-lg-6 col-12">
						<div class="srex-about-us-one__left text-left">
							<div class="srex-section__head">
								<h5 class="srex-section__head__badge wow ud-fade-in-up" data-wow-delay="200ms">
									<img
										src="assets/images/badge-icon.svg"
										alt="Badge Icon"
									>
									About US
								</h5>
								<h2 class="srex-section__head__title wow ud-fade-in-up" data-wow-delay="200ms">
									Powering a Greener Future, One Ray at a Time
								</h2>
								<p class="srex-section__head__desc wow ud-fade-in-up" data-wow-delay="200ms">
									We transform sunlight into sustainable power solutions that help cities grow cleaner, businesses operate smarter, and communities thrive responsibly.
								</p>

								<div class="srex-icon-list wow ud-fade-in-up" data-wow-delay="200ms">
									<ul>
										<li>
											<i class="fa-solid fa-check"></i>
											<p>
												Driving Innovation in Renewable Energy
											</p>
										</li>
										<li>
											<i class="fa-solid fa-check"></i>
											<p>Delivering Smart, Scalable Solar Solutions</p>
										</li>
										<li>
											<i class="fa-solid fa-check"></i>
											<p>
												Building Sustainable Systems for Tomorrow
											</p>
										</li>
									</ul>
								</div>

								<a href="{{ route('coming-soon.index') }}" class="srex-btn srex-btn--outline wow ud-fade-in-up" data-wow-delay="200ms">
									Read More <i class="fa-solid fa-plus"></i>
								</a>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-12 px-0">
						<div class="srex-about-us-one__right">
							<img
								src="assets/images/about-us/about-us.png"
								alt="About Us"
								class="srex-about-us-one__right__img wow ud-fade-in-up" data-wow-delay="200ms"
							>
							<div>
								<div class="srex-about-us-one__right__box d-flex gap-3 wow fadeInUp" data-wow-duration="1.3s">
									<img
										src="assets/images/about-us/medal.png"
										alt="Medal"
									>
									<div class="srex-about-us-one__right__box__text">
										<h2>15+</h2>
										<p>Years of experience</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- About US End-->


		<!-- About US Bottom Start-->
		<section class="srex-section-bottom srex-section">
			<div class="container">
				<div class="row align-items-center justify-content-between">
					<div class="col-lg-6 col-12">
						<div class="srex-section-bottom__left wow ud-fade-in-up" data-wow-delay="200ms">
							<img
								src="assets/images/about-us/Shape.png"
								alt="Shape"
							>
							<img
								class="srex-section-bottom__left__img"
								src="assets/images/about-us/about-us-bottom.png"
								alt="about-us-bottom-img"
							>
						</div>
					</div>
					<div class="col-lg-6 col-12">
						<div class="srex-section-bottom__right">
							<div class="mb-5">
								<h3 class="srex-section-bottom__right__title wow ud-fade-in-up" data-wow-delay="200ms">
									Nature-Powered Solutions for a Sustainable Future
								</h3>
								<p class="srex-section-bottom__right__desc wow ud-fade-in-up" data-wow-delay="300ms">
									We design scalable energy systems that reduce environmental impact while delivering long-term operational efficiency.
								</p>
							</div>
							<div class="srex-icon-list srex-icon-list--multi-text">
								<ul>
									<li class="wow ud-fade-in-up" data-wow-delay="350ms">
										<i class="fa-solid fa-chevron-right"></i>
										<div>
											<h3>Renewable Energy Integration</h3>
											<p>
												We harness clean energy sources like solar and wind to reduce carbon footprints and power progress responsibly. Our systems are designed for efficiency, reliability, and measurable environmental impact.
											</p>
										</div>
									</li>
									<li class="wow ud-fade-in-up" data-wow-delay="400ms">
										<i class="fa-solid fa-chevron-right"></i>
										<div>
											<h3>Smart Environmental Strategies</h3>
											<p>
												Through research, technology, and data-driven planning, we help organizations transition toward greener operations, lower emissions, and smarter resource management.
											</p>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- About US Bottom End-->

<!-- Service Start -->
		<section class="srex-service srex-section">
			<div class="container-fluid">
				<div class="srex-section__head text-center">
					<h5 class="srex-section__head__badge wow ud-fade-in-up" data-wow-delay="200ms">
						<img
							src="assets/images/badge-icon.svg"
							alt="Badge Icon"
						>
						Our Services
					</h5>
					<h2 class="srex-section__head__title wow ud-fade-in-up" data-wow-delay="200ms">
						Unlock the Power of Renewable Energy
					</h2>
				</div>
				<div class="srex-info-box">
					<div class="row">
						<div class="col-md-6 col-lg-3 col-12">
							<div class="srex-info-box__item wow ud-fade-in-up" data-wow-delay="200ms">
								<div
									class="d-flex justify-content-between align-items-center"
								>
									<div class="srex-info-box__item__img">
										<img
											src="assets/images/home-one/service/service-1.svg"
											class="srex-info-box__item__logo"
											alt="PowerSun Assistance"
										>
									</div>
									<h2 class="srex-info-box__item__number">
										01
									</h2>
								</div>
								<h3 class="srex-info-box__item__text">
									PowerSun Assistance
								</h3>
								<div class="srex-info-box__more">
									<a href="{{ route('coming-soon.index') }}"
										>Read More
										<i class="fa-solid fa-arrow-right"></i
									></a>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-lg-3 col-12">
							<div class="srex-info-box__item wow ud-fade-in-up" data-wow-delay="400ms">
								<div
									class="d-flex justify-content-between align-items-center"
								>
									<div class="srex-info-box__item__img">
										<img
										src="assets/images/home-one/service/service-2.svg"
											class="srex-info-box__item__logo"
											alt="PowerSun Assistance"
										>
									</div>
									<h2 class="srex-info-box__item__number">
										02
									</h2>
								</div>
								<h3 class="srex-info-box__item__text">
									SolarEdge Services
								</h3>
								<div class="srex-info-box__more">
									<a href="{{ route('coming-soon.index') }}"
										>Read More
										<i class="fa-solid fa-arrow-right"></i
									></a>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-lg-3 col-12">
							<div class="srex-info-box__item wow ud-fade-in-up" data-wow-delay="600ms">
								<div
									class="d-flex justify-content-between align-items-center"
								>
									<div class="srex-info-box__item__img">
										<img
										src="assets/images/home-one/service/service-3.svg"
											class="srex-info-box__item__logo"
											alt="BrightSun Support"
										>
									</div>
									<h2 class="srex-info-box__item__number">
										03
									</h2>
								</div>
								<h3 class="srex-info-box__item__text">
									BrightSun Support
								</h3>
								<div class="srex-info-box__more">
									<a href="{{ route('coming-soon.index') }}"
										>Read More
										<i class="fa-solid fa-arrow-right"></i
									></a>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-lg-3 col-12">
							<div class="srex-info-box__item wow ud-fade-in-up" data-wow-delay="800ms">
								<div
									class="d-flex justify-content-between align-items-center"
								>
									<div class="srex-info-box__item__img">
										<img
										src="assets/images/home-one/service/service-4.svg"
											class="srex-info-box__item__logo"
											alt="Sun Gust Energy"
										>
									</div>
									<h2 class="srex-info-box__item__number">
										04
									</h2>
								</div>
								<h3 class="srex-info-box__item__text">
									Sun Gust Energy
								</h3>
								<div class="srex-info-box__more">
									<a href="{{ route('coming-soon.index') }}"
										>Read More
										<i class="fa-solid fa-arrow-right"></i
									></a>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-lg-3 col-12">
							<div class="srex-info-box__item wow ud-fade-in-up" data-wow-delay="1s">
								<div
									class="d-flex justify-content-between align-items-center"
								>
									<div class="srex-info-box__item__img">
										<img
										src="assets/images/home-one/service/service-5.svg"
											class="srex-info-box__item__logo"
											alt="WindVista Solutions"
										>
									</div>
									<h2 class="srex-info-box__item__number">
										05
									</h2>
								</div>
								<h3 class="srex-info-box__item__text">
									WindVista Solutions
								</h3>
								<div class="srex-info-box__more">
									<a href="{{ route('coming-soon.index') }}"
										>Read More
										<i class="fa-solid fa-arrow-right"></i
									></a>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-lg-3 col-12">
							<div class="srex-info-box__item wow ud-fade-in-up" data-wow-delay="1.2s">
								<div
									class="d-flex justify-content-between align-items-center"
								>
									<div class="srex-info-box__item__img">
										<img
											src="assets/images/home-one/service/service-6.svg"
											class="srex-info-box__item__logo"
											alt="SolarCrest Services"
										>
									</div>
									<h2 class="srex-info-box__item__number">
										06
									</h2>
								</div>
								<h3 class="srex-info-box__item__text">
									SolarCrest Services
								</h3>
								<div class="srex-info-box__more">
									<a href="{{ route('coming-soon.index') }}"
										>Read More
										<i class="fa-solid fa-arrow-right"></i
									></a>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-lg-3 col-12">
							<div class="srex-info-box__item wow ud-fade-in-up" data-wow-delay="1.2s">
								<div
									class="d-flex justify-content-between align-items-center"
								>
									<div class="srex-info-box__item__img">
										<img
											src="assets/images/home-one/service/service-6.svg"
											class="srex-info-box__item__logo"
											alt="SolarCrest Services"
										>
									</div>
									<h2 class="srex-info-box__item__number">
										07
									</h2>
								</div>
								<h3 class="srex-info-box__item__text">
									SolarCrest Services
								</h3>
								<div class="srex-info-box__more">
									<a href="{{ route('coming-soon.index') }}"
										>Read More
										<i class="fa-solid fa-arrow-right"></i
									></a>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-lg-3 col-12">
							<div class="srex-info-box__item wow ud-fade-in-up" data-wow-delay="1.2s">
								<div
									class="d-flex justify-content-between align-items-center"
								>
									<div class="srex-info-box__item__img">
										<img
											src="assets/images/home-one/service/service-6.svg"
											class="srex-info-box__item__logo"
											alt="SolarCrest Services"
										>
									</div>
									<h2 class="srex-info-box__item__number">
										08
									</h2>
								</div>
								<h3 class="srex-info-box__item__text">
									SolarCrest Services
								</h3>
								<div class="srex-info-box__more">
									<a href="{{ route('coming-soon.index') }}"
										>Read More
										<i class="fa-solid fa-arrow-right"></i
									></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Service End -->

		<!-- CAROUSAL -->
		<section class="srex-hero-one energy-bg mb-4">
			<div class="owl-carousel owl-theme energy-carousel">
				@foreach ($random_blogs as $random)
					<div class="item d-flex justify-content-center">
						<div class="home-blog-card">
							<div class="card-img energy-card">
								<a href="{{ route('blog.single',$random->slug)}}">
									<img src="{{ asset($random->image) }}" alt="blog">
									<div class="energy-card__overlay">
										@foreach ($random->categories->take(1) as $category)
											<span class="ms-1">{{ $category->category_name }}</span>
										@endforeach
									</div>
								</a>
							</div>

							<div class="home-card-content">
								<div class="title-box">
									<h3 class="title">
										<a href="{{ route('blog.single',$random->slug)}}">
											{{ $random->title }}
										</a>
									</h3>
								</div>
							</div>
						</div>
					</div>
				@endforeach
				
			</div>
		</section>
		
		<!-- Features Start -->
		<section class="srex-features srex-section">
			<div class="container">
				<div class="row justify-content-between">
					<div class="col-lg-6 col-12">
						<div class="srex-features__left text-left">
							<div class="srex-section__head">
								<h5 class="srex-section__head__badge wow ud-fade-in-up" data-wow-delay="200ms">
									<img
										src="assets/images/badge-icon.svg"
										alt="Badge Icon"
									>
									Our Features
								</h5>
								<h2 class="srex-section__head__title wow ud-fade-in-up" data-wow-delay="250ms">
									Driving Sustainable Innovation Across Industries
								</h2>
								<p class="mb-5  wow ud-fade-in-up" data-wow-delay="200ms">
									At SustainVerse, we go beyond renewable energy. We build intelligent, eco-conscious solutions that help businesses operate responsibly, reduce environmental impact, and create long-term value for communities and the planet.
								</p>
								<a href="{{ route('coming-soon.index') }}" class="srex-btn srex-btn--outline wow ud-fade-in-up" data-wow-delay="200ms">
									Read More <i class="fa-solid fa-plus"></i>
								</a>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-12">
						<div class="srex-info-box srex-info-box--feature-box">
							<div class="row">
								<div class="col-md-6 col-12">
									<div class="srex-info-box__item wow ud-fade-in-up" data-wow-duration="1s">
										<div
											class="d-flex justify-content-between align-items-center"
										>
											<div
												class="srex-info-box__item__img"
											>
												<img
													src="assets/images/home-one/features/features-1.svg"
													class="srex-info-box__item__logo"
													alt="GreenSun Support"
												>
											</div>
										</div>
										<h3 class="srex-info-box__item__text">
											GreenSun Support
										</h3>
										<p class="mb-3">
											provides reliable, efficient solutions for sustainable customer assistance.
										</p>
										<div class="srex-info-box__more">
											<a href="{{ route('coming-soon.index') }}"
												>Read More
												<i
													class="fa-solid fa-arrow-right"
												></i>
											</a>
										</div>
									</div>
								</div>
								<div class="col-md-6 col-12">
									<div class="srex-info-box__item wow ud-fade-in-up" data-wow-duration="1.3s">
										<div
											class="d-flex justify-content-between align-items-center"
										>
											<div
												class="srex-info-box__item__img"
											>
												<img
												src="assets/images/home-one/features/features-2.svg"
													class="srex-info-box__item__logo"
													alt="BrightSun Support"
												>
											</div>
										</div>
										<h3 class="srex-info-box__item__text">
											BrightSun Support
										</h3>
										<p class="mb-3">
											delivers fast, friendly, and dependable customer service solutions.
										</p>
										<div class="srex-info-box__more">
											<a href="{{ route('coming-soon.index') }}"
												>Read More
												<i
													class="fa-solid fa-arrow-right"
												></i
											></a>
										</div>
									</div>
								</div>
								<div class="col-md-6 col-12">
									<div class="srex-info-box__item wow ud-fade-in-up" data-wow-duration="1.6s">
										<div
											class="d-flex justify-content-between align-items-center"
										>
											<div
												class="srex-info-box__item__img"
											>
												<img
												src="assets/images/home-one/features/features-3.svg"
													class="srex-info-box__item__logo"
													alt="SolarPro Solutions"
												>
											</div>
										</div>
										<h3 class="srex-info-box__item__text">
											SolarPro Solutions
										</h3>
										<p class="mb-3">
											delivers efficient, innovative, and reliable solar energy services.
										</p>
										<div class="srex-info-box__more">
											<a href="{{ route('coming-soon.index') }}"
												>Read More
												<i
													class="fa-solid fa-arrow-right"
												></i
											></a>
										</div>
									</div>
								</div>
								<div class="col-md-6 col-12">
									<div class="srex-info-box__item wow ud-fade-in-up" data-wow-duration="1.9s">
										<div
											class="d-flex justify-content-between align-items-center"
										>
											<div
												class="srex-info-box__item__img"
											>
												<img
												src="assets/images/home-one/features/features-4.svg"
													class="srex-info-box__item__logo"
													alt="EcoSolar Services"
												>
											</div>
										</div>
										<h3 class="srex-info-box__item__text">
											EcoSolar Services
										</h3>
										<p class="mb-3">
											provides clean, efficient, and sustainable solar energy solutions.
										</p>
										<div class="srex-info-box__more">
											<a href="{{ route('coming-soon.index') }}"
												>Read More
												<i
													class="fa-solid fa-arrow-right"
												></i
											></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Features End -->


		<!-- Video Section Start -->
		<div class="srex-video srex-section">
			<div class="container-fluid">
				<div class="srex-video__box wow ud-fade-in-up" data-wow-delay="200ms">
					<a
						href="https://www.youtube.com/watch?v=bYsgGkKksvs"
						class="srex-video__play__btn popup-video"
					>
						<i class="fa-solid fa-play"></i>
					</a>
					<img src="assets/images/video-section-2.png" alt="Video" style="width: 100%;">
				</div>
			</div>
		</div>
		<!-- Video Section End -->


		<!-- Contact Section Start -->
		<section class="srex-contact srex-section" id="contact-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-12">
						<div class="srex-contact__left wow ud-fade-in-up" data-wow-duration="1.3s">
							<form action="">
								<div class="row justify-content-center">
									<div class="col-md-6 col-12">
										<input name="full-name" placeholder="Your Name" type="text" required>
									</div>
									<div class="col-md-6 col-12">
										<input name="email" placeholder="Email Address" type="text" required>
									</div>
								</div>
								<div>
									<input placeholder="Your Phone" type="text" name="phone" required>
								</div>
								<div>
									<textarea placeholder="Your Message" id="message" rows="5" name="message" required></textarea>
								</div>
								<div>
									<button type="button" class="srex-btn srex-btn--secondary">
										Submit Now
										<i class="fa-solid fa-arrow-right"></i>
									</button>
								</div>
							</form>
						</div>
					</div>
					<div class="col-lg-6 col-12">
						<div class="srex-contact__right mt-5">
							<div class="srex-section__head">
								<h5 class="srex-section__head__badge wow ud-fade-in-up" data-wow-delay="200ms">
									<img
										src="assets/images/badge-icon.svg"
										alt="Badge Icon"
									>
									Contact Us
								</h5>
								<h2 class="srex-section__head__title wow ud-fade-in-up" data-wow-delay="200ms">Let’s Build a Sustainable Future Together</h2>
								<p class="mt-2 mb-4 wow ud-fade-in-up" data-wow-duration="2.2s">
									Whether you're an organization seeking sustainable transformation, a startup with a green idea, or a community looking to collaborate, SustainVerse is here to connect, guide, and support. Reach out to us and let’s turn responsible innovation into measurable impact.
									<br>
									We believe meaningful change begins with conversation. Share your goals, questions, or partnership ideas, and our team will respond with clarity and purpose. 
								</p>

								<div class="srex-icon-list">
									<ul>
										<li class="wow ud-fade-in-up" data-wow-delay="200ms">
											<i class="fa-solid fa-phone"></i>
											<h4>
												<a href="tel:+919876543210"
													>+91 9876543210</a
												>
											</h4>
										</li>
										<li class="wow ud-fade-in-up" data-wow-delay="200ms">
											<i class="fa-solid fa-envelope"></i>
											<h4>
												<a href="https://ultradevs.com/cdn-cgi/l/email-protection#3f565159507f5a475e524f535a115c5052"><span class="__cf_email__" data-cfemail="4f262129200f2a372e223f232a612c2022">[email&#160;protected]</span></a
												>
											</h4>
										</li>
										<li class="wow ud-fade-in-up" data-wow-delay="200ms">
											<i class="fa-solid fa-location-dot"></i>
											<div style="text-align: start;">
												<h4>
												Shrachi EK Tower, EKT/5/Office-B,
												Newtown, Kolkata, West Bengal 700161
												</h4>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Contact Section End -->


		<!--  Latest PortFolio Start -->
		<section class="srex-portfolio srex-section">
			<div class="container-fluid">
				<div class="srex-portfolio__title">
					<div class="srex-section__head wow ud-fade-in-up" data-wow-delay="200ms">
						<h5 class="srex-section__head__badge">
							<img
								src="assets/images/badge-icon.svg"
								alt="Badge Icon"
							>
							Latest portfolio
						</h5>
						<h2 class="srex-section__head__title">
							Sustainable Innovations in Action
						</h2>
					</div>
				</div>
				<div class="controls wow ud-fade-in-up" data-wow-delay="200ms">
					<ul id="filters">
						<li class="filter active" data-filter="all">All</li>
						<li class="filter" data-filter=".power">Eco Cities</li>
						<li class="filter" data-filter=".eco-solar">
							Research
						</li>
						<li class="filter" data-filter=".solar-pro">
							Biodiversity
						</li>
						<li class="filter" data-filter=".energy">Security</li>
					</ul>
				</div>
				<div class="row" id="srex-ho-filter">
					<div class="col-md-6 col-lg-4 col-xl-3 col-12 filter-item solar-pro">
						<a href="{{ route('coming-soon.index') }}">
							<div class="srex-portfolio__item wow ud-fade-in-up" data-wow-delay="200ms">
								<img
									src="assets/images/portfolio/portfolio-1.png"
									alt="portfolio-1"
								>
								<div class="srex-portfolio__item__title">
									<h2>01</h2>
									<h3>Smart Eco Cities</h3>
								</div>
							</div>
						</a>
					</div>
					<div class="col-md-6 col-lg-4 col-xl-3 col-12 filter-item power">
						<a href="{{ route('coming-soon.index') }}">
							<div class="srex-portfolio__item wow ud-fade-in-up" data-wow-delay="200ms">
								<img
									src="assets/images/portfolio/portfolio-2.png"
									alt="portfolio-1"
								>
								<div class="srex-portfolio__item__title">
									<h2>02</h2>
									<h3>Knowledge & Research Hub</h3>
								</div>
							</div>
						</a>
					</div>
					<div class="col-md-6 col-lg-4 col-xl-3 col-12 filter-item eco-solar">
						<a href="{{ route('coming-soon.index') }}">
							<div class="srex-portfolio__item wow ud-fade-in-up" data-wow-delay="200ms">
								<img
									src="assets/images/portfolio/portfolio-3.png"
									alt="portfolio-1"
								>
								<div class="srex-portfolio__item__title">
									<h2>03</h2>
									<h3>Biodiversity Initiatives</h3>
								</div>
							</div>
						</a>
					</div>
					<div class="col-md-6 col-lg-4 col-xl-3 col-12 filter-item energy">
						<a href="{{ route('coming-soon.index') }}">
							<div class="srex-portfolio__item wow ud-fade-in-up" data-wow-delay="200ms">
								<img
									src="assets/images/portfolio/portfolio-4.png"
									alt="portfolio-1"
								>
								<div class="srex-portfolio__item__title">
									<h2>04</h2>
									<h3>Resource Security & Sustainability</h3>
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</section>
		<!--  Latest PortFolio End -->


		<!-- Sponsor Section Start -->
		<div class="srex-sponsor srex-section">
			<div class="container">
				<div class="srex-sponsor__items wow fadeInUp" data-wow-duration="1.5s">
					<a href="{{ route('coming-soon.index') }}" class="zirox-brand__items-item">
						<img src="assets/images/sponsor/sponsor-2.png" alt="Envato">
					</a>
					<a href="{{ route('coming-soon.index') }}" class="zirox-brand__items-item">
						<img src="assets/images/sponsor/sponsor-3.png" alt="Envato">
					</a>
					<a href="{{ route('coming-soon.index') }}" class="zirox-brand__items-item">
						<img src="assets/images/sponsor/sponsor-4.png" alt="Envato">
					</a>
					<a href="{{ route('coming-soon.index') }}" class="zirox-brand__items-item">
						<img src="assets/images/sponsor/sponsor-2.png" alt="Envato">
					</a>
					<a href="{{ route('coming-soon.index') }}" class="zirox-brand__items-item">
						<img src="assets/images/sponsor/sponsor-3.png" alt="Envato">
					</a>
					<a href="{{ route('coming-soon.index') }}" class="zirox-brand__items-item">
						<img src="assets/images/sponsor/sponsor-4.png" alt="Envato">
					</a>
				</div>
			</div>
		</div>
		<!-- Sponsor Section End -->


		<!-- Question Section Start -->
		<section class="srex-question srex-section" id="faq-section">
			<div class="container">
				<div class="srex-question__title">
					<div class="srex-section__head wow ud-fade-in-up" data-wow-delay="200ms">
						<h5 class="srex-section__head__badge">
							Frequently Asked Questions
						</h5>
						<h2 class="srex-section__head__title">
							Got Questions? We’ve Got Answers.
						</h2>
						<p class="mb-5 mt-3">
							It is a long established fact that a reader will be
							distracted by the readable content of a page when
							looking at its layout
						</p>
					</div>
				</div>
				<div class="row">
					<div class="col-12 col-lg-6">
						<div class="srex-question__left">
							<img
								src="assets/images/question/question.png"
								alt="Question_img"
							>
						</div>
					</div>
					<div class="col-12 col-lg-6">
						<div class="srex-question__right wow ud-fade-in-up" data-wow-duration="1.7s">
							<div class="srex-accordion accordion" id="faq">
								<div class="accordion-item">
									<div class="accordion-header">
										<div class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" role="button">
											<div class="accordion-header__left">
												<p class="accordion-header__left__badge">01</p>
												<h3>What is equality and solidarity?</h3>
											</div>
											<i class="fa-solid fa-angle-down open"></i>
											<i class="fa-solid fa-angle-up close"></i>
										</div>
									</div>
									<div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#faq">
										<div class="accordion-body">
											The generated is therefore always free from repetition, injected humour, or words etc.
										</div>
									</div>
								</div>
								<div class="accordion-item">
									<div class="accordion-header">
										<div class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" role="button">
											<div class="accordion-header__left">
												<p class="accordion-header__left__badge">02</p>
												<h3>How to inspire humanity?</h3>
											</div>
											<i class="fa-solid fa-angle-down open"></i>
											<i class="fa-solid fa-angle-up close"></i>
										</div>
									</div>
									<div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faq">
										<div class="accordion-body">
											The generated is therefore always free from repetition, injected humour, or words etc.
										</div>
									</div>
								</div>
								<div class="accordion-item">
									<div class="accordion-header">
										<div class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseTwo" role="button">
											<div class="accordion-header__left">
												<p class="accordion-header__left__badge">03</p>
												<h3>Where are better living programs?</h3>
											</div>
											<i class="fa-solid fa-angle-down open"></i>
											<i class="fa-solid fa-angle-up close"></i>
										</div>
									</div>
									<div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faq">
										<div class="accordion-body">
											The generated is therefore always free from repetition, injected humour, or words etc.
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Question Section End -->

		<!-- NewsLetter Section Start -->
		<section class="srex-news-letter srex-section">
			<div class="container">
				<div class="srex-news-letter__box wow ud-fade-in-up" data-wow-delay="200ms">
					<div class="row">
						<div class="col-lg-6 col-12">
							<div class="srex-news-letter__box__left">
									<img
										src="assets/images/home-one/letter/news-letter-icon.svg"
										class="srex-info-box__item__logo"
										alt="NewsLetter"
									>
									<h3>Subscribe to Our Newsletter</h3>
							</div>
						</div>
						<div class="col-lg-6 col-12">
							<div class="srex-news-letter__box__right">
									<form class="text-center">
										<input placeholder="Enter your email" type="text">
									<button type="button" class="srex-btn srex-btn--primary">
										Subscribe <i class="fa-solid fa-plus"></i>
									</button>
									</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- NewsLetter Section End -->

		<!-- Stats Section Start -->
		<div class="srex-stats srex-section">
			<div class="container">
				<div class="srex-stats__items wow ud-fade-in-up" data-wow-duration="1.3s">
					<div class="row">
						<div class="col-md-6 col-lg-3 col-12">
							<div class="srex-stats__item">
								<div class="srex-stats__item__icon">
									<img
										src="assets/images/home-one/stats/awards.svg"
										alt="Winning Awards"
									>
								</div>
								<div class="srex-stats__item__text">
									<h2><span class="counter">20</span>+</h2>
									<h3>Awards Won</h3>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-lg-3 col-12">
							<div class="srex-stats__item">
								<div class="srex-stats__item__icon">
									<img
										src="assets/images/home-one/stats/projects.svg"
										alt="Completed Projects"
									>
								</div>
								<div class="srex-stats__item__text">
									<h2><span class="counter">10</span>K+</h2>
									<h3>Completed Projects</h3>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-lg-3 col-12">
							<div class="srex-stats__item">
								<div class="srex-stats__item__icon">
									<img
										src="assets/images/home-one/stats/members.svg"
										alt="Team members"
									>
								</div>
								<div class="srex-stats__item__text">
									<h2><span class="counter">300</span>+</h2>
									<h3>Team Members</h3>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-lg-3 col-12">
							<div class="srex-stats__item">
								<div class="srex-stats__item__icon">
									<img
										src="assets/images/home-one/stats/clients.svg"
										alt="Clients Review"
									>
								</div>
								<div class="srex-stats__item__text">
									<h2><span class="counter">900</span>+</h2>
									<h3>Client Reviews</h3>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Stats Section End -->

		<!-- Testimonial Section Start-->
		<section class="srex-testimonial-one srex-section">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-7 col-12">
						<div class="srex-testimonial-one__left text-left">
							<div class="srex-section__head">
								<h2 class="srex-section__head__title wow fadeInLeft" data-wow-duration="0.6s">
									What our clients say? 
								</h2>
							</div>

							<div class="srex-testimonial-one__slider wow ud-fade-in-up" data-wow-delay="200ms">
								<div class="srex-testimonial-one__slider__item">
									<img
										src="assets/images/quote.svg"
										alt="Quote"
										class="srex-testimonial-one__slider__item__quote"
									>
									<p class="srex-testimonial-one__slider__item__text">
										“Partnering with SustainVerse has completely transformed how we approach energy consumption. Their solar solutions are not only efficient but also scalable for growing businesses. We’ve significantly reduced our operational costs while contributing to a cleaner environment.”
									</p>
									<div class="srex-testimonial-one__slider__item__author">
										<h3>Arjun Mehta</h3>
										<p>Operations Director, GreenGrid Solutions Pvt. Ltd.</p>
									</div>
								</div>

								<div class="srex-testimonial-one__slider__item">
									<img
										src="assets/images/quote.svg"
										alt="Quote"
										class="srex-testimonial-one__slider__item__quote"
									>
									<p class="srex-testimonial-one__slider__item__text">
										“SustainVerse brought reliable and sustainable power to our community project. Their expertise in solar installations and long-term support has empowered us to operate independently and sustainably.”
									</p>
									<div class="srex-testimonial-one__slider__item__author">
										<h3>Kwame Ndlovu</h3>
										<p>Project Manager, EcoRise Community Initiative</p>
									</div>
								</div>

								<div class="srex-testimonial-one__slider__item">
									<img
										src="assets/images/quote.svg"
										alt="Quote"
										class="srex-testimonial-one__slider__item__quote"
									>
									<p class="srex-testimonial-one__slider__item__text">
										“The team at SustainVerse truly understands the future of renewable energy. Their innovative approach and commitment to sustainability helped us transition seamlessly to clean energy without disrupting our operations.”
									</p>
									<div class="srex-testimonial-one__slider__item__author">
										<h3>Priyanka Banerjee</h3>
										<p>Head of Sustainability, UrbanEco Developments</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-5 col-12">
						<div class="srex-testimonial-one__right">
							<img
								src="assets/images/home-one/testimonial/testimonial-right.png"
								alt="Testimonial"
								class="srex-testimonial-one__right__img"
							>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Testimonial Section End-->


		<!-- Blog Section Start-->
		<section class="srex-blog-one srex-section">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="srex-blog-one__title">
							<div class="srex-section__head wow ud-fade-in-left" data-wow-delay="200ms">
								<h5 class="srex-section__head__badge">
									<img
										src="assets/images/badge-icon.svg"
										alt="Badge Icon"
									>
									Blog & News
								</h5>
								<h2 class="srex-section__head__title">
									The Renewable Revolution Begins Here
								</h2>
							</div>
							<a href="{{ route('blog.index') }}" class="srex-btn srex-btn--primary wow ud-fade-in-right" data-wow-delay="200ms">
								More Blogs <i class="fa-solid fa-plus"></i>
							</a>
						</div>
					</div>
					@foreach ($section_blogs as $blog)
						<div class="col-12 col-lg-4 col-md-6">
							<div class="srex-blog-one__post wow ud-fade-in-up" data-wow-delay="{{ 250 + ($loop->index * 150) }}ms">
								<a href="{{ route('blog.single', $blog->slug) }}" class="srex-blog-one__post__img">
									<img
										src="{{ asset($blog->image) }}"
										alt="{{ $blog->title }}"
										style="height: 300px;"
									>
								</a>
								<div class="d-flex gap-5 mt-2">
									<div class="d-flex align-items-center gap-2">
										<i class="fa-solid fa-calendar-alt"></i>
										<h6>{{ $blog->created_at->format('F d, Y') }}</h6>
									</div>
									<div class="d-flex align-items-center gap-2">
										<i class="fa-solid fa-user-alt"></i>
										<h6>{{ $blog->author ?? 'Admin' }}</h6>
									</div>
								</div>
								<h3>
									<a href="{{ route('blog.single', $blog->slug) }}">
										{{ \Illuminate\Support\Str::limit($blog->title, 55) }}
									</a>
								</h3>
								<a href="{{ route('blog.single', $blog->slug) }}" class="srex-btn srex-btn--outline">
									Read More<i class="fa-solid fa-plus"></i>
								</a>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</section>
		<!-- Blog Section End-->

		<x-footer>  
        </x-footer>
