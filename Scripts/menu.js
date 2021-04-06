/* MENU DROPDOWN */
$('.btnMenu').click((event)=>{
    event.preventDefault();
    $('.navbar_ul_li').toggleClass('navbar_ul_li_fechado');
    $(this).toggleClass('fa-bars fa-times');
});