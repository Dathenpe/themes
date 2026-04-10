<?php
get_header();
$uri = get_template_directory_uri();
?>
<main>
  <div class="page-hero">
    <div class="page-hero-bg" style="background-image:url('<?php echo $uri; ?>/assets/images/pg23_contact_globe_map.jpg');background-position:center center;opacity:0.25;"></div>
    <div class="page-hero-diagonal off-white"></div>
    <div class="page-hero-content container">
      <span class="page-label">Get In Touch</span>
      <h1>Contact <em>Us</em></h1>
      <p>Service with a personal touch — our senior team is ready to hear from you.</p>
    </div>
  </div>

  <section style="background:var(--purple-dark);padding:6rem 4rem;">
    <div class="container">
      <div class="contact-grid">
        <div class="contact-info">
          <div>
            <span class="section-label">Reach Us</span>
            <div class="gold-line"></div>
            <h2 class="section-title white" style="margin-bottom:0.5rem;">We'd Love to Hear From You</h2>
            <p class="section-desc white" style="margin-bottom:2.5rem;">Whether you have a project enquiry, partnership opportunity, or simply want to learn more about our services — our team is available 24/7.</p>
          </div>
          <div class="contact-detail">
            <div class="contact-icon"><svg viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg></div>
            <div><h4>Address</h4><p>23A, Abibat Ajose Street<br>Ogudu GRA, Lagos, Nigeria</p></div>
          </div>
          <div class="contact-detail">
            <div class="contact-icon"><svg viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.6 3.39 2 2 0 0 1 3.6 1.21h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.79a16 16 0 0 0 6 6l1.06-1.06a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 21.72 16z"/></svg></div>
            <div><h4>Telephone</h4><p><a href="tel:+2348052496806">0805 249 6806</a><br><a href="tel:+2348033442444">0803 344 2444</a></p></div>
          </div>
          <div class="contact-detail">
            <div class="contact-icon"><svg viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg></div>
            <div><h4>Email</h4><p><a href="mailto:info@phildorconsulting.com">info@phildorconsulting.com</a><br><a href="mailto:Philip.yaro@phildorconsulting.com">Philip.yaro@phildorconsulting.com</a></p></div>
          </div>
          <div class="contact-detail">
            <div class="contact-icon"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg></div>
            <div><h4>Website</h4><p><a href="https://www.phildorconsulting.com" target="_blank" rel="noopener">www.phildorconsulting.com</a></p></div>
          </div>
          <div class="contact-quote">
            <blockquote>"...service with a personal touch"</blockquote>
            <cite>Phildor Consulting Limited</cite>
          </div>
        </div>
        <div>
          <form class="contact-form" id="contact-form" novalidate>
            <div class="form-row">
              <div class="form-group"><label for="name">Full Name</label><input type="text" id="name" name="name" placeholder="Your full name" required></div>
              <div class="form-group"><label for="company">Company</label><input type="text" id="company" name="company" placeholder="Company name"></div>
            </div>
            <div class="form-row">
              <div class="form-group"><label for="email">Email Address</label><input type="email" id="email" name="email" placeholder="your@email.com" required></div>
              <div class="form-group"><label for="phone">Phone Number</label><input type="tel" id="phone" name="phone" placeholder="+234 xxx xxx xxxx"></div>
            </div>
            <div class="form-group">
              <label for="service">Service of Interest</label>
              <select id="service" name="service">
                <option value="">Select a service...</option>
                <option>Engineering Services</option>
                <option>Technical &amp; Commercial Consultancy</option>
                <option>Construction Project Management</option>
                <option>Procurement Support Services</option>
                <option>QA/QC Services</option>
                <option>OEM Representation</option>
                <option>Business Development</option>
                <option>Manpower Development</option>
                <option>Other</option>
              </select>
            </div>
            <div class="form-group"><label for="message">Your Message</label><textarea id="message" name="message" rows="5" placeholder="Tell us about your project requirements..." required></textarea></div>
            <button type="submit" class="btn-submit" id="submit-btn">Send Enquiry</button>
            <div id="form-feedback" style="display:none;margin-top:1rem;padding:1rem;font-size:0.85rem;font-weight:400;"></div>
          </form>
        </div>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>
