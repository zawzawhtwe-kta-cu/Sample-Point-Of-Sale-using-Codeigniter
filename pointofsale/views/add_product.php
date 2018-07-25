<div class="container product_container"><!-- start container -->
	<div class="row"><!-- start row -->
		<p>Please enter the product information below</p>
		<div class="col-sm-offset-2 col-sm-8"><!-- start col -->
			<?php echo $this->session->flashdata('msg'); ?>
				<form class="form-horizontal" action="<?=base_url('do_add_product')?>" method="POST">
					<input type="hidden" name="<?=$this->security->get_csrf_token_name()?>" value="<?=$this->security->get_csrf_hash()?>" />
					  <div class="form-group">
					    <label class="control-label col-sm-2" for="email">Product code:</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" id="code" name="code" placeholder="Enter product code (required)" value="<?=set_value('code')?>">
					      <small><?=form_error('code')?></small>
					    </div>
					  </div>
					  <div class="form-group">
					    <label class="control-label col-sm-2" for="pwd">Product name:</label>
					    <div class="col-sm-10"> 
					      <input type="text" class="form-control" id="name" name="name" placeholder="Enter product name (required)" value="<?=set_value('name')?>">
					      <small><?=form_error('name')?></small>
					    </div>
					  </div>
					  <div class="form-group">
					    <label class="control-label col-sm-2" for="pwd">Category:</label>
					    <div class="col-sm-10"> 
					      <select class="form-control" name="p_category">
					      		<option selected disabled>Select category (required)</option>
					      		<?php foreach($category as $rows): ?>
								<option value="<?=$rows['c_id']?>" <?php echo set_select('p_category', $rows['c_id'], ( !empty($data) && $data ==$rows['c_id'] ? TRUE : FALSE )); ?>><?=$rows['c_name']?></option>
					      		<?php endforeach;  ?>
					      </select>
					      <small><?=form_error('p_category')?></small>
					    </div>
					  </div>
					  <div class="form-group">
					    <label class="control-label col-sm-2" for="pwd">Product price:</label>
					    <div class="col-sm-10"> 
					      <input type="text" class="form-control" id="price" name="price" placeholder="Enter product price (required)" value="<?=set_value('price')?>">
					      <small><?=form_error('price')?></small>
					    </div>
					  </div>
					  <div class="form-group"> 
					    <div class="col-sm-offset-2 col-sm-10">
					      <button type="submit" class="btn btn-info pull-right">Add prodcut</button>
					    </div>
					  </div>
</form>
		</div><!-- end col -->
	</div><!-- end row -->
</div><!-- end container -->
<hr>
<div class="container">
<table id="example" class="display nowrap" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Product code</th>
            <th>Product name</th>
            <th>Product price</th>
        </tr>
    </thead>
    <tbody>
    	<?php $i=1; foreach($product as $rows): ?>
        <tr>
            <td><?=$i?></td>
            <td><?=$rows['p_code']?></td>
            <td><?=$rows['p_name']?></td>
            <td><?=$rows['p_price']?></td>
        </tr>
        <?php $i++; endforeach; ?>
    </tbody>
</table>
</div>
<script type="text/javascript">
	$(document).ready(function() {
    $('#example').DataTable( {
        "scrollX": true
    } );
} );
</script>