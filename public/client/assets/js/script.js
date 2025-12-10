// Simple header behavior: toggle active class on nav link clicks (demo)
document.addEventListener('DOMContentLoaded', () => {
  const links = document.querySelectorAll('.sa-header-nav .sa-header-link');
  links.forEach(link => {
    link.addEventListener('click', (e) => {
      links.forEach(l => l.classList.remove('sa-header-link--active'));
      e.currentTarget.classList.add('sa-header-link--active');
    });
  });
});

// JavaScript for slider functionality
document.addEventListener('DOMContentLoaded', function() {
  const cards = document.querySelectorAll('.testimonial-card');
  const dots = document.querySelectorAll('.dot');
  const progress = document.querySelector('.slider-progress');
  const handle = document.querySelector('.slider-handle');
  const track = document.querySelector('.slider-indicator');
  let currentSlide = 0;
  const totalSlides = cards.length;

  // Function to update slider
  function updateSlider(slideIndex) {
    // Update cards
    cards.forEach((card, index) => {
      card.classList.toggle('active', index === slideIndex);
    });
    
    // Update dots
    dots.forEach((dot, index) => {
      dot.classList.toggle('active', index === slideIndex);
    });
    
    // Update progress bar and handle
    const progressWidth = ((slideIndex + 1) / totalSlides) * 100;
    progress.style.width = `${progressWidth}%`;
    
    const handlePosition = (slideIndex / (totalSlides - 1)) * 100;
    handle.style.left = `${handlePosition}%`;
    
    currentSlide = slideIndex;
  }

  // Dot click events
  dots.forEach((dot, index) => {
    dot.addEventListener('click', () => {
      updateSlider(index);
    });
  });

  // Track click events
  track.addEventListener('click', (e) => {
    const rect = track.getBoundingClientRect();
    const clickPosition = e.clientX - rect.left;
    const percentage = clickPosition / rect.width;
    const slideIndex = Math.min(Math.floor(percentage * totalSlides), totalSlides - 1);
    updateSlider(slideIndex);
  });

  // Handle drag functionality
  let isDragging = false;

  handle.addEventListener('mousedown', (e) => {
    isDragging = true;
    document.body.style.userSelect = 'none';
  });

  document.addEventListener('mousemove', (e) => {
    if (!isDragging) return;
    
    const rect = track.getBoundingClientRect();
    let percentage = (e.clientX - rect.left) / rect.width;
    percentage = Math.max(0, Math.min(1, percentage));
    
    const slideIndex = Math.min(Math.floor(percentage * totalSlides), totalSlides - 1);
    updateSlider(slideIndex);
  });

  document.addEventListener('mouseup', () => {
    isDragging = false;
    document.body.style.userSelect = '';
  });

  // Auto slide every 5 seconds
  let slideInterval = setInterval(() => {
    currentSlide = (currentSlide + 1) % totalSlides;
    updateSlider(currentSlide);
  }, 5000);

  // Pause auto-slide on interaction
  const sliderElements = [track, ...dots];
  sliderElements.forEach(element => {
    element.addEventListener('mouseenter', () => clearInterval(slideInterval));
    element.addEventListener('mouseleave', () => {
      slideInterval = setInterval(() => {
        currentSlide = (currentSlide + 1) % totalSlides;
        updateSlider(currentSlide);
      }, 5000);
    });
  });

  // Initialize first slide
  updateSlider(0);
});
