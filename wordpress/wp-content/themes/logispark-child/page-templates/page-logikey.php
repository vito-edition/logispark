<?php
/**
 * Template Name: LogiKey Mystery Shipper
 */
get_header();
?>

<div style="padding:14px 80px;background:#f5f7fa;border-bottom:1px solid #e8ecf2;display:flex;align-items:center;gap:8px;">
  <a href="<?php echo home_url(); ?>" style="font-family:var(--font-heading);font-size:10px;font-weight:500;letter-spacing:.1em;text-transform:uppercase;color:var(--azul);text-decoration:none;">Inicio</a>
  <span style="color:#bbb;">›</span>
  <span style="font-family:var(--font-heading);font-size:10px;font-weight:500;letter-spacing:.1em;text-transform:uppercase;color:#888;">LogiKey™ — Mystery Shipper</span>
</div>

<!-- HERO MYSTERY SHIPPER -->
<section class="lg-hero" style="min-height:100vh;">
  <div class="lg-hero-bg" style="background-image:url('<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logikey-hero.webp');background-position:center 30%;"></div>
  <div class="lg-hero-overlay" style="background:linear-gradient(110deg,rgba(5,8,18,.98) 0%,rgba(5,8,18,.92) 40%,rgba(5,8,18,.6) 65%,rgba(5,8,18,.2) 100%);"></div>
  <div class="lg-hero-inner">
    <div style="display:inline-flex;align-items:center;gap:8px;background:rgba(232,66,10,.12);border:1px solid rgba(232,66,10,.3);border-radius:20px;padding:6px 16px;margin-bottom:28px;">
      <div style="width:6px;height:6px;border-radius:50%;background:var(--naranja);"></div>
      <span style="font-family:var(--font-heading);font-size:10px;font-weight:700;letter-spacing:.16em;text-transform:uppercase;color:var(--naranja);">LogiKey™ · Servicio exclusivo</span>
    </div>
    <span style="font-family:var(--font-heading);font-size:12px;font-weight:700;letter-spacing:.28em;text-transform:uppercase;color:rgba(255,255,255,.3);display:block;margin-bottom:14px;">La técnica que usan las grandes empresas</span>
    <div class="lg-mystery-big">
      <span>MYSTERY</span>
      <span class="line-red">SHIPPER</span>
    </div>
    <div style="width:48px;height:3px;background:var(--naranja);margin:28px 0;border-radius:1px;"></div>
    <p class="lg-hero-sub" style="max-width:560px;">
      El mercado logístico adapta sus precios al comprador. Nosotros equilibramos esa ecuación a tu favor. <strong>Negociamos de forma anónima. El operador hace su mejor oferta real.</strong>
    </p>
    <p style="font-family:var(--font-heading);font-size:13px;font-weight:600;font-style:italic;color:rgba(255,255,255,.35);margin-bottom:40px;">— Un solo interlocutor para toda tu logística en Cataluña.</p>
    <div style="display:flex;gap:16px;flex-wrap:wrap;">
      <a href="#" onclick="msOpenModal();return false;" class="btn-primary btn-naranja">Activar Mystery Shipper →</a>
      <a href="#como-funciona" style="font-family:var(--font-heading);font-size:11px;font-weight:600;letter-spacing:.1em;text-transform:uppercase;color:rgba(255,255,255,.5);text-decoration:none;border-bottom:1px solid rgba(255,255,255,.25);padding-bottom:2px;align-self:center;">¿Cómo funciona?</a>
    </div>
  </div>
</section>

<!-- EL MECANISMO -->
<section class="lg-section lg-section-dark" id="como-funciona">
  <div class="lg-eyebrow lg-eyebrow-orange">El mecanismo</div>
  <h2 class="lg-section-title lg-section-title-white">Tu nombre negocia peor<br>que el nuestro</h2>
  <p style="font-size:17px;font-weight:300;color:rgba(255,255,255,.5);max-width:680px;line-height:1.85;margin-bottom:48px;">
    Los operadores logísticos ajustan sus ofertas en función de quién pregunta. <strong style="color:#fff;">Una gran marca implica volumen garantizado, pero también implica precio inflado.</strong> Nosotros eliminamos ese sesgo.
  </p>
  <div class="lg-diagrama">
    <div class="lg-diag-node empresa">
      <span class="lg-diag-icon">🏭</span>
      <div class="lg-diag-name">Tu empresa</div>
      <p class="lg-diag-desc">Gran marca, volumen conocido, necesidad urgente.</p>
      <span class="lg-diag-badge badge-blue">Anónimo</span>
    </div>
    <div class="lg-diag-arrow">→</div>
    <div class="lg-diag-node logikey">
      <span class="lg-diag-icon">🔑</span>
      <div class="lg-diag-name">LogiKey™</div>
      <p class="lg-diag-desc">Negociamos en nuestro nombre. El operador no sabe quién es el cliente.</p>
      <span class="lg-diag-badge badge-red">Mystery Shipper</span>
    </div>
    <div class="lg-diag-arrow">→</div>
    <div class="lg-diag-node operador">
      <span class="lg-diag-icon">🏗️</span>
      <div class="lg-diag-name">Operador logístico</div>
      <p class="lg-diag-desc">Hace su mejor oferta real. Sin sesgo de marca.</p>
      <span class="lg-diag-badge badge-green">Precio real</span>
    </div>
  </div>
</section>

<!-- AHORRO -->
<section class="lg-section lg-section-white">
  <div class="lg-eyebrow">El impacto en números</div>
  <h2 class="lg-section-title">Lo que te ahorras<br>siendo anónimo</h2>
  <div class="lg-grid-3" style="margin-top:48px;">
    <div style="background:#f4f7fb;border-radius:12px;padding:36px 28px;text-align:center;border:1px solid rgba(26,56,117,.08);">
      <div style="font-family:var(--font-heading);font-size:64px;font-weight:900;color:var(--azul);letter-spacing:-3px;line-height:1;margin-bottom:8px;">20%</div>
      <div style="font-family:var(--font-heading);font-size:16px;font-weight:800;color:var(--negro);margin-bottom:10px;">Ahorro mínimo estimado</div>
      <p style="font-size:13px;line-height:1.65;color:#666;">En operaciones estándar, negociar de forma anónima supone un ahorro mínimo del 20% respecto al precio que conseguiría la misma empresa con su nombre.</p>
    </div>
    <div style="background:var(--negro);border-radius:12px;padding:36px 28px;text-align:center;">
      <div style="font-family:var(--font-heading);font-size:64px;font-weight:900;color:#fff;letter-spacing:-3px;line-height:1;margin-bottom:8px;">40%</div>
      <div style="font-family:var(--font-heading);font-size:16px;font-weight:800;color:#fff;margin-bottom:10px;">Ahorro en urgencias</div>
      <p style="font-size:13px;line-height:1.65;color:rgba(255,255,255,.5);">Cuando hay urgencia el precio puede dispararse. El anonimato elimina completamente ese sobrecoste.</p>
    </div>
    <div style="background:var(--naranja);border-radius:12px;padding:36px 28px;text-align:center;">
      <div style="font-family:var(--font-heading);font-size:64px;font-weight:900;color:#fff;letter-spacing:-3px;line-height:1;margin-bottom:8px;">24h</div>
      <div style="font-family:var(--font-heading);font-size:16px;font-weight:800;color:#fff;margin-bottom:10px;">Propuesta sobre la mesa</div>
      <p style="font-size:13px;line-height:1.65;color:rgba(255,255,255,.8);">Sin semanas de llamadas ni visitas innecesarias. Propuestas comparadas en tiempo récord.</p>
    </div>
  </div>
</section>

<!-- MODOS -->
<section class="lg-section lg-section-dark">
  <div class="lg-eyebrow lg-eyebrow-orange">Dos formas de trabajar</div>
  <h2 class="lg-section-title lg-section-title-white">Elige cómo quieres<br>que operemos</h2>
  <div class="lg-grid-2">
    <div style="background:var(--naranja);border-radius:12px;padding:44px 40px;">
      <div style="background:rgba(255,255,255,.2);color:#fff;font-family:var(--font-heading);font-size:9px;font-weight:800;letter-spacing:.14em;text-transform:uppercase;padding:5px 12px;border-radius:20px;display:inline-block;margin-bottom:20px;">El más solicitado</div>
      <div style="font-family:var(--font-heading);font-size:28px;font-weight:900;color:#fff;letter-spacing:-.5px;margin-bottom:16px;">LogiKey™ Full</div>
      <p style="font-size:16px;font-weight:300;color:rgba(255,255,255,.8);line-height:1.8;margin-bottom:28px;">Nos cedes la búsqueda, el análisis y la negociación. Firmamos nosotros. Cero gestión por tu parte.</p>
      <?php foreach(['Negociación anónima completa','Firmamos el contrato con el operador','Una sola factura a tu nombre','Seguimiento y gestión incluidos'] as $item) : ?>
      <div style="color:rgba(255,255,255,.85);font-size:14px;margin-bottom:8px;">✓ <?php echo esc_html($item); ?></div>
      <?php endforeach; ?>
    </div>
    <div style="background:rgba(255,255,255,.05);border:1px solid rgba(255,255,255,.1);border-radius:12px;padding:44px 40px;">
      <div style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.6);font-family:var(--font-heading);font-size:9px;font-weight:800;letter-spacing:.14em;text-transform:uppercase;padding:5px 12px;border-radius:20px;display:inline-block;margin-bottom:20px;">Para quien prefiere control directo</div>
      <div style="font-family:var(--font-heading);font-size:28px;font-weight:900;color:#fff;letter-spacing:-.5px;margin-bottom:16px;">LogiKey™ Connect</div>
      <p style="font-size:16px;font-weight:300;color:rgba(255,255,255,.5);line-height:1.8;margin-bottom:28px;">Negociamos de forma anónima y cuando hay mejor propuesta te conectamos directamente con el operador.</p>
      <?php foreach(['Búsqueda y negociación anónima','Te presentamos al operador con acuerdo','Tú firmas directamente','Ideal si tienes procesos internos'] as $item) : ?>
      <div style="color:rgba(255,255,255,.5);font-size:14px;margin-bottom:8px;">✓ <?php echo esc_html($item); ?></div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- VS COMPETENCIA -->
<section class="lg-section lg-section-light">
  <div class="lg-eyebrow">Por qué LogiKey™ y no otro</div>
  <h2 class="lg-section-title">La diferencia que<br>nos hace únicos</h2>
  <table class="lg-vs-table" style="margin-top:48px;border:1px solid rgba(26,56,117,.1);border-radius:12px;overflow:hidden;">
    <thead>
      <tr>
        <th>Solución</th><th>Activos propios</th><th>Red validada</th><th>Interlocutor único</th><th>Negociación</th><th class="hl">Firma por ti</th>
      </tr>
    </thead>
    <tbody>
      <tr><td>Izzypalet</td><td><span class="cross">✗</span></td><td><span class="half">~</span></td><td><span class="cross">✗</span></td><td><span class="cross">✗</span></td><td><span class="cross">✗</span></td></tr>
      <tr><td>Estoko</td><td><span class="cross">✗</span></td><td><span class="check">✓</span></td><td><span class="check">✓</span></td><td><span class="half">~</span></td><td><span class="cross">✗</span></td></tr>
      <tr><td>Flexspacio</td><td><span class="half">~</span></td><td><span class="half">~</span></td><td><span class="cross">✗</span></td><td><span class="cross">✗</span></td><td><span class="cross">✗</span></td></tr>
      <tr class="our"><td>LogiKey™</td><td><span class="check">✓</span></td><td><span class="check">✓</span></td><td><span class="check">✓</span></td><td><span class="check">✓</span></td><td><span class="check">✓</span></td></tr>
    </tbody>
  </table>
</section>

<!-- CTA FINAL -->
<section style="background:var(--negro);padding:80px;position:relative;overflow:hidden;" id="contacto">
  <div style="position:absolute;font-family:var(--font-heading);font-size:220px;font-weight:900;color:rgba(232,66,10,.04);letter-spacing:-8px;top:50%;left:0;transform:translateY(-50%);pointer-events:none;white-space:nowrap;line-height:1;">MYSTERY</div>
  <div style="position:relative;z-index:2;max-width:720px;margin:0 auto;text-align:center;">
    <div class="lg-eyebrow" style="justify-content:center;color:var(--naranja);">Activa tu Mystery Shipper</div>
    <h2 style="font-family:var(--font-heading);font-size:clamp(36px,5vw,64px);font-weight:900;letter-spacing:-2px;line-height:1;color:#fff;margin-bottom:20px;">Tu nombre te cuesta<br>dinero. Nosotros,<br><em style="font-style:normal;color:var(--naranja);">no.</em></h2>
    <p style="font-size:17px;font-weight:300;color:rgba(255,255,255,.45);line-height:1.75;margin-bottom:32px;">Cuéntanos qué volumen de logística manejas. En menos de 24 horas salimos al mercado en tu nombre. 100% confidencial.</p>
    <button type="button" onclick="msOpenModal()" class="btn-primary btn-naranja" style="font-size:13px;padding:18px 36px;">
      🔑 Activar Mystery Shipper →
    </button>
  </div>
</section>

<!-- FLOATING BANNER + MODAL -->
<?php get_template_part('template-parts/mystery-floater'); ?>

<?php get_footer(); ?>
