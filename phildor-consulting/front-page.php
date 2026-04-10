<?php
get_header();

$uri = get_template_directory_uri();
?>

<main>

  <div id="hero-slider">

    <div class="slider-slide active">
      <div class="slider-bg" style="background-image:url('<?php echo $uri; ?>/assets/images/slide_1_spherical_tanks.jpg');"></div>
      <div class="slider-overlay"></div>
      <div class="slider-overlay-bottom"></div>
      <div class="slider-content">
        <div class="slider-text">
          <div class="slide-tag">LPG Depot &amp; Tank Farm Engineering</div>
          <h1 class="slide-title">Engineering<br><em>Excellence</em><br>With a Vision</h1>
          <p class="slide-body">Delivering world-class technical consultancy for Africa's most critical Oil, Gas, and Infrastructure projects — 30+ years of industry leadership, personally applied to every engagement.</p>
          <div class="slide-actions">
            <a class="btn-primary" href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>">Our Services</a>
            <a class="btn-outline" href="<?php echo esc_url(get_permalink(get_page_by_path('projects'))); ?>">View Projects</a>
          </div>
        </div>
      </div>
    </div>

    <div class="slider-slide">
      <div class="slider-bg" style="background-image:url('<?php echo $uri; ?>/assets/images/slide_2_ship_dockyard.jpg');"></div>
      <div class="slider-overlay"></div>
      <div class="slider-overlay-bottom"></div>
      <div class="slider-content">
        <div class="slider-text">
          <div class="slide-tag">Marine &amp; Dockyard Operations</div>
          <h1 class="slide-title">LPG Vessel &amp;<br><em>Marine</em><br>Operations</h1>
          <p class="slide-body">From waterfront depot construction to live vessel operations — PCL provides direct senior oversight on Nigeria's most complex marine-side Oil &amp; Gas projects.</p>
          <div class="slide-actions">
            <a class="btn-primary" href="<?php echo esc_url(get_permalink(get_page_by_path('projects'))); ?>">View Projects</a>
            <a class="btn-outline" href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>">Get In Touch</a>
          </div>
        </div>
      </div>
    </div>

    <div class="slider-slide">
      <div class="slider-bg" style="background-image:url('<?php echo $uri; ?>/assets/images/slide_3_construction.jpg');"></div>
      <div class="slider-overlay"></div>
      <div class="slider-overlay-bottom"></div>
      <div class="slider-content">
        <div class="slider-text">
          <div class="slide-tag">Construction Project Management</div>
          <h1 class="slide-title">Built to the<br><em>Highest</em><br>Standards</h1>
          <p class="slide-body">Managing large-scale Oil &amp; Gas construction from concept to commissioning — safely, precisely, and within budget. Every single time.</p>
          <div class="slide-actions">
            <a class="btn-primary" href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>">Our Services</a>
            <a class="btn-outline" href="<?php echo esc_url(get_permalink(get_page_by_path('about'))); ?>">About PCL</a>
          </div>
        </div>
      </div>
    </div>

    <div class="slider-slide">
      <div class="slider-bg" style="background-image:url('<?php echo $uri; ?>/assets/images/slide_4_foundation.jpg');"></div>
      <div class="slider-overlay"></div>
      <div class="slider-overlay-bottom"></div>
      <div class="slider-content">
        <div class="slider-text">
          <div class="slide-tag">Civil &amp; Deep Foundation Engineering</div>
          <h1 class="slide-title">Deep Foundations<br>for <em>Heavy</em><br>Industry</h1>
          <p class="slide-body">Specialist piling, rebar, and civil foundation works for the most demanding industrial environments — built on Lagos coastal terrain with zero-defect delivery.</p>
          <div class="slide-actions">
            <a class="btn-primary" href="<?php echo esc_url(get_permalink(get_page_by_path('projects'))); ?>">See Projects</a>
            <a class="btn-outline" href="<?php echo esc_url(get_permalink(get_page_by_path('certifications'))); ?>">Our Credentials</a>
          </div>
        </div>
      </div>
    </div>

    <div class="slider-slide">
      <div class="slider-bg" style="background-image:url('<?php echo $uri; ?>/assets/images/slide_5_cng.jpg');"></div>
      <div class="slider-overlay"></div>
      <div class="slider-overlay-bottom"></div>
      <div class="slider-content">
        <div class="slider-text">
          <div class="slide-tag">L-CNG &amp; Cutting-Edge Technology</div>
          <h1 class="slide-title">Cutting-Edge<br><em>Technology</em><br>Solutions</h1>
          <p class="slide-body">World-class OEM partnerships across Spain, France, Italy, and India — bringing the best global technology to Nigerian Oil, Gas, and CNG infrastructure projects.</p>
          <div class="slide-actions">
            <a class="btn-primary" href="<?php echo esc_url(get_permalink(get_page_by_path('clients'))); ?>">Our Partners</a>
            <a class="btn-outline" href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>">Contact Us</a>
          </div>
        </div>
      </div>
    </div>

    <div class="slider-nav">
      <div class="slider-dots">
        <button class="slider-dot active" aria-label="Slide 1"></button>
        <button class="slider-dot" aria-label="Slide 2"></button>
        <button class="slider-dot" aria-label="Slide 3"></button>
        <button class="slider-dot" aria-label="Slide 4"></button>
        <button class="slider-dot" aria-label="Slide 5"></button>
      </div>
    </div>

    <div class="slider-arrows">
      <button class="slider-arrow" id="slider-prev" aria-label="Previous slide">
        <svg viewBox="0 0 24 24"><polyline points="15 18 9 12 15 6"/></svg>
      </button>
      <button class="slider-arrow" id="slider-next" aria-label="Next slide">
        <svg viewBox="0 0 24 24"><polyline points="9 6 15 12 9 18"/></svg>
      </button>
    </div>

    <div class="slider-counter">
      <span class="cur" id="slide-current">01</span>
      <span class="sep">/</span>
      <span class="tot">05</span>
    </div>

  </div>

  <div class="stats-strip">
    <div class="stats-strip-inner">
      <div class="stat-item">
        <div class="stat-icon"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg></div>
        <div><div class="stat-number">30+</div><div class="stat-label">Years of Expertise</div></div>
      </div>
      <div class="stat-item">
        <div class="stat-icon"><svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg></div>
        <div><div class="stat-number">8</div><div class="stat-label">Foreign Partners</div></div>
      </div>
      <div class="stat-item">
        <div class="stat-icon"><svg viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg></div>
        <div><div class="stat-number">13</div><div class="stat-label">Local Partners</div></div>
      </div>
      <div class="stat-item">
        <div class="stat-icon"><svg viewBox="0 0 24 24"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg></div>
        <div><div class="stat-number">10</div><div class="stat-label">Service Offerings</div></div>
      </div>
    </div>
  </div>

  <section class="intro bg-white">
    <div class="container">
      <div class="intro-grid">
        <div>
          <span class="section-label">About PCL</span>
          <div class="gold-line"></div>
          <h2 class="section-title">Redefining Consultancy Standards in Africa</h2>
          <p class="section-desc" style="margin-bottom:1.5rem;">Founded in January 2023 by Engr. Philip Balami Yaro, Phildor Consulting Limited (PCL) was built on a legacy of over 30 years of leadership in the global Oil &amp; Gas sector. At PCL, we don't just provide services — we provide <em><strong>"service with a personal touch."</strong></em></p>
          <p class="section-desc" style="margin-bottom:2rem;">We are more than consultants; we are mentors — dedicated to bridging the industry skills gap by cultivating the next generation of African Engineers.</p>
          <a class="btn-outline-dark" href="<?php echo esc_url(get_permalink(get_page_by_path('about'))); ?>">Learn More About PCL</a>
        </div>
        <div class="intro-img-col">
          <div class="intro-img-wrap">
            <img src="<?php echo $uri; ?>/assets/images/pg4_intro_ship_dockyard.jpg" alt="PCL project dockyard operations" class="intro-img">
            <div class="intro-badge">
              <div class="years">30+</div>
              <div class="years-label">Years of Leadership</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="services-preview bg-offwhite">
    <div class="container">
      <div class="services-preview-header">
        <div>
          <span class="section-label">What We Do</span>
          <div class="gold-line"></div>
          <h2 class="section-title">Our Core Services</h2>
        </div>
        <p class="section-desc">From concept to commissioning, we deploy elite expertise across the full project lifecycle.</p>
      </div>
      <div class="services-preview-grid">
        <div class="svc-card" data-reveal>
          <div class="svc-num">01</div>
          <h3>Engineering Services</h3>
          <p>Comprehensive design, feasibility analyses, and technical documentation to international standards.</p>
        </div>
        <div class="svc-card" data-reveal>
          <div class="svc-num">02</div>
          <h3>Construction Project Management</h3>
          <p>End-to-end management from planning through execution, commissioning, and handover.</p>
        </div>
        <div class="svc-card" data-reveal>
          <div class="svc-num">03</div>
          <h3>Technical &amp; Commercial Consultancy</h3>
          <p>Expert advisory on complex technical and commercial challenges in Oil, Gas, and Infrastructure.</p>
        </div>
        <div class="svc-card" data-reveal>
          <div class="svc-num">04</div>
          <h3>Procurement Support</h3>
          <p>Strategic sourcing and supply chain management leveraging our global OEM network.</p>
        </div>
        <div class="svc-card" data-reveal>
          <div class="svc-num">05</div>
          <h3>QA/QC Services</h3>
          <p>Rigorous quality assurance aligned with international engineering best practices.</p>
        </div>
        <div class="svc-card svc-card-cta" data-reveal>
          <div class="svc-num" style="color:var(--gold-light);">+5</div>
          <h3 style="color:var(--white);">More Services</h3>
          <p style="color:rgba(255,255,255,0.6);">OEM Representation, Technology Solutions, Manpower Development, and more.</p>
          <a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>" class="btn-primary" style="margin-top:1.5rem;">View All Services</a>
        </div>
      </div>
    </div>
  </section>

  <section class="projects-preview bg-purple">
    <div class="container">
      <div class="projects-preview-header">
        <div>
          <span class="section-label">Portfolio</span>
          <div class="gold-line"></div>
          <h2 class="section-title white">Featured Projects</h2>
        </div>
        <a href="<?php echo esc_url(get_permalink(get_page_by_path('projects'))); ?>" class="btn-outline">View All Projects</a>
      </div>
      <div class="proj-grid">
        <?php
        $featured_projects = new WP_Query([
            'post_type'      => 'pcl_project',
            'posts_per_page' => 3,
            'post_status'    => 'publish',
            'meta_key'       => '_project_order',
            'orderby'        => 'meta_value_num',
            'order'          => 'ASC',
        ]);

        if ($featured_projects->have_posts()) :
            while ($featured_projects->have_posts()) : $featured_projects->the_post();
                $desc  = get_post_meta(get_the_ID(), '_project_desc', true);
                $label = get_post_meta(get_the_ID(), '_project_cat_label', true);
                $title = get_the_title();
                $thumb = get_the_post_thumbnail_url(get_the_ID(), 'large');
        ?>
        <div class="proj-card" data-reveal>
            <?php if ($thumb) : ?>
                <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($title); ?>">
            <?php else : ?>
                <div style="width:100%;height:100%;background:var(--purple-mid);display:flex;align-items:center;justify-content:center;">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#C9A84C" stroke-width="1"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18M9 21V9"/></svg>
                </div>
            <?php endif; ?>
            <div class="proj-overlay">
                <?php if ($label) : ?>
                    <div class="proj-cat"><?php echo esc_html($label); ?></div>
                <?php endif; ?>
                <div class="proj-title"><?php echo esc_html($title); ?></div>
            </div>
        </div>
        <?php 
            endwhile;
            wp_reset_postdata();
        else :
        ?>
        <p style="color:rgba(255,255,255,0.6);grid-column:1/-1;">No projects added yet. Add projects in the admin to display them here.</p>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <section class="why-strip bg-offwhite">
    <div class="container">
      <div class="why-strip-grid">
        <div class="why-strip-left">
          <span class="section-label">Why PCL</span>
          <div class="gold-line"></div>
          <h2 class="section-title">The PCL Difference</h2>
          <p class="section-desc" style="margin-bottom:2rem;">In a high-stakes industry where delays and technical failures can cost millions, PCL stands out — combining the technical depth of a global major with the responsiveness of a boutique consultancy.</p>
          <a href="<?php echo esc_url(get_permalink(get_page_by_path('why-us'))); ?>" class="btn-outline-dark">Why Choose Us</a>
        </div>
        <div class="why-strip-items">
          <div class="why-strip-item" data-reveal>
            <div class="wsi-num">01</div>
            <div><h4>Decades of Leadership</h4><p>30+ years of frontline experience in global Oil &amp; Gas and Infrastructure.</p></div>
          </div>
          <div class="why-strip-item" data-reveal>
            <div class="wsi-num">02</div>
            <div><h4>Elite Technical Experts</h4><p>A curated blend of local and international specialists on every engagement.</p></div>
          </div>
          <div class="why-strip-item" data-reveal>
            <div class="wsi-num">03</div>
            <div><h4>Iron Triangle Delivery</h4><p>Quality, on time, and within budget — safely, every single time.</p></div>
          </div>
          <div class="why-strip-item" data-reveal>
            <div class="wsi-num">04</div>
            <div><h4>24/7 Responsiveness</h4><p>Senior-level accessibility and accountability throughout every project.</p></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="cta-strip">
    <div class="container">
      <div class="cta-inner">
        <div>
          <h2 class="section-title white" style="margin-bottom:0.5rem;">Ready to Start Your Project?</h2>
          <p style="color:rgba(255,255,255,0.6);font-size:0.95rem;font-weight:300;">Let's discuss how PCL can deliver engineering excellence for your next challenge.</p>
        </div>
        <a class="btn-primary" href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>">Get In Touch</a>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>