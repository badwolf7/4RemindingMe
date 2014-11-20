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

// Login
$('.loginForm').submit(function(e){
	e.preventDefault();
	login($(this).serializeObject());
});
function login(req){
	console.log(req);
	$.ajax({
		type: 'POST',
		url: '/login',
		dataType: 'json',
		data: req,
		error: function(err){
			console.log('error');
			console.log(err);
		},
		success: function(result){
			console.log('loggedIn');
			console.log(result);
			$('#loginModal').modal('toggle');
			window.location.replace('/dash');
		}
	});
}

// Logout
$('.registerForm').submit(function(e){
	e.preventDefault();
	register($(this).serializeObject());
});
function register(req){
	console.log(req);
	$.ajax({
		type: 'POST',
		url: '/register',
		dataType: 'json',
		data: req,
		error: function(err){
			console.log('error');
			console.log(err);
		},
		success: function(result){
			console.log('registered');
			console.log(result);
			$('#registerModal').modal('toggle');
			window.location.replace('/dash');
		}
	});
}

// Logout
$('.userLogout').click(function(e){
	e.preventDefault();

	$.ajax({
		type: 'POST',
		url: '/logout',
		dataType: 'json',
		error: function(err){
			console.log('error');
			console.log(err);
		},
		success: function(result){
			console.log('Logged Out');
			console.log(result);
			window.location.replace('/');
		}
	});
});

// Message Submit
$('.landingMsg').submit(function(e){
	e.preventDefault();
	var yyyy = new Date().getFullYear(),
		mm = new Date().getMonth(),
		dd = new Date().getDate(),
		hh = new Date().getHours(),
		min = new Date().getMinutes(),
		ss = new Date().getSeconds();
	mm++;
	
	var timestamp = yyyy+'-'+mm+'-'+dd+' '+hh+':'+min+':'+ss;
	if ($(this)[0][4].value == 'now'){
		$(this)[0][4].value = timestamp;
	}
	var serialized = $(this).serializeObject();
	serialized.now = timestamp;
	sendMsg(serialized);
});
function sendMsg(req){
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
			console.log('message sent');
			console.log(result);
			$('.landingMsg').replaceWith('<div class="confirmLanding col-md-8 col-md-offset-2"><h3>Your message has been sent.</h3></div>');
			setTimeout(function(){
				location.reload();
			},3000);
		}
	});
}
