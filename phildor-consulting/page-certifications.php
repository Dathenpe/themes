<?php
get_header();

$hero_img = get_template_directory_uri() . '/assets/images/cover_LPG_spherical_tanks.jpg';

$all_certs = new WP_Query([
    'post_type'      => 'certification',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
    'meta_key'       => '_cert_order',
    'orderby'        => 'meta_value_num',
    'order'          => 'ASC',
]);

$nmdpra       = [];
$company      = [];
$professional = [];

if ($all_certs->have_posts()) {
    while ($all_certs->have_posts()) {
        $all_certs->the_post();
        $id   = get_the_ID();
        $type = get_post_meta($id, '_cert_type', true);
        $item = [
            'id'      => $id,
            'title'   => get_the_title(),
            'thumb'   => get_the_post_thumbnail_url($id, 'large'),
            'issuer'  => get_post_meta($id, '_cert_issuer', true),
            'number'  => get_post_meta($id, '_cert_number', true),
            'issued'  => get_post_meta($id, '_cert_issued', true),
            'expires' => get_post_meta($id, '_cert_expires', true),
            'badge'   => get_post_meta($id, '_cert_badge', true),
        ];
        if ($type === 'company') {
            $company[] = $item;
        } elseif ($type === 'professional') {
            $professional[] = $item;
        } else {
            $nmdpra[] = $item;
        }
    }
    wp_reset_postdata();
}

$total = count($nmdpra) + count($company) + count($professional);
?>

<main>
  <div class="page-hero">
    <div class="page-hero-bg" style="background-image:url('<?php echo esc_url($hero_img); ?>');"></div>
    <div class="page-hero-diagonal"></div>
    <div class="page-hero-content container">
      <span class="page-label">Credentials</span>
      <h1>Certifications &amp; <em>Licences</em></h1>
      <p>Fully licensed, regulated, and compliant with all Nigerian engineering and petroleum industry authorities.</p>
    </div>
  </div>

  <section class="bg-white">
    <div class="container">
      <span class="section-label">Our Credentials</span>
      <div class="gold-line"></div>
      <div class="cert-intro-row">
        <h2 class="section-title">Verified. Licensed. Compliant.</h2>
        <p class="section-desc">Phildor Consulting Limited operates with full regulatory compliance across all relevant Nigerian professional and petroleum industry authorities. Certified copies of all documents are available on request.</p>
      </div>

      <div class="cert-summary-strip" data-reveal>
        <div class="cert-summary-item"><div class="cs-num"><?php echo $total ?: '6'; ?></div><div class="cs-label">Active Certifications</div></div>
        <div class="cert-summary-item"><div class="cs-num">2026</div><div class="cs-label">Latest Permit Expiry</div></div>
        <div class="cert-summary-item"><div class="cs-num">2023</div><div class="cs-label">Year Incorporated</div></div>
        <div class="cert-summary-item"><div class="cs-num">100%</div><div class="cs-label">Compliance Record</div></div>
      </div>

      <?php if (!empty($nmdpra)) : ?>
        <div class="cert-section" data-reveal>
          <div class="cert-section-label">NMDPRA Industry Service Permits</div>
          <div class="cert-docs-grid cert-docs-2col">
            <?php foreach ($nmdpra as $cert) : ?>
              <div class="cert-doc-card">
                <div class="cert-doc-header">
                  <?php if ($cert['badge']) : ?>
                    <div class="cert-doc-badge cert-doc-badge-purple"><?php echo esc_html($cert['badge']); ?></div>
                  <?php endif; ?>
                  <?php if ($cert['issuer']) : ?>
                    <div class="cert-doc-issuer"><?php echo esc_html($cert['issuer']); ?></div>
                  <?php endif; ?>
                </div>
                <?php if ($cert['thumb']) : ?>
                  <div class="cert-doc-img-wrap">
                    <img src="<?php echo esc_url($cert['thumb']); ?>" alt="<?php echo esc_attr($cert['title']); ?>" class="cert-doc-img" loading="lazy">
                  </div>
                <?php endif; ?>
                <div class="cert-doc-meta">
                  <?php if ($cert['number']) : ?>
                    <div class="cert-meta-row"><span class="cert-meta-key">Permit No.</span><span class="cert-meta-val"><?php echo esc_html($cert['number']); ?></span></div>
                  <?php endif; ?>
                  <div class="cert-meta-row"><span class="cert-meta-key">Category</span><span class="cert-meta-val"><?php echo esc_html($cert['title']); ?></span></div>
                  <?php if ($cert['issued']) : ?>
                    <div class="cert-meta-row"><span class="cert-meta-key">Issued</span><span class="cert-meta-val"><?php echo esc_html($cert['issued']); ?></span></div>
                  <?php endif; ?>
                  <?php if ($cert['expires']) : ?>
                    <div class="cert-meta-row"><span class="cert-meta-key">Expires</span><span class="cert-meta-val cert-meta-expiry"><?php echo esc_html($cert['expires']); ?></span></div>
                  <?php endif; ?>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endif; ?>

      <?php if (!empty($company)) : ?>
        <div class="cert-section" data-reveal>
          <div class="cert-section-label">Company Registration &amp; Compliance</div>
          <div class="cert-docs-grid cert-docs-2col">
            <?php foreach ($company as $cert) : ?>
              <div class="cert-doc-card">
                <div class="cert-doc-header">
                  <?php if ($cert['badge']) : ?>
                    <div class="cert-doc-badge cert-doc-badge-purple"><?php echo esc_html($cert['badge']); ?></div>
                  <?php endif; ?>
                  <?php if ($cert['issuer']) : ?>
                    <div class="cert-doc-issuer"><?php echo esc_html($cert['issuer']); ?></div>
                  <?php endif; ?>
                </div>
                <?php if ($cert['thumb']) : ?>
                  <div class="cert-doc-img-wrap">
                    <img src="<?php echo esc_url($cert['thumb']); ?>" alt="<?php echo esc_attr($cert['title']); ?>" class="cert-doc-img" loading="lazy">
                  </div>
                <?php endif; ?>
                <div class="cert-doc-meta">
                  <?php if ($cert['number']) : ?>
                    <div class="cert-meta-row"><span class="cert-meta-key">Cert No.</span><span class="cert-meta-val"><?php echo esc_html($cert['number']); ?></span></div>
                  <?php endif; ?>
                  <div class="cert-meta-row"><span class="cert-meta-key">Description</span><span class="cert-meta-val"><?php echo esc_html($cert['title']); ?></span></div>
                  <?php if ($cert['issued']) : ?>
                    <div class="cert-meta-row"><span class="cert-meta-key">Issued</span><span class="cert-meta-val"><?php echo esc_html($cert['issued']); ?></span></div>
                  <?php endif; ?>
                  <?php if ($cert['expires']) : ?>
                    <div class="cert-meta-row"><span class="cert-meta-key">Expires</span><span class="cert-meta-val cert-meta-expiry"><?php echo esc_html($cert['expires']); ?></span></div>
                  <?php endif; ?>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endif; ?>

      <?php if (!empty($professional)) : ?>
        <div class="cert-section" data-reveal>
          <div class="cert-section-label">Professional Engineering Credentials</div>
          <div class="cert-docs-grid cert-docs-3col">
            <?php foreach ($professional as $cert) : ?>
              <div class="cert-card">
                <?php if ($cert['thumb']) : ?>
                  <img src="<?php echo esc_url($cert['thumb']); ?>" alt="<?php echo esc_attr($cert['title']); ?>" style="width:100%;height:120px;object-fit:cover;margin-bottom:0.75rem;">
                <?php else : ?>
                  <div class="cert-icon">
                    <svg viewBox="0 0 24 24"><circle cx="12" cy="8" r="6"/><path d="M15.477 12.89L17 22l-5-3-5 3 1.523-9.11"/></svg>
                  </div>
                <?php endif; ?>
                <div class="cert-body">
                  <h3><?php echo esc_html($cert['title']); ?></h3>
                  <?php if ($cert['issuer']) : ?>
                    <p><?php echo esc_html($cert['issuer']); ?></p>
                  <?php endif; ?>
                  <?php if ($cert['number']) : ?>
                    <div class="cert-num"><?php echo esc_html($cert['number']); ?></div>
                  <?php endif; ?>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endif; ?>

      <?php if (empty($nmdpra) && empty($company) && empty($professional)) : ?>
        <p style="color:var(--text-mid);padding:2rem 0;">No certifications added yet. Go to <strong>Certifications</strong> in the WordPress admin to add them.</p>
      <?php endif; ?>

      <div class="cert-request-banner" data-reveal>
        <div class="cert-request-text">
          <h3>Need Certified Copies?</h3>
          <p>Certified copies of all certificates and permits are available on request for procurement, tender, and compliance purposes.</p>
        </div>
        <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn-primary">Request Documents</a>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>
