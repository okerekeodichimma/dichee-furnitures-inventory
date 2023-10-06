<?php
//COnnect to database
include('templates/connect.php');


    //write the query
    $select_single_data = "SELECT * FROM `invoice_tb`";
    
    //send query to db
    $send_query = mysqli_query($connect, $select_single_data);

    // store result as associative array

    $furnitures= mysqli_fetch_all($send_query,MYSQLI_ASSOC);

    //close the connection
    mysqli_close($connect);

    //print_r($furnitures);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>viewinvoices</title>
    <link rel="stylesheet" href="css/materialize.css">
</head>
<body>
<div class="right">
    <a href="logout.php"><button>logout</button></a>
</div>

    <h2 class="center-align">INVOICES</h2>
    <div class="container grey">
        <table class="stripped">
            <thead >
                <tr>
                    <th>S/N</th>
                    <th>CUSTOMER NAME</th>
                    <th>PRODUCT NAME</th>
                    <th>QUANTITY PURCHASED</th>
                    
                </tr>
            </thead>
            <?php foreach ($furnitures as $furniture){?>
            <tbody>
                <tr>
                    <td><?php echo $furniture['id'] ?></td>
                    <td><?php echo $furniture['customer_name'] ?></td>
                    <td><?php echo $furniture['product_name'] ?></td>
                    <td><?php echo $furniture['quantity_purchased'] ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>
</body>
<?php include('templates/footer.php') ?>
</html>