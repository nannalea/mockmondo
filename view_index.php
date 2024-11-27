<?php
    $_title = 'Find din næste rejse | Momondo';
    $_page = 'Index';
    require_once __DIR__.'/comp_header.php';
?>

    <main class="push">

        <div class="fw-container">
            <div id="welcome-message">
                <h1>
                    <?= $dictionary[$language.'_Welcome'].'! '.$dictionary[$language.'_Find'].' '.$dictionary[$language.'_a'].' '.$dictionary[$language.'_flexible'].' '.$dictionary[$language.'_flight'].' '.$dictionary[$language.'_for'].' '.$dictionary[$language.'_your'].' '.$dictionary[$language.'_next'].' '.$dictionary[$language.'_trip'].'.'; ?>
                </h1>
            </div>
        </div>

        <div class="fw-container">
            <div id="flights-search">
                <form autocomplete="off">
                    <div id="from-container">
                        <input id="from-input" type="text" placeholder=<?= "{$dictionary[$language.'_From']}?"; ?>
                        oninput="show_from_results()"
                        onblur="hide_from_results()"
                        >
                        <div id="from-results">
                        </div>
                    </div>

                    <div id="switch-button-container">
                        <button id="switch-button" role="button" onclick="switchInput(); return false">
                            <img src="/momondo/images/icon-switch.svg" alt="">
                        </button>
                    </div>

                    <div id="to-container">
                        <input id="to-input" type="text" placeholder="<?= "{$dictionary[$language.'_To']}?"; ?>"
                        oninput="show_to_results()"
                        onblur="hide_to_results()">
                        <div id="to-results">
                        </div>
                    </div>

                    <div id="date-picker-container">
                    <input id="date-picker-input" type="date" name="from" disabled>
                    </div>
                </form>
                <div>
                    <button id="search-button" type="button"><?= $dictionary[$language.'_Search']; ?></button>
                </div>
            </div>
        </div>

        <div class="fw-container">
            <div class="article-card">
                <img src="images/article.png" alt="" class="fade-in">
                <h2 class="mt1">
                    Fantastiske september-destinationer
                </h2>
                <p class="mt1">
                    Nåede du ikke at komme på ferie over sommeren? September er faktisk en vidunderlig tid at tage en improviseret tur med stadig godt vejr, men færre turister og lavere priser
                </p>
                <button class="mt1">
                    Læs artiklen
                </button>
            </div>
        </div>
        
        <div class="fw-container">
            <h2>
                Populære destinationer
            </h2>

            <div class="destination-card mt1">
                <div class="left fade-in" style="background-image: url('images/polen.png');">
                </div>
                <div class="right">
                    <p>
                        FLY TIL
                    </p>
                    <h3>
                        Polen
                    </h3>
                </div>
            </div>

             <div class="destination-card mt1">
                <div class="left fade-in" style="background-image: url('images/vietnam.png');">
                </div>
                <div class="right">
                    <p>
                        FLY TIL
                    </p>
                    <h3>
                        Vietnam
                    </h3>
                </div>
            </div>

            <div class="destination-card mt1">
                <div class="left fade-in" style="background-image: url('images/storbritannien.png');">
                </div>
                <div class="right">
                    <p>
                        FLY TIL
                    </p>
                    <h3>
                        Storbritannien
                    </h3>
                </div>
            </div>
            
            <div class="destination-card mt1">
                <div class="left fade-in" style="background-image: url('images/thailand.png');">
                </div>
                <div class="right">
                    <p>
                        FLY TIL
                    </p>
                    <h3>
                        Thailand
                    </h3>
                </div>
            </div>
        </div>

    </main>

    <?php
        require_once __DIR__.'/comp_footer.php';
    ?>