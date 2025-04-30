@extends('layouts.app')
@section('content')


<!-- About Us Section -->
<section class="about-us-section animate__animated animate__fadeIn" style="padding: 60px 0; background-color: #f8f9fa; text-align: center;">
    <div class="container" style="max-width: 960px; margin: 0 auto; padding: 0 15px;">
        <h2 style="font-size: 2.8rem; font-weight: bold; margin-bottom: 20px; color: #333;">About Us</h2>
        <p style="font-size: 1.1rem; line-height: 1.7; color: #555; max-width: 800px; margin: 0 auto;">
            At Top Outsourcing Partners (TOP), we are dedicated to helping businesses achieve operational
            excellence through innovative, cost-effective, and scalable outsourcing solutions. Since our
            inception, we have empowered organizations across the globe to streamline their operations, reduce
            costs, and focus on their core strengths while we handle the rest.
        </p>
    </div>
</section>

<!-- Mission & Vision Section -->
<section class="mission-vision-section animate__animated animate__fadeInUp" style="padding: 60px 0;">
    <div class="container" style="max-width: 1140px; margin: 0 auto; padding: 0 15px; display: flex; justify-content: space-between; gap: 30px; flex-wrap: wrap;">
        <!-- Our Mission -->
        <div class="mission-card animate__animated animate__zoomIn" style="position: relative; flex: 1; min-width: 300px; background-color: #f3e8ff; border-radius: 15px; padding: 40px; text-align: center; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);">
            {{-- Replace with actual icon path --}}
            <img src="{{ asset('images/about2/mission.png') }}" alt="Mission Icon" style="position: absolute; top: 20px; right: 20px; width: 60px; height: 60px; opacity: 0.7;">
            <h3 style="font-size: 2rem; font-weight: bold; margin-bottom: 15px; color: #333; margin-top: 50px;">Our Mission</h3> {{-- Added margin-top to avoid overlap --}}
            <p style="font-size: 1rem; line-height: 1.6; color: #555;">
                Our mission at Top Outsourcing Partners is to empower businesses by delivering high-quality outsourcing solutions that drive operational efficiency, enhance scalability, and ensure sustainable growth. We are committed to providing tailored solutions that help businesses save time and resources, allowing them to focus on what matters most—growing their business.
            </p>
        </div>
        <!-- Our Vision -->
        <div class="vision-card animate__animated animate__zoomIn" style="position: relative; flex: 1; min-width: 300px; background-color: #ffe8e8; border-radius: 15px; padding: 40px; text-align: center; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);">
             {{-- Replace with actual icon path --}}
            <img src="{{ asset('images/about2/vision.png') }}" alt="Vision Icon" style="position: absolute; top: 20px; right: 20px; width: 60px; height: 60px; opacity: 0.7;">
            <h3 style="font-size: 2rem; font-weight: bold; margin-bottom: 15px; color: #333; margin-top: 50px;">Our Vision</h3> {{-- Added margin-top to avoid overlap --}}
            <p style="font-size: 1rem; line-height: 1.6; color: #555;">
                To be the global leader in outsourcing by delivering transformative solutions that help businesses optimize operations, reduce overheads, and achieve long-term success. We aim to redefine the outsourcing industry with innovative solutions, a client-first approach, and a commitment to continuous improvement.
            </p>
        </div>
    </div>
</section>

<!-- Core Values Section -->
<section class="core-values-section animate__animated animate__fadeIn" style="padding: 60px 0; background-color: #ffffff; text-align: center;">
    <div class="container" style="max-width: 1140px; margin: 0 auto; padding: 0 15px;">
        <h2 style="font-size: 2.8rem; font-weight: bold; margin-bottom: 20px; color: #333;">Core Values</h2>
        <p style="font-size: 1.1rem; line-height: 1.7; color: #555; max-width: 800px; margin: 0 auto 50px auto;">
            At Top Outsourcing Partners, we uphold the following core values that shape our operations and guide our decision-making:
        </p>
        <div class="values-grid" style="display: flex; flex-wrap: wrap; justify-content: center; gap: 30px;">
            <!-- Integrity -->
            <div class="value-card animate__animated animate__fadeInUp" style="flex: 1; min-width: 280px; max-width: 350px; background-color: #fff; border: 1px solid #eee; border-radius: 10px; padding: 30px; text-align: center; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);">
                {{-- Replace with actual icon path --}}
                <img src="{{ asset('images/about2/frame1.svg') }}" alt="Integrity Icon" style="width: 50px; height: 50px; margin-bottom: 15px;">
                <h4 style="font-size: 1.5rem; font-weight: bold; margin-bottom: 10px; color: #333;">Integrity</h4>
                <p style="font-size: 0.95rem; line-height: 1.6; color: #555;">
                    We believe in being transparent, honest, and acting with the highest ethical standards in all our business interactions.
                </p>
            </div>
            <!-- Innovation -->
            <div class="value-card animate__animated animate__fadeInUp" style="flex: 1; min-width: 280px; max-width: 350px; background-color: #fff; border: 1px solid #eee; border-radius: 10px; padding: 30px; text-align: center; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);">
                 {{-- Replace with actual icon path --}}
                <img src="{{ asset('images/about2/frame2.svg') }}" alt="Innovation Icon" style="width: 50px; height: 50px; margin-bottom: 15px;">
                <h4 style="font-size: 1.5rem; font-weight: bold; margin-bottom: 10px; color: #333;">Innovation</h4>
                <p style="font-size: 0.95rem; line-height: 1.6; color: #555;">
                    We embrace cutting-edge technologies and continuously seek ways to improve and innovate to deliver the best solutions for our clients.
                </p>
            </div>
            <!-- Excellence -->
            <div class="value-card animate__animated animate__fadeInUp" style="flex: 1; min-width: 280px; max-width: 350px; background-color: #fff; border: 1px solid #eee; border-radius: 10px; padding: 30px; text-align: center; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);">
                 {{-- Replace with actual icon path --}}
                <img src="{{ asset('images/about2/frame3.svg') }}" alt="Excellence Icon" style="width: 50px; height: 50px; margin-bottom: 15px;">
                <h4 style="font-size: 1.5rem; font-weight: bold; margin-bottom: 10px; color: #333;">Excellence</h4>
                <p style="font-size: 0.95rem; line-height: 1.6; color: #555;">
                    We are committed to delivering superior service and outstanding results in everything we do.
                </p>
            </div>
            <!-- Collaboration -->
            <div class="value-card animate__animated animate__fadeInUp" style="flex: 1; min-width: 280px; max-width: 350px; background-color: #fff; border: 1px solid #eee; border-radius: 10px; padding: 30px; text-align: center; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);">
                 {{-- Replace with actual icon path --}}
                <img src="{{ asset('images/about2/frame4.svg') }}" alt="Collaboration Icon" style="width: 50px; height: 50px; margin-bottom: 15px;">
                <h4 style="font-size: 1.5rem; font-weight: bold; margin-bottom: 10px; color: #333;">Collaboration</h4>
                <p style="font-size: 0.95rem; line-height: 1.6; color: #555;">
                    We work closely with our clients, partners, and team members to ensure success through shared goals and mutual respect.
                </p>
            </div>
            <!-- Sustainability -->
            <div class="value-card animate__animated animate__fadeInUp" style="flex: 1; min-width: 280px; max-width: 350px; background-color: #fff; border: 1px solid #eee; border-radius: 10px; padding: 30px; text-align: center; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);">
                 {{-- Replace with actual icon path --}}
                <img src="{{ asset('images/about2/frame5.svg') }}" alt="Sustainability Icon" style="width: 50px; height: 50px; margin-bottom: 15px;">
                <h4 style="font-size: 1.5rem; font-weight: bold; margin-bottom: 10px; color: #333;">Sustainability</h4>
                <p style="font-size: 0.95rem; line-height: 1.6; color: #555;">
                    We are committed to sustainable business practices, ensuring that our solutions contribute to the long-term success of both our clients and the environment.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Meet Our Dynamic Team Section -->


<!-- Why Choose Us Section (Alternative Layout) -->
<section class="why-choose-us-alt animate__animated animate__fadeInLeft" style="padding: 60px 0; background-color: #eaf2f8;">
    <div class="container" style="max-width: 1140px; margin: 0 auto; padding: 0 15px;">
        <h2 style="text-align: center; font-size: 2.5rem; font-weight: bold; margin-bottom: 50px;">Why Choose Us?</h2>
        <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap;">
            <!-- Image Column -->
            <div class="why-choose-image animate__animated animate__fadeInLeft" style="flex: 1; max-width: 40%; text-align: left; padding-right: 30px; margin-bottom: 30px;">
                {{-- Make sure this image path is correct --}}
                <img src="{{ asset('images/services/why-choose-us-illustration.png') }}" alt="Why Choose Us Illustration" style="max-width: 100%; height: auto; max-height: 350px;">
            </div>

            <!-- Text Points Column -->
            <div class="why-choose-points animate__animated animate__fadeInRight" style="flex: 1; max-width: 55%;">
                <!-- Row 1 -->
                <div class="points-row" style="display: flex; justify-content: space-between; margin-bottom: 30px; flex-wrap: wrap; gap: 20px;">
                    <div class="point-item" style="flex: 1; min-width: calc(33% - 20px); text-align: left;">
                        <h3 style="font-size: 1.3rem; font-weight: bold; margin-bottom: 10px;">Tailored Outsourcing Solutions</h3>
                        <p style="font-size: 1rem; line-height: 1.6; color: #555;">We understand that every business is unique, and we provide customized outsourcing solutions that meet your specific needs.</p>
                    </div>
                    <div class="point-item" style="flex: 1; min-width: calc(33% - 20px); text-align: left;">
                        <h3 style="font-size: 1.3rem; font-weight: bold; margin-bottom: 10px;">Cost Efficiency</h3>
                        <p style="font-size: 1rem; line-height: 1.6; color: #555;">By outsourcing non-core activities to us, you can achieve significant cost savings while maintaining high-quality service.</p>
                    </div>
                    <div class="point-item" style="flex: 1; min-width: calc(33% - 20px); text-align: left;">
                        <h3 style="font-size: 1.3rem; font-weight: bold; margin-bottom: 10px;">Expertise</h3>
                        <p style="font-size: 1rem; line-height: 1.6; color: #555;">Our team consists of highly skilled professionals with deep expertise in finance, HR, and other critical business functions.</p>
                    </div>
                </div>
                <!-- Row 2 -->
                <div class="points-row" style="display: flex; justify-content: flex-start; flex-wrap: wrap; gap: 20px;">
                     {{-- Using flex-start and gap for the second row with 2 items --}}
                    <div class="point-item" style="flex: 1; min-width: calc(50% - 20px); max-width: calc(50% - 10px); text-align: left;">
                        <h3 style="font-size: 1.3rem; font-weight: bold; margin-bottom: 10px;">Global Presence</h3>
                        <p style="font-size: 1rem; line-height: 1.6; color: #555;">With experience serving clients in North America, Europe, Asia, and Africa, we understand the intricacies of global markets and offer region-specific solutions.</p>
                    </div>
                    <div class="point-item" style="flex: 1; min-width: calc(50% - 20px); max-width: calc(50% - 10px); text-align: left;">
                        <h3 style="font-size: 1.3rem; font-weight: bold; margin-bottom: 10px;">Proven Track Record</h3>
                        <p style="font-size: 1rem; line-height: 1.6; color: #555;">We have successfully worked with leading organizations across diverse industries, helping them improve efficiency and grow sustainably.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Process Section -->
<section class="our-process-section animate__animated animate__fadeInUp" style="padding: 60px 0; background-color: #ffffff; text-align: center;">
    <div class="container" style="max-width: 960px; margin: 0 auto; padding: 0 15px;">
        <h2 style="font-size: 2.8rem; font-weight: bold; margin-bottom: 20px; color: #333;">Our Process</h2>
        <p style="font-size: 1.1rem; line-height: 1.7; color: #555; max-width: 800px; margin: 0 auto 50px auto;">
            At Top Outsourcing Partners, we uphold the following core values that shape our operations and guide our decision-making:
        </p>

        <div class="process-timeline" style="position: relative; max-width: 700px; margin: 50px auto 0 auto;">
            <!-- Vertical Line - Adjust top/bottom padding based on icon size -->
            <div class="timeline-line" style="position: absolute; left: 50%; top: 30px; bottom: 30px; width: 2px; background-color: #e0e0e0; transform: translateX(-50%); z-index: 1;"></div>

            @php
                $processSteps = [
                    [
                        'title' => 'Consultation',
                        'description' => 'Understanding your business needs and identifying key outsourcing areas.',
                        'icon' => asset('images/about2/pro1.svg'), // Replace with actual path if different
                        'icon_bg' => '#f3e8ff',
                        'icon_border' => '#6f42c1',
                        'align' => 'right'
                    ],
                    [
                        'title' => 'Solution Design',
                        'description' => 'Tailored outsourcing strategies created to match your goals.',
                        'icon' => asset('images/about2/pro2.svg'), // Replace with actual path if different
                        'icon_bg' => '#e8f5e9',
                        'icon_border' => '#4caf50',
                        'align' => 'left'
                    ],
                    [
                        'title' => 'Implementation',
                        'description' => 'Seamless integration of outsourcing solutions into your existing processes.',
                        'icon' => asset('images/about2/pro3.svg'), // Replace with actual path if different
                        'icon_bg' => '#e0f7fa',
                        'icon_border' => '#00bcd4',
                        'align' => 'right'
                    ],
                    [
                        'title' => 'Monitoring & Optimization',
                        'description' => 'Continuous monitoring and adjustments to ensure efficiency and cost savings.',
                        'icon' => asset('images/about2/pro4.svg'), // Replace with actual path if different
                        'icon_bg' => '#fff8e1',
                        'icon_border' => '#ffc107',
                        'align' => 'left'
                    ],
                    [
                        'title' => 'Ongoing Support',
                        'description' => 'Dedicated support team ensuring smooth operations and ongoing improvements.',
                        'icon' => asset('images/about2/pro5.svg'), // Replace with actual path if different
                        'icon_bg' => '#ffebee',
                        'icon_border' => '#f44336',
                        'align' => 'right'
                    ],
                ];
            @endphp

            @foreach ($processSteps as $index => $step)
                <div class="process-step animate__animated animate__fadeInUp" style="display: flex; justify-content: {{ $step['align'] === 'right' ? 'flex-start' : 'flex-end' }}; align-items: center; margin-bottom: 60px; position: relative; z-index: 2;">

                    <!-- Content (Order depends on alignment) -->
                    @if ($step['align'] === 'right')
                        <div class="step-content" style="text-align: left; padding-right: 90px; width: 50%;">
                            <h4 style="font-size: 1.5rem; font-weight: bold; margin-bottom: 10px; color: #333;">{{ $step['title'] }}</h4>
                            <p style="font-size: 0.95rem; line-height: 1.6; color: #555;">
                                {{ $step['description'] }}
                            </p>
                        </div>
                    @endif

                    <!-- Icon Wrapper (Always in the middle) -->
                    <div class="step-icon-wrapper" style="position: absolute; left: 50%; transform: translateX(-50%); background-color: #fff; padding: 5px 0;"> {{-- White background to cover the line --}}
                        <div class="step-icon" style="width: 70px; height: 70px; border-radius: 50%; background-color: {{ $step['icon_bg'] }}; border: 3px solid {{ $step['icon_border'] }}; display: flex; justify-content: center; align-items: center; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
                            {{-- Use img tag if you have SVG files, or inline SVG --}}
                            <img src="{{ $step['icon'] }}" alt="{{ $step['title'] }} Icon" style="width: 35px; height: 35px;">
                            {{-- Example inline SVG (replace with actual SVG content or img tag)
                            <svg width="35" height="35" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/>
                            </svg>
                            --}}
                        </div>
                    </div>

                     <!-- Content (Order depends on alignment) -->
                    @if ($step['align'] === 'left')
                        <div class="step-content" style="text-align: left; padding-left: 90px; width: 50%;">
                            <h4 style="font-size: 1.5rem; font-weight: bold; margin-bottom: 10px; color: #333;">{{ $step['title'] }}</h4>
                            <p style="font-size: 0.95rem; line-height: 1.6; color: #555;">
                                {{ $step['description'] }}
                            </p>
                        </div>
                    @endif

                </div>
            @endforeach

        </div>
    </div>
</section>

<!-- Our Impact Section -->
<section class="our-impact-section animate__animated animate__fadeIn" style="padding: 60px 0; background-color: #f0f8ff; text-align: center;">
    <div class="container" style="max-width: 1140px; margin: 0 auto; padding: 0 15px;">
        <h2 style="font-size: 2.8rem; font-weight: bold; margin-bottom: 20px; color: #333;">Our Impact</h2>
        <p style="font-size: 1.1rem; line-height: 1.7; color: #555; max-width: 800px; margin: 0 auto 50px auto;">
            Through our outsourcing solutions, we have helped businesses reduce operational costs by up to 40%, improve efficiency by 30%, and scale operations to meet growing market demands. Our approach has consistently delivered measurable results, driving sustained growth for our clients.
        </p>
        <div class="impact-charts-grid" style="display: flex; flex-direction: column; gap: 40px; align-items: center;">
            <!-- Cost Savings Chart -->
            <div class="chart-card animate__animated animate__fadeInUp" style="position: relative; background-color: #fff; border-radius: 15px; padding: 30px; box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08); width: 100%; max-width: 900px; text-align: left;">
                <h3 style="font-size: 1.8rem; font-weight: bold; margin-bottom: 20px; color: #333; text-align: center;">Cost Savings</h3>
                <div style="position: relative; height: 300px;"> <!-- Chart area -->
                    <canvas id="costSavingsChart"></canvas>
                    <!-- Annotation -->
                    <div class="chart-annotation" style="position: absolute; top: 45%; right: 10%; transform: translateY(-50%); background-color: #fff; border-radius: 8px; padding: 15px 20px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); text-align: center; border: 1px solid #eee; border-top: 3px solid rgba(0, 200, 83, 1); width: 180px;">
                        <p style="font-weight: bold; margin: 0 0 5px 0; font-size: 1rem; color: #333;">$34 million saved</p>
                        <p style="margin: 0; font-size: 0.9rem; color: #555;">40% cost reduced</p>
                    </div>
                </div>
            </div>

            <!-- Efficiency Chart -->
            <div class="chart-card animate__animated animate__fadeInUp" style="position: relative; background-color: #fff; border-radius: 15px; padding: 30px; box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08); width: 100%; max-width: 900px; text-align: left;">
                <h3 style="font-size: 1.8rem; font-weight: bold; margin-bottom: 20px; color: #333; text-align: center;">Efficiency</h3>
                 <div style="position: relative; height: 300px;"> <!-- Chart area -->
                    <canvas id="efficiencyChart"></canvas>
                     <!-- Annotation -->
                    <div class="chart-annotation" style="position: absolute; top: 40%; right: 10%; transform: translateY(-50%); background-color: #fff; border-radius: 8px; padding: 15px 20px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); text-align: center; border: 1px solid #eee; border-top: 3px solid rgba(0, 200, 83, 1); width: 180px;">
                        <p style="font-weight: bold; margin: 0 0 5px 0; font-size: 1rem; color: #333;">$34 million saved</p> {{-- Note: Text from image, adjust if needed --}}
                        <p style="margin: 0; font-size: 0.9rem; color: #555;">40% cost reduced</p> {{-- Note: Text from image, adjust if needed --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Add Chart.js library (ideally in your main layout file before closing </body>) --}}
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Cost Savings Chart
        const costSavingsCtx = document.getElementById('costSavingsChart');
        if (costSavingsCtx) {
            const costSavingsChart = new Chart(costSavingsCtx.getContext('2d'), {
                type: 'line',
                data: {
                    labels: ['Q1', 'Q2', 'Q3', 'Q4', 'Q5'], // Example labels
                    datasets: [{
                        label: 'Cost Savings',
                        data: [100, 70, 90, 50, 80], // Example data with ups and downs
                        borderColor: 'rgba(0, 200, 83, 1)', // Green line
                        backgroundColor: 'rgba(0, 200, 83, 0.1)', // Light green fill
                        fill: true,
                        tension: 0.4, // Smooth curve
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false, // Allow height control via container
                    plugins: {
                        legend: {
                            display: false // Hide legend
                        },
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
            const efficiencyChart = new Chart(efficiencyCtx.getContext('2d'), {
                type: 'line',
                data: {
                    labels: ['Q1', 'Q2', 'Q3', 'Q4', 'Q5'], // Example labels
                    datasets: [{
                        label: 'Efficiency',
                        data: [20, 50, 30, 70, 60], // Example data with ups and downs
                        borderColor: 'rgba(0, 200, 83, 1)', // Green line
                        backgroundColor: 'rgba(0, 200, 83, 0.1)', // Light green fill
                        fill: true,
                        tension: 0.4, // Smooth curve
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false, // Allow height control via container
                    plugins: {
                        legend: {
                            display: false // Hide legend
                        },
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

<section class="frame-198 animate__animated animate__fadeIn" style="border-radius: 24px; height: 528px; position: relative; overflow: hidden;">
    <div class="rectangle-92" style="background: #ffffff; border-radius: 24px; width: 1200px; height: 528px; position: absolute; left: 50%; transform: translateX(-50%); top: 0;"></div>
    <div class="rectangle-93" style="background: linear-gradient(90deg, rgba(0, 229, 149, 1) 0%, rgba(0, 118, 229, 1) 16.77%, rgba(172, 0, 229, 1) 41.48%, rgba(229, 202, 0, 1) 67.39%, rgba(229, 0, 118, 1) 88.97%, rgba(202, 229, 0, 1) 100%); opacity: 0.4; width: 1201px; height: 140px; position: absolute; left: 50%; transform: translateX(-50%); top: 387px; filter: blur(50px);"></div>
    <img class="vector-18" src="{{ asset('images/about2/vector18.svg') }}" style="width: 1200px; height: 528px; position: absolute; left: 50%; transform: translateX(-50%); top: 131px; overflow: visible;" />
    <div class="your-coaches-are-experienced-professionals-who-earn-at-least-10-000-per-month-in-recruitment-and-have-been-working-successfully-in-this-sector-for-years" style="color: #111111; text-align: center; font-family: 'PlusJakartaSans-Bold', sans-serif; font-size: 48px; line-height: 130%; font-weight: 700; position: absolute; left: 50%; transform: translateX(-50%); top: 42px; width: 1160px;">
        Meet Our Dynamic Team
    </div>
    <img class="ellipse-34" src="{{ asset('images/user1.jpg') }}" style="border-radius: 50%; border: 2px solid #ffffff; width: 70px; height: 70px; position: absolute; left: 15%; transform: translateX(-50%); top: 315px; object-fit: cover;" />
    <img class="ellipse-35" src="{{ asset('images/user2.jpg') }}" style="border-radius: 50%; border: 2px solid #ffffff; width: 70px; height: 70px; position: absolute; left: 25%; transform: translateX(-50%); top: 374px; object-fit: cover;" />
    <img class="ellipse-36" src="{{ asset('images/user3.jpg') }}" style="border-radius: 50%; border: 2px solid #ffffff; width: 70px; height: 70px; position: absolute; left: 35%; transform: translateX(-50%); top: 272px; object-fit: cover;" />
    <img class="ellipse-38" src="{{ asset('images/user4.jpg') }}" style="border-radius: 50%; border: 2px solid #ffffff; width: 70px; height: 70px; position: absolute; left: 45%; transform: translateX(-50%); top: 385px; object-fit: cover;" />
    <img class="ellipse-40" src="{{ asset('images/user5.jpg') }}" style="border-radius: 50%; border: 2px solid #ffffff; width: 70px; height: 70px; position: absolute; left: 55%; transform: translateX(-50%); top: 374px; object-fit: cover;" />
    <img class="ellipse-42" src="{{ asset('images/user6.jpg') }}" style="border-radius: 50%; border: 2px solid #ffffff; width: 70px; height: 70px; position: absolute; left: 65%; transform: translateX(-50%); top: 392px; object-fit: cover;" />
    <img class="ellipse-37" src="{{ asset('images/user7.jpg') }}" style="border-radius: 50%; border: 2px solid #ffffff; width: 70px; height: 70px; position: absolute; left: 65%; transform: translateX(-50%); top: 291px; object-fit: cover;" />
    <img class="ellipse-39" src="{{ asset('images/user8.jpg') }}" style="border-radius: 50%; border: 2px solid #ffffff; width: 70px; height: 70px; position: absolute; left: 85%; transform: translateX(-50%); top: 272px; object-fit: cover;" />
    <div class="frame-50" style="background: #111111; border-radius: 70px; border: 1px solid #111111; padding: 10px 36px; display: flex; flex-direction: row; gap: 10px; align-items: center; justify-content: center; height: 60px; position: absolute; left: 50%; transform: translateX(-50%); top: 129px;">
        <a href="{{ url('/about-us') }}" class="sign-up" style="color: #ffffff; text-align: center; font-family: 'PlusJakartaSans-Bold', sans-serif; font-size: 20px; font-weight: 700; text-decoration: none; display: block; position: relative;">
            See Team
        </a>
    </div>
</section>
@endsection
@section('footer')
    @include('components.footer') 
@endsection