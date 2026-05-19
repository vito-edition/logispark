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

// Contact modal — injected in footer on every front-end page
add_action('wp_footer', function () {
    if (is_admin()) return;
    ?>
<div id="ls-modal-overlay" role="dialog" aria-modal="true" aria-label="Formulario de contacto" style="display:none">
  <div id="ls-modal">
    <button id="ls-modal-close" aria-label="Cerrar">✕</button>

    <div class="ls-modal-header">
      <p class="ls-modal-pre">¿Hablamos?</p>
      <h2 class="ls-modal-title">Cuéntanos qué necesitas</h2>
      <p class="ls-modal-sub">Respondemos en menos de 24 horas con una propuesta concreta.</p>
    </div>

    <form id="ls-modal-form" novalidate>
      <div class="ls-field-row">
        <div class="ls-field">
          <label for="ls-nombre">Tu nombre *</label>
          <input type="text" id="ls-nombre" name="nombre" required placeholder="Ej. Carlos Martínez">
        </div>
        <div class="ls-field">
          <label for="ls-empresa">Empresa *</label>
          <input type="text" id="ls-empresa" name="empresa" required placeholder="Ej. Logística XYZ">
        </div>
      </div>
      <div class="ls-field">
        <label for="ls-email">Email *</label>
        <input type="email" id="ls-email" name="email" required placeholder="tunombre@empresa.com">
      </div>
      <div class="ls-field">
        <label for="ls-servicio">¿Qué te interesa?</label>
        <select id="ls-servicio" name="servicio">
          <option value="Almacenamiento Exterior">📦 Almacenamiento Exterior</option>
          <option value="Nave Industrial">🏭 Nave Industrial (IFS)</option>
          <option value="Parques de Trasteros">🧱 Parques de Trasteros</option>
          <option value="LogiKey">🔑 LogiKey™ — Intermediación logística</option>
          <option value="Mystery Shipper">🕵️ Mystery Shipper (premium)</option>
          <option value="Consulta general">💬 Consulta general</option>
        </select>
      </div>
      <div class="ls-field">
        <label for="ls-mensaje">Cuéntanos *</label>
        <textarea id="ls-mensaje" name="mensaje" required rows="4" placeholder="Describe brevemente tu necesidad…"></textarea>
      </div>
      <div class="ls-field ls-privacy">
        <label><input type="checkbox" id="ls-privacy" name="privacy"> He leído y acepto la <a href="/politica-de-privacidad/" target="_blank">política de privacidad</a></label>
      </div>
      <div id="ls-form-msg" class="ls-form-message" aria-live="polite"></div>
      <button type="submit" id="ls-submit">Enviar mensaje →</button>
    </form>
  </div>
</div>

<style>
#ls-modal-overlay {
  position: fixed; inset: 0; z-index: 99999;
  background: rgba(0,0,0,.72);
  backdrop-filter: blur(6px);
  display: flex !important; align-items: center; justify-content: center;
  padding: 20px;
  opacity: 0; pointer-events: none;
  transition: opacity .25s ease;
}
#ls-modal-overlay.ls-open {
  opacity: 1; pointer-events: all;
}
#ls-modal {
  background: #0e1520;
  border: 1px solid rgba(255,255,255,.08);
  border-radius: 16px;
  width: 100%; max-width: 620px;
  max-height: 90vh; overflow-y: auto;
  padding: 48px 44px 40px;
  position: relative;
  transform: translateY(24px);
  transition: transform .25s ease;
  scrollbar-width: thin; scrollbar-color: rgba(255,255,255,.1) transparent;
}
#ls-modal-overlay.ls-open #ls-modal {
  transform: translateY(0);
}
#ls-modal-close {
  position: absolute; top: 18px; right: 20px;
  background: none; border: none; color: rgba(255,255,255,.4);
  font-size: 18px; cursor: pointer; line-height: 1;
  transition: color .15s;
}
#ls-modal-close:hover { color: #fff; }
.ls-modal-pre {
  font-family: 'Montserrat', sans-serif;
  font-size: 11px; font-weight: 600; letter-spacing: .18em;
  text-transform: uppercase; color: #1a6dc7; margin: 0 0 10px;
}
.ls-modal-title {
  font-family: 'Montserrat', sans-serif;
  font-size: 26px; font-weight: 800; color: #fff;
  margin: 0 0 8px; line-height: 1.2;
}
.ls-modal-sub {
  font-family: 'DM Sans', sans-serif;
  font-size: 14px; color: rgba(255,255,255,.45);
  margin: 0 0 32px;
}
.ls-field-row { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
.ls-field { display: flex; flex-direction: column; gap: 6px; margin-bottom: 16px; }
.ls-field label {
  font-family: 'Montserrat', sans-serif;
  font-size: 11px; font-weight: 600; letter-spacing: .08em;
  text-transform: uppercase; color: rgba(255,255,255,.5);
}
.ls-field input,
.ls-field select,
.ls-field textarea {
  background: rgba(255,255,255,.05);
  border: 1px solid rgba(255,255,255,.1);
  border-radius: 8px;
  color: #fff; font-family: 'DM Sans', sans-serif; font-size: 14px;
  padding: 12px 14px; outline: none;
  transition: border-color .15s;
}
.ls-field input:focus,
.ls-field select:focus,
.ls-field textarea:focus { border-color: #1a6dc7; }
.ls-field select option { background: #0e1520; }
.ls-field textarea { resize: vertical; min-height: 90px; }
.ls-privacy label {
  display: flex; align-items: flex-start; gap: 10px;
  font-family: 'DM Sans', sans-serif; font-size: 12px;
  color: rgba(255,255,255,.45); text-transform: none; letter-spacing: 0; cursor: pointer;
}
.ls-privacy a { color: #1a6dc7; }
.ls-form-message {
  font-family: 'DM Sans', sans-serif; font-size: 13px;
  padding: 10px 14px; border-radius: 8px; margin-bottom: 16px; display: none;
}
.ls-form-message.ls-success { background: rgba(26,109,199,.15); color: #6ab0ff; display: block; }
.ls-form-message.ls-error   { background: rgba(220,60,60,.12);  color: #ff8080; display: block; }
#ls-submit {
  width: 100%;
  background: #1a6dc7; color: #fff;
  font-family: 'Montserrat', sans-serif; font-size: 13px; font-weight: 700;
  letter-spacing: .08em; text-transform: uppercase;
  border: none; border-radius: 8px;
  padding: 15px 24px; cursor: pointer;
  transition: background .2s, opacity .2s;
}
#ls-submit:hover { background: #1558a0; }
#ls-submit:disabled { opacity: .55; cursor: not-allowed; }
@media (max-width: 560px) {
  #ls-modal { padding: 36px 22px 28px; }
  .ls-field-row { grid-template-columns: 1fr; }
  .ls-modal-title { font-size: 22px; }
}
</style>

<script>
(function () {
  const overlay  = document.getElementById('ls-modal-overlay');
  const closeBtn = document.getElementById('ls-modal-close');
  const form     = document.getElementById('ls-modal-form');
  const msgBox   = document.getElementById('ls-form-msg');
  const submitBtn= document.getElementById('ls-submit');

  function openModal(servicio) {
    overlay.style.display = '';          // remove inline display:none
    requestAnimationFrame(function () {
      overlay.classList.add('ls-open');
    });
    document.body.style.overflow = 'hidden';
    if (servicio) {
      var sel = document.getElementById('ls-servicio');
      for (var i = 0; i < sel.options.length; i++) {
        if (sel.options[i].value === servicio) { sel.selectedIndex = i; break; }
      }
    }
    document.getElementById('ls-nombre').focus();
  }

  function closeModal() {
    overlay.classList.remove('ls-open');
    document.body.style.overflow = '';
    setTimeout(function () { overlay.style.display = 'none'; }, 260);
  }

  // Intercept every link pointing to /contacto/
  document.addEventListener('click', function (e) {
    var a = e.target.closest('a');
    if (!a) return;
    var href = a.getAttribute('href') || '';
    if (href.indexOf('/contacto') !== -1 || href === '#contacto') {
      e.preventDefault();
      // try to guess service from page URL
      var path = window.location.pathname;
      var map  = {
        'exterior':   'Almacenamiento Exterior',
        'nave':       'Nave Industrial',
        'trasteros':  'Parques de Trasteros',
        'logikey':    'LogiKey',
        'mystery':    'Mystery Shipper',
      };
      var servicio = 'Consulta general';
      for (var key in map) {
        if (path.indexOf(key) !== -1) { servicio = map[key]; break; }
      }
      openModal(servicio);
    }
  });

  closeBtn.addEventListener('click', closeModal);
  overlay.addEventListener('click', function (e) {
    if (e.target === overlay) closeModal();
  });
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') closeModal();
  });

  form.addEventListener('submit', function (e) {
    e.preventDefault();
    var nombre   = document.getElementById('ls-nombre').value.trim();
    var empresa  = document.getElementById('ls-empresa').value.trim();
    var email    = document.getElementById('ls-email').value.trim();
    var mensaje  = document.getElementById('ls-mensaje').value.trim();
    var privacy  = document.getElementById('ls-privacy').checked;
    var servicio = document.getElementById('ls-servicio').value;

    msgBox.className = 'ls-form-message';
    msgBox.textContent = '';

    if (!nombre || !empresa || !email || !mensaje) {
      msgBox.className = 'ls-form-message ls-error';
      msgBox.textContent = '⚠ Por favor, completa todos los campos obligatorios.';
      return;
    }
    if (!privacy) {
      msgBox.className = 'ls-form-message ls-error';
      msgBox.textContent = '⚠ Debes aceptar la política de privacidad.';
      return;
    }

    submitBtn.disabled = true;
    submitBtn.textContent = 'Enviando…';

    var fd = new FormData();
    fd.append('action',   'logispark_contact');
    fd.append('nonce',    window.logisparkAjax.nonce);
    fd.append('nombre',   nombre);
    fd.append('empresa',  empresa);
    fd.append('email',    email);
    fd.append('servicio', servicio);
    fd.append('mensaje',  mensaje);

    fetch(window.logisparkAjax.url, { method: 'POST', body: fd })
      .then(function (r) { return r.json(); })
      .then(function (res) {
        if (res.success) {
          msgBox.className = 'ls-form-message ls-success';
          msgBox.textContent = '✓ ' + res.data.msg;
          form.reset();
          setTimeout(closeModal, 2800);
        } else {
          msgBox.className = 'ls-form-message ls-error';
          msgBox.textContent = '⚠ ' + (res.data ? res.data.msg : 'Error al enviar.');
        }
      })
      .catch(function () {
        msgBox.className = 'ls-form-message ls-error';
        msgBox.textContent = '⚠ Error de red. Escríbenos a hola@logispark.es';
      })
      .finally(function () {
        submitBtn.disabled = false;
        submitBtn.textContent = 'Enviar mensaje →';
      });
  });
})();
</script>
    <?php
});
