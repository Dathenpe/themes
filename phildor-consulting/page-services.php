<?php
get_header();
$uri = get_template_directory_uri();
?>
<main>
  <div class="page-hero">
    <div class="page-hero-bg" style="background-image:url('<?php echo $uri; ?>/assets/images/pg11_LPG_depot_spherical_tank1.jpg');"></div>
    <div class="page-hero-diagonal"></div>
    <div class="page-hero-content container">
      <span class="page-label">What We Do</span>
      <h1>Our <em>Services</em></h1>
      <p>Elite engineering and consultancy expertise across the full Oil, Gas, and Infrastructure project lifecycle.</p>
    </div>
  </div>

  <section class="bg-offwhite">
    <div class="container">
      <div style="margin-bottom:3rem;">
        <span class="section-label">Service Offerings</span>
        <div class="gold-line"></div>
        <h2 class="section-title">Engineering Excellence With a Vision</h2>
        <p class="section-desc" style="margin-top:1rem;">From concept to commissioning, we deploy elite expertise across the full project lifecycle — combining international standards with deep local insight.</p>
      </div>
      <div class="services-grid">
        <div class="service-card" data-reveal><div class="service-num">01</div><h3>Engineering Services</h3><p>Comprehensive engineering design, conceptual studies, feasibility analyses, and technical documentation aligned with international standards and local regulatory requirements.</p></div>
        <div class="service-card" data-reveal><div class="service-num">02</div><h3>Technical &amp; Commercial Consultancy</h3><p>Expert advisory services on complex technical challenges and commercial negotiations in the Oil, Gas, and Infrastructure sectors.</p></div>
        <div class="service-card" data-reveal><div class="service-num">03</div><h3>Construction Project Management</h3><p>End-to-end project management from planning through execution, commissioning, and final handover — on time and within budget.</p></div>
        <div class="service-card" data-reveal><div class="service-num">04</div><h3>Procurement Support Services</h3><p>Strategic sourcing, vendor qualification, and supply chain management leveraging our extensive global OEM partner network.</p></div>
        <div class="service-card" data-reveal><div class="service-num">05</div><h3>World-Class OEM Representation</h3><p>Authorised local representation and technical support for leading international Original Equipment Manufacturers across the energy sector.</p></div>
        <div class="service-card" data-reveal><div class="service-num">06</div><h3>QA/QC Services</h3><p>Rigorous quality assurance and quality control throughout every phase of the project lifecycle, aligned with international engineering best practices.</p></div>
        <div class="service-card" data-reveal><div class="service-num">07</div><h3>Business Development Services</h3><p>Strategic market entry support, partnership development, and business growth advisory for energy and infrastructure sector players.</p></div>
        <div class="service-card" data-reveal><div class="service-num">08</div><h3>Cutting-Edge Technology Solutions</h3><p>Leveraging trending technologies to optimise project delivery, reduce lifecycles, and maximise cost-efficiency without compromising integrity.</p></div>
        <div class="service-card" data-reveal><div class="service-num">09</div><h3>Local &amp; Foreign Expertise Deployment</h3><p>Curated placement of specialist engineers — both local and international — precisely matched to your specific project requirements.</p></div>
        <div class="service-card" data-reveal><div class="service-num">10</div><h3>Manpower Development</h3><p>Structured training and mentorship programmes that build capability and develop the next generation of African engineering professionals.</p></div>
      </div>
    </div>
  </section>

  <section style="background:var(--purple-dark);padding:3rem 0;">
    <div class="container">
      <div style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:1.5rem;">
        <div>
          <h2 style="font-family:'Cormorant Garamond',serif;font-size:1.6rem;color:var(--white);font-weight:700;margin-bottom:0.5rem;">Ready to discuss your project?</h2>
          <p style="color:rgba(255,255,255,0.55);font-size:0.85rem;font-weight:300;">Let our senior team provide expert guidance on your next challenge.</p>
        </div>
        <a class="btn-primary" href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>">Contact Us</a>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>
