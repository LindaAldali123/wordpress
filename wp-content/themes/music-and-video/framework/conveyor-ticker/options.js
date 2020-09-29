jQuery.fn.SimpleMarquee.defaults = {
	autostart: true,
    property: 'value',
    onComplete: null,
    duration: 80000,
    padding: 10,
    marquee_class: '.marquee',
    container_class: '.simple-marquee-container',
    sibling_class: 0,
    hover: true
};

jQuery(function (){
	jQuery('.simple-marquee-container').SimpleMarquee();	
});
