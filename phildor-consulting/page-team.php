<?php
get_header();

$hero_img = get_template_directory_uri() . '/assets/images/pg11_LPG_depot_spherical_tank2.jpg';

$team_query = new WP_Query([
    'post_type'      => 'team_member',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
    'meta_key'       => '_team_order',
    'orderby'        => 'meta_value_num',
    'order'          => 'ASC',
]);
?>

<main>
  <div class="page-hero">
    <div class="page-hero-bg" style="background-image:url('<?php echo esc_url($hero_img); ?>');"></div>
    <div class="page-hero-diagonal"></div>
    <div class="page-hero-content container">
      <span class="page-label">Leadership</span>
      <h1>Key Management <em>Team</em></h1>
      <p>Decades of frontline industry expertise — directly accessible on every project.</p>
    </div>
  </div>

  <section class="bg-white">
    <div class="container">
      <div style="margin-bottom: 3rem;">
        <span class="section-label">Our People</span>
        <div class="gold-line"></div>
        <h2 class="section-title">Experienced. Accessible. Accountable.</h2>
        <p class="section-desc" style="margin-top: 1rem;">Our leadership team brings together decades of frontline experience in the global Oil &amp; Gas and Infrastructure sectors, ensuring every engagement benefits from senior-level oversight and direct accountability. Unlike larger firms, at PCL our principals are directly involved in your project.</p>
      </div>

      <div class="team-grid">
        <?php if ($team_query->have_posts()) : ?>
          <?php while ($team_query->have_posts()) : $team_query->the_post(); ?>
            <?php
            $role  = get_post_meta(get_the_ID(), '_team_role', true);
            $name  = get_the_title();
            $thumb = get_the_post_thumbnail_url(get_the_ID(), 'large');
            $alt   = esc_attr($name);
            ?>
            <div class="team-card" data-reveal>
              <?php if ($thumb) : ?>
                <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo $alt; ?>">
              <?php else : ?>
                <div style="width:100%;height:280px;background:var(--off-white);display:flex;align-items:center;justify-content:center;">
                  <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="#ccc" stroke-width="1"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                </div>
              <?php endif; ?>
              <div class="team-info">
                <h3><?php echo esc_html($name); ?></h3>
                <?php if ($role) : ?>
                  <div class="role"><?php echo esc_html($role); ?></div>
                <?php endif; ?>
              </div>
            </div>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        <?php else : ?>
          <p style="color:var(--text-mid);padding:2rem 0;">No team members have been added yet. Go to <strong>Team Members</strong> in the WordPress admin to add them.</p>
        <?php endif; ?>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>
