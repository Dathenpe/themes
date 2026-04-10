<?php

function phildor_enqueue_assets() {
    $v = '1.0';
    $uri = get_template_directory_uri();

    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400;1,600&family=Barlow:wght@300;400;500;600&family=Barlow+Condensed:wght@400;600;700&display=swap', [], null);
    wp_enqueue_style('phildor-global',      $uri . '/assets/css/global.css',      ['google-fonts'], $v);
    wp_enqueue_style('phildor-nav',         $uri . '/assets/css/nav.css',         ['phildor-global'], $v);
    wp_enqueue_style('phildor-components',  $uri . '/assets/css/components.css',  ['phildor-global'], $v);
    wp_enqueue_style('phildor-inner-pages', $uri . '/assets/css/inner-pages.css', ['phildor-global'], $v);

    if (is_front_page()) {
        wp_enqueue_style('phildor-home',   $uri . '/assets/css/home.css',   ['phildor-global'], $v);
        wp_enqueue_style('phildor-slider', $uri . '/assets/css/slider.css', ['phildor-global'], $v);
        wp_enqueue_script('phildor-slider-js', $uri . '/assets/js/slider.js', [], $v, true);
    }

    if (is_page('certifications')) {
        wp_enqueue_style('phildor-certifications', $uri . '/assets/css/certifications.css', ['phildor-global'], $v);
    }

    if (is_page('contact')) {
        wp_enqueue_script('emailjs', 'https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js', [], null, true);
        wp_enqueue_script('phildor-contact-js', $uri . '/assets/js/contact.js', [], $v, true);
        wp_add_inline_script('emailjs', '(function(){ if(typeof emailjs!=="undefined"){emailjs.init({publicKey:"Ux1E7PBpEoKIBUwNJ"});window.EMAILJS_SERVICE_ID="service_20wg09g";window.EMAILJS_TEMPLATE_ID="template_buytlch";window.EMAILJS_AUTOREPLY_TEMPLATE_ID="template_5spz1zq";window.EMAILJS_AUTOREPLY_SERVICE_ID="service_20wg09g";}})();', 'after');
    }

    wp_enqueue_script('phildor-nav-js', $uri . '/assets/js/nav.js', [], $v, true);
}
add_action('wp_enqueue_scripts', 'phildor_enqueue_assets');

function phildor_register_menus() {
    register_nav_menus(['primary' => 'Primary Navigation']);
}
add_action('after_setup_theme', 'phildor_register_menus');

function phildor_add_theme_support() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption']);
    add_theme_support('custom-logo', ['height' => 100, 'width' => 400, 'flex-height' => true, 'flex-width' => true]);
}
add_action('after_setup_theme', 'phildor_add_theme_support');

function phildor_clean_admin_bar_new_menu($wp_admin_bar) {
    $wp_admin_bar->remove_node('new-post');
    $wp_admin_bar->remove_node('new-page');
    $wp_admin_bar->remove_node('new-media');
    $wp_admin_bar->remove_node('new-user');
}
add_action('admin_bar_menu', 'phildor_clean_admin_bar_new_menu', 999);

function phildor_register_post_types() {
    register_post_type('team_member', [
        'labels' => ['name' => 'Team Members', 'singular_name' => 'Team Member', 'add_new' => 'Add Team Member', 'add_new_item' => 'Add New Team Member', 'edit_item' => 'Edit Team Member', 'new_item' => 'New Team Member', 'view_item' => 'View Team Member', 'search_items' => 'Search Team Members', 'not_found' => 'No team members found', 'not_found_in_trash' => 'No team members found in Trash'],
        'public' => false, 'show_ui' => true, 'show_in_menu' => true, 'menu_icon' => 'dashicons-id', 'menu_position' => 20, 'supports' => ['title', 'thumbnail'], 'rewrite' => false,
    ]);

    register_post_type('pcl_project', [
        'labels' => ['name' => 'Projects', 'singular_name' => 'Project', 'add_new' => 'Add Project', 'add_new_item' => 'Add New Project', 'edit_item' => 'Edit Project', 'new_item' => 'New Project', 'view_item' => 'View Project', 'search_items' => 'Search Projects', 'not_found' => 'No projects found', 'not_found_in_trash' => 'No projects found in Trash'],
        'public' => false, 'show_ui' => true, 'show_in_menu' => true, 'menu_icon' => 'dashicons-building', 'menu_position' => 21, 'supports' => ['title', 'thumbnail'], 'rewrite' => false, 'taxonomies' => ['pcl_project_category'],
    ]);

    register_taxonomy('pcl_project_category', 'pcl_project', [
        'labels' => ['name' => 'Project Categories', 'singular_name' => 'Project Category', 'add_new_item' => 'Add New Category', 'edit_item' => 'Edit Category'],
        'public' => false, 'show_ui' => true, 'show_in_menu' => true, 'hierarchical' => true, 'rewrite' => false,
    ]);

    register_post_type('client_logo', [
        'labels' => ['name' => 'Client Logos', 'singular_name' => 'Client Logo', 'add_new' => 'Add Client', 'add_new_item' => 'Add New Client', 'edit_item' => 'Edit Client', 'new_item' => 'New Client', 'search_items' => 'Search Clients', 'not_found' => 'No clients found', 'not_found_in_trash' => 'No clients found in Trash'],
        'public' => false, 'show_ui' => true, 'show_in_menu' => true, 'menu_icon' => 'dashicons-groups', 'menu_position' => 22, 'supports' => ['title', 'thumbnail'], 'rewrite' => false,
    ]);

    register_post_type('certification', [
        'labels' => ['name' => 'Certifications', 'singular_name' => 'Certification', 'add_new' => 'Add Certification', 'add_new_item' => 'Add New Certification', 'edit_item' => 'Edit Certification', 'new_item' => 'New Certification', 'search_items' => 'Search Certifications', 'not_found' => 'No certifications found', 'not_found_in_trash' => 'No certifications found in Trash'],
        'public' => false, 'show_ui' => true, 'show_in_menu' => true, 'menu_icon' => 'dashicons-awards', 'menu_position' => 23, 'supports' => ['title', 'thumbnail'], 'rewrite' => false,
    ]);
}
add_action('init', 'phildor_register_post_types');

function phildor_register_meta_boxes() {
    add_meta_box('team_member_details',   'Team Member Details',   'phildor_team_meta_box_html',    'team_member',   'normal', 'high');
    add_meta_box('pcl_project_details',   'Project Details',       'phildor_project_meta_box_html', 'pcl_project',   'normal', 'high');
    add_meta_box('client_logo_details',   'Client Details',        'phildor_client_meta_box_html',  'client_logo',   'normal', 'high');
    add_meta_box('certification_details', 'Certification Details', 'phildor_cert_meta_box_html',    'certification', 'normal', 'high');
}
add_action('add_meta_boxes', 'phildor_register_meta_boxes');

function phildor_team_meta_box_html($post) {
    $role  = get_post_meta($post->ID, '_team_role', true);
    $order = get_post_meta($post->ID, '_team_order', true);
    wp_nonce_field('phildor_team_save', 'phildor_team_nonce');
    echo '<table style="width:100%;border-collapse:collapse;">';
    echo '<tr><td style="padding:8px 0;font-weight:600;width:140px;">Role / Title</td><td><input type="text" name="team_role" value="' . esc_attr($role) . '" style="width:100%;padding:6px;" placeholder="e.g. Chief Executive Officer — FNIEEE, MNSE"></td></tr>';
    echo '<tr><td style="padding:8px 0;font-weight:600;">Display Order</td><td><input type="number" name="team_order" value="' . esc_attr($order) . '" style="width:80px;padding:6px;" placeholder="1"></td></tr>';
    echo '</table>';
    echo '<p style="color:#666;font-size:12px;margin-top:8px;">Set the featured image above as the team member\'s photo.</p>';
}

function phildor_project_meta_box_html($post) {
    $desc  = get_post_meta($post->ID, '_project_desc', true);
    $cat   = get_post_meta($post->ID, '_project_cat_label', true);
    $order = get_post_meta($post->ID, '_project_order', true);
    wp_nonce_field('phildor_project_save', 'phildor_project_nonce');
    echo '<table style="width:100%;border-collapse:collapse;">';
    echo '<tr><td style="padding:8px 0;font-weight:600;width:140px;">Category Label</td><td><input type="text" name="project_cat_label" value="' . esc_attr($cat) . '" style="width:100%;padding:6px;" placeholder="e.g. LPG Depot, Under Construction"></td></tr>';
    echo '<tr><td style="padding:8px 0;font-weight:600;">Description</td><td><textarea name="project_desc" rows="3" style="width:100%;padding:6px;">' . esc_textarea($desc) . '</textarea></td></tr>';
    echo '<tr><td style="padding:8px 0;font-weight:600;">Display Order</td><td><input type="number" name="project_order" value="' . esc_attr($order) . '" style="width:80px;padding:6px;" placeholder="1"></td></tr>';
    echo '</table>';
    echo '<p style="color:#666;font-size:12px;margin-top:8px;">Set the featured image above as the project photo. Use the Project Categories box on the right to assign a section.</p>';
}

function phildor_client_meta_box_html($post) {
    $order   = get_post_meta($post->ID, '_client_order', true);
    $type    = get_post_meta($post->ID, '_client_type', true);
    $country = get_post_meta($post->ID, '_client_country', true);
    $service = get_post_meta($post->ID, '_client_service', true);
    wp_nonce_field('phildor_client_save', 'phildor_client_nonce');
    echo '<table style="width:100%;border-collapse:collapse;">';
    echo '<tr><td style="padding:8px 0;font-weight:600;width:140px;">Client Type</td><td><select name="client_type" style="padding:6px;width:200px;"><option value="client"' . selected($type,'client',false) . '>Client</option><option value="foreign_partner"' . selected($type,'foreign_partner',false) . '>Foreign Partner</option><option value="local_partner"' . selected($type,'local_partner',false) . '>Local Partner</option></select></td></tr>';
    echo '<tr><td style="padding:8px 0;font-weight:600;">Country</td><td><input type="text" name="client_country" value="' . esc_attr($country) . '" style="width:100%;padding:6px;" placeholder="e.g. Spain, France, India"></td></tr>';
    echo '<tr><td style="padding:8px 0;font-weight:600;">Service / Description</td><td><input type="text" name="client_service" value="' . esc_attr($service) . '" style="width:100%;padding:6px;" placeholder="e.g. Engineering Services &amp; Consultant"></td></tr>';
    echo '<tr><td style="padding:8px 0;font-weight:600;">Display Order</td><td><input type="number" name="client_order" value="' . esc_attr($order) . '" style="width:80px;padding:6px;" placeholder="1"></td></tr>';
    echo '</table>';
    echo '<p style="color:#666;font-size:12px;margin-top:8px;">Title = company name. For Clients, set featured image as the logo. Country and Service are shown for Foreign and Local Partners.</p>';
}

function phildor_cert_meta_box_html($post) {
    $issuer  = get_post_meta($post->ID, '_cert_issuer', true);
    $number  = get_post_meta($post->ID, '_cert_number', true);
    $issued  = get_post_meta($post->ID, '_cert_issued', true);
    $expires = get_post_meta($post->ID, '_cert_expires', true);
    $badge   = get_post_meta($post->ID, '_cert_badge', true);
    $type    = get_post_meta($post->ID, '_cert_type', true);
    $order   = get_post_meta($post->ID, '_cert_order', true);
    wp_nonce_field('phildor_cert_save', 'phildor_cert_nonce');
    echo '<table style="width:100%;border-collapse:collapse;">';
    echo '<tr><td style="padding:8px 0;font-weight:600;width:140px;">Section</td><td><select name="cert_type" style="padding:6px;width:220px;"><option value="nmdpra"' . selected($type,'nmdpra',false) . '>NMDPRA Permit</option><option value="company"' . selected($type,'company',false) . '>Company Registration</option><option value="professional"' . selected($type,'professional',false) . '>Professional Credential</option></select></td></tr>';
    echo '<tr><td style="padding:8px 0;font-weight:600;">Issuing Authority</td><td><input type="text" name="cert_issuer" value="' . esc_attr($issuer) . '" style="width:100%;padding:6px;"></td></tr>';
    echo '<tr><td style="padding:8px 0;font-weight:600;">Permit / Cert No.</td><td><input type="text" name="cert_number" value="' . esc_attr($number) . '" style="width:100%;padding:6px;"></td></tr>';
    echo '<tr><td style="padding:8px 0;font-weight:600;">Date Issued</td><td><input type="text" name="cert_issued" value="' . esc_attr($issued) . '" style="width:100%;padding:6px;" placeholder="e.g. 20th August 2025"></td></tr>';
    echo '<tr><td style="padding:8px 0;font-weight:600;">Expiry Date</td><td><input type="text" name="cert_expires" value="' . esc_attr($expires) . '" style="width:100%;padding:6px;" placeholder="e.g. 20 August 2026 (leave blank if none)"></td></tr>';
    echo '<tr><td style="padding:8px 0;font-weight:600;">Badge Label</td><td><input type="text" name="cert_badge" value="' . esc_attr($badge) . '" style="width:100%;padding:6px;" placeholder="e.g. Major Category, CAC Incorporation"></td></tr>';
    echo '<tr><td style="padding:8px 0;font-weight:600;">Display Order</td><td><input type="number" name="cert_order" value="' . esc_attr($order) . '" style="width:80px;padding:6px;" placeholder="1"></td></tr>';
    echo '</table>';
    echo '<p style="color:#666;font-size:12px;margin-top:8px;">Set the featured image above as the scanned certificate image.</p>';
}

function phildor_save_meta_boxes($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    if (isset($_POST['phildor_team_nonce']) && wp_verify_nonce($_POST['phildor_team_nonce'], 'phildor_team_save')) {
        if (isset($_POST['team_role']))  update_post_meta($post_id, '_team_role',  sanitize_text_field($_POST['team_role']));
        if (isset($_POST['team_order'])) update_post_meta($post_id, '_team_order', absint($_POST['team_order']));
    }

    if (isset($_POST['phildor_project_nonce']) && wp_verify_nonce($_POST['phildor_project_nonce'], 'phildor_project_save')) {
        if (isset($_POST['project_cat_label'])) update_post_meta($post_id, '_project_cat_label', sanitize_text_field($_POST['project_cat_label']));
        if (isset($_POST['project_desc']))      update_post_meta($post_id, '_project_desc',      sanitize_textarea_field($_POST['project_desc']));
        if (isset($_POST['project_order']))     update_post_meta($post_id, '_project_order',     absint($_POST['project_order']));
    }

    if (isset($_POST['phildor_client_nonce']) && wp_verify_nonce($_POST['phildor_client_nonce'], 'phildor_client_save')) {
        if (isset($_POST['client_type']))    update_post_meta($post_id, '_client_type',    sanitize_text_field($_POST['client_type']));
        if (isset($_POST['client_country'])) update_post_meta($post_id, '_client_country', sanitize_text_field($_POST['client_country']));
        if (isset($_POST['client_service'])) update_post_meta($post_id, '_client_service', sanitize_text_field($_POST['client_service']));
        if (isset($_POST['client_order']))   update_post_meta($post_id, '_client_order',   absint($_POST['client_order']));
    }

    if (isset($_POST['phildor_cert_nonce']) && wp_verify_nonce($_POST['phildor_cert_nonce'], 'phildor_cert_save')) {
        if (isset($_POST['cert_type']))    update_post_meta($post_id, '_cert_type',    sanitize_text_field($_POST['cert_type']));
        if (isset($_POST['cert_issuer']))  update_post_meta($post_id, '_cert_issuer',  sanitize_text_field($_POST['cert_issuer']));
        if (isset($_POST['cert_number']))  update_post_meta($post_id, '_cert_number',  sanitize_text_field($_POST['cert_number']));
        if (isset($_POST['cert_issued']))  update_post_meta($post_id, '_cert_issued',  sanitize_text_field($_POST['cert_issued']));
        if (isset($_POST['cert_expires'])) update_post_meta($post_id, '_cert_expires', sanitize_text_field($_POST['cert_expires']));
        if (isset($_POST['cert_badge']))   update_post_meta($post_id, '_cert_badge',   sanitize_text_field($_POST['cert_badge']));
        if (isset($_POST['cert_order']))   update_post_meta($post_id, '_cert_order',   absint($_POST['cert_order']));
    }
}
add_action('save_post', 'phildor_save_meta_boxes');

function phildor_nav_walker_fallback($args) {
    $pages = get_pages();
    $out   = '<ul class="nav-links">';
    foreach ($pages as $page) {
        $url    = get_permalink($page->ID);
        $active = (is_page($page->ID)) ? ' class="active"' : '';
        $out   .= '<li><a href="' . esc_url($url) . '"' . $active . '>' . esc_html($page->post_title) . '</a></li>';
    }
    $out .= '</ul>';
    return $out;
}

function phildor_get_nav_html() {
    $home_url = home_url('/');
    $logo_url = get_template_directory_uri() . '/assets/images/pcl_logo.png';

    $nav_pages = [
        'Home'           => '',
        'About'          => 'about',
        'Services'       => 'services',
        'Team'           => 'team',
        'Projects'       => 'projects',
        'Clients'        => 'clients',
        'Certifications' => 'certifications',
        'HSE'            => 'hse',
        'Why Us'         => 'why-us',
    ];

    global $post;
    $current_page_id = (is_singular('page')) ? $post->ID : 0;
    $current_path    = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

    $out  = '<nav id="navbar">';
    $out .= '<a class="nav-logo" href="' . esc_url($home_url) . '">';
    $out .= '<img src="' . esc_url($logo_url) . '" alt="Phildor Consulting Limited" class="nav-logo-img">';
    $out .= '</a>';
    $out .= '<ul class="nav-links">';

    foreach ($nav_pages as $label => $slug) {
        $active = '';
        if ($label === 'Home') {
            $url = $home_url;
            if (is_front_page() || is_home()) $active = ' class="active"';
        } else {
            $page = get_page_by_path($slug);
            $url  = $page ? get_permalink($page) : home_url('/' . $slug . '/');
            if (($page && $current_page_id === $page->ID) || ($current_path === trim($slug, '/'))) {
                $active = ' class="active"';
            }
        }
        $out .= '<li><a href="' . esc_url($url) . '"' . $active . '>' . esc_html($label) . '</a></li>';
    }

    $out .= '</ul>';
    $contact_page   = get_page_by_path('contact');
    $contact_url    = $contact_page ? get_permalink($contact_page) : home_url('/contact/');
    $contact_active = (is_page('contact') || $current_path === 'contact') ? ' active' : '';
    $out .= '<a class="nav-cta' . $contact_active . '" href="' . esc_url($contact_url) . '">Contact Us</a>';
    $out .= '<button class="hamburger" id="hamburger" aria-label="Toggle menu"><span></span><span></span><span></span></button>';
    $out .= '</nav>';

    $out .= '<div class="mobile-menu" id="mobile-menu">';
    foreach ($nav_pages as $label => $slug) {
        $active = '';
        if ($label === 'Home') {
            $url    = $home_url;
            $active = (is_front_page() || is_home()) ? ' class="active"' : '';
        } else {
            $page   = get_page_by_path($slug);
            $url    = $page ? get_permalink($page) : home_url('/' . $slug . '/');
            if (($page && $current_page_id === $page->ID) || ($current_path === trim($slug, '/'))) {
                $active = ' class="active"';
            }
        }
        $out .= '<a href="' . esc_url($url) . '"' . $active . '>' . esc_html($label) . '</a>';
    }
    $contact_mobile_active = is_page('contact') ? ' class="active"' : '';
    $out .= '<a href="' . esc_url($contact_url) . '"' . $contact_mobile_active . ' style="color:var(--gold);">Contact Us</a>';
    $out .= '</div>';

    return $out;
}

function phildor_get_footer_html() {
    $logo_url = get_template_directory_uri() . '/assets/images/pcl_logo.png';
    $year     = date('Y');

    $get_url = function($slug) {
        $page = get_page_by_path($slug);
        return $page ? get_permalink($page) : home_url('/' . $slug . '/');
    };

    $about_url    = $get_url('about');
    $team_url     = $get_url('team');
    $certs_url    = $get_url('certifications');
    $hse_url      = $get_url('hse');
    $services_url = $get_url('services');
    $projects_url = $get_url('projects');
    $contact_url  = $get_url('contact');
    $privacy_url  = $get_url('privacy-policy');
    $terms_url    = $get_url('terms-of-use');

    $out  = '<footer>';
    $out .= '<div class="footer-top">';
    $out .= '<div class="footer-brand">';
    $out .= '<img src="' . esc_url($logo_url) . '" alt="Phildor Consulting Limited" class="footer-logo-img">';
    $out .= '<p>Phildor Consulting Limited provides elite engineering and technical consultancy services for Africa\'s most critical Oil, Gas, and Infrastructure projects.</p>';
    $out .= '<div class="footer-tagline">...service with a personal touch</div>';
    $out .= '</div>';
    $out .= '<div class="footer-col"><h4>Company</h4><ul>';
    $out .= '<li><a href="' . esc_url($about_url) . '">About PCL</a></li>';
    $out .= '<li><a href="' . esc_url($about_url) . '#vision">Vision &amp; Mission</a></li>';
    $out .= '<li><a href="' . esc_url($team_url) . '">Management Team</a></li>';
    $out .= '<li><a href="' . esc_url($certs_url) . '">Certifications</a></li>';
    $out .= '<li><a href="' . esc_url($hse_url) . '">HSE Policy</a></li>';
    $out .= '</ul></div>';
    $out .= '<div class="footer-col"><h4>Services</h4><ul>';
    $out .= '<li><a href="' . esc_url($services_url) . '">Engineering Services</a></li>';
    $out .= '<li><a href="' . esc_url($services_url) . '">Project Management</a></li>';
    $out .= '<li><a href="' . esc_url($services_url) . '">QA/QC Services</a></li>';
    $out .= '<li><a href="' . esc_url($services_url) . '">OEM Representation</a></li>';
    $out .= '<li><a href="' . esc_url($projects_url) . '">Our Projects</a></li>';
    $out .= '</ul></div>';
    $out .= '<div class="footer-col"><h4>Contact</h4>';
    $out .= '<div class="footer-contact-item"><span>Address</span><p>23A, Abibat Ajose Street<br>Ogudu GRA, Lagos, Nigeria</p></div>';
    $out .= '<div class="footer-contact-item"><span>Phone</span><a href="tel:+2348052496806">0805 249 6806</a></div>';
    $out .= '<div class="footer-contact-item"><span>Email</span><a href="mailto:info@phildorconsulting.com">info@phildorconsulting.com</a></div>';
    $out .= '<div class="footer-contact-item"><span>Web</span><a href="https://www.phildorconsulting.com" target="_blank">www.phildorconsulting.com</a></div>';
    $out .= '</div>';
    $out .= '</div>';
    $out .= '<div class="footer-bottom">';
    $out .= '<div class="footer-copy">&copy; ' . $year . ' Phildor Consulting Limited. All rights reserved. RC No. 2018012</div>';
    $out .= '<div class="footer-legal">';
    $out .= '<a href="' . esc_url($privacy_url) . '">Privacy Policy</a>';
    $out .= '<a href="' . esc_url($terms_url) . '">Terms of Use</a>';
    $out .= '<a href="' . esc_url($contact_url) . '">Contact</a>';
    $out .= '</div></div>';
    $out .= '<div class="footer-powered"><span>Powered by <a href="https://f9ld3.com" target="_blank" rel="noopener noreferrer">F9LD3 Technologies</a></span></div>';
    $out .= '</footer>';
    $out .= '<button class="scroll-top" id="scroll-top" aria-label="Back to top"><svg viewBox="0 0 24 24"><polyline points="18 15 12 9 6 15"/></svg></button>';

    return $out;
}