<?php
/**
 * Template Name: Home — Logispark Group
 * Página principal con hero y puzzle grid de 4 servicios
 */
get_header();
?>

<!-- ═══ HERO HOME ═══ -->
<section class="lg-hero" style="min-height:85vh;">
  <div class="lg-hero-bg" style="background-image:url('<?php echo get_stylesheet_directory_uri(); ?>/assets/img/hero-home.webp');"></div>
  <div class="lg-hero-overlay" style="background:rgba(5,8,18,.75);"></div>
  <div class="lg-hero-inner" style="max-width:100%;width:100%;padding:80px;">
    <div class="lg-hero-tag animate-on-scroll">Logística inteligente · Vallès Oriental · Barcelona</div>
    <h1 class="animate-on-scroll" style="font-size:clamp(42px,6vw,72px);">
      Tu socio <span>logístico</span><br>en el Vallès.
    </h1>
    <p class="lg-hero-sub animate-on-scroll">
      Campas de almacenaje exterior, nave industrial IFS, parques de trasteros y LogiKey™. <strong>Todo lo que necesita tu cadena de suministro.</strong>
    </p>
    <div style="display:flex;gap:16px;flex-wrap:wrap;" class="animate-on-scroll">
      <a href="<?php echo home_url('/contacto'); ?>" class="btn-primary btn-naranja">Solicitar espacio →</a>
      <a href="<?php echo home_url('/el-grupo'); ?>" class="btn-primary" style="background:rgba(255,255,255,.08);border-color:rgba(255,255,255,.2);font-size:11px;">El Grupo</a>
    </div>
  </div>
</section>

<!-- ═══ PUZZLE GRID ═══ -->
<div class="lg-puzzle-grid">

  <!-- Almacenamiento Exterior -->
  <a href="<?php echo home_url('/almacenamiento-exterior'); ?>" class="lg-puzzle-cell" style="text-decoration:none;">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/exterior-hero.webp" alt="Almacenamiento Exterior" loading="lazy"/>
    <div class="lg-puzzle-overlay">
      <div class="lg-puzzle-tag">01 · Almacenamiento</div>
      <div class="lg-puzzle-title">Almacenamiento<br>Exterior</div>
      <div class="lg-puzzle-sub">65.000 m² · 3 campas en el Vallès</div>
      <div class="lg-puzzle-arrow">→</div>
    </div>
  </a>

  <!-- Nave Industrial -->
  <a href="<?php echo home_url('/nave-industrial'); ?>" class="lg-puzzle-cell" style="text-decoration:none;">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/nave-hero.webp" alt="Nave Industrial" loading="lazy"/>
    <div class="lg-puzzle-overlay">
      <div class="lg-puzzle-tag">02 · Nave Industrial</div>
      <div class="lg-puzzle-title">Nave<br>Industrial</div>
      <div class="lg-puzzle-sub">10.000 m² · IFS · 14.000 palés</div>
      <div class="lg-puzzle-arrow">→</div>
    </div>
  </a>

  <!-- Parques de Trasteros -->
  <a href="<?php echo home_url('/parques-trasteros'); ?>" class="lg-puzzle-cell" style="text-decoration:none;">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/trasteros-hero.webp" alt="Parques de Trasteros" loading="lazy"/>
    <div class="lg-puzzle-overlay">
      <div class="lg-puzzle-tag">03 · Trasteros</div>
      <div class="lg-puzzle-title">Parques de<br>Trasteros</div>
      <div class="lg-puzzle-sub">Contenedores · Llave en mano</div>
      <div class="lg-puzzle-arrow">→</div>
    </div>
  </a>

  <!-- LogiKey -->
  <a href="<?php echo home_url('/logikey'); ?>" class="lg-puzzle-cell" style="text-decoration:none;">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logikey-hero.webp" alt="LogiKey™" loading="lazy"/>
    <div class="lg-puzzle-overlay" style="background:rgba(26,56,117,.7);">
      <div class="lg-puzzle-tag">04 · Intermediación</div>
      <div class="lg-puzzle-title">LogiKey™<br>Mystery Shipper</div>
      <div class="lg-puzzle-sub">Logística anónima · Cataluña</div>
      <div class="lg-puzzle-arrow">→</div>
    </div>
  </a>

</div>

<!-- ═══ STATS STRIP ═══ -->
<div style="background:var(--negro);padding:48px 80px;display:grid;grid-template-columns:repeat(4,1fr);gap:0;border-top:1px solid rgba(255,255,255,.06);">
  <?php
  $stats = [
    ['65.000', 'm²', 'Campa exterior propia'],
    ['10.000', 'm²', 'Nave logística IFS'],
    ['14.000', '', 'Posiciones palé europeo'],
    ['3', '', 'Campas en el Vallès'],
  ];
  foreach ($stats as $s) : ?>
  <div style="text-align:center;padding:24px;border-right:1px solid rgba(255,255,255,.06);">
    <div class="lg-stat-num" style="font-size:36px;" data-count="<?php echo intval($s[0]); ?>" data-suffix="<?php echo esc_attr($s[1]); ?>">
      <?php echo $s[0] . $s[1]; ?>
    </div>
    <div class="lg-stat-label"><?php echo esc_html($s[2]); ?></div>
  </div>
  <?php endforeach; ?>
</div>

<?php get_footer(); ?>
