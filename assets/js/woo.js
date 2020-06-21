//unfortinately i didn't figured out how not to use this tuff in this case
jQuery(function($){
$( document.body ).on( 'checkout_error', function() {
   $(".woocommerce-NoticeGroup").click(function(){
console.log("clicked");
$(".woocommerce-NoticeGroup").toggleClass("min");
console.log(this);
});
    });
});
