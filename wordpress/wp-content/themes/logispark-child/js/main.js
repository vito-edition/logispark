/**
 * Logispark Group — main.js
 * Animaciones, acordeón campas, formulario de contacto, navbar
 */

document.addEventListener('DOMContentLoaded', function () {

  // ── NAVBAR: marcar página activa ──
  const currentUrl = window.location.href;
  document.querySelectorAll('.lg-nav-link').forEach(link => {
    if (link.href === currentUrl || currentUrl.includes(link.getAttribute('href'))) {
      link.classList.add('current-menu-item');
    }
  });

  // ── SCROLL ANIMATIONS (Intersection Observer) ──
  const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
  };

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('is-visible');
        observer.unobserve(entry.target);
      }
    });
  }, observerOptions);

  document.querySelectorAll('.animate-on-scroll').forEach(el => {
    observer.observe(el);
  });

  // ── FORMULARIO DE CONTACTO AJAX ──
  const form = document.getElementById('logispark-contact-form');
  if (form) {
    form.addEventListener('submit', function (e) {
      e.preventDefault();

      const btn    = form.querySelector('[type="submit"]');
      const msg    = form.querySelector('.form-message');
      const data   = new FormData(form);
      data.append('action', 'logispark_contact');
      data.append('nonce', logisparkData.nonce);

      btn.disabled = true;
      btn.textContent = 'Enviando...';

      fetch(logisparkData.ajaxurl, {
        method: 'POST',
        body: data
      })
        .then(res => res.json())
        .then(response => {
          if (response.success) {
            msg.textContent  = response.data.message;
            msg.className    = 'form-message success';
            form.reset();
          } else {
            msg.textContent = response.data.message;
            msg.className   = 'form-message error';
          }
        })
        .catch(() => {
          msg.textContent = 'Error de conexión. Por favor inténtalo de nuevo.';
          msg.className   = 'form-message error';
        })
        .finally(() => {
          btn.disabled    = false;
          btn.textContent = 'Enviar solicitud →';
          msg.style.display = 'block';
        });
    });
  }

  // ── STATS COUNTER ANIMATION ──
  function animateCounter(el, target, suffix = '') {
    const duration = 1500;
    const start = performance.now();
    const update = (time) => {
      const elapsed = time - start;
      const progress = Math.min(elapsed / duration, 1);
      const eased = 1 - Math.pow(1 - progress, 3);
      const current = Math.round(eased * target);
      el.textContent = current.toLocaleString('es-ES') + suffix;
      if (progress < 1) requestAnimationFrame(update);
    };
    requestAnimationFrame(update);
  }

  const statsObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const el = entry.target;
        const target = parseInt(el.dataset.count, 10);
        const suffix = el.dataset.suffix || '';
        animateCounter(el, target, suffix);
        statsObserver.unobserve(el);
      }
    });
  }, { threshold: 0.5 });

  document.querySelectorAll('[data-count]').forEach(el => {
    statsObserver.observe(el);
  });

  // ── SMOOTH SCROLL para anclas ──
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      const target = document.querySelector(this.getAttribute('href'));
      if (target) {
        e.preventDefault();
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    });
  });

  // ── NAVBAR SCROLL EFFECT ──
  const navbar = document.querySelector('.lg-navbar');
  if (navbar) {
    window.addEventListener('scroll', () => {
      if (window.scrollY > 40) {
        navbar.style.boxShadow = '0 4px 24px rgba(0,0,0,.3)';
      } else {
        navbar.style.boxShadow = 'none';
      }
    }, { passive: true });
  }

  // ── HAMBURGER: child theme header (.lg-navbar) ──
  const lgHamburger = document.querySelector('.lg-hamburger');
  const lgNavBottom = document.querySelector('.lg-navbar-bottom');
  if (lgHamburger && lgNavBottom) {
    lgHamburger.addEventListener('click', function (e) {
      e.stopPropagation();
      const isOpen = lgNavBottom.classList.toggle('is-open');
      lgHamburger.classList.toggle('is-open', isOpen);
      lgHamburger.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
      document.body.style.overflow = isOpen ? 'hidden' : '';
    });
    lgNavBottom.querySelectorAll('.lg-nav-link, .lg-nav-cta').forEach(function (link) {
      link.addEventListener('click', function () {
        lgNavBottom.classList.remove('is-open');
        lgHamburger.classList.remove('is-open');
        lgHamburger.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
      });
    });
    document.addEventListener('click', function (e) {
      if (!e.target.closest('.lg-navbar')) {
        lgNavBottom.classList.remove('is-open');
        lgHamburger.classList.remove('is-open');
        lgHamburger.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
      }
    });
  }

  // ── HAMBURGER: Elementor Canvas navbar (.navbar) ──
  const navbarTop    = document.querySelector('.navbar-top');
  const navbarBottom = document.querySelector('.navbar-bottom');
  if (navbarTop && navbarBottom) {
    // Inyectar botón hamburger dentro de .navbar-top
    const ham = document.createElement('button');
    ham.className = 'nav-hamburger';
    ham.setAttribute('aria-label', 'Abrir menú');
    ham.setAttribute('aria-expanded', 'false');
    ham.innerHTML = '<span></span><span></span><span></span>';
    navbarTop.appendChild(ham);

    // Clonar ES|EN al final del dropdown
    const langEl = document.querySelector('.nav-lang');
    if (langEl) {
      const mobileLang = langEl.cloneNode(true);
      mobileLang.className = 'nav-mobile-lang';
      navbarBottom.appendChild(mobileLang);
    }

    ham.addEventListener('click', function (e) {
      e.stopPropagation();
      const isOpen = navbarBottom.classList.toggle('is-open');
      ham.classList.toggle('is-open', isOpen);
      ham.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
      document.body.style.overflow = isOpen ? 'hidden' : '';
    });

    navbarBottom.querySelectorAll('.nav-link, .nav-cta').forEach(function (link) {
      link.addEventListener('click', function () {
        navbarBottom.classList.remove('is-open');
        ham.classList.remove('is-open');
        ham.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
      });
    });

    document.addEventListener('click', function (e) {
      if (!e.target.closest('.navbar')) {
        navbarBottom.classList.remove('is-open');
        ham.classList.remove('is-open');
        ham.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
      }
    });
  }

});


/* ═══════════════════════════════════
   MYSTERY SHIPPER — Floater + Modal
═══════════════════════════════════ */

let msShown = false;
let msClosed = false;

function msShowFloaterOnScroll() {
  const floater = document.getElementById('ms-floater');
  if (!floater) return;

  window.addEventListener('scroll', function () {
    if (msClosed || msShown) return;
    if (window.scrollY > 300) {
      msShown = true;
      floater.classList.add('visible');
    }
  }, { passive: true });
}

function msCloseFloater(e) {
  if (e) e.stopPropagation();
  const floater = document.getElementById('ms-floater');
  if (!floater) return;
  floater.style.bottom = '-120px';
  floater.style.opacity = '0';
  floater.style.pointerEvents = 'none';
  msClosed = true;
}

function msOpenModal() {
  const modal = document.getElementById('ms-modal');
  if (!modal) return;
  modal.classList.add('open');
  document.body.style.overflow = 'hidden';
}

function msCloseModal() {
  const modal = document.getElementById('ms-modal');
  if (!modal) return;
  modal.classList.remove('open');
  document.body.style.overflow = '';
}

document.addEventListener('keydown', function (e) {
  if (e.key === 'Escape') msCloseModal();
});

document.addEventListener('DOMContentLoaded', function () {
  msShowFloaterOnScroll();

  const form = document.getElementById('ms-contact-form');
  if (!form) return;

  form.addEventListener('submit', function (e) {
    e.preventDefault();
    const btn = form.querySelector('.ms-submit');
    const msg = document.getElementById('ms-form-msg');
    const data = new FormData(form);
    data.append('nonce', logisparkData.nonce);

    btn.disabled = true;
    btn.textContent = 'Enviando...';

    fetch(logisparkData.ajaxurl, {
      method: 'POST',
      body: data
    })
      .then(res => res.json())
      .then(response => {
        if (response.success) {
          msg.textContent = '✓ ' + response.data.message;
          msg.className = 'ms-form-msg success';
          msg.style.display = 'block';
          btn.textContent = '✓ Solicitud enviada';
          btn.style.background = '#16a34a';
          btn.style.borderColor = '#16a34a';
          setTimeout(() => {
            msCloseModal();
            form.reset();
            btn.disabled = false;
            btn.textContent = '🔑 Activar Mystery Shipper — Contactar ahora';
            btn.style.background = '';
            btn.style.borderColor = '';
            msg.style.display = 'none';
          }, 3500);
        } else {
          msg.textContent = response.data.message || 'Error al enviar.';
          msg.className = 'ms-form-msg error';
          msg.style.display = 'block';
          btn.disabled = false;
          btn.textContent = '🔑 Activar Mystery Shipper — Contactar ahora';
        }
      })
      .catch(() => {
        msg.textContent = 'Error de conexión. Inténtalo de nuevo.';
        msg.className = 'ms-form-msg error';
        msg.style.display = 'block';
        btn.disabled = false;
        btn.textContent = '🔑 Activar Mystery Shipper — Contactar ahora';
      });
  });
});
