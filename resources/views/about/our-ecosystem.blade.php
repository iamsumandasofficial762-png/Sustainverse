<x-header title="EcoSystem - SustainVerse">

</x-header>

@php
    $ecosystemCards = [
        [
            'title' => 'The Circular Economy Revolution',
            'description' => 'Waste is being reimagined as a resource, from ocean plastic transformed into high-end apparel to electronic waste reshaped into jewelry and industrial components.',
            'full' => 'This story explores how circular economy thinking changes the meaning of waste. It highlights companies transforming recovered ocean plastic into premium apparel, converting electronic waste into jewelry, and recovering valuable materials for industrial components instead of sending them to landfill.',
        ],
        [
            'title' => 'Green Architecture & Smart Urban Spaces',
            'description' => 'Living buildings, smart glass, and vertical forests are reshaping cities into cleaner spaces that generate energy, reduce cooling loads, and improve air quality.',
            'full' => 'This story focuses on buildings and cities designed to work with nature. It covers living buildings that generate their own energy, smart glass that responds to sunlight to reduce electricity use, and urban planning ideas like vertical forests that help clean city air.',
        ],
        [
            'title' => 'The Future of Agri-Tech',
            'description' => 'AI-driven precision farming, vertical indoor farms that use up to 95% less water, and lab-grown or plant-based alternatives are strengthening food security.',
            'full' => 'This story explores how technology is future-proofing food security. It looks at AI-driven precision farming, vertical indoor farms that can use up to 95% less water, and the growth of lab-grown and plant-based alternatives as climate pressure increases.',
        ],
        [
            'title' => 'Renewable Energy: Beyond the Grid',
            'description' => 'Emerging solutions such as green hydrogen, tidal energy, and long-duration battery storage are helping renewable power work even when sunlight and wind fluctuate.',
            'full' => 'This story moves beyond familiar solar and wind narratives to emerging clean energy systems. It explains green hydrogen, tidal energy, and long-duration battery storage, especially how storage solves the question of what happens when the sun does not shine or the wind drops.',
        ],
        [
            'title' => 'Conscious Fashion: The End of Fast Trends',
            'description' => 'Slow fashion is rising through materials like mycelium leather and pineapple-leaf fabrics, while blockchain helps track garment ethics across the supply chain.',
            'full' => 'This story features the shift from fast trends to conscious fashion. It covers innovative materials such as mushroom leather, also called mycelium, fabrics made from pineapple leaves, and blockchain tools that help verify ethics across a garment supply chain.',
        ],
        [
            'title' => 'The Path to Net-Zero: Corporate Strategy',
            'description' => 'Industries are moving toward carbon neutrality through ESG accountability, carbon offsetting, and carbon capture technologies that address emissions at different stages.',
            'full' => 'This story analyzes how global industries are moving toward carbon neutrality. It explains the difference between carbon offsetting and carbon capture technology, and shows how businesses are being held accountable through ESG standards and reporting expectations.',
        ],
        [
            'title' => 'Clean Mobility & The EV Ecosystem',
            'description' => 'The mobility transition now includes solid-state batteries, solar-powered public transit, and sustainable aviation fuels that extend clean transport beyond cars.',
            'full' => 'This story looks beyond electric cars to the wider clean mobility ecosystem. It includes innovation in solid-state batteries, solar-powered public transit, charging networks, and sustainable aviation fuels that can reduce emissions in hard-to-electrify transport.',
        ],
        [
            'title' => 'Blue Economy: Sustaining Our Oceans',
            'description' => 'Autonomous harbor-cleaning systems and seaweed farming show how ocean conservation can remove waste, store carbon, and support sustainable coastal livelihoods.',
            'full' => 'This story highlights technology-driven ocean conservation. It covers autonomous trash-bots that clean harbors, seaweed farming as a natural carbon sink, and how ocean-based sustainability can create livelihoods for coastal communities.',
        ],
        [
            'title' => 'Tech for Good: AI & Big Data',
            'description' => 'Artificial intelligence is helping fight climate change with satellite monitoring for deforestation and algorithms that optimize energy use in large data centers.',
            'full' => 'This story showcases how artificial intelligence and big data are being used against climate change. It includes satellite imagery that detects illegal deforestation in real time and AI systems that optimize energy consumption in large data centers.',
        ],
        [
            'title' => 'Grassroots Innovation & Rural Sustainability',
            'description' => 'Frugal innovation turns local knowledge into impact, from solar-powered irrigation for small farmers to community-led water filtration in remote areas.',
            'full' => 'This story focuses on low-cost, high-impact sustainability developed by local communities. It explores solar-powered irrigation for small farmers, community-led water filtration systems, and practical solutions designed for rural and remote areas.',
        ],
        [
            'title' => 'Digital Sobriety & Green Computing',
            'description' => 'Green IT focuses on the environmental cost of digital life, including data centers, AI processing, efficient coding, sustainable web design, and cleaner cloud operations.',
            'full' => 'This story explores the environmental impact of digital life. It covers the energy use of data centers and AI processing, the carbon footprint of everyday digital activity, and innovations in efficient coding, sustainable web design, and cleaner cloud infrastructure.',
        ],
    ];

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
            @foreach ($ecosystemCards as $card)
                @php
                    $isEvenCard = $loop->iteration % 2 === 0;
                @endphp
                <div class="col-12 mb-5">
                    <article class="eco-card">
                        <div class="row g-0 align-items-stretch">
                            <div class="col-12 col-lg-7 order-2 {{ $isEvenCard ? 'order-lg-2' : 'order-lg-1' }}">
                                <div class="eco-content-card">
                                    <div class="eco-card__eyebrow">
                                        <i class="fa-solid fa-leaf"></i>
                                        <span>Our Ecosystem</span>
                                    </div>
                                    <h3 class="content-title">{{ $card['title'] }}</h3>
                                    <div class="content-box">
                                        <p>{{ $card['description'] }}</p>
                                        <p class="eco-card__full-text">{{ $card['full'] }}</p>
                                    </div>
                                    <button class="read-more-btn" type="button" aria-expanded="false">
                                        <span class="read-more-btn__text">READ MORE</span>
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-12 col-lg-5 order-1 {{ $isEvenCard ? 'order-lg-1' : 'order-lg-2' }}">
                                <div class="eco-image-card">
                                    <img src="{{ $cardImage }}" alt="{{ $card['title'] }}">
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            @endforeach
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.eco-card .read-more-btn').forEach(function (button) {
            button.addEventListener('click', function () {
                var card = button.closest('.eco-card');
                var isExpanded = card.classList.toggle('eco-card--expanded');
                var label = button.querySelector('.read-more-btn__text');

                button.setAttribute('aria-expanded', isExpanded ? 'true' : 'false');
                label.textContent = isExpanded ? 'SHOW LESS' : 'READ MORE';
            });
        });
    });
</script>

<x-footer>

</x-footer>
