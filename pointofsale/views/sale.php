<div class="container-fluid">
	<div class="row">
		<div class="col-sm-4" style="padding-bottom: 20px;">
			<div class="sale_col">
        <div class="sale_nav">
          <table class="table table-responsive">
            <thead class="sale_table">
              <td>QTY </td><td>ITEM</td><td>AMOUNT</td><td><li class="fa fa-trash-o"></li></td>
            </thead>

            <tbody id="tbody">
              
            </tbody>
           
          </table>
        </div>
			</div>
      <div class="total">
        <table class="table table-bordered">
          <tr>
            <td>Sub Total</td><td class="pick_price"></td>
          </tr>
          <tr>
            <td>Grand Total</td><td class="pick_price"></td>
          </tr>
          <tr>
            <td>Cash</td><td class="pick_price" id="all_total"></td>
          </tr>
        </table>
      </div><br>
        <!-- <div class="pull-right" style="margin-top: 10px;"> -->
        <button class="btn btn-success pay">Payment</button>
        <a class="btn btn-danger" href="<?php echo base_url(''); ?>" >Cancel</a>
      <!-- </div> -->
		</div><!-- end col -->
		<div class="col-sm-8 hidden-print">
      <ul class="nav nav-pills">
    <li class="active"><a data-toggle="pill" href="#home">All</a></li>
    <?php foreach($category as $rows): ?>
    <li><a data-toggle="pill" href="#<?=$rows['c_id']?>"><?=$rows['c_name']?></a></li>
    <?php endforeach; ?>
  </ul>
  <hr>
  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <?php foreach($item as $rows): ?>
      <div class="col-sm-2 col-xs-4" style="padding-bottom: 20px;"><button class="btn btn-default pick" id="<?=$rows['p_code']?>"><?=$rows['p_name']?></button>
      </div>
    <?php endforeach; ?>
    </div>
    <?php foreach($category as $rows): ?>
    <div id="<?=$rows['c_id']?>" class="tab-pane fade">
      <?php 
      $id=$rows['c_id']; 
      $data=$this->Mymodel->get_product('product', 'c_id', $id)->result_array();
        foreach($data as $pro):
       ?>
       <div class="col-sm-2 col-xs-4"><button class="btn btn-default pick" id="<?=$pro['p_code']?>"><?=$pro['p_name']?></button></div>
     <?php endforeach; ?>
    </div>
    <?php endforeach; ?>
  </div>
		
		</div><!-- end col -->
	</div><!-- end row -->
</div><!-- end container -->
<form id='user_view_form1'>
<input type="hidden" name="id" value="" id="id">
</form>
<script type="text/javascript">
  var del_id=1;
  var total=0;
  var alldata=[];
  $(document).ready(function(e){
$('.pick').click(function(e){
  document.getElementById("id").value=this.id;
  var id=$('#id').val();

$.ajax({
       type: 'POST',
        data: {'<?=$this->security->get_csrf_token_name()?>' : '<?=$this->security->get_csrf_hash()?>', id: id},
        url:'<?php echo base_url("testing/do_pick/"); ?>',
        dataType: "json",
       success: function(data){
            var trHTML = '';
            trHTML += '<tr><td>' + 1+ '</td><td>' + data[0].p_name+ '</td><td>' + data[0].p_price+'</td><td><button class="delBtn">'+del_id+ '</button></td></tr>';
            del_id++;
            alldata.push(data[0].p_code);
            var price=data[0].p_price;
            total+=parseFloat(price);
        $('#tbody').append(trHTML);
        $('.pick_price').html(total);
        console.log(total);
       },
       error: function(data){ 
       	alert('fail');
       }
   });
   e.preventDefault(); 
 });
 });
  
  $(document).ready(function(){
    $('.pay').click(function(){
      var jsonString = JSON.stringify(alldata);
     if(alldata.length==0){
       /* window.location.href="<?php echo base_url('sale'); ?>"*/
      alert('Product is empty');
     }else{
       $.ajax({
        type:'POST',
      data:{total: total, pick_array:jsonString},
      url:'<?php echo base_url("testing/do_sale") ?>',
      success:function(data){
       window.location.href="<?php echo base_url('check_pay'); ?>";
      },
      error:function(){
        alert('fail');
      }
    });
     }
    });
  });
  function Print(){
    window.print();
  }
 $(document).ready(function(){
  $('.canc_btn').click(function(){
    $('#tbody').empty();
    $('.pick_price').empty();
  });
 });
</script>
