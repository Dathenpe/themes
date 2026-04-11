<?php
get_header();

$hero_img = get_template_directory_uri() . '/assets/images/pg11_LPG_depot_ship.jpg';

$categories = get_terms([
    'taxonomy'   => 'pcl_project_category',
    'hide_empty' => true,
    'orderby'    => 'term_order',
    'order'      => 'ASC',
]);

$section_bgs = ['bg-offwhite', 'bg-white', 'bg-offwhite', 'bg-purple'];
?>

<main>
  <div class="page-hero">
    <div class="page-hero-bg" style="background-image:url('<?php echo esc_url($hero_img); ?>');"></div>
    <div class="page-hero-diagonal off-white"></div>
    <div class="page-hero-content container">
      <span class="page-label">Portfolio</span>
      <h1>Project <em>Experience</em></h1>
      <p>From ground-breaking to commissioning — a track record built on technical precision and delivery excellence.</p>
    </div>
  </div>

  <?php if (!empty($categories) && !is_wp_error($categories)) : ?>
    <?php foreach ($categories as $i => $cat) : ?>
      <?php
      $bg = $section_bgs[$i % count($section_bgs)];
      $text_class = ($bg === 'bg-purple') ? 'white' : '';
      $projects = new WP_Query([
          'post_type'      => 'pcl_project',
          'posts_per_page' => -1,
          'post_status'    => 'publish',
          'tax_query'      => [[
              'taxonomy' => 'pcl_project_category',
              'field'    => 'term_id',
              'terms'    => $cat->term_id,
          ]],
          'meta_key'       => '_project_order',
          'orderby'        => 'meta_value_num',
          'order'          => 'ASC',
      ]);
      ?>
      <section class="<?php echo esc_attr($bg); ?>">
        <div class="container">
          <span class="section-label"><?php echo esc_html($cat->name); ?></span>
          <div class="gold-line"></div>
          <h2 class="section-title <?php echo esc_attr($text_class); ?>" style="margin-bottom:2.5rem;"><?php echo esc_html($cat->description ?: $cat->name); ?></h2>

          <div class="projects-grid">
            <?php if ($projects->have_posts()) : ?>
              <?php while ($projects->have_posts()) : $projects->the_post(); ?>
                <?php
                $desc  = get_post_meta(get_the_ID(), '_project_desc', true);
                $label = get_post_meta(get_the_ID(), '_project_cat_label', true);
                $title = get_the_title();
                $thumb = get_the_post_thumbnail_url(get_the_ID(), 'large');
                ?>
                <div class="project-card" data-reveal>
                  <?php if ($thumb) : ?>
                    <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($title); ?>">
                  <?php else : ?>
                    <div style="width:100%;height:100%;background:var(--light-grey);display:flex;align-items:center;justify-content:center;">
                      <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#ccc" stroke-width="1"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18M9 21V9"/></svg>
                    </div>
                  <?php endif; ?>
                  <div class="project-overlay">
                    <?php if ($label) : ?>
                      <div class="project-cat"><?php echo esc_html($label); ?></div>
                    <?php endif; ?>
                    <div class="project-title"><?php echo esc_html($title); ?></div>
                    <?php if ($desc) : ?>
                      <div class="project-desc"><?php echo esc_html($desc); ?></div>
                    <?php endif; ?>
                  </div>
                </div>
              <?php endwhile; ?>
              <?php wp_reset_postdata(); ?>
            <?php endif; ?>
          </div>
        </div>
      </section>
    <?php endforeach; ?>
  <?php else : ?>
    <section class="bg-offwhite">
      <div class="container">
        <p style="color:var(--text-mid);padding:2rem 0;">No projects have been added yet. Go to <strong>Projects</strong> in the WordPress admin to add them, and create <strong>Project Categories</strong> to group them into sections.</p>
      </div>
    </section>
  <?php endif; ?>
</main>

<?php get_footer(); ?>