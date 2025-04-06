let lastScrollTop = 0;
        const siteHeader = document.querySelector('.site-header');

        window.addEventListener('scroll', function() {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

            if (scrollTop > lastScrollTop && scrollTop > 100) {
                siteHeader.classList.add('hidden');
            } else {
                siteHeader.classList.remove('hidden');
            }
        });

        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');

            if (window.scrollY > 50) {
                navbar.classList.add('navbar-scrolled');
            } else {
                navbar.classList.remove('navbar-scrolled');
            }
        });