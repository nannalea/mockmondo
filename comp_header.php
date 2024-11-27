<?php
    ini_set('display_errors', '1');
    require_once __DIR__.'/comp_dictionary.php';
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $_title ?? 'Momondo'; ?>
    </title>
    <link rel="icon" type="image/x-icon" href="images/momondo.ico">
    <link rel="stylesheet" href="fonts.css">
    <link rel="stylesheet" href="style.css">
</head>

<!-- <body oncontextmenu="toggle_menu(); return false"> -->
<body oncontextmenu="toggle_menu(); return false">

    <div>
        <button id="menu-button" onclick="toggle_menu()"><img src="images/icon-menu-lilac.png" alt=""></button>
    </div>

    <header>
        <div>
            <a href=<?= "index?language=".$language ?>><img id="header-logo" class="fade-in" src="images/logo.png" alt="momondo.png"></a>
        </div>
        <div id="header-right">
            <a id="header-trips" href="trips" <?= $_page == 'Trips' ? 'class="active"' : '' ?>>Trips</a>

            <?php
            if(! $_SESSION && $_page != 'Signup') {
                echo '<button id="login-button" type="button" onclick="toggle_modal()">'.$dictionary[$language.'_Login'].'</button>';
            }

            if( $_SESSION ) {
                echo '<div class="dropdown">
                        <button id="user-button" type="button" onclick="toggleDropdown();" class="dropbtn">'.$_SESSION['user_name'].'</button>
                            <div id="user-dropdown" class="dropdown-content">
                                <a href="profile">Profil</a>
                                <a href="user_trips">Dine rejser</a>
                                <a href="bridge-logout.php">Log ud</a>
                            </div>
                        </div>';
            }
            ?>
            
            <?php
            if ( $language == 'dk') {
                echo '<a id="lang-dk" class="language-picker" href="'.$_page.'?language=en">English</a>';

            }
            if ( $language == 'en') {
                echo '<a id="lang-dk" class="language-picker" href="'.$_page.'?language=dk">Dansk</a>';
            }
            ?>
        </div>
    </header>

    <div id="menu" onclick="toggle_menu()">
        <nav class="sidebar">
            <ul>
                <?php
                if( ! $_SESSION && $_page != 'Signup' ) {
                    echo '<li class="nav-login"><a href="#" onclick="toggle_modal()"><img class="badge" src="images/icon-account-lilac.png" alt="">Log ind</a></li>
                    <hr>';
                }
                ?>
                    <li><a href="index" <?= $_page == 'index' ? 'class="active"' : '' ?>><img src="images/icon-flight-lilac.png" alt=""><?= $dictionary[$language.'_Flights']?></a></li>
                    <li><a href="stays" <?= $_page == 'Stays' ? 'class="active"' : '' ?>><img src="images/icon-stays-lilac.png" alt=""><?= $dictionary[$language.'_Stays']?></a></li>
                    <li><a href="cars" <?= $_page == 'Cars' ? 'class="active"' : '' ?>><img src="images/icon-car-lilac.png" alt=""><?= $dictionary[$language.'_Car_Rental']?></a></li>
                    <li><a href="ferries" <?= $_page == 'Ferries' ? 'class="active"' : '' ?>><img src="images/icon-ferry-lilac.png" alt=""><?= $dictionary[$language.'_Ferries']?></a></li>
                    <li><a href="experiences" <?= $_page == 'Experiences' ? 'class="active"' : '' ?>><img src="images/icon-experiences-lilac.png" alt=""><?= $dictionary[$language.'_Experiences']?></a></li>
                    <li><a href="package_deals" <?= $_page == 'Package Deals' ? 'class="active"' : '' ?>><img src="images/icon-packages-lilac.png" alt=""><?= $dictionary[$language.'_Packages']?></a></li>
                <hr>
                    <li><a href="explore" <?= $_page == 'Explore' ? 'class="active"' : '' ?>><img src="images/icon-explore-lilac.png" alt="">Explore</a></li>
                    <li><a href="restrictions" <?= $_page == 'Restrictions' ? 'class="active"' : '' ?>><img src="images/icon-restrictions-lilac.png" alt=""><?= $dictionary[$language.'_Travel_Restrictions']?></a></li>
                <hr>
                <li><a href="trips" <?= $_page == 'Trips' ? 'class="active"' : '' ?>><img src="images/icon-trips-lilac.png" alt="">Trips</a></li>
            </ul>
        </nav>
    </div>