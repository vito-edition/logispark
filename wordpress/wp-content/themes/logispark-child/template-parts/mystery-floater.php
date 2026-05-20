<?php
/**
 * Template Part: Mystery Shipper Floating Banner + Modal
 * Incluir solo en la página LogiKey™
 */
?>

<!-- ══ MYSTERY SHIPPER FLOATING BANNER ══ -->
<div id="ms-floater" onclick="msOpenModal()">
  <div class="ms-floater-icon">🕵️</div>
  <div class="ms-floater-text">
    <div class="ms-floater-label">Servicio exclusivo · LogiKey™</div>
    <div class="ms-floater-title">Mystery Shipper</div>
  </div>
  <div class="ms-floater-btn">Pulsa el botón azul →</div>
  <div class="ms-floater-close" onclick="msCloseFloater(event)">✕</div>
</div>

<!-- ══ MYSTERY SHIPPER MODAL ══ -->
<div id="ms-modal" role="dialog" aria-modal="true" aria-labelledby="ms-modal-title">
  <div id="ms-modal-backdrop" onclick="msCloseModal()"></div>
  <div id="ms-modal-box">
    <div class="ms-modal-header">
      <div class="ms-modal-header-left">
        <div class="ms-modal-eyebrow">LogiKey™ · Mystery Shipper</div>
        <div class="ms-modal-title" id="ms-modal-title">Activa tu<br><span>consultor anónimo</span></div>
      </div>
      <button type="button" class="ms-modal-close-btn" onclick="msCloseModal()" aria-label="Cerrar">✕</button>
    </div>
    <div class="ms-modal-body">
      <p style="font-size:14px;color:rgba(255,255,255,.5);line-height:1.7;margin-bottom:20px;">
        Uno de nuestros consultores te contactará en <strong style="color:#fff;">menos de 24 horas</strong> para analizar tu operación logística y salir al mercado de forma anónima a conseguirte el mejor precio.
      </p>
      <form class="ms-form" id="ms-contact-form" novalidate>
        <?php wp_nonce_field('logispark_nonce', 'ms_nonce'); ?>
        <input type="hidden" name="action" value="logispark_contact"/>
        <input type="hidden" name="servicio" value="LogiKey Mystery Shipper"/>

        <div class="ms-form-row">
          <input class="ms-input" type="text" name="nombre" placeholder="Tu nombre *" required/>
          <input class="ms-input" type="email" name="email" placeholder="Email corporativo *" required/>
        </div>
        <div class="ms-form-row">
          <input class="ms-input" type="tel" name="telefono" placeholder="Teléfono"/>
          <select class="ms-select" name="volumen">
            <option value="" disabled selected>Volumen aproximado</option>
            <option value="pequeño">Menos de 100 palés/mes</option>
            <option value="medio">100 - 500 palés/mes</option>
            <option value="grande">500 - 2.000 palés/mes</option>
            <option value="muy-grande">Más de 2.000 palés/mes</option>
            <option value="campa">Necesito campa exterior</option>
          </select>
        </div>
        <input class="ms-input" type="text" name="empresa" placeholder="Empresa"/>
        <textarea class="ms-input" name="mensaje" placeholder="Cuéntanos brevemente qué necesitas..." rows="3" style="resize:vertical;"></textarea>
        <label class="ms-privacy">
          <input type="checkbox" name="privacidad" required style="margin-top:2px;flex-shrink:0;accent-color:#1a3875;"/>
          Acepto la <a href="<?php echo home_url('/politica-privacidad'); ?>">política de privacidad</a> y que un consultor de Logispark me contacte
        </label>
        <button type="submit" class="ms-submit">
          🔑 Activar Mystery Shipper — Contactar ahora
        </button>
        <div class="ms-form-msg" id="ms-form-msg"></div>
      </form>
    </div>
    <div class="ms-modal-footer">
      🔒 100% confidencial · Tu nombre no saldrá de esta conversación · Respuesta &lt;24h
    </div>
  </div>
</div>
