<?php 
include('templates/connect.php');
//declare empty variables to store the inputs
$customer_name ='';
$product_name ='';
$quantity_purchased='';

//check if the submit button is clicked
if(isset($_POST['submit'])){
    $customer_name=$_POST['customer_name'];
    $product_name=$_POST['product_name'];
    $quantity_purchased=$_POST['quantity_purchased'];

//write query
$save_query="INSERT INTO `invoice_tb`(`customer_name`,`product_name`,`quantity_purchased`) VALUES ('$customer_name','$product_name','$quantity_purchased')";

//send query to server
$send_to_server=mysqli_query($connect,$save_query);

//check if the data is savedto db
if($send_to_server){
    header('Location:viewinvoices.php');
}else{
    echo'Error to save data'.mysqli_error(($connect));
}

}
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
<div class="container center-align">
    <img src="img/logo.jpg" width="100vw">
    <h1 class="black white-text">INVOICE FORM</h1>
    <div class="row">
        <div class="col s12">
            <form action="invoiceform.php" method="POST">
               <div class="col s12 input-field black-text">
                    <i class="material-icons prefix">person</i>
                    <input type="text" name='customer_name' required id="customer_name">
                    <label for="customer_name" class="black-text">CUSTOMER NAME:</label>
                </div>
                <div class="col s12 input-field black-text">
                    <i class="material-icons prefix">key</i>
                    <input type="text" name='product_name' required id="product_name">
                    <label for="product_name" class="black-text">PRODUCT NAME:</label>
                </div>
                <div class="col s12 input-field black-text">
                    <i class="material-icons prefix">key</i>
                    <input type="number" name='quantity_purchased' required id="quantity_purchased">
                    <label for="quantity_purchased" class="black-text">PRODUCT QUANTITY:</label>
                </div>
                <input type="submit" name='submit' id="submit" required value="submit" class=" black white-text">
                </div>
            </form>
        </div>
    </div>

   <?php include('templates/footer.php');?> 
<script src="js/jquery.js"></script>
<script src="js/materialize.js"></script> 
<script>
    $(document).ready(function(){
    });
</script>
</body>
<?php include('templates/footer.php') ?>
</html>