/*
Template Name: Landeng - HTML Landing Page Templates
Author: Askbootstrap
Author URI: https://themeforest.net/user/askbootstrap
Version: 1.0
*/

(function($) {
"use strict"; // Start of use strict

// ===========Navbar Scroll============
$(document).on('scroll', function() {
  var scroll = $(this).scrollTop();
  if (scroll >= 50) {
      $(".navbar").addClass("fixed-top");
  } else {
      $(".navbar").removeClass("fixed-top");
  }
});

// Tooltip
$('[data-toggle="tooltip"]').tooltip();

// Osahan Slider
$('.osahan-slider').slick({
  centerMode: false,
  dots: true,
  infinite: true,
  speed: 300,
  slidesToShow: 1,
  adaptiveHeight: true,
  arrows: true
});


 
	




})(jQuery); // End of use strict
