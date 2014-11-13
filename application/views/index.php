			<main class="home">
				<section class="row">
					<h2>Scheduled messages delivered via text or email</h2>
					<div class="formBG">
						<form class="landingMsg col-md-12" action="" method="post" role="form">
							<div class="contactGroup form-group col-md-2">
								<select id="method" class="method form-control" name="method" required>
									<option onchange="method(1)" value="1" selected>Cell Number</option>
									<option onchange="method(2)" value="2">Email Address</option>
								</select>
								<input class="form-control" type="text" name="contact" required>
								<ul class="textHint">
									<li>
										<small>12344567890</small>
									</li>
									<li>
										<small>or 123-456-7890</small>
									</li>
									<li>
										<small>or even (123) 456-7890</small>
									</li>
								</ul>
								<ul class="emailHint">
									<li>
										<small>your@email.com</small>
									</li>
								</ul>
							</div>
							<div class="form-group carrierGroup col-md-2">
								<label>Carrier</label>
								<select class="carriers form-control" name="carrier" required>
									<option selected></option>
									<?php foreach($carriers as $carrier){ ?>
									<?php echo '<option value='.$carrier['address'].'>'.$carrier['carrier'].'</option>' ?>
									<?php } ?>
								</select>
							</div>
							<div class="form-group col-md-2">
								<label>Date &amp; Time</label>
								<input class="form-control" type="text" name="dateTime" required>
								<ul>
									<li>
										<small>now</small>
									</li>
									<li>
										<small>or today 3pm</small>
									</li>
									<li>
										<small>or even 11/11/14 7am</small>
									</li>
								</ul>
							</div>
							<div class="form-group col-md-4">
								<label>Message</label>
								<input class="form-control" type="text" name="message" required>
								<ul>
									<li>
										<small>get groceries</small>
									</li>
									<li>
										<small>or Happy Birthday! Love Holly</small>
									</li>
									<li>
										<small>or even WAKE UP!!!</small>
									</li>
								</p>
							</div>
							<button class="btn btn-primary col-md-2">Send</button>
						</form>
					</div>
				</section>
				<section class="about row">
					<article class="col-md-5 col-md-offset-1">
						<div class="col-md-2 text-center">
							<h2><i class="fa fa-clock-o"></i></h2>
						</div>
						<div class="col-md-10">
							<h3>Schedule you messages</h3>
							<p>You can schedule your message to be sent now or any time in the future. You just tell us when to send it and we take care of the rest.</p>
						</div>
					</article>
					<article class="col-md-5">
						<div class="col-md-2 text-center">
							<h2><i class="fa fa-mobile-phone"></i></h2>
						</div>
						<div class="col-md-10">
							<h3>Send via Text or Email</h3>
							<p>All messages can be sent to any cell phone via text. For those of you that would prefer there's always email.</p>
						</div>
					</article>
				</section>
				<section class="doDont row">
					<article class="col-xs-10 col-md-offset-1">
						<h3>Do</h3>
						<ul>
							<li>Remind yourself when your bills are due.</li>
							<li>Send a reminder for when sports or concert tickets go on sale.</li>
							<li>Send yourself reminders about important dates (anniversaries, birthdays, etc...)</li>
							<li>Or maybe you want an excuse to get out of a bad date, just send yourself a message during the date and bam you're free</li>
						</ul>
					</article>
					<article class="col-md-10 col-md-offset-1 text-right">
						<h3>Don't</h3>
						<ul>
							<li>Send messages to numbers that don't exist</li>
							<li>Send reminders on the wrong date, that's as bad as forgetting</li>
							<li>Send an out sick message to your boss (when you're actually at the beach) ... or do?</li>
							<li>Send yourself a message in the past, sorry the flux capacitor is out of our reach at this time</li>
						</ul>
					</article>
				</section>
			</main>