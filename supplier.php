<?php include('db_connect.php');?>

<div class="container-fluid">
	<div class="col-lg-12">
		<div class="row mt-3">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header custom-header">
						<h4>
							<b>Supplier</b>
						</h4>
					</div>
			</div>
			<div class="row">
			<!-- FORM Panel -->
			<div class="col-md-4">
			<form action="" id="manage-supplier">
				<div class="card">
					<div class="row justify-content-center card-body">
						<h5>
							<b>Save New Supplier</b>
						</h5>
					</div>
					<div class="card-body">
						    Supplier Form
				  	</div>
					<div class="card-body">
							<input type="hidden" name="id">
							<div class="form-group">
								<label class="control-label">Supplier</label>
								<input type="text" class="form-control" name="name">
							</div>
							
					</div>
					<div class="card-body">
							<div class="form-group">
								<label class="control-label">Contact</label>
								<input type="text" class="form-control" name="contact">
							</div>
					</div>
					<div class="card-body">
							<div class="form-group">
								<label class="control-label">Address</label>
								<textarea class="form-control" cols="30" rows="3" name="address"></textarea>
							</div>
					</div>
					<div class="card-body">
							<div class="form-group">
								<label class="control-label">Product</label>
								<input type="text" class="form-control" name="product">
							</div>
					</div>
					<div class="card-body">
							<div class="form-group">
								<label class="control-label">Amount</label>
								<input type="text" class="form-control" name="amount">
							</div>
					</div>
					<div class="card-body">
							<div class="form-group">
								<label class="control-label">Delivery Date</label>
								<input type="datetime-local" class="form-control" name="deliv_date">
							</div>
					</div>
							
					<div class="card-footer">
						<div class="row">
							<div class="col-md-12">
								<button class="btn btn-sm btn-primary col-sm-3 offset-md-3"> Save</button>
								<button class="btn btn-sm btn-default col-sm-3" type="button" onclick="$('#manage-supplier').get(0).reset()"> Cancel</button>
							</div>
						</div>
					</div>
				</div>
			</form>
			</div>
			<!-- FORM Panel -->

			<!-- Table Panel -->
			<div class="col-md-8">
				<div class="card">
					<div class="row justify-content-center card-body">
						<h5>
							<b>Supplier List</b>
						</h5>
					</div>
					<div class="card-body">
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">Supplier Info</th>
									
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								$cats = $conn->query("SELECT * FROM supplier_list order by id asc");
								while($row=$cats->fetch_assoc()):
								?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									<td class="">
										<p>Name : <b><?php echo $row['supplier_name'] ?></b></p>
										<p><small>Contact : <b><?php echo $row['contact'] ?></b></small></p>
										<p><small>Address : <b><?php echo $row['address'] ?></b></small></p>
										<p><small>Product : <b><?php echo $row['product'] ?></b></small></p>
										<p><small>Amount : <b><?php echo $row['amount'] ?></b></small></p>
										<p><small>Delivery Date : <b><?php 
										echo $row['deliv_date'];
										?></b></small></p>
										<p><small>Date Added : <b><?php 
										echo $row['date_added'];
										?></b></small></p>
									</td>
									
								</tr>
								<?php endwhile; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- Table Panel -->
		</div>
		</div>
		</div>
	</div>	

</div>
<style>
	
	td{
		vertical-align: middle !important;
	}
	td p{
		margin:unset;
	}
	.custom-header{
		background-color: #525252 !important;
		color: #fff;
	}
</style>
<script>
	
	$('#manage-supplier').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_supplier',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully added",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
				else if(resp==2){
					alert_toast("Data successfully updated",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	})
	$('.edit_supplier').click(function(){
		start_load()
		var cat = $('#manage-supplier')
		cat.get(0).reset()
		cat.find("[name='id']").val($(this).attr('data-id'))
		cat.find("[name='name']").val($(this).attr('data-name'))
		cat.find("[name='contact']").val($(this).attr('data-contact'))
		cat.find("[name='address']").val($(this).attr('data-address'))
		cat.find("[name='product']").val($(this).attr('data-product'))
		cat.find("[name='amount']").val($(this).attr('data-amount'))
		cat.find("[name='deliv_date']").val($(this).attr('data-deliv_date'))
		end_load()
	})
	$('.delete_supplier').click(function(){
		_conf("Are you sure to delete this supplier?","delete_supplier",[$(this).attr('data-id')])
	})
	function delete_supplier($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_supplier',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>