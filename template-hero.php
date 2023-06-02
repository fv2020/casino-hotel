<?php
/*
Template Name: Custom Page Template
*/
?>

<?php get_header(); ?>

<section class="hero" style="background-image: url('<?php the_field('hero_background_image'); ?>');">
  <div class="hero-text">
    <h2><?php the_field('hero_text'); ?></h2>
    <a href="#table-section" class="smooth-scroll" style="background-color: #FC115C;"><?php the_field('hero_button_text'); ?></a>
  </div>
</section>

<section class="about-us">
  <div class="about-content">
    <div class="container">
      <h2><?php the_field('about_title'); ?></h2>
      <h1><?php the_field('about_sub_title'); ?></h1>
      <?php the_field('about_content'); ?>
      <?php if (get_field('about_button')) : ?>
        <?php $about_button = get_field('about_button'); ?>
        <a href="<?php echo esc_url($about_button['url']); ?>" class="about-button"><?php echo esc_html($about_button['title']); ?></a>
      <?php endif; ?>
    </div>
  </div>

  <div class="about-image">
    <div class="container">
      <?php $about_image = get_field('about_image'); ?>
      <?php if ($about_image) : ?>
        <img src="<?php echo esc_url($about_image['url']); ?>" alt="<?php echo esc_attr($about_image['alt']); ?>" />
      <?php endif; ?>
    </div>
  </div>
</section>

<section class="table-section" id="table-section">
  <div class="container">
    <h3><?php the_field('table_heading'); ?></h3>
    <p><?php echo date('F j, Y'); ?></p>
    
    <table class="table">
      <thead>
        <tr>
          <th>Logo</th>
          <th>Address</th>
          <th>Star Rating</th>
          <th>Score</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php
          $args = array(
            'post_type' => 'casino_hotel',
            'posts_per_page' => -1, // Retrieve all posts
            'meta_key' => 'score',
            'orderby' => 'meta_value_num',
            'order' => 'DESC',
          );
          $query = new WP_Query($args);
          if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
              $logo = get_field('logo');
              $address = get_field('address');
              $star_rating = get_field('star_rating');
              $score = get_field('score');
              $external_link = get_field('external_link');
        ?>
        <tr>
          <td>
            <?php if ($logo): ?>
              <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" width="50" height="50" />
            <?php endif; ?>
          </td>
          <td><?php echo $address; ?></td>
          <td>
            <div class="star-rating">
              <?php for ($i = 1; $i <= 5; $i++) : ?>
                <?php if ($i <= $star_rating) : ?>
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#fbbf24" width="16px" height="16px">
                    <path d="M0 0h24v24H0z" fill="none"/>
                    <path d="M12 17.27l-5.6 3.46 1.6-6.04L2.94 9.81l6.68-.58L12 3l2.38 5.23 6.68.58-4.06 3.88 1.6 6.04z"/>
                  </svg>
                <?php else : ?>
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#fbbf24" width="16px" height="16px">
                    <path d="M0 0h24v24H0z" fill="none"/>
                    <path d="M12 17.27l-5.6 3.46 1.6-6.04L2.94 9.81l6.68-.58L12 3l2.38 5.23 6.68.58-4.06 3.88 1.6 6.04z" opacity=".5"/>
                  </svg>
                <?php endif; ?>
              <?php endfor; ?>
            </div>
          </td>
          <td>
            <div class="score-circle">
              <svg class="rating-circle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <circle class="rating-circle-bg" cx="12" cy="12" r="4" fill="transparent" stroke="#E2E8F0" stroke-width="1" />
                <circle class="rating-circle-fill" cx="12" cy="12" r="4" fill="transparent" stroke="#FC115C" stroke-width="1" stroke-dasharray="<?php echo ($score / 10) * 31.4; ?> 31.4" transform="rotate(-90 12 12)" />
                <text class="score-text" x="12" y="12" text-anchor="middle" alignment-baseline="middle" style="font-size: 4px;"><?php echo $score; ?></text>
              </svg>
            </div>
          </td>
          <td>
            <?php if ($external_link): ?>
              <a href="<?php echo $external_link; ?>" class="about-button">View Hotel</a>
            <?php endif; ?><br>
            <a href="<?php the_permalink(); ?>" class="hotel-link-button">Read Review</a>
          </td>
        </tr>
        <?php
            endwhile;
            wp_reset_postdata();
          else :
        ?>
        <tr>
          <td colspan="5">No hotels found.</td>
        </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</section>

<section class="about-us">
  <div class="about-image">
    <div class="container">
      <?php $about_image = get_field('about_image'); ?>
      <?php if ($about_image) : ?>
        <img src="<?php echo esc_url($about_image['url']); ?>" alt="<?php echo esc_attr($about_image['alt']); ?>" />
      <?php endif; ?>
    </div>
  </div>
  
  <div class="about-content">
    <div class="container">
      <h2><?php the_field('foot_title'); ?></h2>
      <h1><?php the_field('foot_sub_title'); ?></h1>
      <?php the_field('foot_content'); ?>
      <?php if (get_field('foot_button')) : ?>
        <?php $about_button = get_field('foot_button'); ?>
        <a href="<?php echo esc_url($about_button['url']); ?>" class="about-button"><?php echo esc_html($about_button['title']); ?></a>
      <?php endif; ?>
      
    </div>
  </div>
</section>

<?php get_footer(); ?>
