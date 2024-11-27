<?php
ini_set('display_errors', '1');
require_once __DIR__.'/_x.php';
?>
    <div id="modal-container">
        <div id="modal-content">
            <div id="login-form">

            <span id="close-modal"><img src="images/icon-close-black.png" alt="" onclick="hide()"></span>

            <img src="images/login-graphic.svg" alt="">

            <h2>Log ind, eller opret en konto</h2>
            <p>Følg priser, organiser rejseplaner, og få adgang til medlemstilbud med din Momondo-konto.</p>
        
            <form id="login" autocomplete="off" onsubmit="return validate(login); return false" action="bridge-login.php" method ="POST">

                <input id="user_email" class="form-input" type="text" placeholder="Indtast din e-mailadresse"
                name="user_email"
                data-validate="email">
                <!-- <p class="valid-input-info">E-mailadressen bør følge dette format: name@example.com</p> -->
                <p class="invalid-input">Ugyldig e-mailadresse. Tjek for eventuelle stavefejl.</p>
                
                <input id="user_password" class="form-input" type="password" placeholder="Indtast din adgangskode"
                name="user_password"
                data-validate="password">
                <!-- <p class="valid-input-info">Adgangskoden skal være på mindst 6 tegn og indeholde et eller flere tal.</p> -->
                <p class="invalid-input">Adgangskoden er ugyldig.</p>
                <!-- <p class="valid-input-info">Adgangskoden skal være mellem 6 og 12 tegn lang.</p> -->
                
                <button id="login-button" class="submit-button">Fortsæt</button>

            </form>

            <p class="user-prompt">Har du ikke en konto? Opret dig <a role="button" href="signup">her</a>.</p>
        
            </div>
        </div>
    </div>

    <script src="validator.js"></script>
    <script src="app.js"></script>

    <script>
        async function login() {
            const the_form = document.querySelector("#login")
            const conn = await fetch( 'api-login.php', {
                method : "POST",
                body : new FormData(the_form)
            })
            if( ! conn.ok ){
            console.log("Failure");
            }
            console.log("Success");
        }
    </script>