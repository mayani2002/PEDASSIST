var controller = new ScrollMagic.Controller();

var scene = new ScrollMagic.Scene({
    triggerElement: '.facts',
    triggerHook: 0,
    duration: 3000
})
.setClassToggle('img.peopleA', 'showA')
.addTo(controller);

var controller2 = new ScrollMagic.Controller();

var scene2 = new ScrollMagic.Scene({
    triggerElement: '.button_container',
    triggerHook: 0
})
.setClassToggle('img.peopleB', 'showB')
.addTo(controller);

