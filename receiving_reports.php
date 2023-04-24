<?php include 'db_connect.php' ?>
<div class="container-fluid">
	<div class="col-lg-12">
		<div class="row mt-3">
			<div class="col-md-12">
				<ul class="nav nav-tabs" role="tablist">
				<li class="nav-item">
				  <a class="nav-link "  href="index.php?page=reports">Sales Reports</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link active" href="index.php?page=receiving_reports">Receiving Report</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="index.php?page=inventory_reports">Inventory Reports</a>
				</li>
			  </ul>

				<div class="card">
					<div class="card-header custom-header">
						<h4><b>Receiving Report</b></h4>
					</div>
					<div class="card-body">
						<table class=" table-bordered" id="table_id">
							<thead>
								<th class="text-center">#</th>
								<th class="text-center">Product Name</th>
								<th class="text-center">Quantity</th>
								<th class="text-center">Date & Time Received</th>
							</thead>
							<tbody>
							<?php 
								$i = 1;
								$product = $conn->query("SELECT a.* , b.* FROM inventory a left join product_list b on a.product_id = b.id where a.type =1  order by date_updated asc");
								while($row = $product->fetch_assoc()):
								
							?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									<td class=""><?php echo $row['name'] ?></td>
									<td class=""><?php echo $row['qty'] ?></td>
									<td class=""><?php echo $row['date_updated'] ?></td>
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

<style>
	.custom-header{
		background-color: #525252 !important;
		color: #fff;
	}
</style>


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