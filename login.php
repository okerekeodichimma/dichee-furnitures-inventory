<?php
include('templates/connect.php');
// Connect to Database

//Create blank variables 
$username = '';
$password = '';
$userr ='';
$pswd ='';

//Check if the Login Button is clicked
if(isset($_POST['login'])){

    //Store POST values in a variable
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    //Write SQL query to get login details from the database
    $sql = "SELECT * FROM `login_tb` WHERE username = '$username'";

    //check the username from the input is found on the database
    if(mysqli_num_rows(mysqli_query($connect,$sql))>0){

        //If true, run the query below
        $run = mysqli_query($connect,$sql);

        //Store result in an associative array
        $login_result = mysqli_fetch_all($run,MYSQLI_ASSOC);

        //if username is found, get the password attached to that username
        $login_details = $login_result[0];
        $password = $login_details['password'];

        //Check the rerieved password, if it matches the user input
        if($password == $_POST['password']){

        // If the password matches, Set the sessions     
        session_start();
        $_SESSION['username'] = $login_details['username'];
        $_SESSION['password'] = $login_details['password'];

        //Redirect to landing page 
        header('Location:inventorytable.php');
    } else {

       //if username or password is not found set the error variable and the blank_input values
        $error = 'Check  password';
        $userr = $_POST['username'];
     
        }
    }else {

        //if username or password is not found set the error variable and the blank_input values
         $error = 'Wrong username';
         $userr = $_POST['username'];
         $pswd = $_POST['password'];
         }
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="css/materialize.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        *{
        }
        .container{
            border: 5px black solid;
            background-color: grey;
            margin-top: 50px;
            padding-top: 10px;
        }
        
    </style>
</head>

<body class=" white-text">
    <div class="container center-align">
        <img src="img/logo.jpg" width="100vw">
        <h1 class="black">LOGIN</h1>
        <?php 
        //If the error variable is set from the above code a red-background div should be displayed
            if(isset($error)){?>
                <p class="red-text">
                        <?php
                        // Show error
                        echo $error ; ?>
                </p>
            <?php } ?>
        <div class="row">
            <div class="col s12">
                <form action="login.php" method="POST">
                    <div class="input-field black-text">
                        <i class="material-icons prefix">person</i>
                        <input type="text" name='username' id="username">
                        <label for="username" class="black-text">USERNAME:</label>
                    </div>
                    <div class="input-field black-text">
                        <i class="material-icons prefix">key</i>
                        <input type="password" name='password' id="password">
                        <label for="password" class="black-text">PASSWORD:</label>
                    </div>
                    <div class="center-align">
                    <input type="submit" name="login" value="login" class="btn btn-flat btn-large black white-text">
                    </div>
                </form>
                
            </div>
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