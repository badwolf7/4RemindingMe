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
			$('.contactGroup').removeClass('col-md-offset-1');
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
			$('.contactGroup').addClass('col-md-offset-1');
		}
	});

	var tz = jstz.determine(), // Determines the time zone of the browser client
		timezone = tz.name(), //'Asia/Kolhata' for Indian Time.
		timezoneCode;
	console.log(tz.name());

	var yyyy = new Date().getFullYear(),
		mm = new Date().getMonth(),
		dd = new Date().getDate(),
		hh = new Date().getHours(),
		min = new Date().getMinutes(),
		ss = new Date().getSeconds();
		mm++;
	console.log(yyyy+'-'+mm+'-'+dd+' '+hh+':'+min+':'+ss);
}