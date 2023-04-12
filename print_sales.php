<div id="invoice-POS">
    
    <center id="top">
      <div class="logo"></div>
      <div class="info"> 
        <h2>One Eighty Rice and Grocery Supply</h2>
      </div><!--End Info-->
    </center><!--End InvoiceTop-->
    
    <div id="mid">
      <div class="info">
        <h2>Contact Info</h2>
		<!-- <?php include('db_connect.php');
		$item = $conn->query("SELECT * FROM inventory WHERE form_id = " .$_GET['id']);
		 print_r($item->fetch_array());?> -->
        <p> 
            Address : 15 Urbano Velasco Ave, Pasig, 1602 Metro Manila</br>
            Email   : one80@gmail.com</br>
            Phone   : 09167516933</br>
        </p>
      </div>
    </div><!--End Invoice Mid-->
    
    <div id="bot">

					<div id="table">
						<table>
							<tr class="tabletitle">
								<td class="item"><h5><b>Item</b></h5></td>
								<td class="Hours" style="padding: 0 20px"><h5><b>Quantity</b></h5></td>
								<td class="Rate" ><h5><b> Vat </b></h5></td>
								<td class="Rate" ><h5><b> Total</b></h5></td>
							</tr>

							<?php
								include('db_connect.php');
								$item = $conn->query("SELECT * FROM inventory WHERE form_id = " .$_GET['id']);								
								while($row=$item->fetch_assoc()):
									$data = $conn->query("SELECT * FROM product_list WHERE id = " .$row['product_id']);
									$product = $data->fetch_assoc();
									$subtotal = $product['price']*$row['qty'];
									$refno = str_replace("Stock out from Sales-","",$row['remarks']);
									$saledata = $conn->query("SELECT * FROM sales_list WHERE ref_no = " .$refno);
									$sale = $saledata->fetch_assoc();
							?>
							
							<tr class="service">
								<td class="tableitem"><p class="itemtext"><?php echo $product['name'] ?></p></td>
								<td class="tableitem" style="padding: 0 20px"><p class="itemtext"><?php echo $row['qty'] ?></p></td>
								<td class="tableitem"><p class="itemtext"><?php echo $new_width = (12 / 100) * $subtotal; ?></p></td>
								<td class="tableitem"><p class="itemtext"><?php echo $subtotal ?></p></td>
							</tr>
							<?php endwhile; ?>

							<tr class="tabletitle">
								<td></td>
								<td></td>
								<td class="Rate"><h5>Total:</h5></td>
								<td class="payment"><h6><b>₱ <?php echo $sale['total_amount'] ?></b></h6></td>
							</tr>

						</table>
					</div><!--End Table-->

					<div>
						<p>Reference No: <strong><?php echo $refno ?></strong></p>
					</div>

					<div>
						<p>Date: 
							<strong>
							<?php
								echo date("m-d-Y h:i:sa");
							?>
							</strong>
						</p>
					</div>

					<div>
						<img src="assets/qr.jpg" class="qr_img"></img>
					</div>

				</div><!--End InvoiceBot-->
  </div><!--End Invoice-->



<style>
	.qr_img{
		height:350px;
		width:250px;
		display: block;
		margin-left: auto;
		margin-right: auto;
		margin-top: 50px; 
	}


	#invoice-POS{
  box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
  padding:2mm;
  margin: 0 auto;
  width: 100mm;
  background: #FFF;
  
  
::selection {background: #f31544; color: #FFF;}
::moz-selection {background: #f31544; color: #FFF;}
h1{
  font-size: 1.5em;
  color: #222;
}
h2{font-size: .9em;}
h3{
  font-size: 1.2em;
  font-weight: 300;
  line-height: 2em;
}

p{
  font-size: .7em;
  color: #666;
  line-height: 1.2em;
}
 
#top, #mid,#bot{ /* Targets all id with 'col-' */
  border-bottom: 1px solid #EEE;
}

#top{min-height: 100px;}
#mid{min-height: 80px;} 
#bot{ min-height: 50px;}

#top .logo{
  //float: left;
	height: 60px;
	width: 60px;
	background: url(http://michaeltruong.ca/images/logo1.png) no-repeat;
	background-size: 60px 60px;
}
.clientlogo{
  float: left;
	height: 60px;
	width: 60px;
	background: url(http://michaeltruong.ca/images/client.jpg) no-repeat;
	background-size: 60px 60px;
  border-radius: 50px;
}
.info{
  display: block;
  //float:left;
  margin-left: 0;
}
.title{
  float: right;
}
.title p{text-align: right;} 
table{
  width: 100%;
  border-collapse: collapse;
}
td{
  //padding: 5px 0 5px 15px;
  //border: 1px solid #EEE;
  width: 20px;
}
.tabletitle{
  //padding-left: 5px;
  font-size: .5em;
  background: #EEE;
}
.service{
	border-bottom: 1px solid #EEE;
}
.item{width: 24mm;}
.itemtext{font-size: .5em;}

#legalcopy{
  margin-top: 5mm;
}
  
}
</style>