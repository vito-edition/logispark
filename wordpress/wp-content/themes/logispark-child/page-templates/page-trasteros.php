<?php
/**
 * Template Name: Parques de Trasteros
 */
get_header();
?>

<div style="padding:14px 80px;background:#f5f7fa;border-bottom:1px solid #e8ecf2;display:flex;align-items:center;gap:8px;">
  <a href="<?php echo home_url(); ?>" style="font-family:var(--font-heading);font-size:10px;font-weight:500;letter-spacing:.1em;text-transform:uppercase;color:var(--azul);text-decoration:none;">Inicio</a>
  <span style="color:#bbb;">›</span>
  <span style="font-family:var(--font-heading);font-size:10px;font-weight:500;letter-spacing:.1em;text-transform:uppercase;color:#888;">Parques de Trasteros</span>
</div>

<section class="lg-hero">
  <div class="lg-hero-bg" style="background-image:url('<?php echo get_stylesheet_directory_uri(); ?>/assets/img/trasteros-hero.webp');background-position:center 35%;"></div>
  <div class="lg-hero-overlay"></div>
  <div class="lg-hero-inner">
    <div class="lg-hero-tag">03 · Parques de Trasteros</div>
    <h1>El local que<br>necesitas, <em style="font-style:normal;color:var(--naranja);">sin</em><br>lo que no quieres.</h1>
    <p class="lg-hero-sub">¿Acabas la obra del viernes y no sabes dónde dejar el encofrado, el andamio o la hormigonera hasta el lunes? <strong>Trasteros en contenedor marítimo en el Vallès</strong>, disponibles ya.</p>
    <div style="display:flex;gap:16px;flex-wrap:wrap;">
      <a href="#contacto" class="btn-primary btn-naranja">Ver disponibilidad →</a>
      <a href="#ventajas" class="btn-primary" style="background:transparent;border-color:rgba(255,255,255,.3);font-size:11px;">¿Por qué elegirnos?</a>
    </div>
  </div>
</section>

<!-- ARGUMENTO ECONÓMICO -->
<section class="lg-section lg-section-dark" style="display:grid;grid-template-columns:1fr 1fr;gap:80px;align-items:center;">
  <div>
    <div class="lg-eyebrow lg-eyebrow-orange">El argumento que lo cambia todo</div>
    <h2 class="lg-section-title lg-section-title-white">Un local te cuesta<br><span style="color:var(--azul-claro);">una fortuna.</span><br>Nuestro trastero, no.</h2>
    <p style="font-size:17px;font-weight:300;line-height:1.88;color:rgba(255,255,255,.55);margin-bottom:36px;">
      El suelo en el Vallès no para de subir. Alquilar una nave o local implica fianza, obras, contrato largo, IBI, seguros, vado, suministros y un montón de líos.<br><br>
      Nosotros te ofrecemos <strong style="color:#fff;">exactamente el mismo espacio útil para almacenar, listo desde el primer día</strong>, sin ninguno de esos costes.
    </p>
  </div>
  <div>
    <?php
    $costes = ['IBI','Vado y licencias','Seguro de continente','Luz y suministros','Obras de adaptación','Permanencia mínima larga'];
    $descs  = ['Lo paga el propietario. Tú, nada.','Incluidos en el alquiler del parque.','La instalación ya está asegurada.','Sin facturas de suministros propias.','El contenedor llega listo.','Alquila por meses.'];
    foreach ($costes as $i => $c) : ?>
    <div class="lg-coste-item">
      <div class="lg-coste-cross">✕</div>
      <div class="lg-coste-text"><strong><?php echo esc_html($c); ?></strong> — <?php echo esc_html($descs[$i]); ?></div>
      <div class="lg-coste-badge">Eliminado</div>
    </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- FOTO CONTENEDORES -->
<div class="lg-fullimg">
  <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/trasteros-hero.webp" alt="Parque de trasteros contenedores" loading="lazy"/>
</div>

<!-- PARA QUIÉN -->
<section class="lg-section lg-section-light">
  <div class="lg-eyebrow">¿Para quién es esto?</div>
  <h2 class="lg-section-title">Hecho para los que<br>mueven material a diario</h2>
  <div class="lg-grid-3">
    <?php
    $perfiles = [
      ['🏗️','Encofradores','Paneles, puntales, tablones y sistemas de encofrado entre obra y obra. Sin dejarlo a la intemperie.'],
      ['🧱','Paletas y albañiles','Herramientas, maquinaria de mezcla, andamios. Un sitio seco y seguro entre encargos.'],
      ['🎨','Pintores','Pintura, rodillos, escaleras, máquinas de proyección. Todo almacenado sin que se estropee.'],
      ['🔩','Andamieros','Andamios desmontados, abrazaderas y plataformas. El 40ft es perfecto para una estructura completa.'],
      ['🔧','Instaladores y fontaneros','Tubería, accesorios, maquinaria. Cargado en la furgoneta por la mañana, devuelto por la tarde.'],
      ['🏢','Empresas constructoras','Maquinaria entre proyectos, material de reserva. Flexible según el volumen de obra que tengas.'],
    ];
    foreach ($perfiles as $p) : ?>
    <div class="lg-card">
      <span class="lg-card-icon"><?php echo $p[0]; ?></span>
      <div class="lg-card-title"><?php echo esc_html($p[1]); ?></div>
      <p class="lg-card-body"><?php echo esc_html($p[2]); ?></p>
    </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- LLAVE EN MANO -->
<section class="lg-section lg-section-white" id="ventajas">
  <div class="lg-eyebrow lg-eyebrow-orange">Producto llave en mano</div>
  <h2 class="lg-section-title">Llegas, abres y trabajas.<br>Así de simple.</h2>
  <div class="lg-grid-4" style="gap:3px;">
    <?php
    $llaves = [
      ['🔑','Listo desde el día uno','Sin obras, sin trámites. El contenedor está preparado y limpio. Firmas y al día siguiente ya puedes entrar.'],
      ['🚗','Aparca justo delante','Aparcas la furgoneta delante, abres, metes o sacas el material y te vas. Sin perder tiempo.'],
      ['🔒','Seguridad 24/7','Parque vallado, videovigilancia continua conectada a CRA y acceso controlado.'],
      ['📅','Flexible sin ataduras','Alquila por meses o por año. Si creces, añades módulo. Si bajas, reduces. Sin penalizaciones.'],
    ];
    foreach ($llaves as $l) : ?>
    <div style="background:var(--negro);padding:36px 28px;transition:background .25s;" onmouseover="this.style.background='var(--azul)'" onmouseout="this.style.background='var(--negro)'">
      <div style="font-size:28px;margin-bottom:14px;"><?php echo $l[0]; ?></div>
      <div style="font-family:var(--font-heading);font-size:15px;font-weight:800;color:#fff;margin-bottom:8px;"><?php echo esc_html($l[1]); ?></div>
      <p style="font-size:13px;line-height:1.65;color:rgba(255,255,255,.45);"><?php echo esc_html($l[2]); ?></p>
    </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- TAMAÑOS -->
<section class="lg-section lg-section-blue">
  <div class="lg-eyebrow lg-eyebrow-white">Opciones disponibles</div>
  <h2 class="lg-section-title lg-section-title-white">Elige el tamaño<br>que necesitas</h2>
  <div class="lg-grid-3">
    <div style="background:rgba(255,255,255,.07);border:1px solid rgba(255,255,255,.12);border-radius:12px;padding:36px 28px;text-align:center;">
      <div style="font-family:var(--font-heading);font-size:52px;font-weight:900;letter-spacing:-2px;color:#fff;line-height:1;margin-bottom:4px;">14<span style="font-size:18px;font-weight:400;">m²</span></div>
      <div style="font-family:var(--font-heading);font-size:13px;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:rgba(255,255,255,.5);margin-bottom:16px;">Contenedor 20ft</div>
      <p style="font-size:13px;line-height:1.65;color:rgba(255,255,255,.55);">Ideal para autónomos y profesionales con herramientas, material pequeño y utillaje de trabajo.</p>
    </div>
    <div style="background:#fff;border-radius:12px;padding:36px 28px;text-align:center;position:relative;">
      <div style="background:var(--naranja);color:#fff;font-family:var(--font-heading);font-size:9px;font-weight:800;letter-spacing:.12em;text-transform:uppercase;padding:5px 12px;border-radius:20px;display:inline-block;margin-bottom:16px;">Más popular</div>
      <div style="font-family:var(--font-heading);font-size:52px;font-weight:900;letter-spacing:-2px;color:var(--azul);line-height:1;margin-bottom:4px;">28<span style="font-size:18px;font-weight:400;">m²</span></div>
      <div style="font-family:var(--font-heading);font-size:13px;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:rgba(26,56,117,.6);margin-bottom:16px;">Contenedor 40ft</div>
      <p style="font-size:13px;line-height:1.65;color:#444;">Cabe un sistema de encofrado completo o andamios desmontados. Aparcas la furgoneta justo delante.</p>
    </div>
    <div style="background:rgba(255,255,255,.07);border:1px solid rgba(255,255,255,.12);border-radius:12px;padding:36px 28px;text-align:center;">
      <div style="font-family:var(--font-heading);font-size:36px;font-weight:900;letter-spacing:-1px;color:#fff;line-height:1;margin-bottom:4px;">A<span style="font-size:18px;font-weight:400;"> medida</span></div>
      <div style="font-family:var(--font-heading);font-size:13px;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:rgba(255,255,255,.5);margin-bottom:16px;">Módulos combinados</div>
      <p style="font-size:13px;line-height:1.65;color:rgba(255,255,255,.55);">Combinamos módulos para darte exactamente el espacio que requiere tu actividad.</p>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="lg-cta" style="background:var(--naranja);" id="contacto">
  <div>
    <h2 class="lg-cta-title">¿Cuánto espacio<br>necesitas?</h2>
    <p class="lg-cta-sub">Dinos qué material necesitas guardar y cuánto espacio crees que ocupa. Te respondemos con disponibilidad real y precio concreto en menos de 24 horas.</p>
  </div>
  <?php get_template_part('template-parts/contact-form'); ?>
</section>

<?php get_footer(); ?>
