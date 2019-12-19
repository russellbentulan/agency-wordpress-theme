$(function(){

   // Set the height of the parent div to the height of the absolute position element
   const $serviceDescriptions = $('.service__description');
   const responsiveServiceSection = function() {
      let largestHeight = 0;
      $serviceDescriptions.each(function(i, service) {
      if (service.offsetHeight > largestHeight) {
         largestHeight = service.offsetHeight;
      }
      });
      $(".service__container").css("padding-bottom", `${largestHeight}px`);
   }
   responsiveServiceSection();

	if($(window).width() > 980 ){
	     $(".menu-item-has-children > a").on("focus",function() {
	     	$(".active").removeClass("active");
	          $(this).parent().addClass("active");
	     });
  } else{
     $(".menu-item-has-children").on("click", function(){
        $(this).toggleClass('open').find(".sub-menu").slideToggle();
     })
  }

  $(".menu-button").on("click", function(){
     $(this).toggleClass("open");
     $(".menu").slideToggle();
  })

//   Resize function to close the mobile menu. Change MENU CONTAINER to navigation container of the theme
  var dwidth = $(window).width();

  $(window).on('resize', function() {
     
   responsiveServiceSection();
   
   if($(window).width() > 768) {
      $(".menu").css('display', 'flex');
     } else {
      var wwidth = $(window).width();
      if(dwidth!==wwidth){
         dwidth = $(window).width();
         $(".menu").css('display', 'none');
         $('.menu-button').removeClass('open');
      }
     }
  });


// IE Check
   if (navigator.appName == 'Microsoft Internet Explorer' ||  !!(navigator.userAgent.match(/Trident/) || navigator.userAgent.match(/rv:11/)) || (typeof $.browser !== "undefined" && $.browser.msie == 1)) {
      $('body').addClass('IE');
   }

   $( document ).ready(function() {
      $(".service__description--1").addClass("service__description--selected");
   });
  
   $(".service__title--1").click(function(){
      $(".service__title").removeClass("service__title--selected");
      $(this).toggleClass("service__title--selected");
      $(".service__description").removeClass("service__description--selected");
      $(".service__description--1").toggleClass("service__description--selected");
   });
   
   $(".service__title--2").click(function(){
      $(".service__title").removeClass("service__title--selected");
      $(this).toggleClass("service__title--selected");
      $(".service__description").removeClass("service__description--selected");
      $(".service__description--2").toggleClass("service__description--selected");
   });
   
   $(".service__title--3").click(function(){
      $(".service__title").removeClass("service__title--selected");
      $(this).toggleClass("service__title--selected");
      $(".service__description").removeClass("service__description--selected");
      $(".service__description--3").toggleClass("service__description--selected");
   });

   $(".categories-selector__form").on('change', function() {
      $(this).closest('form').submit();
   })
});