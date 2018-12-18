<?php
$id = $_POST["post_id"];
$user = 'jun';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Project Rocket</title>
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/layout.css">
    <link rel="stylesheet" href="post-detail.css">
</head>
<body>
<div class="body-background">
    <div id="admin-panel">
        <ul>
            <li><a href="#">Post Project</a></li>
            <li><a href="#">User Profile</a></li>
        </ul>
    </div>
    <?php
    // Create connection
    $post = new mysqli("localhost", "root", "", "comment");
    $comment = new mysqli("localhost", "root", "", "comment");
    // Check connection
    if ($comment->connect_error) {
        die("Connection failed: " . $comment->connect_error);
    }
    if ($post->connect_error) {
        die("Connection failed: " . $comment->connect_error);
    }

    $post_sql = "SELECT title, user, detail, id FROM post";
    $comment_sql = "SELECT  user, date, content, post_id FROM comment";
    $post_result = mysqli_query($post, $post_sql);
    $comment_result = mysqli_query($comment, $comment_sql);

    if (mysqli_num_rows($post_result) > 0) {
        // output data of each row
        while ($row = $post_result->fetch_assoc()) {
            if ($row['id'] == $id) {
                $data = array($row['user'], $row['detail'], $row['title'], $row['id']);
                echo "<h1 id=\"title\">$data[2]</h1>
                    <section id=\"posts\">
                        <article class=\"main post\">
                        <figure class=\"user\">
                            <img src=\"https://upload.wikimedia.org/wikipedia/commons/1/12/User_icon_2.svg\" alt=\"user picture\">
                            <p>$data[0]</p>
                        </figure>
                        <pre class=\"detail\">$data[1]</pre>
                      </article>";
                break;
            }
        }
    } else {
        echo "0 results";
    }

    if (mysqli_num_rows($comment_result) > 0) {
        // output data of each row
        while ($row = $comment_result->fetch_assoc()) {
            if ($row['post_id'] == $id) {
                $data = array($row['user'], $row['content'], $row['date'], $row['post_id']);
                echo "<article class=\"post\">
                        <figure class=\"user\">
                            <img src=\"https://upload.wikimedia.org/wikipedia/commons/1/12/User_icon_2.svg\" alt=\"user picture\">
                            <p>$data[0]</p>
                        </figure>
                        <pre class=\"detail\">$data[1]</pre>
                      </article>";
            }
        }
    } else {
        echo "0 results";
    }

    $post->close();
    $comment->close();
    ?>

    <?php

    if ($id != 0 && $user != "") {
        echo "<article class='input' >
                <form action = 'save-comment.php' method = 'post' >
                    <textarea name = 'comment' class='comment'
                          placeholder = 'Enter your comment of this project!'
                          maxlength = '300' ></textarea >
                    <input type = 'hidden' name = 'id' value = '<?php echo $id ?>' >
                    <input type = 'hidden' name = 'user' value = '<?php echo $user ?>' >
                    <input type = 'submit' name = 'submit' class='submit' value = 'submit' >
                </form >
            </article >";
    }
    ?>
</div>
</body>
</html>