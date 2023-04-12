<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>One Eighty Rice and Grocery Supply</title>
 	

<?php
	session_start();
  if(!isset($_SESSION['login_id']))
    header('location:login.php');
	include('./header.php'); 
	 include 'db_connect.php' 
 // include('./auth.php'); 
 ?>

</head>
<style>
	body{
        background: #80808045;
  }
  
</style>

<body>
	<?php include 'topbar.php' ?>
	<?php include 'navbar.php' ?>
  <div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-body text-white">
    </div>
  </div>
  <main id="view-panel" >
      <?php $page = isset($_GET['page']) ? $_GET['page'] :'home'; ?>
  	<?php include $page.'.php' ?>
  	

  </main>

  <div id="preloader"></div>
  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

<div class="modal fade" id="confirm_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Confirmation</h5>
      </div>
      <div class="modal-body">
        <div id="delete_content"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='confirm' onclick="">Continue</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="uni_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"></h5>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
      </div>
    </div>
  </div>
</body>
<script>
	 window.start_load = function(){
    $('body').prepend('<di id="preloader2"></di>')
  }
  window.end_load = function(){
    $('#preloader2').fadeOut('fast', function() {
        $(this).remove();
      })
  }

  window.uni_modal = function($title = '' , $url=''){
    start_load()
    $.ajax({
        url:$url,
        error:err=>{
            console.log()
            alert("An error occured")
        },
        success:function(resp){
            if(resp){
                $('#uni_modal .modal-title').html($title)
                $('#uni_modal .modal-body').html(resp)
                $('#uni_modal').modal('show')
                end_load()
            }
        }
    })
}
window._conf = function($msg='',$func='',$params = []){
     $('#confirm_modal #confirm').attr('onclick',$func+"("+$params.join(',')+")")
     $('#confirm_modal .modal-body').html($msg)
     $('#confirm_modal').modal('show')
  }
   window.alert_toast= function($msg = 'TEST',$bg = 'success'){
      $('#alert_toast').removeClass('bg-success')
      $('#alert_toast').removeClass('bg-danger')
      $('#alert_toast').removeClass('bg-info')
      $('#alert_toast').removeClass('bg-warning')

    if($bg == 'success')
      $('#alert_toast').addClass('bg-success')
    if($bg == 'danger')
      $('#alert_toast').addClass('bg-danger')
    if($bg == 'info')
      $('#alert_toast').addClass('bg-info')
    if($bg == 'warning')
      $('#alert_toast').addClass('bg-warning')
    $('#alert_toast .toast-body').html($msg)
    $('#alert_toast').toast({delay:6000}).toast('show');
  }
  $(document).ready(function(){
    $('#preloader').fadeOut('fast', function() {
        $(this).remove();
      })
  })
</script>	

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<?php
	$daily_report = $conn->query("SELECT sum(a.total_amount) total from sales_list a ");
	$dailyres = array();
	while($daily = $daily_report->fetch_object()){ 
		 $dailyres[] = array("name" => "Daily Sales",
							 "y" => $daily->total
						);
	}
	
	$weekly_report = $conn->query("select t.d,price   from 
									( select 'Saturday' as d union all select 'Sunday' 
									union all select 'Monday' union all select 'Tuesday' 
									union all select 'Wednesday' union all select 'Thursday' 
									union all select 'Friday' )t 
									left join ( SELECT DAYNAME(a.date_updated) AS DAY, 
									sum(a.total_amount) price FROM `sales_list` a 
									WHERE  a.date_updated >= DATE(NOW()) - INTERVAL 7 DAY GROUP BY DAY )t1 on t.d=t1.day");
	$weeklyres = array();
	while($weekly = $weekly_report->fetch_object()){ 
		 $weeklyres[] = array("name" => $weekly->d,
							   "y" => $weekly->price
						);
	}
	
	$yearly_report = $conn->query("SELECT   YEAR(a.date_updated) year, sum(a.total_amount)price  from sales_list a 
									 group by  YEAR(a.date_updated)");
	$yearlyres = array();
	while($yearly = $yearly_report->fetch_object()){ 
		 $yearlyres[] = array("name" => $yearly->year,
							   "y" => $yearly->price
						);
	}
	
	$monthly_report = $conn->query("SELECT 
			SUM(IF(month = 'Jan', total, 0)) AS 'Jan', 
			SUM(IF(month = 'Feb', total, 0)) AS 'Feb', 
			SUM(IF(month = 'Mar', total, 0)) AS 'Mar', 
			SUM(IF(month = 'Apr', total, 0)) AS 'Apr', 
			SUM(IF(month = 'May', total, 0)) AS 'May', 
			SUM(IF(month = 'Jun', total, 0)) AS 'Jun', 
			SUM(IF(month = 'Jul', total, 0)) AS 'Jul', 
			SUM(IF(month = 'Aug', total, 0)) AS 'Aug', 
			SUM(IF(month = 'Sep', total, 0)) AS 'Sep', 
			SUM(IF(month = 'Oct', total, 0)) AS 'Oct', 
			SUM(IF(month = 'Nov', total, 0)) AS 'Nov', 
			SUM(IF(month = 'Dec', total, 0)) AS 'Dec' 
			FROM ( SELECT DATE_FORMAT(a.date_updated, '%b') AS month, 
			sum(a.total_amount)total
			from sales_list a 
             WHERE a.date_updated <= NOW() and a.date_updated >= Date_add(Now(),interval - 12 month) 
			GROUP BY DATE_FORMAT(a.date_updated, '%m-%Y')) as sub");
	$row1    = $monthly_report->fetch_assoc();
			foreach($row1 as $val => $res){
					$month[] =  $val;
					$value[] =  $res;
			}
	
	?>
	<script>
	// DAILY
	Highcharts.chart('container-yearly', {
		chart: {
			type: 'column'
		},
		title: {
			align: 'center',
			text: 'Yearly Sales Report'
		},
		accessibility: {
			announceNewData: {
				enabled: true
			}
		},
		xAxis: {
			type: 'category'
		},
		yAxis: {
			title: {
				text: 'Total Sales'
			}

		},
		legend: {
			enabled: false
		},
		plotOptions: {
			series: {
				borderWidth: 0,
				dataLabels: {
					enabled: true,
					format: '{point.y}'
				}
			}
		},

		tooltip: {
			headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
			pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b> of total<br/>'
		},

		series: [
			{
				name: "Browsers",
				colorByPoint: true,
				data: <?php echo json_encode($yearlyres,JSON_NUMERIC_CHECK);?>
			}
		]
	});
  </script>
  <script>
	// DAILY
	Highcharts.chart('container-daily', {
		chart: {
			type: 'column'
		},
		title: {
			align: 'center',
			text: 'Daily Sales Report'
		},
		accessibility: {
			announceNewData: {
				enabled: true
			}
		},
		xAxis: {
			type: 'category'
		},
		yAxis: {
			title: {
				text: 'Total Sales'
			}

		},
		legend: {
			enabled: false
		},
		plotOptions: {
			series: {
				borderWidth: 0,
				dataLabels: {
					enabled: true,
					format: '{point.y}'
				}
			}
		},

		tooltip: {
			headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
			pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b> of total<br/>'
		},

		series: [
			{
				name: "Browsers",
				colorByPoint: true,
				data: <?php echo json_encode($dailyres,JSON_NUMERIC_CHECK);?>
			}
		]
	});
  </script>
  <script>
	//WEEKLY
	
	Highcharts.chart('container-weekly', {
		chart: {
			type: 'column'
		},
		title: {
			align: 'center',
			text: 'Weekly Sales Report'
		},
		accessibility: {
			announceNewData: {
				enabled: true
			}
		},
		xAxis: {
			type: 'category'
		},
		yAxis: {
			title: {
				text: 'Total Sales'
			}

		},
		legend: {
			enabled: false
		},
		plotOptions: {
			series: {
				borderWidth: 0,
				dataLabels: {
					enabled: true,
					format: '{point.y}'
				}
			}
		},

		tooltip: {
			headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
			pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b> of total<br/>'
		},

		series: [
			{
				name: "Day",
				colorByPoint: true,
				data: <?php echo json_encode($weeklyres,JSON_NUMERIC_CHECK);?>
			}
		]
	});

	</script>
	<script>
	Highcharts.chart('container-monthly', {
		chart: {
			type: 'column'
		},
		title: {
			text: 'MONTHLY SALES REPORTS ' + <?php echo date('Y');?>
		},
		subtitle: {
		},
		xAxis: {
			categories: <?php echo json_encode($month);?>
		},
		yAxis: {
			title: {
				text: ' SALES'
			},
			labels: {
				formatter: function () {
					return Highcharts.numberFormat(this.value,0);
				}
			}
		},
		tooltip: {
			crosshairs: true,
			shared: true
		},
	   
		series: [{
			name: 'SALES',
			color: '#0066FF',
			data: <?php echo json_encode($value,JSON_NUMERIC_CHECK);?>

		}]
	});
	</script>
	
</html>