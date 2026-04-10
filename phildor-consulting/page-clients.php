<?php
get_header();

$hero_img = get_template_directory_uri() . '/assets/images/pg11_LPG_depot_spherical_tank1.jpg';

$all_clients = new WP_Query([
    'post_type'      => 'client_logo',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
    'meta_key'       => '_client_order',
    'orderby'        => 'meta_value_num',
    'order'          => 'ASC',
]);

$clients          = [];
$foreign_partners = [];
$local_partners   = [];

if ($all_clients->have_posts()) {
    while ($all_clients->have_posts()) {
        $all_clients->the_post();
        $id   = get_the_ID();
        $type = get_post_meta($id, '_client_type', true);
        $item = [
            'id'      => $id,
            'title'   => get_the_title(),
            'thumb'   => get_the_post_thumbnail_url($id, 'medium'),
            'country' => get_post_meta($id, '_client_country', true),
            'service' => get_post_meta($id, '_client_service', true),
        ];
        if ($type === 'foreign_partner') {
            $foreign_partners[] = $item;
        } elseif ($type === 'local_partner') {
            $local_partners[] = $item;
        } else {
            $clients[] = $item;
        }
    }
    wp_reset_postdata();
}
?>

<main>
  <div class="page-hero">
    <div class="page-hero-bg" style="background-image:url('<?php echo esc_url($hero_img); ?>');"></div>
    <div class="page-hero-diagonal"></div>
    <div class="page-hero-content container">
      <span class="page-label">Our Network</span>
      <h1>Clients &amp; <em>Partners</em></h1>
      <p>Trusted by leading Nigerian operators. Connected to the world's best technology providers.</p>
    </div>
  </div>

  <section class="bg-white">
    <div class="container">

      <?php if (!empty($clients)) : ?>
        <div style="margin-bottom:4rem;">
          <span class="section-label">Our Clients</span>
          <div class="gold-line"></div>
          <h2 class="section-title" style="margin-bottom:0.75rem;">Trusted By Industry Leaders</h2>
          <p class="section-desc" style="margin-bottom:2.5rem;">PCL has served some of Nigeria's most prominent Oil &amp; Gas operators, delivering technical excellence and project management services that meet the highest standards.</p>
          <div class="client-logos-grid">
            <?php foreach ($clients as $client) : ?>
              <div class="client-logo-card" data-reveal>
                <?php if ($client['thumb']) : ?>
                  <img src="<?php echo esc_url($client['thumb']); ?>" alt="<?php echo esc_attr($client['title']); ?>" loading="lazy">
                <?php else : ?>
                  <span style="font-size:0.85rem;font-weight:600;color:var(--purple-dark);text-align:center;"><?php echo esc_html($client['title']); ?></span>
                <?php endif; ?>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endif; ?>

      <?php if (!empty($foreign_partners)) : ?>
        <div style="margin-bottom:4rem;">
          <span class="section-label">International Partners</span>
          <div class="gold-line"></div>
          <h2 class="section-title" style="margin-bottom:2rem;">Foreign Partners</h2>
          <div class="partners-grid">
            <?php foreach ($foreign_partners as $partner) : ?>
              <div class="partner-card" data-reveal>
                <?php if ($partner['country']) : ?>
                  <div class="partner-flag"><?php echo esc_html(strtoupper($partner['country'])); ?></div>
                <?php endif; ?>
                <div class="partner-name"><?php echo esc_html($partner['title']); ?></div>
                <?php if ($partner['service']) : ?>
                  <div class="partner-service"><?php echo esc_html($partner['service']); ?></div>
                <?php endif; ?>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endif; ?>

      <?php if (!empty($local_partners)) : ?>
        <div class="local-partners-section" data-reveal>
          <h3>Local Partners</h3>
          <div class="local-grid">
            <?php foreach ($local_partners as $partner) : ?>
              <div class="local-card">
                <h4><?php echo esc_html($partner['title']); ?></h4>
                <?php if ($partner['service']) : ?>
                  <p><?php echo esc_html($partner['service']); ?></p>
                <?php endif; ?>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endif; ?>

      <?php if (empty($clients) && empty($foreign_partners) && empty($local_partners)) : ?>
        <p style="color:var(--text-mid);padding:2rem 0;">No entries yet. Go to <strong>Client Logos</strong> in the WordPress admin to add clients and partners.</p>
      <?php endif; ?>

    </div>
  </section>
</main>

<?php get_footer(); ?>