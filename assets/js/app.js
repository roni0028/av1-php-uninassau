(function(){
  var ran = false;
  function runCounters(){
    if(ran) return; ran = true;
    var counters = document.querySelectorAll('.metric .num');
    counters.forEach(function(el){
      var target = parseInt(el.getAttribute('data-target') || '0', 10);
      var duration = parseInt(el.getAttribute('data-duration') || '1400', 10);
      var startTime = null;
      function step(ts){
        if(!startTime) startTime = ts;
        var t = Math.min((ts - startTime) / duration, 1);
        var eased = 1 - Math.pow(1 - t, 3);
        el.textContent = Math.floor(eased * target).toString();
        if(t < 1) requestAnimationFrame(step);
      }
      requestAnimationFrame(step);
    });
  }
  var section = document.querySelector('#metricas');
  if('IntersectionObserver' in window && section){
    var io = new IntersectionObserver(function(entries){
      entries.forEach(function(entry){ if(entry.isIntersecting){ runCounters(); io.disconnect(); } });
    }, { threshold: 0.25 });
    io.observe(section);
  } else {
    function onScroll(){ var el = section; if(!el) return; var rect = el.getBoundingClientRect(); if(rect.top < window.innerHeight * 0.9){ runCounters(); window.removeEventListener('scroll', onScroll); } }
    window.addEventListener('scroll', onScroll);
    window.addEventListener('load', onScroll);
    onScroll();
  }
})();

(function(){
  var root = document.getElementById('testimonials');
  if(!root) return;
  var prev = document.querySelector('.t-prev');
  var next = document.querySelector('.t-next');
  var step = function(){ var card = root.querySelector('.testimonial'); if(!card) return 300; var style = window.getComputedStyle(card); var width = card.getBoundingClientRect().width; var gap = parseFloat(style.marginRight || 16); return Math.ceil(width + gap); };
  function scrollByDir(dir){ root.scrollBy({ left: dir * step(), behavior: 'smooth' }); }
  if(prev) prev.addEventListener('click', function(){ scrollByDir(-1); });
  if(next) next.addEventListener('click', function(){ scrollByDir(1); });
})();

(function(){
  var bag = document.getElementById('toasts');
  if(!bag) return;
  function pushToast(msg, type){
    var t = document.createElement('div');
    t.className = 'toast' + (type ? ' toast--' + type : '');
    t.innerHTML = '<span class="ico">' + (type==='success'?'✓':type==='error'?'!':'ℹ') + '</span>' +
                  '<div class="msg"></div>' +
                  '<button class="close" aria-label="Fechar">×</button>';
    t.querySelector('.msg').textContent = msg;
    t.querySelector('.close').addEventListener('click', function(){ if(t.parentNode===bag) bag.removeChild(t); });
    bag.appendChild(t);
    setTimeout(function(){ if (t.parentNode===bag) bag.removeChild(t); }, 5000);
  }
  window.DEVRAD = window.DEVRAD || {}; window.DEVRAD.pushToast = pushToast;
})();

(function(){
  var form = document.querySelector('#contato form.contact');
  if(!form) return;
  function markInvalid(input){ input.classList.add('invalid'); setTimeout(function(){ input.classList.remove('invalid'); }, 2000); }
  function toast(msg, type){ if(window.DEVRAD && typeof window.DEVRAD.pushToast==='function') window.DEVRAD.pushToast(msg, type); }
  form.addEventListener('submit', function(ev){
    ev.preventDefault();
    toast('Enviando sua mensagem...', 'info');
    var data = new FormData(form);
    var email = (data.get('email')||'').toString();
    if(!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)){
      toast('E-mail inválido. Verifique e tente novamente.', 'error');
      var em = form.querySelector('#ct-email'); if(em) markInvalid(em);
      return;
    }
    fetch(form.action, { method:'POST', body:data })
      .then(function(r){ return r.json().then(function(j){ return { ok:r.ok, body:j }; }); })
      .then(function(res){ if(res.ok && res.body && res.body.ok){ toast(res.body.message || 'Enviado com sucesso.', 'success'); form.reset(); } else { var errs=(res.body && res.body.errors)? res.body.errors.join(' ') : 'Erro ao enviar.'; toast(errs,'error'); } })
      .catch(function(){ toast('Falha de rede. Tente novamente.','error'); });
  });
})();


