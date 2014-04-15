<?php include('partials/header.php'); ?>
<div class="row">
<!-- You can start your data from here -->

	<div class="col-mod-12">
		<ul class="breadcrumb">
			<li><a href="index.html">Dashboard</a></li>
			<li><a href="template.html">Template</a></li>
			<li class="active">Bread Crumb</li>
		</ul>
	</div>
</div>

<!-- Content can be added here  -->

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h5 class="modal-title">Panel Settings</h5>
				<span class="small">Some sort of settings with a form</span>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" role="form">
					<div class="form-group">
						<label for="inputEmail1" class="col-lg-2 control-label">Label</label>
						<div class="col-lg-10">
							<input type="email" class="form-control" id="inputEmail1" placeholder="Label">
						</div>
					</div>
					<div class="form-group">
						<label for="inputPassword1" class="col-lg-2 control-label">Second Label</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" id="inputPassword1" placeholder="Label two">
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- End of main Data -->

<?php include('partials/footer.php'); ?>
			