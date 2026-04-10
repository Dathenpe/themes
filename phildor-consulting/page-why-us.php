<?php
get_header();
$uri = get_template_directory_uri();
?>
<main>
  <div class="page-hero">
    <div class="page-hero-bg" style="background-image:url('<?php echo $uri; ?>/assets/images/pg11_LPG_depot_ship.jpg');"></div>
    <div class="page-hero-diagonal"></div>
    <div class="page-hero-content container">
      <span class="page-label">The PCL Difference</span>
      <h1>Why Choose <em>PCL</em>?</h1>
      <p>Technical depth of a global major. Responsiveness of a boutique consultancy.</p>
    </div>
  </div>

  <section class="bg-white">
    <div class="container">
      <div class="why-grid">
        <div data-reveal>
          <img class="why-img" src="<?php echo $uri; ?>/assets/images/pg11_LPG_depot_spherical_tank1.jpg" alt="PCL project — LPG spherical tanks">
        </div>
        <div data-reveal>
          <span class="section-label">Why PCL</span>
          <div class="gold-line"></div>
          <h2 class="section-title" style="margin-bottom:0.75rem;">Why Choose Phildor Consulting?</h2>
          <p class="section-desc" style="margin-bottom:2rem;">In a high-stakes industry where delays and technical failures can cost millions, PCL stands out as a reliable partner.</p>
          <div class="why-list">
            <div class="why-item"><div class="why-num">01</div><div><h4>Decades of Industry Leadership</h4><p>Our foundation is built on 30+ years of frontline experience in the global Oil &amp; Gas and Infrastructure sectors, led by Engr. Philip Balami Yaro — FNIEEE, MNSE.</p></div></div>
            <div class="why-item"><div class="why-num">02</div><div><h4>Elite Technical Expertise</h4><p>We deploy highly experienced personnel — a curated blend of local and international specialists — to ensure your project benefits from the best minds in the field.</p></div></div>
            <div class="why-item"><div class="why-num">03</div><div><h4>Optimisation Through Technology</h4><p>We leverage cutting-edge technology to provide optimised solutions, reducing project lifecycles and maximising cost-efficiency without compromising technical integrity.</p></div></div>
            <div class="why-item"><div class="why-num">04</div><div><h4>Uncompromising Delivery — The Iron Triangle</h4><p>We are committed to delivering services that meet both international and local standards. Our "Iron Triangle" approach ensures we meet your goals: safely, with Quality, On Time, and Within Budget.</p></div></div>
            <div class="why-item"><div class="why-num">05</div><div><h4>A "Personal Touch" to Professionalism</h4><p>Unlike larger, more rigid firms, we offer a high degree of senior-level accessibility and accountability — ensuring your specific project needs are met with 24/7 responsiveness.</p></div></div>
            <div class="why-item"><div class="why-num">06</div><div><h4>Commitment to Africa's Sustainable Growth</h4><p>By partnering with us, you support the development of the next generation of African engineers — ensuring long-term technical sustainability for the continent's infrastructure.</p></div></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section style="background:var(--purple-dark);padding:4rem;">
    <div class="container" style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:2rem;">
      <div>
        <h2 style="font-family:'Cormorant Garamond',serif;font-size:2rem;color:var(--white);font-weight:700;margin-bottom:0.5rem;">Let's work together.</h2>
        <p style="color:rgba(255,255,255,0.55);font-size:0.95rem;font-weight:300;">Reach out to discuss your next project with our senior team.</p>
      </div>
      <a class="btn-primary" href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>">Contact Us</a>
    </div>
  </section>
</main>
<?php get_footer(); ?>
