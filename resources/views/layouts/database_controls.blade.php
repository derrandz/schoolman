@if( is_logged() )
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="panel panel-info panel panel-heading">
					<p id="current_database">Current Database : </p>
						<div class="panel panel-info panel panel-heading">
							<p>
								<strong style="color:green;">
									<?php echo ActualDatabase() ?>
								</strong>
							</p>
						</div>
				</div>
			</div>
		</div>
	</div>
@endif