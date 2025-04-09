@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4">Meet Our Wonderful Team</h1>
    <div class="row">
        <div class="col-md-12 text-center mb-4">
            <div class="card p-3">
                <img src="{{ asset('images/about/user1.png') }}" alt="Principal" class="rounded-circle mx-auto" style="width: 150px; height: 150px;">
                <h3 class="mt-3">Shubhankar Shil</h3>
                <p class="text-muted">Principal</p>
                <p>Shubhankar Shil, the Managing Partner at GlobalOutsourcingPartners, brings a wealth of experience in strategic leadership, operational efficiency, and client-centric solutions...</p>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach(range(1, 6) as $i)
        <div class="col-md-4 mb-4">
            <div class="card p-3 text-center">
                <img src="{{ asset('images/about/user'.$i.'.png') }}" alt="Team Member" class="rounded-circle mx-auto" style="width: 100px; height: 100px;">
                <h5 class="mt-3">Shubhankar Shil</h5>
                <p class="text-muted">Director</p>
            </div>
        </div>
        @endforeach
    </div>
    <div class="text-center mt-5">
        <div class="card p-4">
            <h2>Careers in Global Outsourcing</h2>
            <p>Join GlobalOutsourcingPartners and be part of a team that's shaping the future of outsourcing...</p>
            <a href="{{ url('/careers') }}" class="btn btn-primary">Explore Careers</a>
        </div>
    </div>
</div>
@endsection

@section('footer')
    @include('components.footer')
@endsection
