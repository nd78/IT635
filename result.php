



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
h3{
    color: red;
    font-size: 20px;
    font-weight: bold;
    text-align: left;
   

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
 
table, td, th {
    border: 1px solid black;
}

table {
    border-collapse: collapse;
    width: 130%;
}


th, td {
    text-align: left;
    padding: 8px;
    height: 50px;
    vertical-align: bottom;
}

tr:nth-child(even){background-color: #f2f2f2}
</style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Donor Information</title>

   

    <h1>Total Donors</h1>
    <?php include 'header.php'; //This is our navigation bar?>


</head>
<body>
    <!--Name,Last Name,ID,Blood Group, Age, City, Phone, Email, Date, Bank Name, Bank Location,
     Contact Information,Bank Phone Number, Bank Email, Blood Testing Status, Blood Status)  -->
<?php
    
    session_start();

    
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    if (!$conn) {
      die('Could not connect: ' . mysqli_error($conn));
    }
    
    
    $sql = "SELECT * FROM `Donors`";

    
    $retval = mysqli_query($conn, $sql);
    if (!$retval) {

      die('Could not enter data: ' . mysqli_error($conn));

    } else {

        //echo "Entered data successfully\n";

        $table =  '<table style="width:120%;">
                      <tr>
                        <th style="text-align: left">Name</th>
                        <th style="text-align: left">Last Name</th> 
                        <th style="text-align: left">ID</th>
                        <th style="text-align: left">Blood Group</th>
                        <th style="text-align: left">Age</th>
                        <th style="text-align: left">City</th>
                        <th style="text-align: left">Phone</th>
                        <th style="text-align: left">Email</th>
                        <th style="text-align: left">Date</th> 
                        <th style="text-align: left">Bank Name</th>
                        <th style="text-align: left">Bank City</th>
                        <th style="text-align: left">Bank Phone Number</th>
                        <th style="text-align: left">Contact Information</th>
                        <th style="text-align: left">Bank Email</th>
                        <th style="text-align: left">Blood Testing Status</th>
                        <th style="text-align: left">Blood Status</th>
                  </tr>';

        echo $table;

        while ($row = $retval->fetch_assoc()){

            echo  '<tr align="left">' . 
                    '<td>' . $row["Name"] .'</td>' .  
                    '<td>' . $row["Last Name"] . '</td>' . 
                    '<td>'.  $row["ID"] . '</td>' . 
                    '<td>' . $row['Blood Group'] . '</td>'  . 
                    '<td>' . $row['Age'] . '</td>'  .
                    '<td>' . $row['City'] . '</td>'. 
                    '<td>' . $row['Phone'] . '</td>' .
                    '<td>' . $row["Email"] .'</td>' .  
                    '<td>' . $row["Date"] . '</td>' . 
                    '<td>'.  $row["Bank Name"] . '</td>' . 
                    '<td>' . $row['Bank City'] . '</td>'  . 
                    '<td>' . $row['Bank Phone Number'] . '</td>'  .
                    '<td>' . $row['Contact Information'] . '</td>'. 
                    '<td>' . $row['Bank Email'] . '</td>' .
                    '<td>' . $row['Blood Testing Status'] . '</td>'. 
                    '<td>' . $row['Blood Status'] . '</td>' .
                '</tr>' ;
            }

            echo '</table>' ;

        }

    /*  
        order by city A-Z (asc/desc)

        Sort by testing status (asc/desc)

    */  
        $sql = "SELECT `Blood Group` FROM `Donors` WHERE `Blood Group`='A+'";
        $sql1 = "SELECT `Blood Group` FROM `Donors` WHERE `Blood Group`='A-'";
        $sql2 = "SELECT `Blood Group` FROM `Donors` WHERE `Blood Group`='B+'";
        $sql3 = "SELECT `Blood Group` FROM `Donors` WHERE `Blood Group`='B-'";
        $sql4 = "SELECT `Blood Group` FROM `Donors` WHERE `Blood Group`='AB+'";
        $sql5 = "SELECT `Blood Group` FROM `Donors` WHERE `Blood Group`='AB-'";
        $sql6 = "SELECT `Blood Group` FROM `Donors` WHERE `Blood Group`='O+'";
        $sql7 = "SELECT `Blood Group` FROM `Donors` WHERE `Blood Group`='O-'";

        $retval = mysqli_query($conn, $sql);
        $retval1 = mysqli_query($conn, $sql1);
        $retval2 = mysqli_query($conn, $sql2);
        $retval3 = mysqli_query($conn, $sql3);
        $retval4 = mysqli_query($conn, $sql4);
        $retval5 = mysqli_query($conn, $sql5);
        $retval6 = mysqli_query($conn, $sql6);
        $retval7 = mysqli_query($conn, $sql7);

    
        $num_rows = mysqli_num_rows($retval);
        $num_rows1 = mysqli_num_rows($retval1);
        $num_rows2 = mysqli_num_rows($retval2);
        $num_rows3 = mysqli_num_rows($retval3);
        $num_rows4 = mysqli_num_rows($retval4);
        $num_rows5 = mysqli_num_rows($retval5);
        $num_rows6 = mysqli_num_rows($retval6);
        $num_rows7 = mysqli_num_rows($retval7); 

        /* This is an stadistic by bloodtype*/
        
        echo '<h3>Statistics</h3> 
                <h4> Total by  bloodtype</h4>
            <p> ';

            echo 
                'A+:'. $num_rows .'<br>'.
                'A-:'. $num_rows1 . '<br>'.
                'B+:' . $num_rows2 . '<br>'.
                'B-:' . $num_rows3 . '<br>'.
                'O+:' . $num_rows6 . '<br>'.
                'O-:' . $num_rows7 . '<br>'.
                'AB+:'. $num_rows4 . '<br>'.
                'AB-:'. $num_rows5 . '<br>'.
                
             '</p>';
        

     ?>
    


</form>
</body>
</html>
