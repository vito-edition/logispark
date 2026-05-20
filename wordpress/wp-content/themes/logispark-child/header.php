<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- ═══ NAVBAR ═══ -->
<nav class="lg-navbar">
  <div class="lg-navbar-top">
    <div class="lg-navbar-lang">
      <button class="lang-btn active">ES</button>
      <span>|</span>
      <button class="lang-btn">EN</button>
    </div>

    <a class="lg-navbar-logo" href="<?php echo home_url('/'); ?>">
      <div class="lg-logo-main">
        <svg width="24" height="24" viewBox="0 0 120 120" fill="none" xmlns="http://www.w3.org/2000/svg">
          <rect width="120" height="120" rx="22" fill="#1a3875"/>
          <path d="M60 18 L88 33 L88 65 L60 50 Z" fill="white" opacity=".95"/>
          <path d="M32 33 L60 18 L60 50 L32 65 Z" fill="white" opacity=".75"/>
          <path d="M32 65 L60 50 L88 65 L60 80 Z" fill="white" opacity=".5"/>
          <circle cx="84" cy="52" r="16" fill="#e8420a"/>
          <circle cx="84" cy="48.5" r="6.5" fill="white"/>
          <path d="M84 55 Q78 68 84 72 Q90 68 84 55Z" fill="#e8420a"/>
        </svg>
        <div class="lg-logo-wordmark">
          LOGISPARK<span class="grp">GROUP</span>
        </div>
      </div>
      <div class="lg-logo-sub">Smart logistics solutions</div>
    </a>

    <div class="lg-navbar-socials">
      <a href="https://linkedin.com/company/logispark-group" target="_blank" rel="noopener" aria-label="LinkedIn">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
          <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6zM2 9h4v12H2z"/>
          <circle cx="4" cy="4" r="2"/>
        </svg>
      </a>
      <a href="https://instagram.com/logisparkgroup" target="_blank" rel="noopener" aria-label="Instagram">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <rect x="2" y="2" width="20" height="20" rx="5"/>
          <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/>
          <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/>
        </svg>
      </a>
      <a href="https://wa.me/34629220066" target="_blank" rel="noopener" aria-label="WhatsApp">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
          <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/>
        </svg>
      </a>
    </div>

    <!-- Botón hamburger (sólo visible en móvil) -->
    <button class="lg-hamburger" aria-label="Abrir menú" aria-expanded="false">
      <span></span><span></span><span></span>
    </button>
  </div>

  <div class="lg-navbar-bottom">
    <!-- Selector de idioma (sólo visible en menú móvil) -->
    <div class="lg-mobile-lang">
      <button class="lang-btn active">ES</button>
      <span style="color:rgba(255,255,255,.3)">|</span>
      <button class="lang-btn">EN</button>
    </div>
    <?php
    wp_nav_menu([
      'theme_location' => 'primary',
      'menu_class'     => 'lg-nav-menu',
      'container'      => false,
      'items_wrap'     => '%3$s',
      'walker'         => new Logispark_Nav_Walker(),
      'fallback_cb'    => 'logispark_default_menu',
    ]);
    ?>
    <a href="<?php echo home_url('/contacto'); ?>" class="lg-nav-cta">
      Solicitar espacio →
    </a>
  </div>
</nav>

<?php
// Walker personalizado para el menú
class Logispark_Nav_Walker extends Walker_Nav_Menu {
  function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
    $classes  = implode(' ', $item->classes ?? []);
    $active   = in_array('current-menu-item', $item->classes ?? []) ? ' current-menu-item' : '';
    $output  .= '<a class="lg-nav-link' . $active . '" href="' . esc_url($item->url) . '">';
    $output  .= esc_html($item->title);
    $output  .= '</a>';
  }
}

function logispark_default_menu() {
  $pages = [
    'inicio'                    => home_url('/'),
    'Almacenamiento Exterior'   => home_url('/almacenamiento-exterior'),
    'Nave Industrial'           => home_url('/nave-industrial'),
    'Parques de Trasteros'      => home_url('/parques-trasteros'),
    'LogiKey™'                  => home_url('/logikey'),
    'El Grupo'                  => home_url('/el-grupo'),
    'Contacto'                  => home_url('/contacto'),
  ];
  foreach ($pages as $label => $url) {
    $active = (get_permalink() === $url) ? ' current-menu-item' : '';
    echo '<a class="lg-nav-link' . $active . '" href="' . esc_url($url) . '">' . esc_html($label) . '</a>';
  }
}
?>
</nav>
