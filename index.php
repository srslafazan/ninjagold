<?php

    session_start();



?>

<!DOCTYPE html>
<html>
<head>
    <!-- Created by Shain and J.V. -->
    <title>Ninja Gold</title>

    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.css">
    <link rel="stylesheet" type="text/css" href="main.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <?php
        if (isset($_SESSION['gameover'])) {
            echo $_SESSION['gameover'];
            session_unset();
        }
    ?>
</head>
<body>

<div id="container">

    <div id='gold'>
        <h2>Your Gold:</h2>
        <h3>
           <?php
           if( ! isset($_SESSION['gold']) ) {
                $_SESSION['gold'] = 0;
            }
           echo $_SESSION['gold'];
           ?> 
        </h3> 
    </div>

    <form action='process.php' method='post' id='farm'>
        <h3>Farm</h3>
        <p>(earns 10-20 gold)</p>
        <input type="hidden" name='action' value='farm'>
        <input type="submit" value="Find Gold!">
    </form>

    <form action='process.php' method='post' id='cave'>
        <h3>Cave</h3>
        <p>(earns 5-10 gold)</p>
        <input type="hidden" name='action' value='cave'>
        <input type="submit" value="Find Gold!">
    </form>

    <form action='process.php' method='post' id='house'>
        <h3>House</h3>
        <p>(earns 2-5 gold)</p>
        <input type="hidden" name='action' value='house'>
        <input type="submit" value="Find Gold!">
    </form>

    <form action='process.php' method='post' id='casino'>
        <h3>Casino!</h3>
        <p>(earns/takes 0-50 gold)</p>
        <input type="hidden" name='action' value='casino'>
        <input type="submit" value="Find Gold!">
    </form>

    <p>Activities:</p>
    <div id='activities'>
    <?php 
        if(!empty($_SESSION['actioncounter']) )
        {
            foreach ($_SESSION['actioncounter'] as $action) {
                echo $action;    
            }
        } 

    ?>
    </div>

    <form id="reset" action='process.php' method='post'>
        <input type="hidden" name='action' value='reset'>
        <input type='submit' value='Reset Game'>
    </form>
</div>
</body>
</html>