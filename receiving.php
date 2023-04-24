<?php include 'db_connect.php' ?>
<style>
	.new-recieving-button {
		display: flex;
		justify-content: flex-start; 
	}

	.custom-header{
		background-color: #525252 !important;
		color: #fff;
	}
</style>
<div class="container-fluid">
	<div class="col-lg-12">
		
		<div class="row mt-3">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header custom-header">
						<h4>
							<b>Recieving</b>
						</h4>
					</div>
					<div class="row card-body">
						<div class="col-md-12 new-recieving-button">
							<button class="col-md-2 float-right btn btn-primary btn-sm" id="new_receiving"><i class="fa fa-plus"></i> New Receiving</button>
						</div>
					</div>
					<div class="card-body">
						<table class=" table-bordered" id="table_id">
							<thead>
								<th class="text-center">#</th>
								<th class="text-center">Date</th>
								<th class="text-center">Expiration</th>
								<!-- <th class="text-center">Product</th> -->
								<th class="text-center">Supplier</th>
								
							</thead>
							<tbody>
							<?php 
								$supplier = $conn->query("SELECT * FROM supplier_list order by supplier_name asc");
								while($row=$supplier->fetch_assoc()):
									$sup_arr[$row['id']] = $row['supplier_name'];
								endwhile;
								$expiration = $conn->query("SELECT * FROM product_list order by exp_date asc");
								while($row=$expiration->fetch_assoc()):
									$exp_arr[$row['id']] = $row['exp_date'];
								endwhile;
								// $product = $conn->query("SELECT * FROM product_list");
								// while($row=$product->fetch_assoc()):
								// 	$pro_arr[$row['id']] = $row['name'];
								// endwhile;
								$i = 1;
								$receiving = $conn->query("SELECT * FROM receiving_list r order by date(date_added) desc");
								while($row=$receiving->fetch_assoc()):
								
							?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									<td class=""><?php echo date("F d, Y",strtotime($row['date_added'])) ?></td>
									<td class=""><?php echo isset($exp_arr[$row['id']])? $exp_arr[$row['id']] :'December 3, 2024' ?></td>
									<!-- <td class=""><?php echo isset($pro_arr[$row['name']])? $pro_arr[$row['id']] :'N/A' ?></td> -->
									<td class=""><?php echo isset($sup_arr[$row['supplier_id']])? $sup_arr[$row['supplier_id']] :'N/A' ?></td>
									
								</tr>
							<?php endwhile; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<script>
	$('table').dataTable()
	$('#new_receiving').click(function(){
		location.href = "index.php?page=manage_receiving"
	})
	$('.delete_receiving').click(function(){
		_conf("Are you sure to delete this data?","delete_receiving",[$(this).attr('data-id')])
	})
	function delete_receiving($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_receiving',
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