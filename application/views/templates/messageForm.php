<div class="formBG">
	<form class="landingMsg col-md-12" action="" method="post" role="form">
		<?php if($logged_in){ ?>
		<input type="hidden" value="<?php echo $user ?>" name="username">
		<? } ?>
		<div class="contactGroup form-group col-md-2">
			<select id="method" class="method form-control" name="method" required>
				<option onchange="method(1)" value="1" selected>Cell Number</option>
				<option onchange="method(2)" value="2">Email Address</option>
			</select>
			<input class="landContact form-control" type="text" name="contact" required>
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
			<input class="form-control" type="text" name="dateTime" value="now" readonly required>
			<!-- <ul>
				<li>
					<small>now</small>
				</li>
				<li>
					<small>or today 3pm</small>
				</li>
				<li>
					<small>or even 11/11/14 7am</small>
				</li>
			</ul> -->
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
		<button class="btn btn-primary col-md-2 col-md-offset-0 col-xs-8 col-xs-offset-2">Send</button>
	</form>
</div>