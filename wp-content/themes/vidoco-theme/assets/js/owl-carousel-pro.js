jQuery(document).ready(function(){
	jQuery(".owl-carousel-banner").owlCarousel({
        autoplay:true,                    
        loop:true,
        margin:0,                        
        nav:true,
        dots:false,            
        mouseDrag: false,
        touchDrag: false,  
        lazyLoad: true,                              
        responsiveClass:true,
        responsive:{
            0:{
                items:1
            }
        }
    });         
});