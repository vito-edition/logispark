<?php
/**
 * Template Name: Nave Industrial
 */
get_header();
?>

<div style="padding:14px 80px;background:#f5f7fa;border-bottom:1px solid #e8ecf2;display:flex;align-items:center;gap:8px;">
  <a href="<?php echo home_url(); ?>" style="font-family:var(--font-heading);font-size:10px;font-weight:500;letter-spacing:.1em;text-transform:uppercase;color:var(--azul);text-decoration:none;">Inicio</a>
  <span style="color:#bbb;">›</span>
  <span style="font-family:var(--font-heading);font-size:10px;font-weight:500;letter-spacing:.1em;text-transform:uppercase;color:#888;">Nave Industrial</span>
</div>

<section class="lg-hero">
  <div class="lg-hero-bg" style="background-image:url('<?php echo get_stylesheet_directory_uri(); ?>/assets/img/nave-hero.webp');"></div>
  <div class="lg-hero-overlay"></div>
  <div class="lg-hero-inner">
    <div class="lg-hero-tag">02 · Nave Industrial</div>
    <h1>Tu mercancía,<br>en <span>buenas manos</span><br>y mejor sitio.</h1>
    <p class="lg-hero-sub"><strong>10.000 m² de nave logística</strong> con capacidad para 14.000 palés europeos. Certificación IFS, temperatura controlada y todos los servicios que necesita tu cadena de suministro.</p>
    <div class="lg-hero-stats">
      <div class="lg-hero-stat"><div class="lg-stat-num">10.000<span>m²</span></div><div class="lg-stat-label">Nave logística</div></div>
      <div class="lg-hero-stat"><div class="lg-stat-num">14.000</div><div class="lg-stat-label">Posiciones palé EU</div></div>
      <div class="lg-hero-stat"><div class="lg-stat-num">IFS</div><div class="lg-stat-label">Certificación activa</div></div>
    </div>
    <a href="#contacto" class="btn-primary">Solicitar presupuesto →</a>
  </div>
</section>

<!-- INTRO -->
<section class="lg-section lg-section-white">
  <div class="lg-eyebrow">Lo que ofrecemos</div>
  <h2 class="lg-section-title">No es solo <span>guardar cajas.</span><br>Es logística de verdad.</h2>
  <p style="font-size:17px;font-weight:300;line-height:1.9;color:#444;max-width:720px;margin-bottom:32px;">
    Tenemos <strong>10.000 m² de nave</strong> en Montornès del Vallès con <strong>14.000 posiciones para palé europeo</strong> y la certificación IFS que muchas marcas exigen a sus operadores.<br><br>
    Recibimos tu mercancía, la ubicamos, la gestionamos, preparamos tus pedidos y la expedimos. <strong>Tú te concentras en vender. Nosotros nos encargamos del resto.</strong>
  </p>
  <a href="#contacto" class="btn-primary">Hablemos →</a>
</section>

<!-- FOTO INTERIOR -->
<div class="lg-fullimg">
  <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/nave-interior.webp" alt="Interior nave logística Logispark" loading="lazy"/>
</div>

<!-- SERVICIOS -->
<section class="lg-section lg-section-dark">
  <div class="lg-eyebrow lg-eyebrow-orange">Servicios incluidos</div>
  <h2 class="lg-section-title lg-section-title-white">Todo lo que necesita<br>tu operación logística</h2>
  <div class="lg-grid-4">
    <?php
    $servicios = [
      ['📥','Recepción y descarga','Recibimos tu mercancía, comprobamos el estado, verificamos cantidades y la ubicamos en el sistema. Sin sorpresas.'],
      ['📦','Almacenaje y stock','Control de inventario en tiempo real. Trazabilidad por lote, referencia y caducidad.'],
      ['🔍','Picking','Selección de unidades exactas de cada pedido. Desde palet completo hasta unidad individual.'],
      ['📦','Packing y embalaje','Empaquetamos, precintamos, etiquetamos y preparamos según tus especificaciones.'],
      ['🔄','Cross-docking','Recibimos, posicionamos y expedimos sin almacenaje intermedio. Para operaciones urgentes.'],
      ['🚚','Expedición','Coordinamos con las agencias de transporte. Nacional, internacional, urgente o paletería.'],
      ['↩️','Logística inversa','Gestión de devoluciones: recepción, revisión, reintegración al stock o destrucción controlada.'],
      ['❄️','Temperatura controlada','Cámara frigorífica de apoyo para mercancía sensible y crossdocking con condiciones especiales.'],
    ];
    foreach ($servicios as $s) : ?>
    <div class="lg-card lg-card-dark">
      <span class="lg-card-icon"><?php echo $s[0]; ?></span>
      <div class="lg-card-title lg-card-title-white"><?php echo esc_html($s[1]); ?></div>
      <p class="lg-card-body lg-card-body-white"><?php echo esc_html($s[2]); ?></p>
    </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- CAPACIDADES -->
<section class="lg-section lg-section-light" style="display:grid;grid-template-columns:1fr 1fr;gap:72px;align-items:center;">
  <div>
    <div class="lg-eyebrow">Nuestra nave en números</div>
    <h2 class="lg-section-title">Una instalación pensada<br>para escalar contigo</h2>
    <div class="lg-grid-2" style="gap:20px;">
      <?php
      $caps = [
        ['10.000m²','Superficie total de nave en Montornès del Vallès'],
        ['14.000','Posiciones palé europeo en estanterías de altura'],
        ['24h','Seguridad y videovigilancia continua conectada a CRA'],
        ['IFS','Certificación de calidad logística activa y auditada'],
      ];
      foreach ($caps as $c) : ?>
      <div class="lg-card" style="padding:28px 24px;">
        <div style="font-family:var(--font-heading);font-size:32px;font-weight:900;color:var(--azul);letter-spacing:-1px;line-height:1;margin-bottom:4px;"><?php echo esc_html($c[0]); ?></div>
        <div style="font-size:13px;color:#666;line-height:1.5;"><?php echo esc_html($c[1]); ?></div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
  <div style="border-radius:12px;overflow:hidden;box-shadow:0 24px 64px rgba(26,56,117,.15);">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/almacen-logistico.webp" alt="Almacén logístico" loading="lazy" style="width:100%;display:block;aspect-ratio:4/3;object-fit:cover;"/>
  </div>
</section>

<!-- CERTIFICACION IFS -->
<section class="lg-section lg-section-blue" style="display:flex;align-items:center;gap:48px;padding:56px 80px;">
  <div style="font-size:52px;flex-shrink:0;">🏆</div>
  <div>
    <div style="font-family:var(--font-heading);font-size:22px;font-weight:900;color:#fff;margin-bottom:8px;">Certificación IFS Logistics</div>
    <p style="font-size:15px;color:rgba(255,255,255,.65);line-height:1.65;max-width:680px;">Nuestro almacén cuenta con la certificación IFS Logistics, el estándar internacional que exigen las grandes marcas de gran consumo, alimentación y retail a sus operadores logísticos.</p>
  </div>
  <div style="margin-left:auto;background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.2);border-radius:8px;padding:16px 24px;text-align:center;flex-shrink:0;">
    <div style="font-family:var(--font-heading);font-size:20px;font-weight:900;color:#fff;letter-spacing:.05em;">IFS</div>
    <div style="font-size:10px;color:rgba(255,255,255,.5);letter-spacing:.1em;text-transform:uppercase;margin-top:4px;">Logistics Certified</div>
  </div>
</section>

<?php get_template_part('template-parts/cta'); ?>
<?php get_footer(); ?>
