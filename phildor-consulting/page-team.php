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

      <style>
        .team-grid-v2 {
          display: grid;
          grid-template-columns: 1fr;
          gap: 2.5rem;
          max-width: 1200px;
          margin: 0 auto;
        }
        
        @media (min-width: 640px) {
          .team-grid-v2 {
            grid-template-columns: repeat(2, 1fr);
            gap: 3rem 2rem;
          }
        }
        
        @media (min-width: 1024px) {
          .team-grid-v2 {
            grid-template-columns: repeat(3, 1fr);
            gap: 3.5rem 2.5rem;
          }
        }

        .team-card-v2 {
          display: flex;
          flex-direction: column;
          align-items: center;
          text-align: center;
        }

        .team-image-frame {
          position: relative;
          width: 100%;
          max-width: 320px;
          padding: 8px;
          border: 3px solid #3B1F6E;
          background: #fff;
          margin-bottom: 1.25rem;
          box-sizing: border-box;
        }

        .team-image-frame img {
          width: 100%;
          height: 320px;
          object-fit: cover;
          object-position: top;
          display: block;
        }
        
        @media (min-width: 1024px) {
          .team-image-frame img {
            height: 380px;
          }
        }

        .team-placeholder {
          width: 100%;
          height: 320px;
          background: #F7F5F0;
          display: flex;
          align-items: center;
          justify-content: center;
        }

        .team-frame-accent {
          position: absolute;
          bottom: 8px;
          left: 8px;
          right: 8px;
          height: 4px;
          background: #C9A84C;
        }

        .team-info-v2 {
          padding: 0 0.5rem;
        }

        .team-info-v2 h3 {
          font-family: 'Cormorant Garamond', serif;
          font-size: 1.1rem;
          font-weight: 700;
          color: #230F47;
          margin-bottom: 0.4rem;
          line-height: 1.3;
        }
        
        @media (min-width: 1024px) {
          .team-info-v2 h3 {
            font-size: 1.25rem;
          }
        }

        .team-info-v2 .role {
          font-size: 0.7rem;
          color: #9A7828;
          letter-spacing: 1px;
          text-transform: uppercase;
          font-weight: 600;
          line-height: 1.4;
        }
        
        @media (min-width: 1024px) {
          .team-info-v2 .role {
            font-size: 0.75rem;
          }
        }
      </style>

      <div class="team-grid-v2">
        <?php if ($team_query->have_posts()) : ?>
          <?php while ($team_query->have_posts()) : $team_query->the_post(); ?>
            <?php
            $role  = get_post_meta(get_the_ID(), '_team_role', true);
            $name  = get_the_title();
            $thumb = get_the_post_thumbnail_url(get_the_ID(), 'large');
            $alt   = esc_attr($name);
            ?>
            <div class="team-card-v2" data-reveal>
              <div class="team-image-frame">
                <?php if ($thumb) : ?>
                  <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo $alt; ?>">
                <?php else : ?>
                  <div class="team-placeholder">
                    <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="#ccc" stroke-width="1"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                  </div>
                <?php endif; ?>
                <div class="team-frame-accent"></div>
              </div>
              <div class="team-info-v2">
                <h3><?php echo esc_html($name); ?></h3>
                <?php if ($role) : ?>
                  <div class="role"><?php echo esc_html($role); ?></div>
                <?php endif; ?>
              </div>
            </div>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        <?php else : ?>
          <p style="color:#4A4060;padding:2rem 0;grid-column:1/-1;">No team members have been added yet. Go to <strong>Team Members</strong> in the WordPress admin to add them.</p>
        <?php endif; ?>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>