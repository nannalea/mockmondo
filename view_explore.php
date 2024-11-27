<?php
    $_title = ' Udforsk verden | Momondo';
    $_page = 'Explore';
    require_once __DIR__.'/comp_header.php';
?>

    <main class="push">
        <div class="left-right-container">
            <div class="left-side">
                <h1>Søg og opdag nye spændende destinationer at rejse til</h1>
                <!-- <h1>Der er en verden at opdage. Hvilket verdenshjørne skal du udforske næste gang?</h1>
                <h1>Søg og find nye spændende destinationer at opdage</h1>
                <h1>Find nye spændende destinationer at opdage</h1>
                <h1>Søg og find nye spændende destinationer at opleve</h1>
                <h1>Opdag nye spændende destinationer at rejse til</h1> -->
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