import 'htmx.org';
import './htmx';
//import Alpine from 'alpinejs'; // npm install alpinejs

// styles
import '../css/app.css';

// custom code, in this case GSAP to animate the top menu
document.addEventListener("DOMContentLoaded", (event) => {
	gsap.registerPlugin(ScrollTrigger, ScrollToPlugin, SplitText, TextPlugin);

	// top navigation + logo
	let tt = gsap.timeline();
	tt.from('#top-logo', {
		rotation: 360,
		duration: 1.2,
		delay: 1,
		scale: 0,
		ease: 'power1.out',
	})

	tt.from('.top-links', {
		y: -100,
		stagger: {
			each: .5,
			from: 'end',
			ease: 'expoScale',
		},
	})
});
