// JavaScript Document
$(document).ready(function() {
 // hides the slickbox as soon as the DOM is ready (a little sooner that page load)
  $('#slickbox').hide();
  
 // shows and hides and toggles the slickbox on click  
  $('#slick-show').click(function() {
    $('#slickbox').show('slow');
    return false;
  });
  $('#slick-hide').click(function() {
    $('#slickbox').hide('fast');
    return false;
  });
  $('#slick-toggle').click(function() {
    $('#slickbox').toggle(400);
    return false;
  });

 // slides down, up, and toggle the slickbox on click    
  $('#slick-down').click(function() {
    $('#slickbox').slideDown('slow');
    return false;
  });
  $('#slick-up').click(function() {
    $('#slickbox').slideUp('fast');
    return false;
  });
  $('#slick-slidetoggle').click(function() {
    $('#slickbox').slideToggle(400);
    return false;
  });
  
  $('#slick-show').click(function() {
    $('#slickbox-thumb').show('slow');
    return false;
  });
  
  $('#slick-up-thumb').click(function() {
    $('#slickbox-thumb').slideUp('fast');
    return false;
  });
  
  $('#slick-slidetoggle-thumb').click(function() {
	setTimeout("applyFlexScroll('mycustomscroll')",80);										  
    $('#slickbox-thumb').slideToggle(400);
	
    return false;
  });
});
function applyFlexScroll(id){
	fleXenv.initByClass(id);
}
