<?php
/**
 * Contact form AJAX handler — sends via wp_mail (SMTP configured in wp-mail-smtp)
 */

add_action('wp_ajax_logispark_contact',        'logispark_contact_handler');
add_action('wp_ajax_nopriv_logispark_contact', 'logispark_contact_handler');

function logispark_contact_handler() {
    check_ajax_referer('logispark_contact_nonce', 'nonce');

    $nombre   = sanitize_text_field(wp_unslash($_POST['nombre']   ?? ''));
    $empresa  = sanitize_text_field(wp_unslash($_POST['empresa']  ?? ''));
    $email    = sanitize_email(wp_unslash($_POST['email']         ?? ''));
    $servicio = sanitize_text_field(wp_unslash($_POST['servicio'] ?? ''));
    $mensaje  = sanitize_textarea_field(wp_unslash($_POST['mensaje'] ?? ''));

    if (!$nombre || !$empresa || !is_email($email) || !$mensaje) {
        wp_send_json_error(['msg' => 'Faltan campos obligatorios.'], 400);
    }

    $to      = 'hola@logispark.es';
    $subject = '[Web] Contacto: ' . $servicio . ' — ' . $empresa;
    $body    = "Nuevo contacto desde la web:\n\n"
             . "Nombre:   $nombre\n"
             . "Empresa:  $empresa\n"
             . "Email:    $email\n"
             . "Servicio: $servicio\n\n"
             . "Mensaje:\n$mensaje";

    $headers = [
        'Content-Type: text/plain; charset=UTF-8',
        'Reply-To: ' . $nombre . ' <' . $email . '>',
    ];

    $sent = wp_mail($to, $subject, $body, $headers);

    if ($sent) {
        wp_send_json_success(['msg' => '¡Mensaje enviado! Te contactaremos pronto.']);
    } else {
        wp_send_json_error(['msg' => 'Error al enviar. Por favor escríbenos a hola@logispark.es'], 500);
    }
}

// Inject nonce into every page so the JS can use it
add_action('wp_head', function () {
    echo '<script>window.logisparkAjax = ' . json_encode([
        'url'   => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('logispark_contact_nonce'),
    ]) . ';</script>' . "\n";
});
