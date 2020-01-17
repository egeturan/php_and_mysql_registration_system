<html>
    <head>
        <title>LOG-IN PAGE</title>
        <link rel="stylesheet" href="style.css">
        <script src="script.js"></script>
    </head>
<body>

        <form action="fetch.php" method="post">
                <h2>Internship Login Page</h2>
                <div class="container">
                  <label for="userName"><b>Username</b></label>
                  <input type="text" placeholder="Enter Student name" name="userName" id="studName">
              
                  <label for="psw"><b>Password</b></label>
                  <input type="password" placeholder="Enter Student ID" name="userID" id="studID">
              
                  <button type="submit" onclick="loginClicked(document.getElementById('studName').value,document.getElementById('studID').value)">Login</button>
                </div>
              
                <div class="container" style="background-color:#f1f1f1">
                  <button type="button" class="cancelbtn">Cancel</button>
                </div>
              </form>


</body>
</html>