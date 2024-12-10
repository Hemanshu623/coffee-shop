gsap.registerPlugin(ScrollTrigger);

const t1 = gsap.timeline();

t1.from('.overlay1 .menu-h1', {
  opacity: 0,
  scale:3,
  ease:'power2.in',
  duration: .5,
})


t1.from('.overlay1 .p2', {
  opacity: 0,
  scale:0,
  y:60,
  ease: 'power2.in',
  duration: .6,
  delay:-.1,
})

  gsap.to('.mainmenu', {
    backgroundPosition: '0% 150%',
    scrollTrigger: {
      trigger: '.mainmenu',
      start: 'top top',
      end: 'bottom top',
      scrub: true,
      // markers: true,
    },
  })

t1.from(".menu-text .menu-p1", {
    opacity: 0,
    x: 29,
    ease: 'power2.in',
    duration: .6,
    scrollTrigger: {
        trigger: ".menu-text .menu-p1",
        scroller: "body",
        // markers: true,
        start: "top 90%",
        end: "top 90%",
        scrub: 2
    }
});

t1.from(".menu-text .menu-p2", {
    opacity: 0,
    x: -29,
    ease: 'power2.in',
    duration: .6,
    scrollTrigger: {
        trigger: ".menu-text .menu-p2",
        scroller: "body",
        // markers: true,
        start: "top 90%",
        end: "top 90%",
        scrub: 2
    }
});

t1.from(".t1 .img, .t1 .h2", {
    opacity: 0,
    scale: 1.5,
    ease: 'power2.in',
    duration: .6,
    scrollTrigger: {
        trigger: ".t1 .img, .t1 .h2",
        scroller: "body",
        markers: true,
        start: "top 60%",
        end: "top 60%",
        scrub: 2
    }
});

t1.from(".coffeetext", {
        opacity: 0,
        ease: 'power2.in',
        duration: .6,
        scrollTrigger: {
            trigger: ".coffeetext",
            scroller: "body",
            // markers: true,
            start: "top 90%",
            end: "top 90%",
            scrub: 2 //write 1 to 5 number 
        }
    })

    t1.from(".product-list", {
        opacity: 0,
        ease: 'power2.in',
        duration: .6,
        scrollTrigger: {
            trigger: ".product-list",
            scroller: "body",
            // markers: true,
            start: "top 80%",
            end: "top 80%",
            scrub: 2 //write 1 to 5 number 
        }
    })