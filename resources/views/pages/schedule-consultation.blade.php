@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/schedule-consultation.css') }}">

<div class="container">
    <div class="Schedule_header text-center">
        <h1>Schedule Consultation</h1>
    </div>
    <form action="#" method="POST" class="form">
        @csrf
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" id="first_name" name="first_name" placeholder="e.g., Abdun Nur" required>
        </div>
        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" id="last_name" name="last_name" placeholder="e.g., Wasit" required>
        </div>
        <div class="form-group">
            <label for="company_name">Company Name</label>
            <input type="text" id="company_name" name="company_name" placeholder="e.g., ABC Corp">
        </div>
        <div class="form-group">
            <label for="business_phone">Business Phone</label>
            <input type="text" id="business_phone" name="business_phone" placeholder="e.g., +1234567890" required>
        </div>
        <div class="form-group">
            <label for="business_email">Business Email</label>
            <input type="email" id="business_email" name="business_email" placeholder="e.g., example@domain.com" required>
        </div>
        <div class="form-group">
            <label for="services">*What services are you looking for?</label>
            <select id="services" name="services" required>
                <option value="" disabled selected>Select</option>
                <option value="web_development">Web Development</option>
                <option value="app_development">App Development</option>
                <option value="it_support">IT Support</option>
            </select>
        </div>
        <div class="form-group">
            <label for="start_time">*How soon are you looking to get started?</label>
            <select id="start_time" name="start_time" required>
                <option value="" disabled selected>Select</option>
                <option value="immediately">Immediately</option>
                <option value="next_month">Next Month</option>
                <option value="next_quarter">Next Quarter</option>
            </select>
        </div>
        <div class="form-group">
            <label for="team_members">*How many new team members do you need?</label>
            <select id="team_members" name="team_members" required>
                <option value="" disabled selected>Select</option>
                <option value="1-5">1-5</option>
                <option value="6-10">6-10</option>
                <option value="10+">10+</option>
            </select>
        </div>
        <div class="form-group">
            <label for="outsourcing_journey">*What best describes your journey in outsourcing?</label>
            <select id="outsourcing_journey" name="outsourcing_journey" required>
                <option value="" disabled selected>Select</option>
                <option value="new">New to Outsourcing</option>
                <option value="experienced">Experienced</option>
            </select>
        </div>
        <div class="form-group full">
            <label for="additional_info">Anything else you'd like to share before the meeting?</label>
            <textarea id="additional_info" name="additional_info" rows="4" placeholder="You can explain your query and ask here"></textarea>
        </div>
        <div class="submit-btn full text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
@endsection

@section('footer')
    @include('components.footer') 
@endsection
