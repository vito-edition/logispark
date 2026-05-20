<?php
/**
 * Template Part: Formulario de contacto
 */
?>
<div style="max-width:540px;">
  <form id="logispark-contact-form" style="display:flex;flex-direction:column;gap:12px;">
    <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px;">
      <input type="text" name="nombre" placeholder="Tu nombre *" required
        style="padding:14px 18px;background:rgba(255,255,255,.08);border:1.5px solid rgba(255,255,255,.15);border-radius:3px;font-family:var(--font-body);font-size:15px;color:#fff;outline:none;">
      <input type="email" name="email" placeholder="Email corporativo *" required
        style="padding:14px 18px;background:rgba(255,255,255,.08);border:1.5px solid rgba(255,255,255,.15);border-radius:3px;font-family:var(--font-body);font-size:15px;color:#fff;outline:none;">
    </div>
    <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px;">
      <input type="tel" name="telefono" placeholder="Teléfono"
        style="padding:14px 18px;background:rgba(255,255,255,.08);border:1.5px solid rgba(255,255,255,.15);border-radius:3px;font-family:var(--font-body);font-size:15px;color:#fff;outline:none;">
      <select name="servicio" required
        style="padding:14px 18px;background:rgba(255,255,255,.08);border:1.5px solid rgba(255,255,255,.15);border-radius:3px;font-family:var(--font-body);font-size:15px;color:rgba(255,255,255,.6);outline:none;">
        <option value="" disabled selected>Servicio de interés *</option>
        <option value="exterior">Almacenamiento Exterior</option>
        <option value="nave">Nave Industrial</option>
        <option value="trastero">Parques de Trasteros</option>
        <option value="logikey">LogiKey™ / Mystery Shipper</option>
      </select>
    </div>
    <textarea name="mensaje" placeholder="Cuéntanos qué necesitas..." rows="3"
      style="padding:14px 18px;background:rgba(255,255,255,.08);border:1.5px solid rgba(255,255,255,.15);border-radius:3px;font-family:var(--font-body);font-size:15px;color:#fff;outline:none;resize:vertical;"></textarea>
    <label style="display:flex;align-items:flex-start;gap:10px;font-size:12px;color:rgba(255,255,255,.4);cursor:pointer;">
      <input type="checkbox" name="privacidad" required style="margin-top:2px;flex-shrink:0;">
      He leído y acepto la <a href="<?php echo home_url('/politica-privacidad'); ?>" style="color:rgba(255,255,255,.6);">política de privacidad</a>
    </label>
    <button type="submit" class="btn-primary" style="align-self:flex-start;">
      Enviar solicitud →
    </button>
    <div class="form-message" style="display:none;padding:12px 16px;border-radius:3px;font-size:14px;"></div>
  </form>
  <p style="font-size:11px;color:rgba(255,255,255,.2);margin-top:12px;">🔒 100% confidencial · Respuesta garantizada en &lt;24h · Sin compromiso</p>
</div>

<style>
.form-message.success { background: rgba(22,163,74,.15); color: #4ade80; border: 1px solid rgba(74,222,128,.2); }
.form-message.error   { background: rgba(220,38,38,.15); color: #f87171; border: 1px solid rgba(248,113,113,.2); }
input:focus, textarea:focus, select:focus { border-color: var(--azul-claro) !important; }
</style>
