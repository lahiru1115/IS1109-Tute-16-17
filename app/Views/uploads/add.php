<?php echo $this->session->flashdata('success_msg'); ?>
<?php echo $this->session->flashdata('error_msg'); ?>

<form role="form" method="post" enctype="multipart/form-data">
	<div class="panel">
		<div class="panel-body">
			<div class="dsp form-group">
				<label>Title</label>
				<input class="form-control" type="text" name="title"/>
			</div>
			<div class="dsp form-group">
				<label>Image</label>
				<input class="form-control" type="file" name="image"/>
			</div>
			<div class="dsp form-group">
				<input type="submit" class="btn btn-warning" name="submit" value="Submit">
			</div>
		</div>
	</div>
</form>