<!DOCTYPE html>
<head>
    <title>Delete</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="sub.js"></script>
    <style>
        #navi{
            width: 100%;
            height: 24%;
            background-color: darkred;
        }
        #form{
            opacity: .95;
            margin-top: 14%;
            width: 45%;

            background-color: lightgray;
            margin-bottom: 2%;
        }

        #background{
            width: 100%;
            height: 100%;
            background-color: yellow;
        }


        body{
            background-image: url('http://gamesmeta.com/wp-content/uploads/2015/02/1-other-video-games-video-game-art-wallpaper-5-1.jpg');
            background-size: 100%;
            background-repeat: no-repeat;
        }
    </style>
</head>
<body>
<?php


try {
    $dbh = new PDO('mysql:host=127.0.0.1;dbname=gamesubdb', 'root', 'root');
    $email = $_GET ['email'];
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM gamesubt WHERE $email = 'email'";
    $dbh->exec($sql);
    echo "Record deleted successfully";
}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}

$dbh = null;
?>
<div id="header" class="wrapper">
    <nav class="navbar navbar-default navbar-fixed-top navbar-shrink" id="navi">
        <h1 style="color:ghostwhite; text-align: center; font-family: 'sans-serif', Impact" >GameSub</h1>
        <h5 style="color:ghostwhite; text-align: center; font-family: 'sans-serif', Impact">GameSub is a website that sends General Newsletter's when information on the game of your choice is released</h5>
        <p style=" font-size:50%; color:ghostwhite; text-align: center; font-family: 'sans-serif', Impact ">*No Sign Up, No Credit Card</p>
    </nav>
</div>
<div id="background" class="background-image">

</div>
<center>
    <div id="form" style=" box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); height: 100px;">
<form method="get">
    <div  id="email" class="form-group"  >
        <label>Please Enter The Email You Want Taken Off Our Services</label>
        <input formmethod="get" type="email" class="form-control" name="email" placeholder="Email">
        <button type="submit" name="submit" formmethod="get">Submit</button>
    </div>
</form>
    </div>
</center>
</body>

</html>
