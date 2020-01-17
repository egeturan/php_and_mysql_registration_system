<html>
   
<head>

</head>

<script>
function myFunction()
{
   window.location.replace("index.php");
}
</script>

<?php
   $dbhost = 'dijkstra.ug.bcc.bilkent.edu.tr';
   $dbuser = 'ege.turan';
   $dbpass = 'WmJbtJdT';
   
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }

    $sql = 'SELECT SID, SNAME, BDATE, SCITY, YEAR, GPA  FROM Student';
    mysql_select_db('ege_turan');
    $retval = mysql_query( $sql, $conn );
    if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }
   
   $auth = 0;

   while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {   
        $out1 = "";
        if(strtolower($_POST["userName"]) == strtolower($row['SNAME']) && strtolower($_POST["userID"]) == strtolower($row['SID'])){  //make them lowercase
            $auth = 1;
            $out1 = $out1 . "?x=";
            $out1 = $out1 . $row['SNAME'];
            $out1 = $out1 . "&y=";
            $out1 = $out1 . $row['SID'];
            $out2 = "Location:welcome.php" . $out1; 
            echo "out is: " . $out2;
            header($out2);
        }

   }

   mysql_close($conn);

   if($auth == 0){
      echo "Invalid Password <br>";
   }
   
  
 
?>


<body>
<button onclick="myFunction()">ReSign-In</button>

</body>

</html>