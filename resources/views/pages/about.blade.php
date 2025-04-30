@extends('layouts.app')
@section('content')

<!-- About Us Section -->
<section class="about-us-section" style="padding: 60px 0; background-color: #f8f9fa; text-align: center;">
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
<section class="mission-vision-section" style="padding: 60px 0;">
    <div class="container" style="max-width: 1140px; margin: 0 auto; padding: 0 15px; display: flex; justify-content: space-between; gap: 30px; flex-wrap: wrap;">
        <!-- Our Mission -->
        <div class="mission-card" style="position: relative; flex: 1; min-width: 300px; background-color: #f3e8ff; border-radius: 15px; padding: 40px; text-align: center; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);">
            {{-- Replace with actual icon path --}}
            <img src="{{ asset('images/about2/mission.png') }}" alt="Mission Icon" style="position: absolute; top: 20px; right: 20px; width: 60px; height: 60px; opacity: 0.7;">
            <h3 style="font-size: 2rem; font-weight: bold; margin-bottom: 15px; color: #333; margin-top: 50px;">Our Mission</h3> {{-- Added margin-top to avoid overlap --}}
            <p style="font-size: 1rem; line-height: 1.6; color: #555;">
                Our mission at Top Outsourcing Partners is to empower businesses by delivering high-quality outsourcing solutions that drive operational efficiency, enhance scalability, and ensure sustainable growth. We are committed to providing tailored solutions that help businesses save time and resources, allowing them to focus on what matters most—growing their business.
            </p>
        </div>
        <!-- Our Vision -->
        <div class="vision-card" style="position: relative; flex: 1; min-width: 300px; background-color: #ffe8e8; border-radius: 15px; padding: 40px; text-align: center; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);">
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
<section class="core-values-section" style="padding: 60px 0; background-color: #ffffff; text-align: center;">
    <div class="container" style="max-width: 1140px; margin: 0 auto; padding: 0 15px;">
        <h2 style="font-size: 2.8rem; font-weight: bold; margin-bottom: 20px; color: #333;">Core Values</h2>
        <p style="font-size: 1.1rem; line-height: 1.7; color: #555; max-width: 800px; margin: 0 auto 50px auto;">
            At Top Outsourcing Partners, we uphold the following core values that shape our operations and guide our decision-making:
        </p>
        <div class="values-grid" style="display: flex; flex-wrap: wrap; justify-content: center; gap: 30px;">
            <!-- Integrity -->
            <div class="value-card" style="flex: 1; min-width: 280px; max-width: 350px; background-color: #fff; border: 1px solid #eee; border-radius: 10px; padding: 30px; text-align: center; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);">
                {{-- Replace with actual icon path --}}
                <img src="{{ asset('images/about2/frame1.svg') }}" alt="Integrity Icon" style="width: 50px; height: 50px; margin-bottom: 15px;">
                <h4 style="font-size: 1.5rem; font-weight: bold; margin-bottom: 10px; color: #333;">Integrity</h4>
                <p style="font-size: 0.95rem; line-height: 1.6; color: #555;">
                    We believe in being transparent, honest, and acting with the highest ethical standards in all our business interactions.
                </p>
            </div>
            <!-- Innovation -->
            <div class="value-card" style="flex: 1; min-width: 280px; max-width: 350px; background-color: #fff; border: 1px solid #eee; border-radius: 10px; padding: 30px; text-align: center; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);">
                 {{-- Replace with actual icon path --}}
                <img src="{{ asset('images/about2/frame2.svg') }}" alt="Innovation Icon" style="width: 50px; height: 50px; margin-bottom: 15px;">
                <h4 style="font-size: 1.5rem; font-weight: bold; margin-bottom: 10px; color: #333;">Innovation</h4>
                <p style="font-size: 0.95rem; line-height: 1.6; color: #555;">
                    We embrace cutting-edge technologies and continuously seek ways to improve and innovate to deliver the best solutions for our clients.
                </p>
            </div>
            <!-- Excellence -->
            <div class="value-card" style="flex: 1; min-width: 280px; max-width: 350px; background-color: #fff; border: 1px solid #eee; border-radius: 10px; padding: 30px; text-align: center; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);">
                 {{-- Replace with actual icon path --}}
                <img src="{{ asset('images/about2/frame3.svg') }}" alt="Excellence Icon" style="width: 50px; height: 50px; margin-bottom: 15px;">
                <h4 style="font-size: 1.5rem; font-weight: bold; margin-bottom: 10px; color: #333;">Excellence</h4>
                <p style="font-size: 0.95rem; line-height: 1.6; color: #555;">
                    We are committed to delivering superior service and outstanding results in everything we do.
                </p>
            </div>
            <!-- Collaboration -->
            <div class="value-card" style="flex: 1; min-width: 280px; max-width: 350px; background-color: #fff; border: 1px solid #eee; border-radius: 10px; padding: 30px; text-align: center; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);">
                 {{-- Replace with actual icon path --}}
                <img src="{{ asset('images/about2/frame4.svg') }}" alt="Collaboration Icon" style="width: 50px; height: 50px; margin-bottom: 15px;">
                <h4 style="font-size: 1.5rem; font-weight: bold; margin-bottom: 10px; color: #333;">Collaboration</h4>
                <p style="font-size: 0.95rem; line-height: 1.6; color: #555;">
                    We work closely with our clients, partners, and team members to ensure success through shared goals and mutual respect.
                </p>
            </div>
            <!-- Sustainability -->
            <div class="value-card" style="flex: 1; min-width: 280px; max-width: 350px; background-color: #fff; border: 1px solid #eee; border-radius: 10px; padding: 30px; text-align: center; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);">
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
<!-- Why Choose Us Section (Alternative Layout) -->
<section class="why-choose-us-alt" style="padding: 60px 0; background-color: #eaf2f8;">
    <div class="container" style="max-width: 1140px; margin: 0 auto; padding: 0 15px;">
        <h2 style="text-align: center; font-size: 2.5rem; font-weight: bold; margin-bottom: 50px;">Why Choose Us?</h2>
        <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap;">
            <!-- Image Column -->
            <div class="why-choose-image" style="flex: 1; max-width: 40%; text-align: left; padding-right: 30px; margin-bottom: 30px;">
                {{-- Make sure this image path is correct --}}
                <img src="{{ asset('images/services/why-choose-us-illustration.png') }}" alt="Why Choose Us Illustration" style="max-width: 100%; height: auto; max-height: 350px;">
            </div>

            <!-- Text Points Column -->
            <div class="why-choose-points" style="flex: 1; max-width: 55%;">
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


@endsection
@section('footer')
    @include('components.footer') 
@endsection