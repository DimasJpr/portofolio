// Personal Portfolio Interaction Script
document.addEventListener('DOMContentLoaded', () => {
    // 1. Typing Text Effect
    const typingElement = document.getElementById('typing-text');
    if (typingElement) {
        const phrases = [
            'Student Developer',
            'Web Developer',
            'X PPLG 2 SMKN 1 Bangsri',
            'Laravel Enthusiast',
            'UI/UX Explorer'
        ];
        let phraseIndex = 0;
        let charIndex = 0;
        let isDeleting = false;
        let typeSpeed = 100;

        function type() {
            const currentPhrase = phrases[phraseIndex];

            if (isDeleting) {
                typingElement.textContent = currentPhrase.substring(0, charIndex - 1);
                charIndex--;
                typeSpeed = 40;
            } else {
                typingElement.textContent = currentPhrase.substring(0, charIndex + 1);
                charIndex++;
                typeSpeed = 90;
            }

            if (!isDeleting && charIndex === currentPhrase.length) {
                typeSpeed = 1800; // Pause at end of word
                isDeleting = true;
            } else if (isDeleting && charIndex === 0) {
                isDeleting = false;
                phraseIndex = (phraseIndex + 1) % phrases.length;
                typeSpeed = 400; // Pause before new word
            }

            setTimeout(type, typeSpeed);
        }

        type();
    }

    // 2. Navbar on Scroll Styling
    const navbar = document.getElementById('main-navbar');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 40) {
            navbar?.classList.add('shadow-lg', 'shadow-black/40', 'border-sky-500/20');
            navbar?.classList.remove('border-white/5');
        } else {
            navbar?.classList.remove('shadow-lg', 'shadow-black/40', 'border-sky-500/20');
            navbar?.classList.add('border-white/5');
        }
    });

    // 3. Mobile Navigation Menu Toggle
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    const mobileLinks = document.querySelectorAll('.mobile-nav-link');

    if (mobileMenuBtn && mobileMenu) {
        mobileMenuBtn.addEventListener('click', () => {
            const isHidden = mobileMenu.classList.contains('hidden');
            if (isHidden) {
                mobileMenu.classList.remove('hidden');
            } else {
                mobileMenu.classList.add('hidden');
            }
        });

        mobileLinks.forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
            });
        });
    }

    // 4. Project Category Filtering
    const filterButtons = document.querySelectorAll('.project-filter-btn');
    const projectCards = document.querySelectorAll('.project-card-item');

    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            const category = button.getAttribute('data-category');

            // Update active button state
            filterButtons.forEach(btn => {
                btn.classList.remove('bg-sky-500', 'text-white', 'border-sky-400');
                btn.classList.add('bg-slate-900/60', 'text-slate-400', 'border-white/10');
            });
            button.classList.remove('bg-slate-900/60', 'text-slate-400', 'border-white/10');
            button.classList.add('bg-sky-500', 'text-white', 'border-sky-400');

            // Filter project cards
            projectCards.forEach(card => {
                const cardCategory = card.getAttribute('data-category');
                if (category === 'all' || cardCategory === category) {
                    card.style.display = 'block';
                    setTimeout(() => {
                        card.style.opacity = '1';
                        card.style.transform = 'translateY(0)';
                    }, 50);
                } else {
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(10px)';
                    setTimeout(() => {
                        card.style.display = 'none';
                    }, 200);
                }
            });
        });
    });

    // 5. Back to Top Button
    const backToTopBtn = document.getElementById('back-to-top');
    if (backToTopBtn) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 350) {
                backToTopBtn.classList.remove('opacity-0', 'pointer-events-none', 'translate-y-4');
                backToTopBtn.classList.add('opacity-100', 'translate-y-0');
            } else {
                backToTopBtn.classList.add('opacity-0', 'pointer-events-none', 'translate-y-4');
                backToTopBtn.classList.remove('opacity-100', 'translate-y-0');
            }
        });

        backToTopBtn.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }

    // 6. Auto-dismiss alerts
    const alertBox = document.getElementById('flash-alert');
    if (alertBox) {
        setTimeout(() => {
            alertBox.style.opacity = '0';
            alertBox.style.transform = 'translateY(-10px)';
            setTimeout(() => alertBox.remove(), 400);
        }, 5000);
    }
});
