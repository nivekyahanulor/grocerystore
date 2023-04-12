<?php 

?>

<style>
	.new-user-button {
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
							<b>Manage User</b>
						</h4>
					</div>
				
		<div class="row card-body">
		<div class="col-lg-12 new-user-button">
				<button class="btn btn-primary float-right btn-sm" id="new_user"><i class="fa fa-plus"></i> New user</button>
		</div>
		</div>
		<br>
		<div class="row">
		<div class= "col-md-12">
			<div class="card col-lg-12">
				

				
				<div class="card-body">
					<table class="table-striped table-bordered col-md-12">
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th class="text-center">Name</th>
						<th class="text-center">Username</th>
					</tr>
				</thead>
				<tbody>
					<?php
						include 'db_connect.php';
						$users = $conn->query("SELECT * FROM users order by name asc");
						$i = 1;
						while($row= $users->fetch_assoc()):
					?>
					<tr>
						<td>
							<?php echo $i++ ?>
						</td>
						<td>
							<?php echo $row['name'] ?>
						</td>
						<td>
							<?php echo $row['username'] ?>
						</td>
						
										<span class="sr-only">Toggle Dropdown</span>
									</button>
									</div>
									</center>
						</td>
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
</div>
</div>
<script>
	
$('#new_user').click(function(){
	uni_modal('New User','manage_user.php')
})
$('.edit_user').click(function(){
	uni_modal('Edit User','manage_user.php?id='+$(this).attr('data-id'))
})
$('.delete_user').click(function(){
		_conf("Are you sure to delete this user?","delete_user",[$(this).attr('data-id')])
	})
	function delete_user($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_user',
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