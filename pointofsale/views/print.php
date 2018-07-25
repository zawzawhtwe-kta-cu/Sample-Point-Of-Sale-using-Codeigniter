<div class="container">
	<div class="row">
		<div class="col-sm-offset-4 col-sm-4">
			<div class="visible-print-block">
				<div class="text-center">
					<h5>LIBRASUN SNACKS</h5>
					<h5>Mid Valley City,</h5>
					<h5>Lingkaran Syed Putra,</h5>
					<h5>59200 Kuala Lumpur</h5>
				</div>
				<div class="col-sm-6 col-xs-6">
					<?php foreach ($myid as $key):?>
					<p>Receipt No.<?=$key['sale_id']?></p>
					<?php endforeach; ?>
					<p>Shift No.1</p>
					<p>Cashier:SUPPORT</p>
					<p>DINE-IN</p>
				</div>
				<div class="col-sm-6 col-xs-6" style="text-align: right;">
					<p>Temp-Temp_01</p>
					<p><?php $date=date('d/m/Y'); echo $date; ?></p>
					<p><?php $time=date('d/m/Y h:m:s'); echo $time; ?></p>
				</div>
			</div>
			<table class="table table-bordered">
				<tr>
					<td>QTY</td><td>ITEM</td><td>AMOUNT</td>
				</tr>
				<?php foreach($pdata as $rows): ?>
				<tr>
					<td>1</td><td><?=$rows['p_name']?></td><td><?=$rows['p_price']?></td>
				</tr>
			<?php endforeach; ?>
			<?php foreach ($myid as $key):?>
			<tr>
				<td></td><td>Sub Total</td><td><?=$key['sum']?></td>
			</tr>
			<?php endforeach; ?>
			<?php foreach ($myid as $key):?>
			<tr>
				<td></td><td>Grand Total</td><td><?=$key['sum']?></td>
			</tr>
			<?php endforeach; ?>
			<?php foreach ($myid as $key):?>
			<tr>
				<td></td><td>CASH</td><td><?=$key['sum']?></td>
			</tr>
			<?php endforeach; ?>
			</table>
			<div class="text-center visible-print-block">
				<h5>CUSTOMER HOTLINE</h5>
				<p>(060) 3 2298 7229</p>
				<p>***Thank You!***</p>
			</div>
			<button class="btn btn-success hidden-print" onclick="Print()">Print</button>
			<a href="<?php echo base_url(''); ?>" class="btn btn-danger hidden-print">No print</a>
		</div>
	</div>
</div>
<script type="text/javascript">
	function Print(){
		window.print();
		document.location.href ="<?php echo base_url(''); ?>";
	}
</script>