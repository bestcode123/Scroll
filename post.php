<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body><div class="all">
    <a href="feed.php" class="feed_icon">Feed</a><br /><br /><br />
    <a href="signin.php" class="feed_icon">Sign&nbsp;Up</a><br /><br />
    <?php
    if(isset($_POST['submit'])) {
        $servername = "localhost";
        $username = "id18929520_root";
        $password = "16t<yNrzWBHlX+ob";
        $database = "id18929520_main";
        $conn = new mysqli($servername, $username, $password, $database);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        
        // Login Credential Retreival:
        $login_sql = "SELECT uid, username, password FROM userinfo";
        $result = $conn->query($login_sql);
        
        
        // Login Credential Authentication:
        $in = FALSE;
        $uid = 0;
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              if($row['username'] === $_POST['username'] && 
$row['password'] === $_POST['password']) {
                  $in = TRUE;
                  $usrn = $row['username'];
                  $psw = $row['password'];
                  $uid = $row['uid']; 
                  
              }
            }
          } else {
            echo "There is not an account linked to this username";
        } 
        
        $sql = "INSERT INTO posts (title, body, alias) VALUES (\"" . 
$_POST['post_title'] . "\", \"" . $_POST['post_body'] . "\", \"" . 
$_POST['post_alias'] . "\");";

        if($in) {
            if($conn->query($sql) === FALSE) {
                die($conn->error);
            }
        }
        $conn->close();
    }
    ?>
    <div class="enter_info">
        <form name="post_form" action="" method="post">
            Username: <input type="text" name="username" />&nbsp;&nbsp;&nbsp;&nbsp;
            Password: <input type="password" name="password" />
            <br /><hr />
            Post:<br /><br />
            Title: <input type="text" name="post_title" />&nbsp;&nbsp;&nbsp;&nbsp;
            Body: <input type="text" name="post_body" />&nbsp;&nbsp;&nbsp;&nbsp;
            Alias: <input type="text" name="post_alias" /><br /><br />
            <input type="submit" name="submit" class="submit_button"/>
        </form>
    </div>

</div></body>
</html>