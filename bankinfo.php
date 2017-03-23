<!DOCTYPE html>
<html>

<style>
 body {

        background-color: #ffefef;

     } 
 h1{
    color: red;
    font-size: 50px;
    font-weight: bold;
    text-align: center;
    text-shadow: 4px 3px black;

 }

input[type=text]{
    font-size: 15px;
    border: 1px solid red;
    width: 100%;
    padding: 12px 20px;
    margin: 16px 0;
    display: inline-block;
    border: 3px solid #ccc;
    } 

 input[type=submit] {
    font-family: Arial;
    font-size: 15px;
    font-weight: bold;
    background-color: #FFC0CB;
    color: black;
    padding: 10px 7px;
    border: none;
    cursor: pointer;
    width: 100%;
    text-align: left;

    }
 

</style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blood Bank Information</title>


    <h1>Blood Bank Information </h1>
	
   <?php include 'header.php'; //This is our navigation bar?>
</head>

<body>

    <?php
    
    
    if(isset($_POST['submit'])){
        session_start();

        $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
        if (!$conn) {
          die('Could not connect: ' . mysqli_error($conn));
        }


        $bankname = $_POST['bankname'];
        $bankcity = $_POST['bankcity'];
        $contact = $_POST['contact'];
        $bankphone = $_POST['bankphone'];
        $bemail = $_POST['bemail'];
     

        $_SESSION['bankname'] = $bankname;
        $_SESSION['bankcity'] = $bankcity;
        $_SESSION['contact'] = $contact;
        $_SESSION['bankphone'] = $bankphone;
        $_SESSION['bemail'] = $bemail;
        
       

        $name = $_SESSION['name'];
        $lastname = $_SESSION['lastname'];
        $donarid = $_SESSION['donarid'];
        $age = $_SESSION['age'];
        $city = $_SESSION['city'] ;
        $phone = $_SESSION['phone'];
        $email = $_SESSION['email'];
        $bankname =$_SESSION['bankname'];
        $bankcity = $_SESSION['bankcity'];
        $contact = $_SESSION['contact'];
        $bankphone = $_SESSION['bankphone'];
        $bemail = $_SESSION['bemail'];  
        $bloodgroup = $_SESSION['bloodgroup'];
        $testingstatus = $_SESSION['testingstatus'];
        $bloodstatus = $_SESSION['bloodstatus'];
        $date = $_SESSION['date'];
       
        $sql = "INSERT INTO `Donors` " . 
        "(Name, `Last Name`, ID, `Blood Group`, Age, City, Phone, Email, Date,`Bank Name`, `Bank City`, `Bank Phone Number`, `Contact Information`, `Bank Email`, `Blood Testing Status`, `Blood Status`) " 
        . "VALUES " . 
        "('$name', '$lastname', '$donarid', '$bloodgroup', '$age', '$city', '$phone', '$email', '$date', '$bankname', '$bankcity', '$bankphone', '$contact', '$bemail', '$testingstatus', '$bloodstatus' )";

        
        $retval = mysqli_query($conn, $sql);
        if (!$retval) {
          die('Could not enter data: ' . mysqli_error($conn));
        } 
        echo "Entered data successfully\n";
        mysqli_close($conn);

        header("Location: /result.php"); 
    } 

     ?>

 <form name="myForm" id="BankForm" method="post" action="/bankinfo.php"

                
        <div class="form-group">
         <label for="formInput4">Bank Name:</label>
         <input type="text" class="form-control" id = "bankname" name="bankname" placeholder="Enter Bank Name">
        </div>

        <div class="form-group">
            <label for="formInput4">Bank City:</label>
            <input type="text" class="form-control" id = "bankcity" name="bankcity" placeholder="Enter Bank City">
        </div>
        <div class="form-group">
            <label for="formInput4">Contact Information:</label>
            <input type="text" class="form-control" id = "contact" name="contact" placeholder="Enter Contact Name">
        </div>
        <div class="form-group">
            <label for="formInput4">Bank Phone Number:</label>
            <input type="text" class="form-control" id = "bankphone" name="bankphone" placeholder="Enter Bank Phone#">
        </div>
      
        <div class="form-group">
            <label for="formInput4">Email:</label>
            <input type="text" class="form-control" id = "bemail" name="bemail" placeholder="Enter Email">
        </div>
        

         <input type="submit" name="submit" value="Submit"></input>

 </form>
</body>
</html>