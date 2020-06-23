jQuery(function ($) {
	$(document.body).on('checkout_error', function () {
		$(".woocommerce-NoticeGroup").click(function () {

			$(".woocommerce-NoticeGroup").toggleClass("min");

		});
	});

	$(document.body).trigger('wc_fragment_refresh');


});
