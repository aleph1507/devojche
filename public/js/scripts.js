$(document).ready(function(){
	//
	$(".dplinks a").attr("href", $(".dplinks a").attr("href")+"#dphead");
	$(".sellerslist a").attr("href", $(".sellerslist a").attr("href") + "#sellershead");
	$("#btn_kategorii").click(function(){
		$("#pil_kategorii").slideToggle("fast");
	});
	$(window).on('load resize', function(){
		if($(window).width() <= 767){
			$("#pil_kategorii").slideUp('fast');
			$("#btn_kategorii").html("Покажи категории");
		}
		if($(window).width()>767){
			$("#pil_kategorii").slideDown('fast');
			$("#btn_kategorii").html("Скриј категории");
		}

	});

	var distance = $("#div_kategorii").offset().top;		
	var bsnav = $("#bsnav");
	var in_nav = 0;
	$(window).scroll(function(){
		console.log("scrollTop: " + $(window).scrollTop());
		console.log("distance: " + distance);
		console.log($(window).scrollTop() < distance);
		console.log("in_nav: " + in_nav);
		var kat_div = $("#div_kategorii");
		// var bsnav_bottom = bsnav.offset().top + bsnav.outerHeight();
		// var bsnav_right = bsnav.offset().left + bsnav.outerWidth();
		// var original_top = $("#div_kategorii").offset().top;
		var kat;

		if($(window).scrollTop() >= distance){
			// alert(bsnav_bottom);
			// if(!$("#div_kategorii").hasClass('fixed-catries')){
			// 	$("#div_kategorii").css('position', 'fixed');
			// 	$("#div_kategorii").css('top', bsnav_bottom);
			// $("#btn_kategorii").removeClass('btn_kategorii');
			if($("#btn_kategorii").hasClass('btn-inverted-default'))
				$("#btn_kategorii").removeClass('btn-inverted-default');
			if(!$("#btn_kategorii").hasClass('attached_btn_kategorii'))
				$("#btn_kategorii").addClass('attached_btn_kategorii');
			

			bsnav.append($("#div_kategorii"));
			in_nav = 1;

				// $("#div_kategorii").addClass('fixed-categories');
			// }
		}
		else{
			// $("#div_kategorii").removeClass('fixed-categories');
			// $("#div_kategorii").css('top', original_top);
			// $("#btn_kategorii").removeClass('attached_btn_kategorii');
			// $("#btn_kategorii").addClass('btn-inverted-default');
			// $("#btn_kategorii").addClass('btn_kategorii');
			// if($(window).scrollTop < distance)
			// 	alert("scrolltop < distance");
			if(in_nav == 1){
				$("#btn_kategorii").removeClass('attached_btn_kategorii');
				$("#btn_kategorii").addClass('btn-inverted-default');
				kat = $("#div_kategorii").detach();
				$(".cat-row").append(kat);
				in_nav = 0;
			}
		}
	 });
});