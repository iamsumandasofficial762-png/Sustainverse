<x-header title="EcoSystem - SustainVerse">

</x-header>

@php
    $cardImage = asset('assets/images/home-three/we-provide/stock-vector-green-alternative-renewable-energy-green-eco-friendly-nature-landscape-background.jpg');
@endphp

<section class="section-top">
    <div class="container">
        <div class="col-lg-10 offset-lg-1 text-center">
            <div class="section-top-title">
                <h1>Our Ecosystem</h1>
                <ul>
                    <li><a href="{{ route('dashboard.index') }}">Home</a></li>
                    <li> > <a href="{{ route('ecosystem.index') }}">our-ecosystem</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="split-hero ecosystem-stories">
    <div class="container px-3 px-md-5 my-4">
        <div class="row align-items-center">
            <div class="col-12">
                <div class="srex-section__head srex-section__head--mw wow ud-fade-in-up" data-wow-delay="200ms">
                    <h5 class="srex-section__head__badge fs-2">
                        Our
                    </h5>
                    <h2 class="srex-section__head__title">
                        Eco systems
                    </h2>
                </div>
            </div>
        </div>

        <div class="row ecosystem-card-list">
            <div class="col-12 mb-5">
                <article class="eco-card wow ud-fade-in-left" data-wow-duration="0.9s" id="circular-economy-revolution">
                    <div class="row g-0 align-items-stretch">
                        <div class="col-12 col-lg-7 order-2 order-lg-1">
                            <div class="eco-content-card">
                                <div class="eco-card__eyebrow">
                                    <i class="fa-solid fa-leaf"></i>
                                    <span>Our Ecosystem</span>
                                </div>
                                <h3 class="content-title">The Circular Economy Revolution</h3>
                                <div class="content-box">
                                    <p>Waste is being reimagined as a resource, from ocean plastic transformed into high-end apparel to electronic waste reshaped into jewelry and industrial components.</p>
                                    <p class="eco-card__full-text">This story explores how circular economy thinking changes the meaning of waste. It highlights companies transforming recovered ocean plastic into premium apparel, converting electronic waste into jewelry, and recovering valuable materials for industrial components instead of sending them to landfill.</p>
                                </div>
                                <button class="read-more-btn" type="button" aria-expanded="false">
                                    <span class="read-more-btn__text">READ MORE</span>
                                    <i class="fa-solid fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-12 col-lg-5 order-1 order-lg-2">
                            <div class="eco-image-card">
                                <img src="{{ asset('assets/images/our-eco/circular-economy.jpeg') }}" alt="The Circular Economy Revolution">
                            </div>
                        </div>
                    </div>
                </article>
            </div>

            <div class="col-12 mb-5">
                <article class="eco-card wow ud-fade-in-right" data-wow-duration="0.9s" id="green-architecture-smart-urban-spaces">
                    <div class="row g-0 align-items-stretch">
                        <div class="col-12 col-lg-7 order-2 order-lg-2">
                            <div class="eco-content-card">
                                <div class="eco-card__eyebrow">
                                    <i class="fa-solid fa-leaf"></i>
                                    <span>Our Ecosystem</span>
                                </div>
                                <h3 class="content-title">Green Architecture & Smart Urban Spaces</h3>
                                <div class="content-box">
                                    <p>Living buildings, smart glass, and vertical forests are reshaping cities into cleaner spaces that generate energy, reduce cooling loads, and improve air quality.</p>
                                    <p class="eco-card__full-text">This story focuses on buildings and cities designed to work with nature. It covers living buildings that generate their own energy, smart glass that responds to sunlight to reduce electricity use, and urban planning ideas like vertical forests that help clean city air.</p>
                                </div>
                                <button class="read-more-btn" type="button" aria-expanded="false">
                                    <span class="read-more-btn__text">READ MORE</span>
                                    <i class="fa-solid fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-12 col-lg-5 order-1 order-lg-1">
                            <div class="eco-image-card">
                                <img src="{{ asset('assets/images/our-eco/green-archi.jpeg') }}" alt="Green Architecture & Smart Urban Spaces">
                            </div>
                        </div>
                    </div>
                </article>
            </div>

            <div class="col-12 mb-5">
                <article class="eco-card wow ud-fade-in-left" data-wow-duration="0.9s" id="future-of-agri-tech">
                    <div class="row g-0 align-items-stretch">
                        <div class="col-12 col-lg-7 order-2 order-lg-1">
                            <div class="eco-content-card">
                                <div class="eco-card__eyebrow">
                                    <i class="fa-solid fa-leaf"></i>
                                    <span>Our Ecosystem</span>
                                </div>
                                <h3 class="content-title">The Future of Agri-Tech</h3>
                                <div class="content-box">
                                    <p>AI-driven precision farming, vertical indoor farms that use up to 95% less water, and lab-grown or plant-based alternatives are strengthening food security.</p>
                                    <p class="eco-card__full-text">This story explores how technology is future-proofing food security. It looks at AI-driven precision farming, vertical indoor farms that can use up to 95% less water, and the growth of lab-grown and plant-based alternatives as climate pressure increases.</p>
                                </div>
                                <button class="read-more-btn" type="button" aria-expanded="false">
                                    <span class="read-more-btn__text">READ MORE</span>
                                    <i class="fa-solid fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-12 col-lg-5 order-1 order-lg-2">
                            <div class="eco-image-card">
                                <img src="{{ asset('assets/images/our-eco/agri-tech.jpeg') }}" alt="The Future of Agri-Tech">
                            </div>
                        </div>
                    </div>
                </article>
            </div>

            <div class="col-12 mb-5">
                <article class="eco-card wow ud-fade-in-right" data-wow-duration="0.9s" id="renewable-energy-beyond-the-grid">
                    <div class="row g-0 align-items-stretch">
                        <div class="col-12 col-lg-7 order-2 order-lg-2">
                            <div class="eco-content-card">
                                <div class="eco-card__eyebrow">
                                    <i class="fa-solid fa-leaf"></i>
                                    <span>Our Ecosystem</span>
                                </div>
                                <h3 class="content-title">Renewable Energy: Beyond the Grid</h3>
                                <div class="content-box">
                                    <p>Emerging solutions such as green hydrogen, tidal energy, and long-duration battery storage are helping renewable power work even when sunlight and wind fluctuate.</p>
                                    <p class="eco-card__full-text">This story moves beyond familiar solar and wind narratives to emerging clean energy systems. It explains green hydrogen, tidal energy, and long-duration battery storage, especially how storage solves the question of what happens when the sun does not shine or the wind drops.</p>
                                </div>
                                <button class="read-more-btn" type="button" aria-expanded="false">
                                    <span class="read-more-btn__text">READ MORE</span>
                                    <i class="fa-solid fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-12 col-lg-5 order-1 order-lg-1">
                            <div class="eco-image-card">
                                <img src="{{ asset('assets/images/our-eco/renewable-energy.jpeg') }}" alt="Renewable Energy: Beyond the Grid">
                            </div>
                        </div>
                    </div>
                </article>
            </div>

            <div class="col-12 mb-5">
                <article class="eco-card wow ud-fade-in-left" data-wow-duration="0.9s" id="conscious-fashion">
                    <div class="row g-0 align-items-stretch">
                        <div class="col-12 col-lg-7 order-2 order-lg-1">
                            <div class="eco-content-card">
                                <div class="eco-card__eyebrow">
                                    <i class="fa-solid fa-leaf"></i>
                                    <span>Our Ecosystem</span>
                                </div>
                                <h3 class="content-title">Conscious Fashion: The End of Fast Trends</h3>
                                <div class="content-box">
                                    <p>Slow fashion is rising through materials like mycelium leather and pineapple-leaf fabrics, while blockchain helps track garment ethics across the supply chain.</p>
                                    <p class="eco-card__full-text">This story features the shift from fast trends to conscious fashion. It covers innovative materials such as mushroom leather, also called mycelium, fabrics made from pineapple leaves, and blockchain tools that help verify ethics across a garment supply chain.</p>
                                </div>
                                <button class="read-more-btn" type="button" aria-expanded="false">
                                    <span class="read-more-btn__text">READ MORE</span>
                                    <i class="fa-solid fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-12 col-lg-5 order-1 order-lg-2">
                            <div class="eco-image-card">
                                <img src="{{ asset('assets/images/our-eco/conc-fashion.jpeg') }}" alt="Conscious Fashion: The End of Fast Trends">
                            </div>
                        </div>
                    </div>
                </article>
            </div>

            <div class="col-12 mb-5">
                <article class="eco-card wow ud-fade-in-right" data-wow-duration="0.9s" id="path-to-net-zero-corporate-strategy">
                    <div class="row g-0 align-items-stretch">
                        <div class="col-12 col-lg-7 order-2 order-lg-2">
                            <div class="eco-content-card">
                                <div class="eco-card__eyebrow">
                                    <i class="fa-solid fa-leaf"></i>
                                    <span>Our Ecosystem</span>
                                </div>
                                <h3 class="content-title">The Path to Net-Zero: Corporate Strategy</h3>
                                <div class="content-box">
                                    <p>Industries are moving toward carbon neutrality through ESG accountability, carbon offsetting, and carbon capture technologies that address emissions at different stages.</p>
                                    <p class="eco-card__full-text">This story analyzes how global industries are moving toward carbon neutrality. It explains the difference between carbon offsetting and carbon capture technology, and shows how businesses are being held accountable through ESG standards and reporting expectations.</p>
                                </div>
                                <button class="read-more-btn" type="button" aria-expanded="false">
                                    <span class="read-more-btn__text">READ MORE</span>
                                    <i class="fa-solid fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-12 col-lg-5 order-1 order-lg-1">
                            <div class="eco-image-card">
                                <img src="{{ asset('assets/images/our-eco/path-net-zero.jpeg') }}" alt="The Path to Net-Zero: Corporate Strategy">
                            </div>
                        </div>
                    </div>
                </article>
            </div>

            <div class="col-12 mb-5">
                <article class="eco-card wow ud-fade-in-left" data-wow-duration="0.9s" id="clean-mobility-ev-ecosystem">
                    <div class="row g-0 align-items-stretch">
                        <div class="col-12 col-lg-7 order-2 order-lg-1">
                            <div class="eco-content-card">
                                <div class="eco-card__eyebrow">
                                    <i class="fa-solid fa-leaf"></i>
                                    <span>Our Ecosystem</span>
                                </div>
                                <h3 class="content-title">Clean Mobility & The EV Ecosystem</h3>
                                <div class="content-box">
                                    <p>The mobility transition now includes solid-state batteries, solar-powered public transit, and sustainable aviation fuels that extend clean transport beyond cars.</p>
                                    <p class="eco-card__full-text">This story looks beyond electric cars to the wider clean mobility ecosystem. It includes innovation in solid-state batteries, solar-powered public transit, charging networks, and sustainable aviation fuels that can reduce emissions in hard-to-electrify transport.</p>
                                </div>
                                <button class="read-more-btn" type="button" aria-expanded="false">
                                    <span class="read-more-btn__text">READ MORE</span>
                                    <i class="fa-solid fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-12 col-lg-5 order-1 order-lg-2">
                            <div class="eco-image-card">
                                <img src="{{ asset('assets/images/our-eco/Whatsclean-mobility.jpeg') }}" alt="Clean Mobility & The EV Ecosystem">
                            </div>
                        </div>
                    </div>
                </article>
            </div>

            <div class="col-12 mb-5">
                <article class="eco-card wow ud-fade-in-right" data-wow-duration="0.9s" id="blue-economy-sustaining-our-oceans">
                    <div class="row g-0 align-items-stretch">
                        <div class="col-12 col-lg-7 order-2 order-lg-2">
                            <div class="eco-content-card">
                                <div class="eco-card__eyebrow">
                                    <i class="fa-solid fa-leaf"></i>
                                    <span>Our Ecosystem</span>
                                </div>
                                <h3 class="content-title">Blue Economy: Sustaining Our Oceans</h3>
                                <div class="content-box">
                                    <p>Autonomous harbor-cleaning systems and seaweed farming show how ocean conservation can remove waste, store carbon, and support sustainable coastal livelihoods.</p>
                                    <p class="eco-card__full-text">This story highlights technology-driven ocean conservation. It covers autonomous trash-bots that clean harbors, seaweed farming as a natural carbon sink, and how ocean-based sustainability can create livelihoods for coastal communities.</p>
                                </div>
                                <button class="read-more-btn" type="button" aria-expanded="false">
                                    <span class="read-more-btn__text">READ MORE</span>
                                    <i class="fa-solid fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-12 col-lg-5 order-1 order-lg-1">
                            <div class="eco-image-card">
                                <img src="{{ asset('assets/images/our-eco/blue-economy.jpeg') }}" alt="Blue Economy: Sustaining Our Oceans">
                            </div>
                        </div>
                    </div>
                </article>
            </div>

            <div class="col-12 mb-5">
                <article class="eco-card wow ud-fade-in-left" data-wow-duration="0.9s" id="tech-for-good-ai-big-data">
                    <div class="row g-0 align-items-stretch">
                        <div class="col-12 col-lg-7 order-2 order-lg-1">
                            <div class="eco-content-card">
                                <div class="eco-card__eyebrow">
                                    <i class="fa-solid fa-leaf"></i>
                                    <span>Our Ecosystem</span>
                                </div>
                                <h3 class="content-title">Tech for Good: AI & Big Data</h3>
                                <div class="content-box">
                                    <p>Artificial intelligence is helping fight climate change with satellite monitoring for deforestation and algorithms that optimize energy use in large data centers.</p>
                                    <p class="eco-card__full-text">This story showcases how artificial intelligence and big data are being used against climate change. It includes satellite imagery that detects illegal deforestation in real time and AI systems that optimize energy consumption in large data centers.</p>
                                </div>
                                <button class="read-more-btn" type="button" aria-expanded="false">
                                    <span class="read-more-btn__text">READ MORE</span>
                                    <i class="fa-solid fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-12 col-lg-5 order-1 order-lg-2">
                            <div class="eco-image-card">
                                <img src="{{ asset('assets/images/our-eco/tech-for-good.jpeg') }}" alt="Tech for Good: AI & Big Data">
                            </div>
                        </div>
                    </div>
                </article>
            </div>

            <div class="col-12 mb-5">
                <article class="eco-card wow ud-fade-in-right" data-wow-duration="0.9s" id="grassroots-innovation-rural-sustainability">
                    <div class="row g-0 align-items-stretch">
                        <div class="col-12 col-lg-7 order-2 order-lg-2">
                            <div class="eco-content-card">
                                <div class="eco-card__eyebrow">
                                    <i class="fa-solid fa-leaf"></i>
                                    <span>Our Ecosystem</span>
                                </div>
                                <h3 class="content-title">Grassroots Innovation & Rural Sustainability</h3>
                                <div class="content-box">
                                    <p>Frugal innovation turns local knowledge into impact, from solar-powered irrigation for small farmers to community-led water filtration in remote areas.</p>
                                    <p class="eco-card__full-text">This story focuses on low-cost, high-impact sustainability developed by local communities. It explores solar-powered irrigation for small farmers, community-led water filtration systems, and practical solutions designed for rural and remote areas.</p>
                                </div>
                                <button class="read-more-btn" type="button" aria-expanded="false">
                                    <span class="read-more-btn__text">READ MORE</span>
                                    <i class="fa-solid fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-12 col-lg-5 order-1 order-lg-1">
                            <div class="eco-image-card">
                                <img src="{{ asset('assets/images/our-eco/grassroots-innovation.jpeg') }}" alt="Grassroots Innovation & Rural Sustainability">
                            </div>
                        </div>
                    </div>
                </article>
            </div>

            <div class="col-12 mb-5">
                <article class="eco-card wow ud-fade-in-left" data-wow-duration="0.9s" id="digital-sobriety-green-computing">
                    <div class="row g-0 align-items-stretch">
                        <div class="col-12 col-lg-7 order-2 order-lg-1">
                            <div class="eco-content-card">
                                <div class="eco-card__eyebrow">
                                    <i class="fa-solid fa-leaf"></i>
                                    <span>Our Ecosystem</span>
                                </div>
                                <h3 class="content-title">Digital Sobriety & Green Computing</h3>
                                <div class="content-box">
                                    <p>Green IT focuses on the environmental cost of digital life, including data centers, AI processing, efficient coding, sustainable web design, and cleaner cloud operations.</p>
                                    <p class="eco-card__full-text">This story explores the environmental impact of digital life. It covers the energy use of data centers and AI processing, the carbon footprint of everyday digital activity, and innovations in efficient coding, sustainable web design, and cleaner cloud infrastructure.</p>
                                </div>
                                <button class="read-more-btn" type="button" aria-expanded="false">
                                    <span class="read-more-btn__text">READ MORE</span>
                                    <i class="fa-solid fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-12 col-lg-5 order-1 order-lg-2">
                            <div class="eco-image-card">
                                <img src="{{ asset('assets/images/our-eco/digital-sobriety.jpeg') }}" alt="Digital Sobriety & Green Computing">
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        function setCardExpanded(card, isExpanded) {
            var button = card.querySelector('.read-more-btn');
            var label = button.querySelector('.read-more-btn__text');

            card.classList.toggle('eco-card--expanded', isExpanded);
            button.setAttribute('aria-expanded', isExpanded ? 'true' : 'false');
            label.textContent = isExpanded ? 'SHOW LESS' : 'READ MORE';
        }

        function expandCardFromHash() {
            if (!window.location.hash) {
                return;
            }

            var card = document.querySelector(window.location.hash + '.eco-card');

            if (!card) {
                return;
            }

            setCardExpanded(card, true);
            setTimeout(function () {
                card.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }, 100);
        }

        document.querySelectorAll('.eco-card .read-more-btn').forEach(function (button) {
            button.addEventListener('click', function () {
                var card = button.closest('.eco-card');

                setCardExpanded(card, !card.classList.contains('eco-card--expanded'));
            });
        });

        expandCardFromHash();
        window.addEventListener('hashchange', expandCardFromHash);
    });
</script>

<x-footer>

</x-footer>
