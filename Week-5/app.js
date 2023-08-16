    /*PARALLAX EFFECT*/

    $(document).ready(function() {
        var controller = new ScrollMagic.Controller();

        var parallaxScene = new ScrollMagic.Scene({
        triggerElement: '.header',
        triggerHook: 0,
        duration: '70%'
        })
        .setTween('.parallax-bg', { y: '-60%', ease: Power0.easeNone })
        .addTo(controller)
        .addIndicators();


    /*BOX FADE IN*/
    $(".images").each(function(i) {
        var target = $(this).find(".box");
        var tl = new TimelineMax();
        
        tl.from(target, 0.25, { opacity:0 });
        tl.to(target, 0.25, { opacity:0 }, 0.75);
        
        new ScrollMagic.Scene({
          triggerElement: this,
          triggerHook: 0.2,
          duration: '150%'
        })
          .setPin(this)
          .setTween(tl)
          .addIndicators()
          .addTo(controller);
      })

        /*NAV BAR COLOR CHANGE*/
      $(document).ready(function() {
        const nav = $('.nav');
        const triggerPoint = 200; 
  
        $(window).on('scroll', function() {
          if ($(window).scrollTop() > triggerPoint) {
            nav.addClass('scrolled');
          } else {
            nav.removeClass('scrolled');
          }
        });
      });


         /*LENIS*/
        const lenis = new Lenis ()
        lenis.on('scroll', (e) => {
        console.log(e)
        })
        function raf(time) {
        lenis.raf(time)
        requestAnimationFrame (raf)
        }
        requestAnimationFrame (raf)


        /*GSAP*/
        gsap.registerPlugin(ScrollTrigger)
        const splitTypes = document.querySelectorAll('.texted')

            splitTypes.forEach((char,i) => {
            const text = new SplitType(char, { types: 'chars'})

            gsap.from(text.chars, {
            scrollTrigger: {
                    trigger: char,
                    start: 'top 80%',
                    end: 'top 20%',
                    scrub: true,
                    markers: false
                    },
                    opacity: 0.2,
                    stagger: 0.1
                 })
            })


});
