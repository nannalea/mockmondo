<?php
    $_title = ' Opret bruger | Momondo';
    $_page = 'Signup';
    
    require_once __DIR__.'/_x.php';
    require_once __DIR__.'/comp_header.php';

    if( $_SESSION) {
        header('Location: index');
        exit();
    }
?>

    <main class="push">
        <div class="fw-container" style="background: rgba(31, 5, 55, 1);">
            <div id="signup-form">

                <img src="images/signup-graphic.svg" alt="">

                <h2>Opret en konto hos Momondo</h2>
                <p>Følg priser, organiser rejseplaner, og få adgang til medlemstilbud med din Momondo-konto.</p>

                <form id="signup" onsubmit="validate(signup); return false;" autocomplete="off">
                    
                    <input id="user_name" class="form-input" type="text" placeholder="Hvad er dit navn?"
                    max-length="<?= _USER_NAME_MIN_LEN ?>"
                    name="user_name"
                    data-validate="str"
                    data-min="<?= _USER_NAME_MIN_LEN ?>"
                    data-max="<?= _USER_NAME_MAX_LEN ?>">
                    <p class="valid-input-info">Navnet skal være mellem <?= _USER_NAME_MIN_LEN ?> og <?= _USER_NAME_MAX_LEN ?> tegn langt.</p>

                    <input id="user_email" class="form-input" type="email" placeholder="Indtast din e-mailadresse"
                    name="user_email"
                    data-validate="email"              
                    oninput="is_email_available()" onfocusout="is_email_available()">
                    <p class="valid-input-info">E-mailadressen bør følge dette format: name@example.com</p>
                    <p class="invalid-input">Ugyldig e-mailadresse. Tjek for eventuelle stavefejl.</p>
                    <p class="invalid-input" id="email-unavailable">E-mailadressen er allerede i brug.</p>

                    <input id="user_password" class="form-input" type="password" placeholder="Indtast din ønskede adgangskode"
                    name="user_password"
                    data-validate="password">
                    <p class="valid-input-info">Adgangskoden skal være på mindst 6 tegn og indeholde et eller flere tal.</p>
                    <p class="invalid-input">Adgangskoden er ugyldig.</p>
                    <!-- <p class="valid-input-info">Adgangskoden skal være mellem 6 og 12 tegn lang.</p> -->
                    
                    <button id="signup-button" class="submit-button">Fortsæt</button>

                </form>
                
                <p class="user-prompt">Er du ikke interesseret i en konto? Gå tilbage <a href="javascript:history.back()">her</a>.</p>

                <!-- <p class="user-prompt">Har du allerede en konto? Gå til forsiden <a href="/">her</a>.</p> -->
                <!-- <p class="user-prompt">Ikke interesseret i at oprette en bruger? Gå tilbage <a href="/">her</a>.</p> -->
                <!-- <p class="user-prompt">Er du ikke interesseret i en konto? Søg efter din næste rejse <a href="/">her</a>.</p> -->

            </div>
        </div>
    </main>

<script src="validator.js"></script>
<script src="app.js"></script>

<script>

    // function emailUnavailable(){
    //     if (event.target.value != 'a@a.com'){
    //     console.log('not equal')
    //     document.querySelector("#email-unavailable").style.display = "none";
    //     } else if (event.target.value = 'a@a.com'){
    //     console.log('equal')
    //     document.querySelector("#email-unavailable").style.display = "block";
    //     }
    // }

    // function clean_dom(){
    //     event.target.value = ""
    //     console.log('x')
    //     document.querySelector("#email-unavailable").style.display = "none";
    // }

    async function is_email_available(){
      const frm = document.querySelector("form")
      const conn = await fetch('api-is-email-available.php', {
        method : "POST",
        body : new FormData(frm)
      })
      if( ! conn.ok ){
        console.log('Unavailable')
        document.querySelector("#user_email").value = "";
        document.querySelector("#email-unavailable").style.display = "block";
      } else if ( conn.ok ){
      console.log('Available')
      document.querySelector("#email-unavailable").style.display = "none";
      }
    }
    
    function capitalizeFirstLetter(string) {
        return string.charAt(0).toUpperCase() + string.slice(1);
    }


    async function signup() {
        const the_form = document.querySelector("#signup")
        const conn = await fetch( 'api-signup.php', {
            method : "POST",
            body : new FormData(the_form)
        })

        if( ! conn.ok ){
        const data = await conn.json() // Convert text to JSON
        console.log(data.message)
        Swal.fire({
           title: 'Sorry,',
           text: "Something went wrong during your registration.",
           icon: 'error'
        })
        }

        const data = await conn.json() // Convert text to JSON
        console.log(data.message)
        Swal.fire({
            title: 'All set, ' + capitalizeFirstLetter(data.message) + '.',
            text: "Your new user has been succesfully registered.",
            icon: 'success'
        })
    }
</script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
    require_once __DIR__.'/comp_footer.php';
?>