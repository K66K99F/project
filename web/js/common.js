$(function() {


	$('.btn_toggle').click(function () {
		$(".sbl").toggleClass('sbl_off');
		$(this).toggleClass('btn_toggle_off');
	});
	$('.sbl_c_head_name').click(function () {
		$(".sbl_c_head_splr").slideToggle()
	});
	$(".sbl_c_fltr_strt_id").chosen({no_results_text: "Oops, nothing found!"});
});
