<!DOCTYPE html>
<head>
    <title>Subscription</title>
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

} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
if(isset($_POST['submit'])) {
    $errorMessage = "";
    if(empty($_POST['game']))
    {
        $errorMessage = "<li>You forgot to enter a game.</li>";
    }
    if(empty($_POST['email']))
    {
        $errorMessage = "<li>You forgot to enter your email.</li>";
    }
    if(empty($_POST['fname']))
    {
        $errorMessage = "<li>You forgot to enter your first name.</li>";
    }
    if(empty($_POST['lname']))
    {
        $errorMessage = "<li>You forgot to enter your last name.</li>";
    }


    $stmt = $dbh->prepare("INSERT INTO gamesubt (game, fname, lname, email) VALUES (?,?,?,?)");

    $result = $stmt->execute(array($_POST['game'],$_POST['fname'], $_POST['lname'], $_POST['email']));

    if(!$result){
        print_r($stmt->errorInfo());
        echo 'Failed';
    }
    else{
        $msg = '';
        $from = 'admin@shelved.com';
        mail($_POST['email'], 'Shelved Subscription' , $msg, 'From:' . $from);

        echo 'Success';
    }

    if(!empty($errorMessage))
    {
        echo("<p>There was an error with your form:</p>\n");
        echo("<ul>" . $errorMessage . "</ul>\n");
    }
}
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
    <div id="form" style=" box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); height: 375px;">
        <form method="post">
            <div  id="game" class="form-group" >
                <label>Game</label>
                 <input formmethod="post" type="text" class="form-control" name="game" placeholder="Game">
             </div>
            <div  id="email" class="form-group" >
                <label>Email</label>
                <input formmethod="post" type="email" class="form-control" name="email" placeholder="Email">
            </div>
            <div id="fname"  class="form-group" >
                <label>First Name</label>
                <input formmethod="post" type="text" class="form-control" name="fname" placeholder="First Name">
            </div>
            <div id="lname" class="form-group">
                <label>Last Name</label>
                <input formmethod="post" type="text" class="form-control" name="lname" placeholder="Last Name">
            </div>
            <div class="form-group">
                <p class="help-block"></p>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox">
                    Accept terms and services.
                </label>
            </div>

            <button type="submit" name="submit" formmethod="post">Submit</button>
        </form>
    </div>
</center>
</body>

</html>


