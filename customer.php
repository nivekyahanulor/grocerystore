<?php include('db_connect.php');?>

<div class="container-fluid">
	<div class="col-lg-12">
		<div class="row mt-3">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header custom-header">
						<h4>
							<b>Customer</b>
						</h4>
					</div>
				</div>
			<div class="row">
			<!-- FORM Panel -->
			<div class="col-md-4">
			<form action="" id="manage-customer">
				<div class="card">
					<div class= "row justify-content-center card-body">
						<h5>
							<b>Save New Customer</b>
						</h5>
					</div>
					<div class="card-body">
						    Customer Form
				  	</div>
					<div class="card-body">
							<input type="hidden" name="id">
							<div class="form-group">
								<label class="control-label">Customer Name</label>
								<input type="text" class="form-control" name="cname">
							</div>
							<div class="form-group">
								<label class="control-label">Contact</label>
								<input type="text" class="form-control" name="contact">
							</div>
							<div class="form-group">
								<label class="control-label">Address</label>
								<textarea class="form-control" cols="30" rows="3" name="address"></textarea>
							</div>
							
					</div>
							
					<div class="card-footer">
						<div class="row">
							<div class="col-md-12">
								<button class="btn btn-sm btn-primary col-sm-3 offset-md-3"> Save</button>
								<button class="btn btn-sm btn-default col-sm-3" type="button" onclick="$('#manage-customer').get(0).reset()"> Cancel</button>
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
							  <b>Customer List</b>
						  </h5>
					  </div>
					<div class="card-body">
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">Customer</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								$customer = $conn->query("SELECT * FROM customer_list order by id asc");
								while($row=$customer->fetch_assoc()):
								?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									<td class="">
										<p>Name : <b><?php echo $row['name'] ?></b></p>
										<p><small>Contact : <b><?php echo $row['contact'] ?></b></small></p>
										<p><small>Address : <b><?php echo $row['address'] ?></b></small></p>
										<p><small>Date Added : <b><?php echo $row['date_addedd'] ?></b></small></p>
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
</div>

<style>
	
	td{
		vertical-align: middle !important;
	}
	td p{
		margin:unset;
	}.custom-header{
		background-color: #525252 !important;
		color: #fff;
	}
</style>
<script>
	
	$('#manage-customer').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_customer',
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
	$('.edit_customer').click(function(){
		start_load()
		var cat = $('#manage-customer')
		cat.get(0).reset()
		cat.find("[name='id']").val($(this).attr('data-id'))
		cat.find("[name='name']").val($(this).attr('data-name'))
		cat.find("[name='contact']").val($(this).attr('data-contact'))
		cat.find("[name='address']").val($(this).attr('data-address'))
		end_load()
	})
	$('.delete_customer').click(function(){
		_conf("Are you sure to delete this customer?","delete_customer",[$(this).attr('data-id')])
	})
	function delete_customer($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_customer',
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