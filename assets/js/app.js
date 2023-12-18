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

btnMenu.addEventListener('click', () => {
	toggleMenu();
})

menu.addEventListener('click', (e) => {
	if (e.target.tagName === "A") {
		toggleMenu();
	}
})

if (btnOtherService) {
	document.addEventListener('scroll', () => {
		console.log(window.scrollY);
		if (window.scrollY > 250) {
			btnOtherService.style.display = 'block';
		} else {
			btnOtherService.style.display = 'none';
		}

	})
}
