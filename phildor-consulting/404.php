<?php
get_header();
$uri = get_template_directory_uri();
$home_url = home_url('/');
$contact_page = get_page_by_path('contact');
$contact_url = $contact_page ? get_permalink($contact_page) : home_url('/contact/');
?>

<main>
  <div class="not-found">
    <div class="not-found-content">
      <div class="not-found-code">404</div>
      <h1 class="not-found-title">Page Not Found</h1>
      <p class="not-found-text">The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.</p>
      <div class="not-found-actions">
        <a href="<?php echo esc_url($home_url); ?>" class="btn-primary">Return Home</a>
        <a href="<?php echo esc_url($contact_url); ?>" class="btn-outline-dark">Contact Us</a>
      </div>
    </div>
  </div>
</main>

<style>
.not-found { 
  min-height: 70vh;
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -ms-flex-pack: center;
  justify-content: center;
  padding: 4rem 1.5rem;
  background: var(--off-white);
  margin-top: var(--nav-height);
}
.not-found-content {
  text-align: center;
  max-width: 600px;
}
.not-found-code {
  font-family: 'Cormorant Garamond', serif;
  font-size: 8rem;
  color: var(--gold);
  font-weight: 700;
  line-height: 1;
  margin-bottom: 1rem;
}
.not-found-title {
  font-family: 'Cormorant Garamond', serif;
  font-size: 2rem;
  color: var(--purple-dark);
  margin-bottom: 1rem;
}
.not-found-text {
  font-size: 1rem;
  color: var(--text-mid);
  margin-bottom: 2rem;
}
.not-found-actions {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  gap: 1rem;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -ms-flex-pack: center;
  justify-content: center;
  -webkit-flex-wrap: wrap;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
}
@media (min-width: 768px) {
  .not-found-code { font-size: 12rem; }
  .not-found-title { font-size: 2.5rem; }
}
</style>

<?php get_footer(); ?>