<?php
get_header();
$uri = get_template_directory_uri();
?>
<main>
  <div class="page-hero">
    <div class="page-hero-bg" style="background-image:url('<?php echo $uri; ?>/assets/images/pg4_intro_ship_dockyard.jpg');"></div>
    <div class="page-hero-diagonal"></div>
    <div class="page-hero-content container">
      <span class="page-label">Our Story</span>
      <h1>About <em>PCL</em></h1>
      <p>Engineering excellence rooted in 30+ years of global Oil &amp; Gas leadership.</p>
    </div>
  </div>

  <section class="about-story bg-white">
    <div class="container">
      <div class="story-grid">
        <div class="story-img-wrap" data-reveal>
          <img src="<?php echo $uri; ?>/assets/images/oil_rig_illustration.svg" alt="PCL dockyard project operations">
          <div class="story-badge">
            <div class="years">2023</div>
            <div class="years-label">Year Founded</div>
          </div>
        </div>
        <div data-reveal>
          <span class="section-label">Introduction</span>
          <div class="gold-line"></div>
          <h2 class="section-title">Engineering Excellence With a Vision</h2>
          <p class="section-desc" style="margin-bottom:1.25rem;">Founded on a legacy of over 30 years of leadership in the global Oil &amp; Gas sector — after successfully retiring from CAKASA Nigeria Company Ltd, an EPICOM Service Provider — Phildor Consulting Ltd (PCL) was established by Engr. Philip Balami Yaro in January 2023 to redefine consultancy standards in Africa.</p>
          <p class="section-desc" style="margin-bottom:1.25rem;">We provide a robust platform where seasoned local and international experts converge to tackle the most complex technical and commercial challenges in the Oil, Gas, and Infrastructure industries. At PCL, we don't just provide services; we provide <strong>"service with a personal touch"</strong> — ensuring that every project benefits from the direct oversight of industry veterans committed to innovation and 24/7 delivery.</p>
          <p class="section-desc">We are more than consultants; we are mentors. PCL is dedicated to bridging the industry skills gap by cultivating the next generation of African Engineers, transferring decades of high-level expertise to young talent to ensure a sustainable future for infrastructure and energy service provision across Nigeria, the African continent, and the global stage.</p>
        </div>
      </div>
      <div class="about-highlights" data-reveal>
        <div class="about-highlight"><h4>NMDPRA Licensed</h4><p>Fully permitted for Engineering Design Services and Project Management within the Oil &amp; Gas Industry.</p></div>
        <div class="about-highlight"><h4>COREN Registered</h4><p>Compliant with the Council for the Regulation of Engineering in Nigeria.</p></div>
        <div class="about-highlight"><h4>Global Partner Network</h4><p>Strategic partnerships with firms across Spain, France, Italy, and India.</p></div>
        <div class="about-highlight"><h4>24/7 Delivery</h4><p>Direct senior-level oversight and accountability on every single engagement.</p></div>
      </div>
    </div>
  </section>

  <section id="vision" class="vision-section bg-purple">
    <div class="container">
      <div class="vm-grid">
        <div class="vm-card" data-reveal>
          <div class="vm-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg></div>
          <h3>Vision</h3>
          <p>To be the most trusted name in specialised consultancy, delivering high-impact professional solutions that drive the success of Africa's most critical infrastructure and energy projects.</p>
        </div>
        <div class="vm-card" data-reveal>
          <div class="vm-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg></div>
          <h3>Mission</h3>
          <p>To empower our clients by deploying elite expertise and cutting-edge technology to solve complex engineering challenges — delivering world-class consultancy that adheres to international standards, safely, on schedule, and within budget.</p>
        </div>
        <div class="vm-card" data-reveal>
          <div class="vm-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg></div>
          <h3>Our Commitment</h3>
          <p>We are more than consultants — we are mentors. PCL bridges the industry skills gap, transferring decades of high-level expertise to the next generation of African Engineers for a sustainable future.</p>
        </div>
      </div>
      <div class="core-values" data-reveal>
        <div class="cv-title">Our Core Values — <em>PHILDOR</em></div>
        <div class="values-row">
          <div class="value-pill"><div class="value-letter">P</div><div class="value-word">Passion</div></div>
          <div class="value-pill"><div class="value-letter">H</div><div class="value-word">High-Quality</div></div>
          <div class="value-pill"><div class="value-letter">I</div><div class="value-word">Innovative</div></div>
          <div class="value-pill"><div class="value-letter">L</div><div class="value-word">Leading-Edge</div></div>
          <div class="value-pill"><div class="value-letter">D</div><div class="value-word">Dedication</div></div>
          <div class="value-pill"><div class="value-letter">O</div><div class="value-word">Optimisation</div></div>
          <div class="value-pill"><div class="value-letter">R</div><div class="value-word">Reliability</div></div>
        </div>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>
