<div class="container product_container"><!-- start container -->
	<div class="row"><!-- start row -->
		<p>Please enter the product category</p>
		<div class="col-sm-offset-1 col-sm-9"><!-- start col -->
			<?=$this->session->flashdata('msg')?>
				<form class="form-horizontal" action="<?php echo base_url('do_add_category'); ?>" method="POST">
					<input type="hidden" name="<?=$this->security->get_csrf_token_name()?>" value="<?=$this->security->get_csrf_hash()?>" />
					  <div class="form-group">
					    <label class="control-label col-sm-2" for="pwd">Category name:</label>
					    <div class="col-sm-10"> 
					      <input type="text" class="form-control" id="name" name="name" placeholder="Enter category name (required)" value="<?=set_value('name')?>">
					      <small><?=form_error('name')?></small>
					    </div>
					  </div>
					  <div class="form-group"> 
					    <div class="col-sm-offset-2 col-sm-10">
					      <button type="submit" class="btn btn-info pull-right">Add category</button>
					    </div>
					  </div>
</form>
		</div><!-- end col -->
	</div><!-- end row -->
</div><!-- end container -->