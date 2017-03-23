


<!DOCTYPE html>
<html>

    

<style>

h1{
    color: red;
    font-size: 50px;
    font-weight: bold;
    text-align: center;
    text-shadow: 4px 3px black;

}

h2{

   text-shadow: 1px 1px red; 
}

body {

    background-color: #ffefef;

    } 


input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 3px solid #ccc;
   
}

input[type=submit] {
    font-size: 20px;
    font-weight: bold;
    background-color: #FFC0CB;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 25%;

}



span.psw {
    float: right;
    padding-top: 16px;
}


</style>

<head>
    <?php
        if(isset($_POST['login'])){
            $dbhost = 'localhost:3306';
            $dbuser = 'root';
            $dbpass = 'Chocolate21';
            $dbname = 'Blood_Bank';

            $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
            if (!$conn) {
              die('Could not connect: ' . mysqli_error($conn));
            }

            $UserName = $_POST['uname'];
            $Password = $_POST['psw'];
         
          
      
            $sql = "SELECT * FROM user  WHERE `admin` = 1
              AND `username` = '$UserName' AND `password` = '$Password';";

            $retval = mysqli_query($conn, $sql);
            if (mysqli_num_rows($retval)==0) {
              echo "Invalid User\n";
            }
            else{
                session_start();

                $_SESSION['loggedin'] = true;
                header('Location: /donorinfo.php');
                die;
            }
            
            mysqli_close($conn);  

        }


    ?>

</head>
<body>
   
<h1>Blood Bank</h1>

<h2>Admin Login</h2>

<form method="post" action="/login.php">
  
  <div class="container">
    <label><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
        
    <input type="submit" name="login" value="Login"></input>

  </div>



  </div>
</form>

</body>
</html>
