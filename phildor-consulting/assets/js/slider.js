(function () {
  var slides    = document.querySelectorAll('.slider-slide');
  var dots      = document.querySelectorAll('.slider-dot');
  var prevBtn   = document.getElementById('slider-prev');
  var nextBtn   = document.getElementById('slider-next');
  var counterEl = document.getElementById('slide-current');
  var current   = 0;
  var total     = slides.length;
  var autoTimer = null;
  var isAnimating = false;

  if (!total) return;

  function updateCounter(index) {
    if (counterEl) counterEl.textContent = String(index + 1).padStart(2, '0');
  }

  function updateDots(index) {
    dots.forEach(function (d, i) {
      d.classList.toggle('active', i === index);
      if (i === index) {
        var dotProgress = d.querySelector('.dot-progress');
        if (!dotProgress) {
          dotProgress = document.createElement('span');
          dotProgress.className = 'dot-progress';
          d.appendChild(dotProgress);
        }
        dotProgress.style.animation = 'none';
        dotProgress.offsetHeight;
        dotProgress.style.animation = 'progress-fill 5.5s linear forwards';
      } else {
        var existingProgress = d.querySelector('.dot-progress');
        if (existingProgress) existingProgress.style.animation = 'none';
      }
    });
  }

  function goTo(index, direction) {
    if (isAnimating || index === current) return;
    isAnimating = true;

    var outgoing = slides[current];
    var incoming = slides[index];

    outgoing.style.zIndex = 1;
    incoming.style.zIndex = 2;
    incoming.style.opacity = 0;

    incoming.classList.remove('active');
    void incoming.offsetWidth;
    incoming.style.transition = 'opacity 1.2s ease';
    incoming.style.opacity = '';

    outgoing.style.transition = 'opacity 1.2s ease';

    requestAnimationFrame(function () {
      incoming.classList.add('active');
      outgoing.style.opacity = 0;

      updateDots(index);
      updateCounter(index);

      setTimeout(function () {
        outgoing.classList.remove('active');
        outgoing.style.opacity = '';
        outgoing.style.transition = '';
        outgoing.style.zIndex = '';
        incoming.style.zIndex = '';
        incoming.style.transition = '';
        current = index;
        isAnimating = false;
      }, 1250);
    });
  }

  function next() { goTo((current + 1) % total, 'next'); }
  function prev() { goTo((current - 1 + total) % total, 'prev'); }

  function startAuto() {
    stopAuto();
    autoTimer = setInterval(next, 5500);
  }

  function stopAuto() {
    if (autoTimer) { clearInterval(autoTimer); autoTimer = null; }
  }

  if (prevBtn) prevBtn.addEventListener('click', function () { stopAuto(); prev(); startAuto(); });
  if (nextBtn) nextBtn.addEventListener('click', function () { stopAuto(); next(); startAuto(); });

  dots.forEach(function (dot, i) {
    dot.addEventListener('click', function () {
      if (i !== current) { stopAuto(); goTo(i, i > current ? 'next' : 'prev'); startAuto(); }
    });
  });

  var sliderEl = document.getElementById('hero-slider');
  if (sliderEl) {
    var touchStartX = 0;
    sliderEl.addEventListener('touchstart', function (e) {
      touchStartX = e.touches[0].clientX;
    }, { passive: true });
    sliderEl.addEventListener('touchend', function (e) {
      var diff = touchStartX - e.changedTouches[0].clientX;
      if (Math.abs(diff) > 50) {
        stopAuto();
        if (diff > 0) next(); else prev();
        startAuto();
      }
    }, { passive: true });
  }

  updateCounter(0);
  updateDots(0);
  startAuto();
})();