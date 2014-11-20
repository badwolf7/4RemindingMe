<?php include 'templates/header.php' ?>
			<main class="dash">
				<section>
					<h2>Welcome</h2>

					<section>
						<?php include 'templates/messageForm.php' ?>
					</section>

					<section class="col-xs-10 col-xs-offset-1">
						<h3>Sent Messages</h3>
						<table class="upcomingMsg table table-hover">
							<thead>
								<tr>
									<th>Method</th>
									<th>Contact</th>
									<th>When</th>
									<th>Message</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($messages as $m){ ?>
								<?php if($m['userId'] == $user){ ?>
								<tr>
									<?php if($m['methodId'] == 1){ ?>
									<td class="col-xs-1 col-sm-2"><i class="fa fa-mobile-phone"></i> <span class="hidden-xs">Text</span></td>
									<?php }else{ ?>
									<td class="col-xs-1 col-sm-2"><i class="fa fa-envelope-o"></i> <span class="hidden-xs">Email</span></td>
									<?php } ?>
									<td class="col-md-2"><?php echo $m['contact'] ?></td>
									<td class="col-xs-3 col-sm-2"><?php echo $m['when'] ?></td>
									<td class="col-md-6"><?php echo $m['message'] ?></td>
								</tr>
								<?php }} ?>
							</tbody>
						</table>
					</section>
					<div class="push"></div>
				</section>
			</main>
<?php include 'templates/footer.php' ?>