<? php
    include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chat Sys in PHP</title>
    <link rel="stylesheet" href="style.css" media="all"/>
    <script type="text/javascript">
        function ajax() {
            var req = new XMLHttpRequest();
            req.onreadystatechange = function() {
                if (req.readyState == 4 && req.status == 200) {
                    document.getElementById("chat").innerHTML = req.responseText;
                }
            }
            req.open('GET', 'chat.php', true);
            req.send('POST', );
        }

        setInterval(function() {
            ajax();
        }, 1000);
    </script>
</head>
<body onload="ajax();">
    <div id="container">
        <div id="chat_box">
            <div id="chat">
            </div>
        </div>
        <form method="post" action="index.php">
            <input type="text" name="name" placeholder="enter name"/>
            <textarea name="enter message" placeholder="enter message"></textarea>
            <input type="submit" name="submit" value="Send"/>
        </form>
        <?php
            if(isset($_POST['submit'])) {

                $name = $_POST['name'];
                $msg = $_POST['msg'];

                $query = "INSERT INTO chat (name, msg) values ('$name', '$msg')";

                $run = $con->query($query);

                if($run) {
                    echo "<embed loop='false' src='chat.wav' hidden='true' autoplay='true'/>";
                }
            }
         ?>
    </div>
</body>
</html>
