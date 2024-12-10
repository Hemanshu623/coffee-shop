let t1 = gsap.timeline()
t1.from('.overlay .home-h1', {
  opacity: 1,
  scale:5,
  ease: 'power2.in',
  duration: .5,
})

t1.from('.overlay .p2', {
  opacity: 0,
  scale:0,
  y:60,
  ease: 'power2.in',
  duration: .6,
  delay:-.1,
})
t1.from('.overlay .home-h4,.overlay .p1',{
opacity: 0,
ease: 'power2.in',
duration:.5,
delay:.2,

})

gsap.to('.first', {
backgroundPosition: '0% 150%',
scrollTrigger: {
  trigger: '.first',
  start: 'top top',
  end: 'bottom top',
  scrub: true,
  // markers: true,
},
})


gsap.fromTo(
    '.main-image,.secondary-image',
    {
        y: 10
    },
    {
        duration: 2.5,
        y: -10,
        ease: 'elastic.out(1, 0.3)',
        scrollTrigger: {
            trigger: '.passion-section',
            start: 'top top',
            scrub: 2,
            // markers: true
        }
    }
);
t1.from('.description', {
    opacity: 0,
    y: 100,
    duration: .5,
    scrollTrigger: {
        trigger: '.description',
        start: 'top 70%',
        end: 'bottom bottom',
        scrub: 1,
        // markers: true
    }
})
t1.from('.signature img,.signature span', {
    opacity: 0,
    duration: 0.5,
    stagger: 2,
    scrollTrigger: {
        trigger: '.signature img',
        start: 'top 80%',
        end: 'bottom bottom',
        scrub: 1,
        // markers: true
    }
})
gsap.to('.craft-coffee', {
    backgroundPosition: '0% 150%',
    scrollTrigger: {
        trigger: '.craft-coffee',
        start: 'top top',
        end: 'bottom top',
        scrub: true,
        // markers: true,
    },
})
gsap.from('.overlay .homesecond-h1',{
    opacity: 0,
    scale: 2.5,
    duration: 1,
    ease: 'power2.in',
    scrollTrigger: {
        trigger: '.craft-coffee',
        start: 'top 40%',
        end: 'bottom bottom',
        // scrub: 1,
        // markers: true
    }
})
gsap.from('.overlay .homesecond-p2',{
    opacity: 0,
    y: 100,
    duration: 1,
    ease: 'power4.in',
    scrollTrigger: {
        trigger: '.craft-coffee',
        start: 'top 40%',
        end: 'bottom bottom',
        // scrub: 1,
        // markers: true
    }
})

gsap.fromTo(
    '.third-first .left',
    {
        y: 10
    },
    {
        duration: 2.5,
        y: -10,
        ease: 'elastic.out(1, 0.3)',
        scrollTrigger: {
            trigger: '.third-first',
            start: 'top top',
            scrub: 2,
            // markers: true
        }
    }
);
  gsap.fromTo(
    '.th2 .th2-h2-1,.th2 .th2-h2-2',
    {
        y: 10
    },
    {
        duration: 2.5,
        y: -10,
        ease: 'elastic.out(1, 0.3)',
        scrollTrigger: {
            trigger: '.third-second',
            start: 'top top',
            scrub: 2,
            // markers: true
        }
    }
);
gsap.from('.home-fourth-h1',{
    opacity: 0,
    scale: 2.5,
    duration: 1,
    ease: 'power2.in',
    scrollTrigger: {
        trigger: '.text',
        start: 'top 68%',
        end: 'bottom bottom',
        scrub: 1,
        // markers: true
    }
})
gsap.from('.home-fourth-h4',{
    opacity: 0,
    y: 100,
    duration: 1,
    ease: 'power4.in',
    scrollTrigger: {
        trigger: '.text',
        start: 'top 70%',
        end: 'bottom bottom',
        scrub: 1,
        // markers: true
    }
})
gsap.from('.cold',{
    opacity: 0,
    x:-100,
    // y: 100,
    duration:1,
    ease: 'power2.in',
    stagger:1,
    scrollTrigger: {
        trigger: '.menu',
        start: 'top 50%',
        end: 'bottom bottom',
        scrub: 1,
        // markers: true
    }
})
gsap.from('.hot',{
    opacity: 0,
    x:100,
    // y: 100,
    duration:1,
    ease: 'power2.in',
    stagger:1,
    scrollTrigger: {
        trigger: '.menu',
        start: 'top 50%',
        end: 'bottom bottom',
        scrub: 1,
        // markers: true
    }
})

gsap.from(".box", {
    x: -500,
    duration: 1,
    opacity:0,
    // ease: "elastic.inOut(1, 0.3)",
    scrollTrigger: {
      trigger: ".home-fifth",
      start: "top 20%",
      end: "bottom top",
      // scrub: true,
      // markers: true,
    },
  })
  gsap.from(".fifth-contain", {
    x: 500,
    duration: 1,
    opacity:0,
    // ease: "elastic.inOut(1, 0.3)",
    scrollTrigger: {
      trigger: ".home-fifth",
      start: "top 20%",
      end: "bottom top",
      // scrub: true,
      // markers: true,
    },
  })

  gsap.to(".slider-wrapper",{
    transform:"translateX(-87%)",
    scrollTrigger:{
        trigger:'.slider',
        scroller:"body",
        // markers:true,
        start:"top 20%",
        end:"top -150%",
        scrub:3,
        pin:true,
    }
})

gsap.from('.home-sixth-h1',{
    opacity: 0,
    scale: 2.5,
    duration: 1,
    ease: 'power2.in',
    scrollTrigger: {
        trigger: '.home-sixth',
        start: 'top 68%',
        end: 'bottom bottom',
        scrub: 1,
        // markers: true
    }
})
gsap.from('.home-sixth-h4',{
    opacity: 0,
    y: 100,
    duration: 1,
    ease: 'power4.in',
    scrollTrigger: {
        trigger: '.home-sixth',
        start: 'top 70%',
        end: 'bottom bottom',
        scrub: 1,
        // markers: true
    }
})