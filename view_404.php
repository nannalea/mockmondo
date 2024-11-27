<?php
    $_title = 'Vi fandt desværre ikke siden (404) | Momondo';
    $_page = '404';
    require_once __DIR__.'/comp_header.php';
?>

    <main class="push">
        <div id="error-message">
            <img src="images/error-404.png" alt="">
            <!-- <h1>404</h1> -->
            <p>Vi fandt desværre ikke denne side.</p>
            <p><a href="index">Hjem</a></p>
            <!-- <p><a href="feedback">Send os feedback</a></p> -->
        </div>
    </main>

<?php
    require_once __DIR__.'/comp_footer.php';
?>