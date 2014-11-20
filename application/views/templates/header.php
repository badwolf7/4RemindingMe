<?php include 'head.php' ?>
		<header>
			<h1>4RemindingMe</h1>
			<img class="logo" src="/assets/images/logo.png">
			<?php if($logged_in){ ?>
			<button class="userLogout btn btn-default col-xs-3 col-md-2" href="#">Logout</button>
			<?php }else{ ?>
			<a class="userLogin btn btn-default col-xs-3 col-md-2" href="#" data-toggle="modal" data-target="#loginModal">Login</a>
			<?php } ?>
		</header>
		<div id="loginModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
						<h3>Login to <img class="portlightLogin" src="/assets/images/logo.png" alt="4RemindingMe"></h3>
					</div>
					<div class="modal-body">
						<form role="form" method="POST" class="loginForm col-xs-12 col-md-6 col-lg-7">
							<div class="form-group">
								<label for="username">Username</label>
								<input class="form-control" type="text" name="username" placeholder="Username" required>
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input class="form-control" type="text" name="password" placeholder="Password" required>
							</div>
							<!-- <a href="#" class="forgotPass col-xs-6">Forgot Password?</a> -->
							<button class="login btn btn-primary col-xs-5 col-xs-offset-7 col-lg-4 col-lg-offset-8 btn-primary">Login</button>
						</form>
						<div class="register col-xs-12 col-md-6 col-lg-5">
							<button class="newUser btn btn-default col-md-12 col-md-offset-0 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">I'm new</button>
						</div>
					</div>
					<div class="modal-footer">
					</div>
				</div>
			</div>
		</div>
		<div id="registerModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
						<h3>Register for <img class="portlightLogin" src="/assets/images/logo.png" alt="4RemindingMe"></h3>
					</div>
					<div class="modal-body">
						<form role="form" method="POST" class="registerForm col-xs-12">
							<div class="form-group">
								<label for="fname">First Name</label>
								<input class="form-control" type="text" name="fname" placeholder="First Name" required>
							</div>
							<div class="form-group">
								<label for="lname">Last Name</label>
								<input class="form-control" type="text" name="lname" placeholder="Last Name" required>
							</div>
							<div class="form-group">
								<label for="fname">Username</label>
								<input class="form-control" type="text" name="username" placeholder="Username" required>
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input class="form-control" type="text" name="password" placeholder="Password" required>
							</div>
							<button class="register btn btn-primary col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1 btn-primary">Register</button>
						</form>
					</div>
					<div class="modal-footer">
					</div>
				</div>
			</div>
		</div>