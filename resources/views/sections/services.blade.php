<section class="services" style="margin: 20px;">
    <h1 style="font-size: 3em; font-weight: bold;">Transform your business with us</h1>
    <p>Welcome to TopOutsourcingPartners, your trusted partner for efficient, scalable, and innovative outsourcing solutions. With years of industry expertise, we empower businesses to achieve operational excellence, reduce costs, and drive growth by leveraging cutting-edge technology and skilled professionals. Whether you're a small business or a global enterprise, we're here to unlock your potential.</p>
    <div class="services-header" style="margin-bottom: 20px;">
        <h2 style="font-size: 3em; font-weight: bold;">OUR KEY SERVICES</h2>
    </div>

    <div class="services-grid" style="margin-bottom: 20px;">
        @foreach($services as $service)
            @include('components.service-card', ['service' => $service])
        @endforeach
    </div>

    <div class="call-to-action" style="margin-top: 30px; text-align: center;">
        <a href="{{ url('/consult') }}" class="btn-primary" style="padding: 10px 20px; background-color: #007bff; color: #fff; text-decoration: none; border-radius: 5px;">Optimize Your Business Today!</a>
    </div>
</section>