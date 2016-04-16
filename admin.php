<?php
require_once 'admin.php';

try {
    $dbh = new PDO('mysql:host=127.0.0.1;dbname=gamesubdb', 'root', 'root');

    $sql = 'SELECT fname, lname, game, email FROM gamesubt ORDER BY lname';

    $q = $dbh->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);

} catch (PDOException $pe) {
    die("Could not connect to the database :" . $pe->getMessage());
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
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
        <div id="container">
            <h1>DATA</h1>
            <table class="table table-bordered table-condensed">
                <thead>
                <tr>
                    <th>LastName</th>
                    <th>FirstName</th>
                    <th>Game</th>
                    <th>Email</th>
                </tr>
                </thead>
                <tbody>
                <?php while ($r = $q->fetch()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($r['lname'])?></td>
                        <td><?php echo htmlspecialchars($r['fname']); ?></td>
                        <td><?php echo htmlspecialchars($r['game']); ?></td>
                        <td><?php echo htmlspecialchars($r['email']); ?></td>
                    </tr>
                <?php endwhile; ?>
                </tbody>
            </table>
            </div>
</body>
</div>

</html>