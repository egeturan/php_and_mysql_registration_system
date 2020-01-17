<html>
    <head>
        <title>Welcome Page</title>
        <link rel="stylesheet" href="style.css">
    
    </head>
<body>



<?php

//var_dump( $_GET );

echo "<h1>Welcome to the Intership Information page </h1>";
echo "<h2>Username is: {$_GET['x']} <br> UserID is: {$_GET['y']} </h2>";

$dbhost = 'dijkstra.ug.bcc.bilkent.edu.tr';
$dbuser = 'ege.turan';
$dbpass = 'WmJbtJdT';

$conn = mysql_connect($dbhost, $dbuser, $dbpass);

if(! $conn ) {
   die('Could not connect: ' . mysql_error());
}

 $sql = 'SELECT * FROM Student NATURAL JOIN Apply NATURAL JOIN Company';
 
 mysql_select_db('ege_turan');
 $retval = mysql_query( $sql, $conn );
 if(! $retval ) {
   die('Could not get data: ' . mysql_error());
}

session_start();
$str = $_GET['y'];
$strN = $_GET['x'];
$_SESSION['str'] = $str;
$_SESSION['strN'] = $strN;

$link_address = "delete.php";

$output = "";
$count = 0;
while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
  if($_GET['y'] == $row['SID']){
    if($count == 0){
      $link_address = $link_address . "?a={$row['CID']}";
      $output = $output . "<table> 
      <tr>
        <th>CID</th>
        <th>CNAME</th>
        <th>QUOTA</th>
        <th>OPTION</th>
      </tr>
      <tr>
      <td>{$row['CID']}</td>
      <td>{$row['CNAME']}</td>
      <td>{$row['QUOTA']}</td>
      <td><a href='$link_address'>Cancel</a></td>
    </tr>";
      $count = $count  + 1;
      $link_address = "delete.php";
    }
    else if($count > 0){
      $link_address = $link_address . "?a={$row['CID']}";
      $count = $count  + 1;
      $output = $output . "<tr>
      <td>{$row['CID']}</td>
      <td>{$row['CNAME']}</td>
      <td>{$row['QUOTA']}</td>
      <td><a href='$link_address'>Cancel</a></td>
    </tr>";
    $link_address = "delete.php";
    }
   
    
  }   

}

mysql_close($conn);

$output = $output . "</table>";

if($count == 0){
    echo "No Internship data found for the Student";
}else if($count < 4){
    echo $output;
}else{
  echo "Intership count up to 3";
}

?>

<script>
        function myFunction()
        {
          console.log("apply called");
          var count = "<?php echo $count ?>";
          console.log(count);
          if(count >= 3){
            alert("We cannot add more company, because you reach already 3");
          }else if(count >= 0 && count < 3){
            window.location.replace("apply.php?current=" + <?php echo $count ?>);
          }
        }

        function logout()
        {
          console.log("logout called");
          
            window.location.replace("index.php");

        }
        </script>


<button onclick="myFunction()">Apply for new Application</button>
<button class="cancelbtn" onclick="logout()">Logout</button>

</body>
</html>