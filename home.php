<style>
	.custom-header{
		background-color: #525252 !important;
		color: #fff;
	}
	.sales-button {
		display: flex;
		justify-content: flex-start; 
	}
</style>

<div class="containe-fluid">

	<div class="row">
		<div class="col-lg-12">
			
		</div>
	</div>

	<div class="row mt-3 ml-3 mr-3">
			<div class="col-lg-12">
			<div class="card">
				<div class="card-header custom-header">
					<h4>
						<b>Dashboard</b>
					</h4>
				</div>
				<div class="card-body">
				<?php echo "Welcome back ".$_SESSION['login_name']."!"  ?>
									
				</div>
				
				<hr>
				<div class="alert alert-success col-md-12 ml-12">
				<ul class="nav nav-pills mb-3" role="tablist">
						<?php  if($_GET['data']=='daily'){
							    $daily = "active";
						      } if($_GET['data']=='weekly'){
							   $weekly = "active";
						      } if($_GET['data']=='monthly'){
							   $monthly = "active";
							  }  if($_GET['data']=='yearly'){
							   $yearly = "active";
							  } ?>
                      <li class="nav-item">
                        <a
						  href="index.php?page=home&data=daily" 
                          type="button"
                          class="nav-link <?php echo $daily;?>"
                        >
                          DAILY
                        </a>
                      </li>
                      <li class="nav-item">
                        <a
						  href="index.php?page=home&data=weekly" 
                          type="button"
                          class="nav-link  <?php echo $weekly;?>"
                        >
                        WEEKLY
                        </a>
                      </li>  
					  <li class="nav-item">
                        <a
						  href="index.php?page=home&data=monthly" 
                          type="button"
                          class="nav-link  <?php echo $monthly;?>"
                        >
                       MONTHLY
                        </a>
                      </li> 
					  <li class="nav-item">
                        <a
						  href="index.php?page=home&data=yearly" 
                          type="button"
                          class="nav-link  <?php echo $yearly;?>"
                        >
                       YEARLY
                        </a>
                      </li>
                     
                    </ul>
				<?php if($_GET['data']=='daily'){?>
						 <div id="container-daily"></div>
						<?php }  if($_GET['data']=='weekly'){?>
						 <div id="container-weekly"></div>
						<?php }  if($_GET['data']=='monthly'){?>
						 <div id="container-monthly"></div>
						<?php }  if($_GET['data']=='yearly'){?>
						 <div id="container-yearly"></div>
						<?php } ?>
				</div>
				<div>
					
				</div>
				</div>
              </div>
		</div>
	</div>

</div>
<script>
	$('#sales').click(function(){
		location.href = "index.php?page=sales"
	})
</script>