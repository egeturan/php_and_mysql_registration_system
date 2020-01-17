<html>
    <head>
        <title>Apply Page</title>
        <link rel="stylesheet" href="style.css">
    
    </head>
<body>

<?php


session_start();
$studentId =  $_SESSION['str'];
$studentN = $_SESSION['strN'];
$compId = $_POST['companyID'];
$current = $_GET['current'];

//mysql_close($conn);
echo "<h2>Apply Result for " . $studentId  . " and company id " . $compId  . " is: </h2> ";


//echo $studentId . "    " . $compId;

$dbhost = 'dijkstra.ug.bcc.bilkent.edu.tr';
$dbuser = 'ege.turan';
$dbpass = 'WmJbtJdT';

$conn = mysql_connect($dbhost, $dbuser, $dbpass);

if(! $conn ) {
   die('Could not connect: ' . mysql_error());
}


if($current != 0){

$sql = 'SELECT * FROM Apply';
 
 mysql_select_db('ege_turan');
 $retval = mysql_query( $sql, $conn );
 if(! $retval ) {
    die('Could not get data: ' . mysql_error());
 }

$numberOfThatID = 0;
$boolIsValid = 0;


 while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
    if($row['CID'] == $compId){
        $numberOfThatID = $numberOfThatID + 1;
    }

    if($row['CID'] == $compId && $row['SID'] == $studentId){
        $boolIsValid = 9;
        break;
    }
  }

  $sql = 'SELECT * FROM Company';
  mysql_select_db('ege_turan');
  $retval = mysql_query( $sql, $conn );


  if($boolIsValid != 9){

  $quota = 0;
  while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
    if($row['CID'] == $compId){
        $quota = $row['QUOTA'];
        break;
    }
  }
  

  //echo "   " .  $quota;

  if($numberOfThatID < $quota){
    $sql = "INSERT INTO Apply (SID, CID) VALUES ('{$studentId}', '{$compId}')";
    mysql_select_db('ege_turan');
    $retval = mysql_query( $sql, $conn );
    if(! $retval ) {
        die('Could not get data: ' . mysql_error());
     }else{
       echo "<h2>Adding is completed</h2>";
       $remainingQuota = $quota - $numberOfThatID - 1;
       echo "Remaining quota is: " . $remainingQuota;
      // echo "Remaining quota for " . $compId . " " . $quota - $numberOfThatID . " <br>";
       
      // echo "<h2> Remaining quota for company id " . $compId " is: "   . $remainingQuota . " </h2>";
      }
    
  }else{
      echo "<h2>QUOTA is reached </h2>";
      echo "<h2>Unsuccessful adding </h2>";
  }

}else{
  echo "<h2>This student is already applied for this company  </h2>";
  echo "<h2> Unsuccessful adding operation </h2>";
}

}else{
    
$sql = 'SELECT * FROM Apply';
 
mysql_select_db('ege_turan');
$retval = mysql_query( $sql, $conn );
if(! $retval ) {
   die('Could not get data: ' . mysql_error());
}

$numberOfThatID = 0;
$boolIsValid = 0;

while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
    if($row['CID'] == $compId){
      $numberOfThatID = $numberOfThatID + 1;
    }
}

//echo $numberOfThatID;


$sql = 'SELECT * FROM Company';
mysql_select_db('ege_turan');
$retval = mysql_query( $sql, $conn );

$quota = 0;
while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
  if($row['CID'] == $compId){
      $quota = $row['QUOTA'];
      break;
  }
}

//echo "quota is:  " . $quota;

if($numberOfThatID < $quota){


    $sql = "INSERT INTO Apply (SID, CID) VALUES ('{$studentId}', '{$compId}')";
    mysql_select_db('ege_turan');
    $retval = mysql_query( $sql, $conn );

    if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }else{
     echo "<h2>Adding is completed</h2>";
 
    }

  }else{
    echo "<h2>Quota is reached thus apply is not completed </h2>";
    }

}

  /*




}

}

*/

?>


<script>
        function myFunction()
        {
          console.log("func called");
          var studentID = "<?php echo $studentId ?>";
          var studentName = "<?php echo $studentN ?>";
            window.location.replace("welcome.php?x=" + studentName + "&y=" + studentID);
        }
        </script>

<button onclick="myFunction()">Turn Back to Welcome Page</button>

</body>
</html>

