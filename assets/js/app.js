const btnMenu = document.querySelector('.menu-btn');
const menu = document.querySelector('.menu-navigation');
const nav = document.querySelector('.navigation');
const body = document.querySelector('body');
const btnOtherService = document.querySelector('#other-services');

const toggleMenu = () => {
	body.classList.toggle('menu-open');
	btnMenu.classList.toggle('open');
	menu.classList.toggle('open');
	nav.classList.toggle('open');
}

if (btnMenu) {
	btnMenu.addEventListener('click', () => {
		toggleMenu();
	})
}

if (menu) {
	menu.addEventListener('click', (e) => {
		if (e.target.tagName === "A") {
			toggleMenu();
		}
	})
}

if (btnOtherService) {
	document.addEventListener('scroll', () => {
		if (window.scrollY > 250) {
			btnOtherService.style.display = 'block';
		} else {
			btnOtherService.style.display = 'none';
		}

	})
}
