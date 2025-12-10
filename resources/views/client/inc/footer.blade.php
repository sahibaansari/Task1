<footer class="sa-footer" aria-label="Site footer">
  <div class="sa-footer-top">
    <div class="sa-footer-inner">

      <!-- LEFT: logo + socials -->
      <div class="sa-footer-brand">
        <div class="sa-footer-logo">
          <img src="{{ asset('client/assets/imgs/footerlogo.png') }}" alt="ShipX">
        </div>

        <div class="sa-footer-socials">
          <a href="#" aria-label="Twitter" class=""><img src="{{ asset('client/assets/imgs/icons/link.png') }}" alt="Linkdin"></a>
          <a href="#" aria-label="Instagram" class=""><img src="{{ asset('client/assets/imgs/icons/insta.png') }}" alt="instagram"></a>
          <a href="#" aria-label="LinkedIn" class=""><img src="{{ asset('client/assets/imgs/icons/twit.png') }}" alt="twiter"></a>
        </div>
      </div>

      <!-- RIGHT: copyright -->
      <div class="sa-footer-copyright">
        ©{{ date('Y') }} ShipX. All Rights Reserved.
      </div>

    </div>
  </div>

  <!-- thin divider -->
  <div class="sa-footer-divider" role="presentation"></div>

  <!-- bottom content: newsletter + columns -->
  <div class="sa-footer-bottom">
    <div class="sa-footer-inner-grid">

      <!-- Newsletter -->
      <div class="sa-footer-newsletter">
        <h4 class="sa-footer-heading">Subscribe to Chainex</h4>

        <form action="#" method="POST" class="sa-news-form">
          @csrf
          <div class="sa-news-input-wrap">
            <input type="email" name="email" class="sa-news-input" placeholder="Enter your Email" required>
            <button class="sa-news-btn" type="submit">Sign up</button>
          </div>
        </form>
      </div>

      <!-- Links columns -->
      <div class="sa-footer-links">
        <div class="sa-links-col">
          <h5 class="sa-col-title">Explore</h5>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Solutions</a></li>
            <li><a href="#">Blog</a></li>
          </ul>
        </div>

        <div class="sa-links-col">
          <h5 class="sa-col-title">Solutions</h5>
          <ul>
            <li><a href="#">Freight Management</a></li>
            <li><a href="#">Order Tracking</a></li>
            <li><a href="#">Carrier Integration</a></li>
            <li><a href="#">Analytics Dashboard</a></li>
          </ul>
        </div>

        <div class="sa-links-col">
          <h5 class="sa-col-title">Resources</h5>
          <ul>
            <li><a href="#">Help Center</a></li>
            <li><a href="#">FAQs</a></li>
            <li><a href="#">Terms of Service</a></li>
            <li><a href="#">Privacy Policy</a></li>
          </ul>
        </div>
      </div>

    </div>
  </div>
</footer>
