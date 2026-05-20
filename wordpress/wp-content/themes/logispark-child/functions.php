<?php
/**
 * Logispark Group Child Theme — functions.php
 */

// ── Cargar estilos padre + hijo ──
add_action('wp_enqueue_scripts', function() {
    // Tema padre Hello Elementor
    wp_enqueue_style(
        'hello-elementor',
        get_template_directory_uri() . '/style.css'
    );
    // Tema hijo
    wp_enqueue_style(
        'logispark-child',
        get_stylesheet_directory_uri() . '/style.css',
        ['hello-elementor'],
        wp_get_theme()->get('Version')
    );
    // Google Fonts
    wp_enqueue_style(
        'logispark-fonts',
        'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400&family=DM+Sans:wght@300;400;500&display=swap',
        [],
        null
    );
    // JS principal
    wp_enqueue_script(
        'logispark-main',
        get_stylesheet_directory_uri() . '/js/main.js',
        [],
        wp_get_theme()->get('Version'),
        true
    );
});

// ── Soporte para menús ──
add_action('after_setup_theme', function() {
    register_nav_menus([
        'primary' => __('Menú Principal', 'logispark-child'),
        'footer'  => __('Menú Footer', 'logispark-child'),
    ]);
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form','comment-form','comment-list','gallery','caption']);
});

// ── Registrar Custom Post Types (si se necesitan) ──
add_action('init', function() {
    // CPT: Servicios (opcional, por si se gestiona desde el CMS)
    register_post_type('servicio', [
        'labels' => [
            'name'          => 'Servicios',
            'singular_name' => 'Servicio',
            'add_new_item'  => 'Añadir Servicio',
            'edit_item'     => 'Editar Servicio',
        ],
        'public'            => true,
        'has_archive'       => false,
        'show_in_menu'      => true,
        'supports'          => ['title', 'editor', 'thumbnail', 'excerpt'],
        'menu_icon'         => 'dashicons-building',
        'rewrite'           => ['slug' => 'servicios'],
        'show_in_rest'      => true,
    ]);
});

// ── Widget de contacto rápido en sidebar ──
add_action('widgets_init', function() {
    register_sidebar([
        'name'          => 'Sidebar Principal',
        'id'            => 'sidebar-1',
        'description'   => 'Sidebar principal de la web',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ]);
});

// ── Formulario de contacto via AJAX (sin plugin) ──
add_action('wp_ajax_logispark_contact', 'logispark_handle_contact');
add_action('wp_ajax_nopriv_logispark_contact', 'logispark_handle_contact');

function logispark_handle_contact() {
    check_ajax_referer('logispark_nonce', 'nonce');

    $nombre   = sanitize_text_field($_POST['nombre'] ?? '');
    $email    = sanitize_email($_POST['email'] ?? '');
    $telefono = sanitize_text_field($_POST['telefono'] ?? '');
    $servicio = sanitize_text_field($_POST['servicio'] ?? '');
    $mensaje  = sanitize_textarea_field($_POST['mensaje'] ?? '');

    if (!$nombre || !is_email($email)) {
        wp_send_json_error(['message' => 'Por favor rellena todos los campos obligatorios.']);
    }

    $to      = get_option('admin_email');
    $subject = "Nuevo lead Logispark — {$servicio} — {$nombre}";
    $body    = "Nombre: {$nombre}\nEmail: {$email}\nTeléfono: {$telefono}\nServicio: {$servicio}\n\nMensaje:\n{$mensaje}";
    $headers = ["Content-Type: text/plain; charset=UTF-8", "From: {$nombre} <{$email}>"];

    $sent = wp_mail($to, $subject, $body, $headers);

    if ($sent) {
        wp_send_json_success(['message' => '¡Mensaje enviado! Te contactamos en menos de 24 horas.']);
    } else {
        wp_send_json_error(['message' => 'Error al enviar. Por favor escríbenos a info@logispark.es']);
    }
}

// ── Pasar variables a JS ──
add_action('wp_enqueue_scripts', function() {
    wp_localize_script('logispark-main', 'logisparkData', [
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce'   => wp_create_nonce('logispark_nonce'),
    ]);
}, 20);

// ── Eliminar emoji scripts innecesarios ──
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

// ── Breadcrumbs ──
function logispark_breadcrumbs() {
    if (is_front_page()) return;
    echo '<div class="lg-breadcrumb">';
    echo '<a href="' . home_url() . '">Inicio</a>';
    echo '<span class="lg-breadcrumb-sep">›</span>';
    if (is_page()) {
        echo '<span>' . get_the_title() . '</span>';
    } elseif (is_single()) {
        echo '<a href="' . get_permalink(get_option('page_for_posts')) . '">Blog</a>';
        echo '<span class="lg-breadcrumb-sep">›</span>';
        echo '<span>' . get_the_title() . '</span>';
    }
    echo '</div>';
}
