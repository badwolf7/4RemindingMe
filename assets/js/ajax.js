$.fn.serializeObject = function(){
	var o = {};
	var a = this.serializeArray();
	$.each(a, function() {
		if (o[this.name] !== undefined) {
			if (!o[this.name].push) {
				o[this.name] = [o[this.name]];
			}
			o[this.name].push(this.value || '');
		} else {
			o[this.name] = this.value || '';
		}
	});
	return o;
};

// Landing Form Submit
$('.landingMsg').submit(function(e){
	e.preventDefault();
	if ($(this)[0][3].value == 'now'){
		var yyyy = new Date().getFullYear(),
			mm = new Date().getMonth(),
			dd = new Date().getDate(),
			hh = new Date().getHours(),
			min = new Date().getMinutes(),
			ss = new Date().getSeconds();
		mm++;
		var timestamp = yyyy+'-'+mm+'-'+dd+' '+hh+':'+min+':'+ss;
		$(this)[0][3].value = timestamp;

		sendMsg($(this).serializeObject());
	}else{
		sendMsg($(this).serializeObject());
	}
});
function sendMsg(req){
	console.log(req);
	$.ajax({
		type: 'POST',
		url: '/sendMsg',
		dataType: 'json',
		data: req,
		error: function(err){
			console.log('error');
			console.log(err);
		},
		success: function(result){
			console.log(result);
		}
	});
}
