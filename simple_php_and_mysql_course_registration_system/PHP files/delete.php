<html>
    <head>
        <title>Delete Page</title>
        <link rel="stylesheet" href="style.css">
    
    </head>
<body>

<?php
    echo "<h1> Deletion page </h1>";
    session_start();
    $studentId =  $_SESSION['str'];
    $studentN = $_SESSION['strN'];
    $compId = $_GET['a'];

    echo "Deletion for Company ID: " . $compId . " for User ID: " . $studentN . " is: ";

    $dbhost = 'dijkstra.ug.bcc.bilkent.edu.tr';
    $dbuser = 'ege.turan';
    $dbpass = 'WmJbtJdT';
    
    $conn = mysql_connect($dbhost, $dbuser, $dbpass);
    
    if(! $conn ) {
       die('Could not connect: ' . mysql_error());
    }
    
    $sql = "DELETE FROM Apply WHERE SID='{$studentId}' and CID='{$compId}'";
     
     mysql_select_db('ege_turan');
     $retval = mysql_query( $sql, $conn );
     if(! $retval ) {
        die('Could not get data: ' . mysql_error());
     }else{
         echo "completed successfull. <br>";
     }

     

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

