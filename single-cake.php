<!DOCTYPE html>
<html lang="en">
<?php
ini_set('display_errors', '1');
include 'config.php'
?>
<?php
$message ="";
$productID=1;//$_GET['ProductID'];
$UserID=1;
$SupplierName="xyz";
if(isset($_POST['SubmitButton'])){ //check if form was submitted
$price = $_POST['bid']; 
$Comment = $_POST['Comments']; 

$sql_submit_bid = "INSERT INTO `bid` (`UserID`, `ProductID`, `SupplierName`, `Price`, `Comment`) VALUES ('1', '$productID', '$SupplierName', '$price', '$Comment');";
$result_submit_bid = mysql_query($sql_submit_bid);
//get input text
$message = "Bit Successfully Sent";
} 

$sql = "SELECT * FROM bid where ProductID='$productID' ORDER BY `Price`  asc";

$result = mysql_query($sql);


?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CCI Cake Maker - Supplier</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/styles.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

</head>

<body>

    <!-- Navigation -->
    <nav class="text-center" role="navigation">
        <div class="container topnav">
        	<a href="#"><img src="images/logo.png"/></a>
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="content-section-a">

        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                	<div class="text-center">
                    	<img src="images/big.jpg">
                    </div>
                    <div class="comments">
                        <div class="col-xs-8">
                            <form action="single-cake.php" method="post">
                                <div class="form-group">
								<label><?php echo $message; ?></label>
                                	<label>Your Bid</label>
                                	<input name="bid" id="bid" type="text" placeholder="Price" class="form-control">
                                </div>
                                
                                <div class="form-group">
                                	<input name="Comments" id="Comments" type="text" placeholder="Comments" class="form-control">
                                </div>
                                
                                <div class="form-group">
                                	<input name="SubmitButton" id="SubmitButton" type="submit" class="btn btn-info" value="Submit Your Bid">
                                </div>
                            </form>
                        </div>
                        
                        <div class="col-xs-4">
                        	<div class="lowest-bid">
                            	<h4 class="text-right">Lowest Bid</h4>
								<?php
								
								$sql_get_lowest = "SELECT  * FROM bid where ProductID='$productID' ORDER BY `Price`  asc limit 1";
                                $result_get_lowest_bid = mysql_query($sql_get_lowest);
								while($row_get_lowest_bid = mysql_fetch_assoc($result_get_lowest_bid)) {
								?>
                                <h3 class="text-info text-right"><?php echo $row_get_lowest_bid["SupplierName"]?></h3>
                            	<h2 class="text-success text-right"><?php echo $row_get_lowest_bid["Price"]?></h2>
								<?php
								}
								?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="container">
        	<div class="row highlight">
                <div class="col-xs-12">
                	<div class="col-xs-8">
                    	<h5 class="text-info">SUPPLIER NAME</h5>
                    </div>
                    <div class="col-xs-4 text-right">
                    	<h5 class="text-info">BID PRICE</h5>
                    </div>
                </div>
            </div>
            
 <?php

if (mysql_num_rows($result) > 0) 
{
    while($row = mysql_fetch_assoc($result)) {
		?>
		   <div class="row alt">
                <div class="col-xs-12">
                	<div class="col-xs-8">
                    	<p><?php  echo $row["SupplierName"] ?></p>
                    </div>
                    <div class="col-xs-4 text-right">
                    	<p>INR <?php  echo $row["Price"] ?></p>
                    </div>
                </div>
            </div>
		<?php
       
   }
} else {
	?>
	  <div class="row alt">
                <div class="col-xs-12">
                	<div class="col-xs-8">
                    	<p>No Bids Received</p>
                    </div>
                    <div class="col-xs-4 text-right">
                    	<p></p>
                    </div>
                </div>
            </div>
	<?php
    
}

mysql_close($conn);
?>
        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
