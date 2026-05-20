<?php
/**
 * Template Name: Almacenamiento Exterior
 */
get_header();
?>

<!-- BREADCRUMB -->
<div style="padding:14px 80px;background:#f5f7fa;border-bottom:1px solid #e8ecf2;display:flex;align-items:center;gap:8px;">
  <a href="<?php echo home_url(); ?>" style="font-family:var(--font-heading);font-size:10px;font-weight:500;letter-spacing:.1em;text-transform:uppercase;color:var(--azul);text-decoration:none;">Inicio</a>
  <span style="font-size:10px;color:#bbb;">›</span>
  <span style="font-family:var(--font-heading);font-size:10px;font-weight:500;letter-spacing:.1em;text-transform:uppercase;color:#888;">Almacenamiento Exterior</span>
</div>

<!-- HERO -->
<section class="lg-hero">
  <div class="lg-hero-bg" style="background-image:url('<?php echo get_stylesheet_directory_uri(); ?>/assets/img/exterior-hero.webp');"></div>
  <div class="lg-hero-overlay"></div>
  <div class="lg-hero-inner">
    <div class="lg-hero-tag">01 · Almacenamiento Exterior</div>
    <h1>Espacio exterior<br><span>cuando más</span><br>lo necesitas</h1>
    <p class="lg-hero-sub">Soluciones de almacenaje al aire libre para <strong>mercancía voluminosa, maquinaria pesada y vehículos</strong>. Instalaciones propias, vigiladas 24/7 y disponibles de inmediato.</p>
    <div class="lg-hero-stats">
      <div class="lg-hero-stat"><div class="lg-stat-num">65.000<span>m²</span></div><div class="lg-stat-label">Total campa propia</div></div>
      <div class="lg-hero-stat"><div class="lg-stat-num">3</div><div class="lg-stat-label">Instalaciones activas</div></div>
      <div class="lg-hero-stat"><div class="lg-stat-num">24<span>h</span></div><div class="lg-stat-label">Vigilancia continua</div></div>
    </div>
    <a href="#contacto" class="btn-primary">Solicitar espacio →</a>
  </div>
</section>

<!-- INTRO -->
<section class="lg-section lg-section-white" style="display:grid;grid-template-columns:1fr 1fr;gap:80px;align-items:center;">
  <div>
    <div class="lg-eyebrow">Nuestra propuesta</div>
    <h2 class="lg-section-title">El almacenaje exterior<br><span>que nadie más</span><br>puede ofrecerte</h2>
    <p style="font-size:17px;font-weight:300;line-height:1.9;color:#444;margin-bottom:32px;">
      Si necesitas espacio para almacenar <strong>vehículos pesados, maquinaria, matrices, bigbags, materias primas, contenedores</strong> o cualquier otro elemento voluminoso, nosotros tenemos la solución.<br><br>
      En nuestras instalaciones propias podemos ofrecerte ese servicio de almacenaje tan complicado de encontrar.
    </p>
    <a href="#contacto" class="btn-primary">Solicitar espacio →</a>
  </div>
  <div class="lg-grid-2" style="gap:10px;">
    <?php
    $items = ['🚛 Vehículos pesados','⚙️ Maquinaria industrial','🔩 Matrices y moldes','🛍️ Bigbags','🪨 Materias primas','📦 Contenedores','🏗️ Material de obra','🚢 Mercancía en tránsito'];
    foreach ($items as $item) :
    ?>
    <div style="display:flex;align-items:center;gap:10px;padding:13px 14px;background:#f4f7fb;border-radius:7px;font-family:var(--font-heading);font-size:12px;font-weight:600;color:var(--azul);border:1px solid rgba(26,56,117,.08);">
      <?php echo esc_html($item); ?>
    </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- FOTO MAQUINARIA -->
<div class="lg-fullimg">
  <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/exterior-maquinaria.webp" alt="Maquinaria en campa exterior" loading="lazy"/>
</div>

<!-- CAMPAS -->
<section class="lg-section lg-section-dark">
  <div class="lg-eyebrow lg-eyebrow-orange">Nuestras instalaciones</div>
  <h2 class="lg-section-title lg-section-title-white">3 campas propias<br>en el Vallès</h2>
  <div class="lg-campas-grid">
    <div class="lg-campa">
      <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/campa-les-franqueses.webp" alt="Campa Les Franqueses" loading="lazy"/>
      <div class="lg-campa-overlay"></div>
      <div class="lg-campa-info">
        <div class="lg-campa-size">20.000 <em>m²</em></div>
        <div class="lg-campa-name">Les Franqueses del Vallès</div>
        <div class="lg-campa-desc">Vallada · Videovigilancia 24h · CRA</div>
      </div>
    </div>
    <div class="lg-campa">
      <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/campa-mollet.webp" alt="Campa Mollet" loading="lazy"/>
      <div class="lg-campa-overlay"></div>
      <div class="lg-campa-info">
        <div class="lg-campa-size">20.000 <em>m²</em></div>
        <div class="lg-campa-name">Mollet del Vallès</div>
        <div class="lg-campa-desc">Acceso directo autopista · Gran capacidad</div>
      </div>
    </div>
    <div class="lg-campa">
      <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/campa-parets.webp" alt="Campa Parets" loading="lazy"/>
      <div class="lg-campa-overlay"></div>
      <div class="lg-campa-info">
        <div class="lg-campa-size">15.000 <em>m²</em></div>
        <div class="lg-campa-name">Parets del Vallès</div>
        <div class="lg-campa-desc">Polígono industrial consolidado</div>
      </div>
    </div>
  </div>
</section>

<!-- FEATURES -->
<section class="lg-section lg-section-light">
  <div class="lg-eyebrow">Por qué elegirnos</div>
  <h2 class="lg-section-title">Lo que nos diferencia</h2>
  <div class="lg-grid-3">
    <?php
    $feats = [
      ['🔒','Seguridad total','Campas perimetradas, valladas y con videovigilancia conectada a central receptora de alarmas (CRA) 24h.'],
      ['📋','Seguro incluido','Seguro de responsabilidad civil y de mercancías acorde a lo depositado en nuestras instalaciones.'],
      ['📐','Flexibilidad total','Desde una plaza de parking hasta miles de metros cuadrados. Sin mínimos ni contratos rígidos.'],
      ['📍','Ubicación estratégica','Las 3 campas en el Vallès Oriental, con acceso a AP-7, C-17 y C-33. A 30 min de Barcelona.'],
      ['⚡','Respuesta inmediata','Te contactamos en menos de 24 horas con disponibilidad real y precio cerrado. Sin burocracia.'],
      ['🤝','Trato directo','Hablas directamente con los propietarios. Soluciones ad-hoc para cada cliente, sin intermediarios.'],
    ];
    foreach ($feats as $f) : ?>
    <div class="lg-card">
      <span class="lg-card-icon"><?php echo $f[0]; ?></span>
      <div class="lg-card-title"><?php echo esc_html($f[1]); ?></div>
      <p class="lg-card-body"><?php echo esc_html($f[2]); ?></p>
    </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- CTA -->
<?php get_template_part('template-parts/cta'); ?>

<?php get_footer(); ?>
