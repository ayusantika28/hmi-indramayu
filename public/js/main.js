document.addEventListener('DOMContentLoaded', function () {

    /*
    |--------------------------------------------------------------------------
    | SCROLL REVEAL
    |--------------------------------------------------------------------------
    */

    const revealElements = document.querySelectorAll(
        '.reveal, .reveal-left, .reveal-right'
    );

    if (revealElements.length) {

        const revealObserver = new IntersectionObserver(
            function (entries, observer) {

                entries.forEach(function (entry) {

                    if (!entry.isIntersecting) {
                        return;
                    }

                    entry.target.classList.add('is-visible');

                    observer.unobserve(entry.target);

                });

            },
            {
                threshold: 0.12,
                rootMargin: '0px 0px -50px 0px'
            }
        );

        revealElements.forEach(function (element) {
            revealObserver.observe(element);
        });

    }


    /*
    |--------------------------------------------------------------------------
    | CURSOR TILT
    |--------------------------------------------------------------------------
    */

    const tiltCards = document.querySelectorAll('[data-tilt]');

    tiltCards.forEach(function (card) {

        card.addEventListener('mousemove', function (event) {

            const rect = card.getBoundingClientRect();

            const x = event.clientX - rect.left;
            const y = event.clientY - rect.top;

            const centerX = rect.width / 2;
            const centerY = rect.height / 2;

            const rotateX =
                ((y - centerY) / centerY) * -3;

            const rotateY =
                ((x - centerX) / centerX) * 3;

            card.style.transform =
                `perspective(900px)
                 rotateX(${rotateX}deg)
                 rotateY(${rotateY}deg)
                 translateY(-6px)`;

        });


        card.addEventListener('mouseleave', function () {

            card.style.transform = '';

        });

    });

});

