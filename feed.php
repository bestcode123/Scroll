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
    <?php
        // Simple Feed Implementation:
        $servername = "localhost";
        $username = "id18929520_root";
        $password = "16t<yNrzWBHlX+ob";
        $database = "id18929520_main";
        $conn = new mysqli($servername, $username, $password, $database);
        if($conn->connect_error) {
            die("connection Error: " . $conn->connect_error);
        }

        // 1 - Fetch:
        $feed_fetch_sql = "SELECT * FROM posts";
        $result = $conn->query($feed_fetch_sql) or die($conn->error);

        // 2 - Analysis ? idk lol:
        if(TRUE) {
            while($row = $result->fetch_assoc()) {
                echo "<span class=\"postspan\">Post <span class=\"post_id\">" 
                . $row['postid'] 
                . "</span>, title <span class=\"post_title\">" 
                . $row['title'] 
                . "</span>, body <span class=\"post_body\">" 
                . $row['body'] 
                . "</span>, by <span class=\"post_alias\">" 
                . $row['alias'] 
                . "</span> (alias)!</span><br /><br /><br />";
            }
        }

        $conn->close();
    ?>
</div></body>
</html>
