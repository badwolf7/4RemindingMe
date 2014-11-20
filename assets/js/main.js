window.onload = function(){
	$('.method').change(function(e){
		if($(this).val() == 1){
			$('.textHint').css({
				'display':'initial'
			});
			$('.emailHint').css({
				'display':'none'
			});
			$('.carrierGroup').css({
				'display':'initial'
			});
			$('.carrierGroup .form-control').prop('disabled','false');
			$('.contactGroup').removeClass('col-md-offset-1');
			$('.landContact').prop('type','text');
		}else{
			$('.textHint').css({
				'display':'none'
			});
			$('.emailHint').css({
				'display':'initial'
			});
			$('.carrierGroup').css({
				'display':'none'
			});
			$('.carrierGroup .form-control').prop('disabled','true');
			$('.contactGroup').addClass('col-md-offset-1');
			$('.landContact').prop('type','email');
		}
	});
	$('.newUser').click(function(){
		$('#loginModal').modal('toggle');
		$('#registerModal').modal('toggle');
	});
	var footerHeight = $('footer').height();
	$('.push').css({
		'height':footerHeight
	});
}