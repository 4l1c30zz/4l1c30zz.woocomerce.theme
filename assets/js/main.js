"use strict";

var tl = anime.timeline({
  targets: '#load',
  delay: function delay(el, i) {
    return i * 10;
  },
  duration: 1000,
  easing: 'cubicBezier(0.980, 0, 0.150, 0.675)',
  direction: 'alternate',
  loop: true
});
tl.add({
  top: ['25%'],
  width: 300,
  rotate: 50,
  height: 300,
  borderRadius: ['100%']
}).add({
  width: 250,
  height: 240,
  rotate: 90,
  top: ['19%'],
  borderRadius: ['0%']
}).add({
  top: ['30%'],
  width: 350,
  height: 320,
  rotate: 10,
  borderRadius: ['100%']
});
anime({
  targets: '#loader p',
  right: ['0', '1000'],
  easing: 'easeInOutSine',
  duration: 9000,
  direction: 'normal',
  loop: true
});

function bck_morph() {
  var morphing = anime({
    targets: '.morph',
    d: [{
      value: 'M1-1c120.1,418.2,268.7,527.3,379.8,551.8c193.5,42.7,272-171.4,645.1-237 c277.8-48.8,381.9,44,609.1-45c168.3-65.9,280.1-183,346.8-268.5C1321.4-0.1,661.2-0.6,1-1z'
    }, {
      value: 'M1-1c-196.2,663.5-110.7,924.1,18,1034c170,145.2,378.2-4,1044,0c581.7,3.5,760.5,119.4,912-12c123.2-106.9,208.8-360.6,6.7-1020.7C1321.4-0.1,661.2-0.6,1-1z'
    }],
    easing: 'easeInQuad',
    duration: 2000,
    loop: false
  });
}

(function () {
  var disable = document.getElementById("loader");
  var home = document.querySelector('body.home');

  if (typeof home != 'undefined' && home != null) {
    setTimeout(function () {
      disable.remove();
      bck_morph();
    }, 5000);
  } else {
    Promise.all(Array.from(document.images).filter(function (img) {
      return !img.complete;
    }).map(function (img) {
      return new Promise(function (resolve) {
        img.onload = img.onerror = resolve;
      });
    })).then(function () {
      disable.remove();
      bck_morph();
    });
  }
})(); //menu animation


var navElems = document.querySelectorAll('.menu-item');
navElems.forEach(function (navElem) {
  navElem.addEventListener('mouseenter', function (event) {
    anime({
      targets: navElem.querySelector('a'),
      borderRadius: ['50%', '0%'],
      duration: 200,
      easing: 'easeInOutQuad'
    });
    anime({
      targets: navElem.querySelector('.line'),
      width: ['0', '100%'],
      duration: 200,
      easing: 'easeInOutQuad'
    });
  });
  navElem.addEventListener('mouseleave', function (event) {
    anime({
      targets: navElem.querySelector('a'),
      borderRadius: ['0%', '50%'],
      duration: 200,
      easing: 'easeInOutQuad'
    });
    anime({
      targets: navElem.querySelector('.line'),
      width: ['100%', '0'],
      duration: 200,
      easing: 'easeInOutQuad'
    });
  });
}); //about block img animations

var caseElems = document.querySelectorAll('.proj_wrapper');
caseElems.forEach(function (caseElem) {
  caseElem.addEventListener('mouseenter', function (event) {
    anime({
      targets: caseElem.querySelector('.copy'),
      height: ['100%'],
      duration: 300,
      easing: 'easeInOutQuad'
    });
    anime({
      targets: caseElem.querySelectorAll('.mark'),
      width: ['100%'],
      duration: 200,
      easing: 'easeInOutQuad',
      delay: anime.stagger(100)
    });
  });
  caseElem.addEventListener('mouseleave', function (event) {
    anime({
      targets: caseElem.querySelector('.copy'),
      height: 0,
      duration: 50,
      easing: 'easeInOutQuad'
    });
    anime({
      targets: '.mark',
      width: ['0'],
      duration: 50,
      easing: 'easeInOutQuad'
    });
  });
});
"use strict";

window.onscroll = function () {
  stick();
};

window.resize = function () {
  footerStickToBottom();
  stick();
};

function footerStickToBottom() {
  var bodyHeight = document.body.scrollHeight;
  console.log(bodyHeight);

  if (bodyHeight < 950) {
    document.querySelector("#site-footer").classList.add("relative");
  }
}

function stick() {
  var bodyHeight = document.body.scrollHeight;
  var head = document.getElementById("site_header");
  var elem_height = head.offsetHeight;

  if (bodyHeight > 1300) {
    if (window.pageYOffset >= elem_height) {
      head.classList.add("a");
    } else {
      head.classList.remove("a");
    }
  }
}

var head = document.getElementById("site_header");
var nav_toggle = document.getElementById("nav_toggle");
nav_toggle.addEventListener('click', function (event) {
  head.classList.toggle('mob');
});

(function () {
  stick();
  footerStickToBottom();
  var elementExists = document.querySelector(".summary.entry-summary");

  if (typeof elementExists != 'undefined' && elementExists != null) {
    var insertAfter = function insertAfter(referenceNode, newNode) {
      referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
    };

    var newElem = document.createElement('div');
    newElem.classList.add('info_wrap');
    Array.prototype.forEach.call(document.querySelectorAll('.summary.entry-summary, .wc-tabs-wrapper'), function (c) {
      newElem.appendChild(c);
    });
    var parent = document.querySelector(".product_title.entry-title");
    insertAfter(parent, newElem);
  }

  loader_random();
})(); //random chars generator on page load


function loader_random() {
  var text = "";
  var len = 500;
  var char_list = "!{}@#/$}%>^&*<~?";

  for (var i = 0; i < len; i++) {
    text += char_list.charAt(Math.floor(Math.random() * char_list.length));
  }

  document.querySelector("#loader .txt").innerHTML = text;
} //gallery


var get_siblings = function get_siblings(e) {
  var siblings = [];

  if (!e.parentNode) {
    return siblings;
  }

  var sibling = e.parentNode.firstChild;

  while (sibling) {
    if (sibling.nodeType == 1 && sibling !== e) {
      siblings.push(sibling);
    }

    sibling = sibling.nextSibling;
  }

  return siblings;
};

var single_gal_imgs = document.querySelectorAll('.gal li');
single_gal_imgs.forEach(function (single_gal_img) {
  single_gal_img.addEventListener('click', function (event) {
    var targ = event.target.closest('li');
    targ.classList.toggle('a');
    var siblings = get_siblings(targ);
    siblings.forEach(function (sib) {
      sib.classList.remove('a');
    });
  });
}); //shop sidebar mob

var side_toggle = document.querySelector("#side_toggle");
var side = document.querySelector("#sidebar");

if (typeof side != 'undefined' && side != null) {
  side_toggle.addEventListener('click', function (event) {
    side.classList.toggle('a');
  });
}