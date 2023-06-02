<footer>
  <div class="container">
    <div class="footer-content">
      <div class="footer-column">
        <h4>About Us</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque faucibus ante nec elit faucibus, et maximus odio tincidunt.</p>
      </div>
      <div class="footer-column">
        <h4>Contact</h4>
        <p>123 Street, City<br>
        Country<br>
        Phone: 123-456-7890<br>
        Email: info@example.com</p>
      </div>
      <div class="footer-column">
        <h4>Follow Us</h4>
        <ul class="social-icons">
          <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
          <li><a href="#"><i class="fab fa-twitter"></i></a></li>
          <li><a href="#"><i class="fab fa-instagram"></i></a></li>
        </ul>
      </div>
    </div>
  </div>
  
  <div class="footer-navigation">
    <div class="container">
      <?php
      wp_nav_menu(
        array(
          'theme_location' => 'footer-menu',
          'container' => false,
          'menu_class' => 'footer-menu',
          'fallback_cb' => false,
        )
      );
      ?>
    </div>
  </div>
</footer>
