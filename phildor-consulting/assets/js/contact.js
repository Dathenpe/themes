(function () {
  var form     = document.getElementById('contact-form');
  var btn      = document.getElementById('submit-btn');
  var feedback = document.getElementById('form-feedback');

  if (!form) return;

  function showFeedback(msg, success) {
    if (!feedback) return;
    feedback.innerHTML = msg;
    feedback.style.display = 'block';
    feedback.style.padding = '1rem 1.25rem';
    feedback.style.marginTop = '1rem';
    feedback.style.fontSize = '0.875rem';
    feedback.style.fontWeight = '400';
    feedback.style.background = success ? 'rgba(201,168,76,0.1)' : 'rgba(220,50,50,0.1)';
    feedback.style.border     = success ? '1px solid rgba(201,168,76,0.4)' : '1px solid rgba(220,50,50,0.4)';
    feedback.style.color      = success ? '#C9A84C' : '#e05555';
    feedback.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
  }

  function validateEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
  }

  function validateForm() {
    var name    = document.getElementById('name');
    var email   = document.getElementById('email');
    var message = document.getElementById('message');
    var errors  = [];

    if (!name || !name.value.trim()) errors.push('Full name is required.');
    if (!email || !email.value.trim()) errors.push('Email address is required.');
    else if (!validateEmail(email.value.trim())) errors.push('Please enter a valid email address.');
    if (!message || !message.value.trim()) errors.push('Message is required.');

    return errors;
  }

  function setLoading(loading) {
    if (!btn) return;
    btn.disabled = loading;
    btn.textContent = loading ? 'Sending...' : 'Send Enquiry';
    btn.style.opacity = loading ? '0.75' : '';
    btn.style.cursor  = loading ? 'not-allowed' : '';
  }

  function buildMailtoFallback() {
    var name    = (document.getElementById('name')    || {}).value || '';
    var email   = (document.getElementById('email')   || {}).value || '';
    var company = (document.getElementById('company') || {}).value || '';
    var phone   = (document.getElementById('phone')   || {}).value || '';
    var service = (document.getElementById('service') || {}).value || '';
    var message = (document.getElementById('message') || {}).value || '';

    var body = 'Name: ' + name + '\n'
      + 'Email: ' + email + '\n'
      + 'Company: ' + company + '\n'
      + 'Phone: ' + phone + '\n'
      + 'Service of Interest: ' + service + '\n\n'
      + 'Message:\n' + message;

    var subject = 'Website Enquiry from ' + name + (company ? ' (' + company + ')' : '');
    return 'mailto:info@phildorconsulting.com'
      + '?subject=' + encodeURIComponent(subject)
      + '&body='    + encodeURIComponent(body);
  }

  form.addEventListener('submit', function (e) {
    e.preventDefault();

    var errors = validateForm();
    if (errors.length) {
      showFeedback('<strong>Please correct the following:</strong><br>' + errors.join('<br>'), false);
      return;
    }

    setLoading(true);

    var name    = document.getElementById('name').value.trim();
    var email   = document.getElementById('email').value.trim();
    var company = (document.getElementById('company') || {}).value || '';
    var phone   = (document.getElementById('phone')   || {}).value || '';
    var service = (document.getElementById('service') || {}).value || '';
    var message = document.getElementById('message').value.trim();

    var payload = {
      to_email:   'info@phildorconsulting.com',
      from_name:  name,
      from_email: email,
      company:    company,
      phone:      phone,
      service:    service,
      message:    message,
      reply_to:   email
    };

    var autoReplyPayload = {
      to_email:   email,
      from_name:  name,
      service:    service,
      message:    message
    };

    if (typeof emailjs !== 'undefined' && window.EMAILJS_SERVICE_ID && window.EMAILJS_TEMPLATE_ID && window.EMAILJS_AUTOREPLY_TEMPLATE_ID) {

      emailjs.send(
        window.EMAILJS_SERVICE_ID,
        window.EMAILJS_TEMPLATE_ID,
        payload
      ).then(function (response) {

        emailjs.send(
          window.EMAILJS_AUTOREPLY_SERVICE_ID || window.EMAILJS_SERVICE_ID,
          window.EMAILJS_AUTOREPLY_TEMPLATE_ID,
          autoReplyPayload
        ).then(function (autoResponse) {
          setLoading(false);
          showFeedback(
            '<strong>Message received!</strong> Thank you, ' + name + '. A confirmation email has been sent to ' + email + '. Our team will be in touch shortly.',
            true
          );
          form.reset();
        }).catch(function (autoError) {
          setLoading(false);
          showFeedback(
            '<strong>Message received!</strong> Thank you, ' + name + '. Our team will be in touch shortly.',
            true
          );
          form.reset();
        });

      }).catch(function (error) {
        setLoading(false);
        showFeedback(
          'There was a problem sending your message. Please email us directly at '
          + '<a href="' + buildMailtoFallback() + '" style="color:var(--gold)">info@phildorconsulting.com</a>',
          false
        );
      });

    } else {
      setTimeout(function () {
        setLoading(false);
        var mailtoLink = buildMailtoFallback();
        showFeedback(
          'Thank you, ' + name + '! Click below to send your message via email:<br><br>'
          + '<a href="' + mailtoLink + '" style="display:inline-block;margin-top:0.5rem;background:var(--gold);color:#230F47;padding:10px 24px;font-size:11px;font-weight:700;letter-spacing:1.5px;text-transform:uppercase;text-decoration:none;">'
          + 'Open Email Client &rarr;</a>',
          true
        );
      }, 600);
    }
  });

  var inputs = form.querySelectorAll('input, textarea, select');
  inputs.forEach(function (input) {
    input.addEventListener('blur', function () {
      if (this.hasAttribute('required') && !this.value.trim()) {
        this.style.borderColor = 'rgba(220,50,50,0.6)';
      } else {
        this.style.borderColor = '';
      }
    });
    input.addEventListener('input', function () {
      this.style.borderColor = '';
    });
  });
})();