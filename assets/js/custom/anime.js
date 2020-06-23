var tl = anime.timeline({
  targets: '#load',
  delay: function(el, i) { return i * 10 },
  duration: 1000,
  easing: 'cubicBezier(0.980, 0, 0.150, 0.675)',
  direction: 'alternate',
  loop: true
});
tl
.add({
  top:['25%'],
  width: 300,
  rotate : 50,
  height: 300,
      borderRadius: ['100%'],

})
.add({
  width: 250,
  height: 240,
  rotate : 90,
  top:['19%'],
      borderRadius: ['0%'],
})
.add({
  top:['30%'],
  width: 350,
  height: 320,
  rotate : 10,
  borderRadius: ['100%'],
})

 anime({
  targets: '#loader p',
  right: ['0', '1000'],
  easing: 'easeInOutSine',
  duration: 9000,
  direction: 'normal',
  loop: true,

});
function bck_morph(){
  var morphing = anime({
  targets:'.morph',
    d: [
      {value: 'M1-1c120.1,418.2,268.7,527.3,379.8,551.8c193.5,42.7,272-171.4,645.1-237 c277.8-48.8,381.9,44,609.1-45c168.3-65.9,280.1-183,346.8-268.5C1321.4-0.1,661.2-0.6,1-1z'},
      {value: 'M1-1c-196.2,663.5-110.7,924.1,18,1034c170,145.2,378.2-4,1044,0c581.7,3.5,760.5,119.4,912-12c123.2-106.9,208.8-360.6,6.7-1020.7C1321.4-0.1,661.2-0.6,1-1z'},
    ],
    easing: 'easeInQuad',
    duration: 2000,
    loop: false
  });
}

(function(){
    let disable = document.getElementById("loader");
    let home = document.querySelector('body.home');

    if (typeof(home) != 'undefined' && home != null) {
    setTimeout(function(){
    disable.remove();
    bck_morph();
    }, 5000);
  }
  else{
    Promise.all(Array.from(document.images).filter(img => !img.complete).map(img => new Promise(resolve => { img.onload = img.onerror = resolve; }))).then(() => {
          disable.remove();
          bck_morph();
        });
  }
})();

//menu animation
let navElems = document.querySelectorAll('.menu-item');
navElems.forEach((navElem) => {
  navElem.addEventListener('mouseenter', (event) => {
    anime({
      targets: navElem.querySelector('a'),
      borderRadius: ['50%', '0%'],
      duration: 200,
      easing: 'easeInOutQuad'
    });
    anime({
      targets: navElem.querySelector('.line'),
      width: ['0','100%'],
      duration: 200,
      easing: 'easeInOutQuad'
    });
  })

  navElem.addEventListener('mouseleave', (event) => {
  anime({
    targets: navElem.querySelector('a'),
    borderRadius: ['0%','50%'],
    duration: 200,
    easing: 'easeInOutQuad'
  });
  anime({
    targets: navElem.querySelector('.line'),
    width: ['100%','0'],
    duration: 200,
    easing: 'easeInOutQuad'
  });
  })
})

//about block img animations
let caseElems = document.querySelectorAll('.proj_wrapper');
caseElems.forEach((caseElem) => {
caseElem.addEventListener('mouseenter', (event) => {
  anime({
    targets: caseElem.querySelector('.copy'),
    height: ['100%'],
    duration: 300,
    easing: 'easeInOutQuad',
  });
   anime({
    targets: caseElem.querySelectorAll('.mark'),
    width: ['100%'],
    duration: 200,
    easing: 'easeInOutQuad',
    delay: anime.stagger(100),
  });
})

  caseElem.addEventListener('mouseleave', (event) => {
    anime({
      targets: caseElem.querySelector('.copy'),
      height: 0,
      duration: 50,
      easing: 'easeInOutQuad',
    });
    anime({
     targets: '.mark',
     width: ['0'],
     duration: 50,
     easing: 'easeInOutQuad',
   });
  })
})
