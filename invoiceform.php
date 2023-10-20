<?php 
include('templates/connect.php');
//declare empty variables to store the inputs
$customer_name ='';
$product_name ='';
$quantity_purchased='';
$stock_value='';
$total_cost= '';


//check if the submit button is clicked
if(isset($_POST['submit'])){
    //take record of the inputs
    $customer_name=$_POST['customer_name'];
    $product_name=$_POST['product_name'];
    $quantity_purchased=$_POST['quantity_purchased'];

    //Get Unit price 
    $select="SELECT `unit_price` FROM `inventory_tb` WHERE product_name='$product_name'";
    $send=mysqli_query($connect,$select);
    $getresult=mysqli_fetch_assoc($send);
    $unit =  $getresult['unit_price'];
    
    //Calculate total cost
    $total = $unit * $quantity_purchased;

    //write query
    $save_query="INSERT INTO invoice_tb(`customer_name`, `product_name`, `quantity_purchased`,`total_cost`) VALUES ('$customer_name','$product_name','$quantity_purchased','$total')";

    $send_to_server = mysqli_query($connect, $save_query);

    $select="SELECT `quantity_instock` FROM `inventory_tb` WHERE product_name='$product_name'";
    $send=mysqli_query($connect,$select);
    $getresult=mysqli_fetch_assoc($send);
    
    
    $quantity_in_stock=$getresult['quantity_instock'];
    $new_quantityinstock=$quantity_in_stock - $quantity_purchased;
    
    //print_r($new_quantityinstock);

    $update="UPDATE `inventory_tb` SET `quantity_instock`='$new_quantityinstock' WHERE product_name='$product_name'";
    $send1=mysqli_query($connect,$update);
    // $result1=mysqli_fetch_assoc($send1);
    

  



    //check if query data was sent to db
     
if($send_to_server){
    header('Location: viewinvoices.php');
} else {
    echo 'Error to save data' . mysqli_error(($connect));
}
}


//Start a session
session_start();

//Redirect to login page if they try to access landing page
if(!$_SESSION['username']){
    header('Location: login.php');
}
mysqli_close($connect);
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>invoice</title>
    <link rel="stylesheet" href="css/materialize.css">
    <style>
    .container{
        border: 5px black solid;
        background-color: grey;
        margin-top: 50px;
        padding-top: 10px;
    }
    </style>
</head>
<body>
    <a href="inventorytable.php" class="btn grey black-text">back</a>
    <a href="logout.php" class="btn grey black-text right">Logout</a>
    <br>
<div class="container center-align">
    <img src="img/logo.jpg" width="100vw">
    <h1 class="black white-text">INVOICE FORM</h1>
    <div class="row">
        <div class="col s12">
            <form action="invoiceform.php" method="POST">
               <div class="col s12 input-field black-text">
                    <input type="text" name='customer_name' required id="customer_name">
                    <label for="customer_name" class="black-text">CUSTOMER NAME:</label>
                </div>
                <div class="col s12 input-field black-text">
                    <input type="text" name="product_name" required id="product_name">
                    <label for="product_name" class="black-text">PRODUCT NAME:</label>
                </div>
                <div class="col s12 input-field black-text">
                    <input type="number" name='quantity_purchased' required id="quantity_purchased">
                    <label for="quantity_purchased" class="black-text">PRODUCT QUANTITY:</label>
                </div>
                <input type="submit" name='submit' id="submit" required value="submit" class=" btn black white-text">
                </div>
            </form>
        </div>
    </div>
 
<script src="js/jquery.js"></script>
<script src="js/materialize.js"></script> 
<script>
    $(document).ready(function(){
    });
</script>
</body>
<?php include('templates/footer.php') ?>
</html>