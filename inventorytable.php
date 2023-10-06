<?php
//COnnect to database
include('templates/connect.php');

    //write the query
    $select_single_data = "SELECT * FROM `inventory_tb` ";

    //send query to db
    $send_query = mysqli_query($connect, $select_single_data);

    //store result as associative array

    $furnitures= mysqli_fetch_all($send_query,MYSQLI_ASSOC);

    //close the connection
    mysqli_close($connect);

    //print_r($furnitures);

    //Start a session
session_start();

//Redirect users to login page if they try to access landing page
if(!$_SESSION['username']){
  header('Location: login.php');
}
?>


    <script>        

        var duration  = ; //10 seconds to milliseconds

        setTimeout(logout, duration);
        
        function logout() {
            // Redirect the user to a logout page 
            alert('Session expired, login again')
            window.location.href = 'logout.php';
        }
  
    </script>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inventory table</title>
    <link rel="stylesheet" href="css/materialize.css">
    <style>
        .buttons{
            text-align:right;
        }
    </style>
</head>

<form action="inventory.php" method="POST" class='right'>
    <input type="submit" value="logout" name="logout" class="btn btn-flat grey black-text">
</form>
<body class='ash'>
<h6>Welcome back <?php echo $_SESSION['username'];?></h6>

    <h2 class="center-align">OUR INVENTORY</h2>
    <div class="container grey ">
        <div class="buttons container grey" >
            <a href="viewinvoices.php"><button>view invoices</button></a>
            <a href="invoiceform.php"><button>create invoice</button></a>
        </div>
        <br>
        <table class="striped">
            <thead >
                <tr>
                    <th>S/N</th>
                    <th>PRODUCT NAME</th>
                    <th>QUANTITY IN STOCK</th>
                    
                </tr>
                
            </thead>
            <tbody>
                <?php foreach ($furnitures as $furniture){?>
                <tr>
                    <td><?php echo $furniture['id'] ?></td>
                    <td><?php echo $furniture['product_name'] ?></td>
                    <td><?php echo $furniture['quantity_instock'] ?></td>
    
                </tr>
                <?php } ?>
            </tbody>
        </table>
        
    </div>
</body>
<?php include('templates/footer.php') ?>
</html>