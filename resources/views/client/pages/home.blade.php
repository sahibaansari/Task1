@extends('client.layouts.main')
@section('title', 'Home')

@section('content')
  <!-- HERO SECTION -->
  <section class="sa-hero" >
    <div class="sa-hero-inner">
      <!-- Main heading (two lines) -->
      <h1 class="sa-hero-title">STAY AHEAD<br>IN SHIPPING AND LOGISTICS</h1>

      <!-- short paragraph -->
      <p class="sa-hero-sub">
        Discover key insights and trends to enhance your shipping strategies and stay competitive
      </p>

      <!-- CTA group (Primary + Secondary) -->
      <div class="sa-hero-cta-group" role="group" aria-label="Hero actions">
        <!-- Primary -->
        <a href="#contact" class="sa-cta-primary">
          <span>Contact us</span>
         <span class="sa-cta-circle" aria-hidden="true">
      <img src="{{ asset('client/assets/imgs/icons/arrow.png') }}" alt="arrow icon" class="sa-cta-icon">
  </span>
        </a>

        <!-- Secondary -->
        <a href="#video" class="sa-cta-secondary">
          <span>Play video</span>
         <span class="sa-cta-circle" aria-hidden="true">
      <img src="{{ asset('client/assets/imgs/icons/continue.png') }}" alt="arrow icon" class="sa-cta-icon">
  </span>
        </a>
      </div>
    </div>

    <!-- LEFT COLUMN PILLS -->
    <div class="sa-pill sa-pill--left sa-pill--1 sa-pill--large">
      <span class="sa-pill-icon"><img src="{{ asset('client/assets/imgs/icons/hero.png') }}" alt="Hero icon"></span>
      <span class="sa-pill-text">Hero</span>
    </div>

    <div class="sa-pill sa-pill--left sa-pill--2 sa-pill--small">
      <span class="sa-pill-icon"><img src="{{ asset('client/assets/imgs/icons/tata.png') }}" alt="Tata"></span>
      <span class="sa-pill-text">Tata</span>
    </div>

    <div class="sa-pill sa-pill--left sa-pill--3 sa-pill--small">
      <span class="sa-pill-icon"><img src="{{ asset('client/assets/imgs/icons/lego.png') }}" alt="Lego"></span>
      <span class="sa-pill-text">Lego</span>
    </div>

    <!-- RIGHT COLUMN PILLS -->
    <div class="sa-pill sa-pill--right sa-pill--1 sa-pill--small">
      <span class="sa-pill-icon"><img src="{{ asset('client/assets/imgs/icons/myntra.png') }}" alt="Myntra"></span>
      <span class="sa-pill-text">Myntra</span>
    </div>

    <div class="sa-pill sa-pill--right sa-pill--2 sa-pill--small">
      <span class="sa-pill-icon"><img src="{{ asset('client/assets/imgs/icons/adidas.png') }}" alt="Adidas"></span>
      <span class="sa-pill-text">Adidas</span>
    </div>

    <div class="sa-pill sa-pill--right sa-pill--3 sa-pill--small">
      <span class="sa-pill-icon"><img src="{{ asset('client/assets/imgs/icons/h&m.png') }}" alt="H&M"></span>
      <span class="sa-pill-text">H&M</span>
    </div>
  </section>


   <section class="testimonial-section" aria-label="Testimonials">
  <div class="testimonial-container">
    <!-- LEFT: Heading + Description + Buttons -->
    <div class="testimonial-left">
      <span class="testimonial-tag">Testimonial</span>
      <h2 class="testimonial-title">
        What Do Our<br>Clients Say
      </h2>
      <p class="testimonial-description">
        We make shipping simple with fast booking, red-time tracking, and secure, on-time delivery for every cargo across the globe.
      </p>
      <div class="testimonial-buttons">
        <a href="#contact" class="btn btn-primary">Contact us</a>
        <a href="#get-started" class="btn btn-secondary">Get Started</a>
      </div>
    </div>

    <!-- RIGHT: Testimonial Slider -->
    <div class="testimonial-right">
      <!-- Testimonial Card -->
      <div class="testimonial-card active">
        <div class="testimonial-header">
          <div class="testimonial-profile">
            <div class="profile-avatar">OJ</div>
            <div class="profile-info">
              <h3 class="profile-name">Olivia Jonathan</h3>
              <p class="profile-role">CEO at Shipso</p>
            </div>
          </div>
          <div class="testimonial-rating">
            ★ ★ ★ ★ ★
          </div>
        </div>
        
        <blockquote class="testimonial-quote">
          "Shop X has completely changed the way we manage logistics. The platform is easy to use, and their tracking system keeps us updated at every step"
        </blockquote>
        
        <div class="testimonial-route">
          <span class="route-from">Mumbai</span>
          <span class="route-arrow">→</span>
          <span class="route-to">Delhi</span>
        </div>
      </div>
      
      <!-- Second Testimonial Card -->
      <div class="testimonial-card">
        <div class="testimonial-header">
          <div class="testimonial-profile">
            <div class="profile-avatar">MJ</div>
            <div class="profile-info">
              <h3 class="profile-name">Marie Jane</h3>
              <p class="profile-role">CTO at Monk</p>
            </div>
          </div>
          <div class="testimonial-rating">
            ★ ★ ★ ★ ★
          </div>
        </div>
        
        <blockquote class="testimonial-quote">
          "Their logistics solutions have transformed our supply chain management with exceptional efficiency and reliability."
        </blockquote>
        
        <div class="testimonial-route">
          <span class="route-from">Bangalore</span>
          <span class="route-arrow">→</span>
          <span class="route-to">Chennai</span>
        </div>
      </div>
      
      <!-- Third Testimonial Card -->
      <div class="testimonial-card">
        <div class="testimonial-header">
          <div class="testimonial-profile">
            <div class="profile-avatar">RJ</div>
            <div class="profile-info">
              <h3 class="profile-name">Robert Johnson</h3>
              <p class="profile-role">Operations Head</p>
            </div>
          </div>
          <div class="testimonial-rating">
            ★ ★ ★ ★ ★
          </div>
        </div>
        
        <blockquote class="testimonial-quote">
          "Outstanding service and reliable delivery. Our business has grown significantly with their logistics support."
        </blockquote>
        
        <div class="testimonial-route">
          <span class="route-from">Kolkata</span>
          <span class="route-arrow">→</span>
          <span class="route-to">Hyderabad</span>
        </div>
      </div>
      
      <!-- Sliding Indicator Bar -->
      <div class="slider-indicator">
        <div class="slider-track">
          <div class="slider-progress"></div>
        </div>
        <div class="slider-handle"></div>
      </div>
      
      <!-- Navigation Dots -->
      <div class="slider-dots">
        <button class="dot active" data-slide="0" aria-label="Go to slide 1"></button>
        <button class="dot" data-slide="1" aria-label="Go to slide 2"></button>
        <button class="dot" data-slide="2" aria-label="Go to slide 3"></button>
      </div>
    </div>
  </div>
</section>



<section class="sa-track-section" aria-label="Tracking">
  <div class="sa-track-inner">

    <!-- LEFT: copy + CTAs -->
    <div class="sa-track-left">
      <span class="sa-track-tag">Tracking</span>

      <h2 class="sa-track-title">
        Unlock The Full<br>
        Power of ShipX<br>
        Logistics
      </h2>

      <p class="sa-track-desc">
        Track shipments, monitor vehicles, and analyze data—all from one smart dashboard.
        Ship X simplifies your logistics with full control and visibility.
      </p>

      <div class="sa-track-ctas">
        <a href="#contact" class="sa-btn sa-btn-primary">
          <span>Contact us</span>
           <span class="sa-btn-icon">
        <img src="{{ asset('client/assets/imgs/icons/arrow.png') }}" alt="arrow" class="sa-icon-img">
    </span>
        </a>

        <a href="#get-started" class="sa-btn sa-btn-ghost">
          <span>Get Started</span>
           <span class="sa-btn-icon">
        <img src="{{ asset('client/assets/imgs/icons/arrow.png') }}" alt="arrow" class="sa-icon-img">
    </span>
        </a>
      </div>
    </div>

    <!-- RIGHT: image card -->
    <div class="sa-track-right">
      <div class="sa-image-card">
        <img src="{{ asset('client/assets/imgs/tracking.jpg') }}" alt="Person at laptop" class="sa-image">

        <!-- inner rounded frame decoration -->
        <span class="sa-image-frame" aria-hidden="true"></span>

        <!-- stats panel -->
     
      </div>
    </div>

  </div>
</section>

<section class="sa-contact-section" aria-label="Contact us">
    <div class="sa-contact-container">

        <!-- LEFT: MAP -->
        <div class="sa-contact-map">
            <iframe
                src="https://www.google.com/maps?q=India%20Mumbai&z=5&output=embed"
                class="sa-contact-iframe"
                loading="lazy">
            </iframe>
        </div>

        <!-- RIGHT: FORM -->
        <div class="sa-contact-form-wrapper">
            <h3 class="sa-contact-title">Send Us A Message</h3>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="sa-contact-form" method="POST" action="{{ route('contact.submit') }}" enctype="multipart/form-data">
                @csrf

                <div class="sa-contact-row">
                    <input type="text" name="fullname" placeholder="Full Name" class="sa-contact-input" value="{{ old('fullname') }}" required>
                    <input type="text" name="business" placeholder="Business Name" class="sa-contact-input" value="{{ old('business') }}">
                </div>

                <div class="sa-contact-row">
                    <input type="email" name="email" placeholder="Email Id" class="sa-contact-input" value="{{ old('email') }}" required>
                    <input type="text" name="phone" placeholder="Phone Number" class="sa-contact-input" value="{{ old('phone') }}">
                </div>

                <div class="sa-contact-file-row">
                    <label class="sa-contact-file-label">
                        Choose File
                        <input type="file" name="file" class="sa-contact-file-input" id="fileInput">
                    </label>
                    <span class="sa-contact-file-name" id="fileName">No File Chosen</span>
                </div>

                <textarea name="message" placeholder="Your Message" class="sa-contact-textarea" required>{{ old('message') }}</textarea>

                <button type="submit" class="sa-contact-submit-btn">Submit</button>
            </form>
        </div>
    </div>
</section>

<script>
document.getElementById('fileInput').addEventListener('change', function(e) {
    const fileName = this.files[0] ? this.files[0].name : 'No File Chosen';
    document.getElementById('fileName').textContent = fileName;
});



@endsection

@section('script')
@endsection
