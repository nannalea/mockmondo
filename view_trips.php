<?php
    $_title = 'Trips | Momondo';
    $_page = 'Trips';
    require_once __DIR__.'/comp_header.php';

    if( $_SESSION['user_name'] ) {
        header('Location: user_trips');
        exit();
    }
?>

    <main class="push">
        <div class="left-right-container">
            <div class="left-side">
                <h1>En nemmere måde at holde styr på dine rejser på</h1>
                <h3>Vi gør det supernemt at planlægge, organisere og rejse sammen med venner eller familie. Trips er gratis – og kan bruges, uanset hvor du booker.</h3>
                <?php
                if( ! $_SESSION ) {
                    echo '<button onclick="toggle_modal()">Log ind for at planlægge bedre</button>';
                }
                if( $_SESSION ) {
                    echo '<a href="user_trips"><button>Planlæg din næste rejse</button></a>';
                }
                ?>
            </div>

            <div class="right-side">
                <img src="images/trips-graphic.svg" alt="">
            </div>
        </div>
    </main>

<?php
    require_once __DIR__.'/comp_footer.php';
?>