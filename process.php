<?php

    session_start();

    if ( ! isset($_SESSION['actioncounter']) ) {
        $_SESSION['actioncounter'] = array();
    } 
    


    if ( $_POST['action'] == 'farm' ) {
        $roll = rand(10,20);
        $_SESSION['gold'] += $roll;
        array_unshift($_SESSION['actioncounter'], "<p class='win'>You entered a farm and earned {$roll} gold! (".date('F jS Y h:ia').")</p>");

    } elseif ( $_POST['action'] == 'cave' ) {
        $roll = rand(5,10);
        $_SESSION['gold'] += $roll;
        array_unshift($_SESSION['actioncounter'], "<p class='win'>You entered a cave and earned {$roll} gold! (".date('F jS Y h:ia').")</p>");
    } elseif ( $_POST['action'] == 'house' ) {
        $roll = rand(2,5);
        $_SESSION['gold'] += $roll;
        array_unshift($_SESSION['actioncounter'], "<p class='win'>You entered a house and earned {$roll} gold! (".date('F jS Y h:ia').")</p>");
    } elseif ( $_POST['action'] == 'casino' ) {
        $chance = rand(1, 100);
        $roll = rand(0,50);
        if($chance < 70) {
            $_SESSION['gold'] -= $roll;
            array_unshift($_SESSION['actioncounter'], "<p class='lose'>You entered a casino and earned {$roll} gold! (".date('F jS Y h:ia').")</p>");
        }
        else {
            $_SESSION['gold'] += $roll;   
            array_unshift($_SESSION['actioncounter'], "<p class='win'>You entered a casino and earned {$roll} gold! (".date('F jS Y h:ia').")</p>");
        }
        if ( isset($_SESSION['gold']) && $_SESSION['gold'] < 0 ) {
            $_SESSION['gameover'] = "
            <script> 
                $(document).ready(function() {
                    alert('gameover T_T');
                });
            </script>";   
        }  
    }



    if ( $_POST['action'] == 'reset') {
        session_unset();
    }

    header('Location: index.php');



?>