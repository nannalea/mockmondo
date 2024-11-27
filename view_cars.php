<?php
    $_title = ' Biludlejning | Momondo';
    $_page = 'Biludlejning';
    require_once __DIR__.'/comp_header.php';
?>

    <main class="push">
        <div class="left-right-container">
            <div class="left-side">
                <h1>Find og sammenlign de bedste tilbud på udlejningsbiler</h1>
                <h3>Denne funktion kommer snart!</h3>
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