// $(".modal-dialog").hide();

$(".open-modal").click(function(event){
	event.preventDefault();
	$(".pagination").hide();
	var href = $(this).attr("href");
	$("body").css("overflow", "hidden");
	$(href).show();
	$(".footer-container").hide();
	// $(".form-control:first").focus();
});

$(".close-modal, .close-modal-btn, .modal-dialog").click(function(event){
	// alert($(event.target).attr('class'));
	if($(event.target).attr('class')=='modal-dialog'){
		event.preventDefault();
		$(".pagination").show();
		$(".modal-dialog").hide();
		$("body").css("overflow", "scroll");
		
	}
});

$(".close-modal, .close-modal-btn").click(function(event){
		event.preventDefault();
		$(".pagination").show();
		$(".modal-dialog").hide();
		$("body").css("overflow", "scroll");
});
// $(document).mouseup(function(e) 
// {
//     var modalcontent = $(".modal-content");

//     if (!modalcontent.is(e.target) && modal-content.has(e.target).length === 0) 
//     {
//        $(".pagination").show();
// 	   $(".modal-dialog").hide();
//     }
// });

// $(".close-modal-btn").click(function(event){
// 	event.preventDefault();
// 	$(".pagination").show();
// 	$(".modal-dialog").hide();
// });