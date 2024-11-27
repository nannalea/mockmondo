<?php
    $_title = ' Rejserestriktioner | Momondo';
    $_page = 'Restrictions';
    require_once __DIR__.'/comp_header.php';
?>

    <main class="push">
        <div class="left-right-container map-container">
            <div class="left-side">
                <h1>Globale rejserestriktioner – få overblikket, før du bestiller</h1>
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
                <img class="br12" src="images/restrictions-graphic.png" alt="">
            </div>
        </div>
    </main>

<?php
    require_once __DIR__.'/comp_footer.php';
?>