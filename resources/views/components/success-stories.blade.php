<div class="container">
    <h1>Success Stories</h1>
    <p>Meet our graduates working at top companies. Get inspired by the journeys of our students who have successfully transitioned into high-paying careers with the help of our courses and mentorship.</p>
    <div class="reviews">
        @foreach($reviews as $review)
            <div class="review-box">
                <span class="avatar">{{ $review['avatar'] }}</span> 
                {{ $review['text'] }}
            </div>
        @endforeach
    </div>
    <a href="#" class="button">See All Reviews</a>
</div>
