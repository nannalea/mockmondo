<?php
    $_title = 'Dine rejser | Momondo';
    $_page = 'user_trips';

    require_once __DIR__.'/comp_header.php';

    $user_name = $_SESSION['user_name'];
    $user_name_initial = $_SESSION['user_name_initial'];
    $user_email = $_SESSION['user_email'];
    $user_airport = $_SESSION['user_airport'];

    if( ! $_SESSION) {
        header('Location: trips');
        exit();
    }

    try{
        $db = new PDO('sqlite:'.__DIR__.'/db_trips.db');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $q = $db->prepare('SELECT * FROM flights');
        $q->execute();
        $flights = $q->fetchAll(PDO::FETCH_ASSOC);
        // echo json_encode($flights);
    }catch(Exception $ex){
        echo 'Something went terribly wrong, sorry.';
        exit();
    }
?>

    <main class="push">
        <div class="left-right-container">
            <div class="left-side">

            <div class="top">
                <h1>Dine rejser</h1>
                <h4>Her kan du se og redigere dine gemte rejser.</h4>
                    <!-- <h4>Der er en verden at opdage! Hvor drømmer du om at rejse til næste gang?</h4> -->
                    <!-- <h4>Der er en verden at opdage. Hvilket verdenshjørne drømmer du om at udforske næste gang?</h4> -->
                </div>
                <div class="bottom">
                    <div>
                        <h4>E-mail</h4>
                        <h3><?= $user_email ?></h3>
                    </div>
                    <div>
                        <h4>Hjemmelufthavn</h4>
                        <h3><?= $user_airport ?></h3>
                    </div>
                </div>
            </div>

            <div class="right-side">
                <img src="images/signup-graphic.svg" alt="" style="width: 80%; margin-left: 10%;">
            </div>
        </div>

        <div class="fw-container">
            <?php if (empty($flights)){?>
                <p>No saved flights to display.</p>
            <?php
            } else {
                foreach($flights as $flight){
            ?>
            <div class="left-right-container journey-container">
                <div class="left-side">
                    <span><img src="images/icon-journey-black.svg" alt=""></span>
                    <span><?= $flight['from_city'] ?></span>
                    <?= $dictionary[$language.'_to']?>
                    <span><?= $flight['to_city'] ?></span>
                </div>

                <div class="right-side">
                    <form method="post" onsubmit="return false">
                        <input style="display: none" name="flight_id" value="<?= $flight['id'] ?>" type="text">
                        <button id="delete-button" type="button" onclick="deleteFlight();">
                            <?= $dictionary[$language.'_delete']; ?>
                        </button>
                    </form>
                </div>
            </div>
            <?php
            }}
            ?>
        </div>
    </main>

    <script>
        async function deleteFlight(flight_id){
            const frm = event.target.form;
            console.log(frm);
            const conn = await fetch('api-delete-flight.php', {
                method : "POST",
                body : new FormData(frm)
            })
            const data = await conn.json()
            if( ! conn.ok ){
                // Sweet alert: Oups, flight not found!
                console.log(data);
                return;
            }
            // Success
            console.log(data);
            window.location.reload();
        }
    </script>

<?php
    require_once __DIR__.'/comp_footer.php';
?>