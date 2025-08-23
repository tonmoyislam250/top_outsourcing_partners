<div class="service-card">
    <div class="service-icon {{ $service['iconClass'] }}">
        {!! $service['icon'] !!}
    </div>
    <h3><strong>{{ $service['title'] }}</strong></h3>
    <p>{{ $service['description'] }}</p>
    <a href="{{ route('services.show', $service['slug']) }}" class="btn-secondary">{{ $service['linkText'] ?? 'Learn More' }}</a>
</div>