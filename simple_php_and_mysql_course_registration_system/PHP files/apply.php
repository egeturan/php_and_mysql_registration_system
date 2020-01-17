<html>
    <head>
        <title>Apply Page</title>
        <link rel="stylesheet" href="style.css">
    
    </head>
<body>

<?php
$current = $_GET['current'];
$address = "applyAction.php?current=" . $current;

?>



<h1> Apply Intership Page </h1>

  <form action="<?php echo $address ?>" method="post">
    Enter Company ID: <input type="text" name="companyID"><br>
    <input type="submit">
    </form>

</body>
</html>