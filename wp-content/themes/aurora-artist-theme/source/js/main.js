import Flickity from 'flickity';
import { Fancybox } from "@fancyapps/ui";

// It's best to inline this in `head` to avoid FOUC (flash of unstyled content) when changing pages or themes
if (
    localStorage.getItem('color-theme') === 'dark' ||
    (!('color-theme' in localStorage) &&
        window.matchMedia('(prefers-color-scheme: dark)').matches)
) {
    document.documentElement.classList.add('dark');
} else {
    document.documentElement.classList.remove('dark');
}

document.addEventListener('DOMContentLoaded', () => {
    const menuLinks = document.querySelectorAll('a[href^="#"]');
    const siteNavigation = document.getElementById('site-navigation');
    const secondaryNav = document.getElementById('secondaryNav');
    const closeMenuBtn = document.getElementById('closeMenuBtn');
    const modelViewer = document.getElementById('heartModelViewer');

    // Function to check the initial theme and update the environment image
    function updateInitialEnvironmentImage() {
        if (modelViewer) { // Ensure modelViewer exists
            if (document.documentElement.classList.contains('dark')) {
                modelViewer.setAttribute('environment-image', 'https://cdn1.umg3.net/1412-cdn/glb/HDR_Dark.jpg');
            } else {
                modelViewer.setAttribute('environment-image', 'https://cdn1.umg3.net/1412-cdn/glb/HDR_Light.jpg');
            }
        }
    }

    // Call the function on load
    updateInitialEnvironmentImage();

    menuLinks.forEach(link => {
        link.addEventListener('click', event => {
            event.preventDefault();
            const targetId = link.getAttribute('href').substring(1);
            const targetElement = document.getElementById(targetId);

            if (targetElement) {
                gsap.to(window, { duration: 1, scrollTo: { y: targetElement.offsetTop } });
                siteNavigation.classList.add('opacity-0', 'pointer-events-none');
                secondaryNav.classList.remove('hidden');
                closeMenuBtn.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            }
        });
    });

    const sections = gsap.utils.toArray('section'); // Get all sections using tag name (single quotes)

    sections.forEach((section) => {
        gsap.fromTo(section, {
            opacity: 0,
            y: 100,
        }, {
            opacity: 1,
            y: 0,
            duration: 3,
            ease: "power3.out",
            scrollTrigger: {
                trigger: section,
                start: 'top bottom', // Single quotes for string values
                end: '+=100',
            },
        });
    });

    gsap.to("#mobileLogoWrapper", {
        scrollTrigger: {
            trigger: "section",
            start: "top center", // Start when the center of the section reaches the center of the viewport
            end: "top 20%", // End slightly after the start point
            scrub: true
        },
        opacity: 0,
        duration: 0.5
    });

    var closeButton = document.getElementById('closeSubscribePopup');
    var popup = document.getElementById('subscribePopup');

    if (closeButton && popup) {
        closeButton.addEventListener('click', function() {
            gsap.to(popup, { 
                duration: 0.25, 
                opacity: 0, 
                y: 200, 
                onComplete: function() {
                    popup.style.display = 'none';
                } 
            });
        });
    }
    
    const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
    const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');
    const themeToggleBtn = document.getElementById('theme-toggle');

    // Change the icons inside the button based on previous settings
    if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        themeToggleLightIcon.classList.remove('hidden');
    } else {
        themeToggleDarkIcon.classList.remove('hidden');
    }

    themeToggleBtn.addEventListener('click', function() {
        localStorage.setItem('theme-set', 'manual');

        // toggle icons inside button
        themeToggleDarkIcon.classList.toggle('hidden');
        themeToggleLightIcon.classList.toggle('hidden');

        if (modelViewer) { // Ensure modelViewer exists
            // if set via local storage previously
            if (localStorage.getItem('color-theme')) {
                if (localStorage.getItem('color-theme') === 'light') {
                    document.documentElement.classList.add('dark');
                    modelViewer.setAttribute('environment-image', 'https://cdn1.umg3.net/1412-cdn/glb/HDR_Dark.jpg');
                    localStorage.setItem('color-theme', 'dark');
                } else {
                    document.documentElement.classList.remove('dark');
                    modelViewer.setAttribute('environment-image', 'https://cdn1.umg3.net/1412-cdn/glb/HDR_Light.jpg');
                    localStorage.setItem('color-theme', 'light');
                }
            } else {
                if (document.documentElement.classList.contains('dark')) {
                    document.documentElement.classList.remove('dark');
                    modelViewer.setAttribute('environment-image', 'https://cdn1.umg3.net/1412-cdn/glb/HDR_Light.jpg');
                    localStorage.setItem('color-theme', 'light');
                } else {
                    document.documentElement.classList.add('dark');
                    modelViewer.setAttribute('environment-image', 'https://cdn1.umg3.net/1412-cdn/glb/HDR_Dark.jpg');
                    localStorage.setItem('color-theme', 'dark');
                }
            }
        }
    });

    function checkTheme() {
        const d = new Date();
        let hour = d.getHours();

        if (localStorage.getItem('theme-set') === 'auto' || (!('theme-set' in localStorage))) {
            if (hour > 8 && hour < 20) {
                themeToggleDarkIcon.classList.remove('hidden');
                themeToggleLightIcon.classList.add('hidden');
                document.documentElement.classList.remove('dark');
                if (modelViewer) {
                    modelViewer.setAttribute('environment-image', 'https://cdn1.umg3.net/1412-cdn/glb/HDR_Light.jpg');
                }
                localStorage.setItem('color-theme', 'light');
                localStorage.setItem('theme-set', 'auto');
            } else {
                themeToggleLightIcon.classList.remove('hidden');
                themeToggleDarkIcon.classList.add('hidden');
                document.documentElement.classList.add('dark');
                if (modelViewer) {
                    modelViewer.setAttribute('environment-image', 'https://cdn1.umg3.net/1412-cdn/glb/HDR_Dark.jpg');
                }
                localStorage.setItem('color-theme', 'dark');
                localStorage.setItem('theme-set', 'auto');
            }
        }
    }

    checkTheme();
    setInterval(checkTheme, 1000);
});
