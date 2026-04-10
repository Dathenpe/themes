(function () {
  var navbar       = null;
  var hamburger    = null;
  var mobileMenu   = null;
  var scrollBtn    = null;
  var menuOpen     = false;

  function setActive() {
    if (document.querySelector('.nav-links a.active')) return;
    var current = window.location.pathname.split('/').pop() || 'index.html';
    if (current === '') current = 'index.html';
    document.querySelectorAll('.nav-links a, .mobile-menu a').forEach(function (link) {
      var href = (link.getAttribute('href') || '').split('?')[0];
      link.classList.toggle('active', href === current);
    });
  }

  function onScroll() {
    if (!navbar) return;
    if (window.scrollY > 60) {
      navbar.classList.add('scrolled');
    } else {
      navbar.classList.remove('scrolled');
    }
    if (scrollBtn) {
      scrollBtn.classList.toggle('visible', window.scrollY > 500);
    }
  }

  function openMenu() {
    menuOpen = true;
    if (hamburger) hamburger.classList.add('open');
    if (mobileMenu) {
      mobileMenu.style.display = 'flex';
      requestAnimationFrame(function () { mobileMenu.classList.add('open'); });
    }
    document.body.style.overflow = 'hidden';
  }

  function closeMenu() {
    menuOpen = false;
    if (hamburger) hamburger.classList.remove('open');
    if (mobileMenu) {
      mobileMenu.classList.remove('open');
      setTimeout(function () { if (!menuOpen && mobileMenu) mobileMenu.style.display = ''; }, 280);
    }
    document.body.style.overflow = '';
  }

  function toggleMenu() {
    if (menuOpen) { closeMenu(); } else { openMenu(); }
  }

  function initScrollReveal() {
    if (!('IntersectionObserver' in window)) return;
    var targets = document.querySelectorAll('[data-reveal]');
    var observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.style.opacity = '1';
          entry.target.style.transform = 'translateY(0)';
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.08, rootMargin: '0px 0px -40px 0px' });
    targets.forEach(function (el, i) {
      el.style.opacity = '0';
      el.style.transform = 'translateY(28px)';
      el.style.transition = 'opacity 0.65s ease ' + (i % 4 * 0.09) + 's, transform 0.65s ease ' + (i % 4 * 0.09) + 's';
      observer.observe(el);
    });
  }

  document.addEventListener('DOMContentLoaded', function () {
    navbar     = document.getElementById('navbar');
    hamburger  = document.getElementById('hamburger');
    mobileMenu = document.getElementById('mobile-menu');
    scrollBtn  = document.getElementById('scroll-top');

    setActive();
    onScroll();
    initScrollReveal();

    if (scrollBtn) {
      scrollBtn.addEventListener('click', function () {
        window.scrollTo({ top: 0, behavior: 'smooth' });
      });
    }

    if (hamburger) {
      hamburger.addEventListener('click', function (e) {
        e.stopPropagation();
        toggleMenu();
      });
    }

    if (mobileMenu) {
      mobileMenu.querySelectorAll('a').forEach(function (link) {
        link.addEventListener('click', closeMenu);
      });
    }

    document.addEventListener('click', function (e) {
      if (menuOpen && mobileMenu && !mobileMenu.contains(e.target) && e.target !== hamburger && !hamburger.contains(e.target)) {
        closeMenu();
      }
    });

    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && menuOpen) closeMenu();
    });

    window.addEventListener('resize', function () {
      if (window.innerWidth > 900 && menuOpen) closeMenu();
    }, { passive: true });
  });

  window.addEventListener('scroll', onScroll, { passive: true });
})();