window.onscroll = function () {
	stick();
};
window.resize = function () {
	footerStickToBottom();
	stick();
};

function footerStickToBottom() {
  let bodyHeight = document.body.scrollHeight;
  console.log(bodyHeight);
	if (bodyHeight < 950) {
		document.querySelector("#site-footer").classList.add("absolute");
	}
}

function stick() {
	let bodyHeight = document.body.scrollHeight;
	let head = document.getElementById("site_header");
	let elem_height = head.offsetHeight;
	if (bodyHeight > 1300) {
		if (window.pageYOffset >= elem_height) {
			head.classList.add("a");
		} else {
			head.classList.remove("a");
		}
	}
}
let head = document.getElementById("site_header");
let nav_toggle = document.getElementById("nav_toggle");
nav_toggle.addEventListener('click', (event) => {
	head.classList.toggle('mob');
});

(function () {
	stick();
	footerStickToBottom();
	var elementExists = document.querySelector(".summary.entry-summary");
	if (typeof (elementExists) != 'undefined' && elementExists != null) {
		var newElem = document.createElement('div')
		newElem.classList.add('info_wrap');
		Array.prototype.forEach.call(document.querySelectorAll('.summary.entry-summary, .wc-tabs-wrapper'), function (c) {
			newElem.appendChild(c);
		});

		function insertAfter(referenceNode, newNode) {
			referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
		}
		var parent = document.querySelector(".product_title.entry-title");
		insertAfter(parent, newElem);
	}
	loader_random();
})();
//random chars generator on page load
function loader_random() {
	let text = "";
	let len = 500;
	let char_list = "!{}@#/$}%>^&*<~?";
	for (var i = 0; i < len; i++) {
		text += char_list.charAt(Math.floor(Math.random() * char_list.length));

	}
	document.querySelector("#loader .txt").innerHTML = text;
}

//gallery
let get_siblings = function (e) {
	let siblings = [];
	if (!e.parentNode) {
		return siblings;
	}
	let sibling = e.parentNode.firstChild;
	while (sibling) {
		if (sibling.nodeType == 1 && sibling !== e) {
			siblings.push(sibling);
		}
		sibling = sibling.nextSibling;
	}
	return siblings;
}

let single_gal_imgs = document.querySelectorAll('.gal li');
single_gal_imgs.forEach((single_gal_img) => {
	single_gal_img.addEventListener('click', (event) => {
		let targ = event.target.closest('li');
		targ.classList.toggle('a');
		let siblings = get_siblings(targ);
		siblings.forEach((sib) => {
			sib.classList.remove('a');
		});
	});
});

//shop sidebar mob
let side_toggle = document.querySelector("#side_toggle");
let side = document.querySelector("#sidebar");
if (typeof (side) != 'undefined' && side != null) {
	side_toggle.addEventListener('click', (event) => {
		side.classList.toggle('a');
	});
}
