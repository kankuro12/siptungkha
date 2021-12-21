$(document).ready(function(){
  $(".owl-carousel").owlCarousel({
      loop:true,
      items:1
  });
  $('.tab-btn').click(function(){
    maintab=$(this).data('of');
    tabitem=$(this).data('for');
    console.log(maintab);
    $('#'+maintab +'> .tab-btn-bar > button.tab-btn').removeClass('active');
    $('#'+maintab +'> .tab-container > .tab-item').removeClass('active');
    $('#'+maintab +'> .tab-container > #'+tabitem).addClass('active');
    $(this).addClass('active');
  });
});