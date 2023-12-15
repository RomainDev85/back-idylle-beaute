const btnMenu = document.querySelector('.menu-btn');
const menu = document.querySelector('.menu-navigation');
const nav = document.querySelector('.navigation');
const body = document.querySelector('body');

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
