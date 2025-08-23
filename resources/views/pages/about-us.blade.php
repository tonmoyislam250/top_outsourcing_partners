@extends('layouts.app')

@section('title', 'About Us - Top Outsourcing Partners | Your Trusted Global Business Solutions Provider')
@section('meta_description', 'Learn about Top Outsourcing Partners (TOP) - your dedicated partner for innovative, cost-effective outsourcing solutions. We help businesses achieve operational excellence, reduce costs up to 40%, and scale globally with expert finance, HR, and business support services.')
@section('meta_keywords', 'about top outsourcing partners, business outsourcing company, global outsourcing solutions, operational excellence, cost reduction, business scaling, finance outsourcing, HR outsourcing, third-party services')

@section('content')

<!-- About Us Section -->
<section class="about-us-section">
    <div class="container">
        <h1 class="about-us-title">
            <span class="about-us-icon">
                <svg width="40" height="40" viewBox="0 0 24 24" fill="#8e24aa" xmlns="http://www.w3.org/2000/svg">
                    <rect width="24" height="24" rx="6" fill="#8e24aa" />
                    <path d="M7 10.5C7 10.2239 7.22386 10 7.5 10H7.51C7.78614 10 8.01 10.2239 8.01 10.5C8.01 10.7761 7.78614 11 7.51 11H7.5C7.22386 11 7 10.7761 7 10.5ZM11.5 10C11.2239 10 11 10.2239 11 10.5C11 10.7761 11.2239 11 11.5 11C11.7761 11 12 10.7761 12 10.5C12 10.2239 11.7761 10 11.5 10ZM15.5 10C15.2239 10 15 10.2239 15 10.5C15 10.7761 15.2239 11 15.5 11C15.7761 11 16 10.7761 16 10.5C16 10.2239 15.7761 10 15.5 10Z" fill="white" />
                </svg>
            </span>
            About Us
        </h1>
        <p class="about-us-text">
            At Top Outsourcing Partners (TOP), we are dedicated to helping businesses achieve operational excellence through innovative, cost-effective, and scalable outsourcing solutions. Since our inception, we have empowered organizations across the globe to streamline their operations, reduce costs, and focus on their core strengths while we handle the rest.
        </p>
    </div>
</section>

<!-- Mission & Vision Section -->
<section class="mission-vision-section">
    <div class="container">
        <div class="mission-card">
            <div class="mission-icon">
                <img src="{{ asset('images/about2/mission.png') }}" alt="Mission Icon">
            </div>
            <h3>Our Mission</h3>
            <p>
                Our mission at Top Outsourcing Partners is to empower businesses by delivering high-quality outsourcing solutions that drive operational efficiency, enhance scalability, and ensure sustainable growth. We are committed to providing tailored solutions that help businesses save time and resources, allowing them to focus on what matters most—growing their business.
            </p>
        </div>
        <div class="vision-card">
            <div class="vision-icon">
                <img src="{{ asset('images/about2/vision.png') }}" alt="Vision Icon">
            </div>
            <h3>Our Vision</h3>
            <p>
                To be the global leader in outsourcing by delivering transformative solutions that help businesses optimize operations, reduce overheads, and achieve long-term success. We aim to redefine the outsourcing industry with innovative solutions, a client-first approach, and a commitment to continuous improvement.
            </p>
        </div>
    </div>
</section>

<!-- Core Values Section -->
<section class="core-values-section">
    <div class="container">
        <h2 class="core-values-title">Core Values</h2>
        <p class="core-values-desc">
            At Top Outsourcing Partners, we uphold the following core values that shape our operations and guide our decision-making:
        </p>
        <div class="values-grid">
            <div class="value-card">
                <img src="{{ asset('images/about2/frame1.svg') }}" alt="Integrity Icon" class="value-icon">
                <h4>Integrity</h4>
                <p>We believe in being transparent, honest, and acting with the highest ethical standards in all our business interactions.</p>
            </div>
            <div class="value-card">
                <img src="{{ asset('images/about2/frame2.svg') }}" alt="Innovation Icon" class="value-icon">
                <h4>Innovation</h4>
                <p>We embrace cutting-edge technologies and continuously seek ways to improve and innovate to deliver the best solutions for our clients.</p>
            </div>
            <div class="value-card">
                <img src="{{ asset('images/about2/frame3.svg') }}" alt="Excellence Icon" class="value-icon">
                <h4>Excellence</h4>
                <p>We are committed to delivering superior service and outstanding results in everything we do.</p>
            </div>
            <div class="value-card">
                <img src="{{ asset('images/about2/frame4.svg') }}" alt="Collaboration Icon" class="value-icon">
                <h4>Collaboration</h4>
                <p>We work closely with our clients, partners, and team members to ensure success through shared goals and mutual respect.</p>
            </div>
            <div class="value-card">
                <img src="{{ asset('images/about2/frame5.svg') }}" alt="Sustainability Icon" class="value-icon">
                <h4>Sustainability</h4>
                <p>We are committed to sustainable business practices, ensuring that our solutions contribute to the long-term success of both our clients and the environment.</p>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section class="why-choose-us-alt">
    <div class="container">
        <h2 class="why-choose-title">Why Choose Us?</h2>
        <div class="why-choose-flex">
            <div class="why-choose-points">
                <div class="points-row">
                    <div class="point-item">
                        <h3>Tailored Outsourcing Solutions</h3>
                        <p>We understand that every business is unique, and we provide customized outsourcing solutions that meet your specific needs.</p>
                    </div>
                    <div class="point-item">
                        <h3>Cost Efficiency</h3>
                        <p>By outsourcing non-core activities to us, you can achieve significant cost savings while maintaining high-quality service.</p>
                    </div>
                    <div class="point-item">
                        <h3>Expertise</h3>
                        <p>Our team consists of highly skilled professionals with deep expertise in finance, HR, and other critical business functions.</p>
                    </div>
                </div>
                <div class="points-row">
                    <div class="point-item">
                        <div class="why-choose-image">
                            <img src="{{ asset('images/services/why-choose-us-illustration.png') }}" alt="Why Choose Us Illustration">
                        </div>
                    </div>
                    <div class="point-item">
                        <h3>Global Presence</h3>
                        <p>With experience serving clients in North America, Europe, Asia, and Africa, we understand the intricacies of global markets and offer region-specific solutions.</p>
                    </div>
                    <div class="point-item">
                        <h3>Proven Track Record</h3>
                        <p>We have successfully worked with leading organizations across diverse industries, helping them improve efficiency and grow sustainably.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Process Section -->
<section class="our-process-section">
    <div class="container process-container">
        <h2 class="our-process-title">Our Process</h2>
        <p class="our-process-desc">
            At Top Outsourcing Partners, we uphold the following core values that shape
            our operations and guide our decision-making:
        </p>

        @php
        $processSteps = [
        [
        'title' => 'Consultation',
        'description' => 'Understanding your business needs and identifying key outsourcing areas.',
        'icon' => asset('images/about2/pro1.svg'),
        'icon_color' => '#7350BA',
        ],
        [
        'title' => 'Solution Design',
        'description' => 'Tailored outsourcing strategies created to match your goals.',
        'icon' => asset('images/about2/pro2.svg'),
        'icon_color' => '#52A418',
        ],
        [
        'title' => 'Implementation',
        'description' => 'Seamless integration of outsourcing solutions into your existing processes.',
        'icon' => asset('images/about2/pro3.svg'),
        'icon_color' => '#169D9D',
        ],
        [
        'title' => 'Monitoring & Optimization',
        'description' => 'Continuous monitoring and adjustments to ensure efficiency and cost savings.',
        'icon' => asset('images/about2/pro4.svg'),
        'icon_color' => '#EEC22F',
        ],
        [
        'title' => 'Ongoing Support',
        'description' => 'Dedicated support team ensuring smooth operations and ongoing improvements.',
        'icon' => asset('images/about2/pro5.svg'),
        'icon_color' => '#FF445F',
        ],
        ];
        @endphp

        <div class="timeline">
            <div class="timeline-steps">
                @foreach ($processSteps as $index => $step)
                @php
                // First item on the right, then alternate
                $side = $index % 2 === 0 ? 'right' : 'left';
                @endphp
                <div class="timeline-step {{ $side }}">
                    @if ($side === 'left')
                    {{-- Content first, then icon --}}
                    <div class="timeline-content">
                        <h4>{{ $step['title'] }}</h4>
                        <p>{{ $step['description'] }}</p>
                    </div>
                    <div class="timeline-icon" style="--icon-color: {{ $step['icon_color'] }};">
                        <img src="{{ $step['icon'] }}" alt="{{ $step['title'] }} Icon">
                    </div>
                    @else
                    {{-- Icon first, then content --}}
                    <div class="timeline-icon" style="--icon-color: {{ $step['icon_color'] }};">
                        <img src="{{ $step['icon'] }}" alt="{{ $step['title'] }} Icon">
                    </div>
                    <div class="timeline-content">
                        <h4>{{ $step['title'] }}</h4>
                        <p>{{ $step['description'] }}</p>
                    </div>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>


<!-- Our Impact Section -->
<section class="our-impact-section">
    <div class="container">
        <h2 class="our-impact-title">Our Impact</h2>
        <p class="our-impact-desc">
            Through our Top outsourcing solutions, we have helped businesses reduce operational costs by up to 40%, improve efficiency by 30%, and scale operations to meet growing market demands. Our approach has consistently delivered measurable results, driving sustained growth for our clients.
        </p>
        <!-- <div class="impact-charts">
            <div class="impact-chart-card">
                <h3>Cost Savings</h3>
                <canvas id="costSavingsChart" height="350"></canvas>
            </div>
            <div class="impact-chart-card">
                <h3>Efficiency</h3>
                <canvas id="efficiencyChart" height="350"></canvas>
            </div>
        </div> -->
    </div>
</section>

<!-- Meet Our Dynamic Team Section -->
<section class="meet-team-section">
    <div class="container">
        <h2 class="meet-team-title">Meet Our Dynamic Team</h2>
        @auth
            <a href="{{ route('admin.team-members.index') }}" class="btn-primary meet-team-btn">See Team</a>
        @else
            <a href="{{ url('/team-members') }}" class="btn-primary meet-team-btn">See Team</a>
        @endauth
                <div class="floating-container">
                    <div class="floating-box">
                        @foreach(range(1, 8) as $i)
                        <div class="floating-group">
                            <img src="{{ asset('images/user'.$i.'.jpg') }}"
                                alt="Team member"
                                class="floating-image">
                            @php
                            $icons = ['💼', '📊', '🔗', '💰', '🛠️', '📈', '⚡'];
                            $icon = $icons[array_rand($icons)];
                            @endphp
                            <span class="floating-icon">{{ $icon }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
    </div>
</section>

@endsection
@section('footer')
@include('components.footer')
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Cost Savings Chart
        const costSavingsCtx = document.getElementById('costSavingsChart');
        if (costSavingsCtx) {
            new Chart(costSavingsCtx.getContext('2d'), {
                type: 'line',
                data: {
                    labels: ['Q1', 'Q2', 'Q3', 'Q4', 'Q5'],
                    datasets: [{
                        label: 'Cost Savings',
                        data: [100, 70, 90, 50, 80],
                        borderColor: 'rgba(0, 200, 83, 1)',
                        backgroundColor: 'rgba(0, 200, 83, 0.1)',
                        fill: true,
                        tension: 0.4,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        x: {
                            grid: {
                                display: false
                            }
                        },
                        y: {
                            grid: {
                                color: '#e0e0e0'
                            },
                            beginAtZero: true
                        }
                    }
                }
            });
        }
        // Efficiency Chart
        const efficiencyCtx = document.getElementById('efficiencyChart');
        if (efficiencyCtx) {
            new Chart(efficiencyCtx.getContext('2d'), {
                type: 'line',
                data: {
                    labels: ['Q1', 'Q2', 'Q3', 'Q4', 'Q5'],
                    datasets: [{
                        label: 'Efficiency',
                        data: [20, 50, 30, 70, 60],
                        borderColor: 'rgba(0, 200, 83, 1)',
                        backgroundColor: 'rgba(0, 200, 83, 0.1)',
                        fill: true,
                        tension: 0.4,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        x: {
                            grid: {
                                display: false
                            }
                        },
                        y: {
                            grid: {
                                color: '#e0e0e0'
                            },
                            beginAtZero: true
                        }
                    }
                }
            });
        }
    });
</script>
@endpush