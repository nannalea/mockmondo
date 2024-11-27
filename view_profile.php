<?php
    $_title = 'Profil | Momondo';
    $_page = 'Profile';
    require_once __DIR__.'/comp_header.php';

    $user_name = $_SESSION['user_name'];
    $user_name_initial = $_SESSION['user_name_initial'];
    $user_email = $_SESSION['user_email'];
    $user_airport = $_SESSION['user_airport'];

    if( ! $_SESSION['user_name'] ) {
        header('Location: index');
        exit();
    }
?>

    <main class="push">
        <div class="left-right-container user-info">
            <div class="left-side">
                <div class="top">
                    <h1>Hej <?= $user_name ?></h1>
                    <h4>Hvilken del af verden drømmer du om at udforske?</h4>
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
                <div id="user-avatar-wrapper">

                    <div id="user-avatar-container">

                        <!-- <div id="user-avatar-placeholder" class=""></div> -->
                        <div id="user-avatar-letter" class="fi2"><?= $user_name_initial ?></div>
                        <div id="user-avatar-image" class="fi1"></div>

                    </div>
                    

                    <div id="edit-button-container">
                        <div id="edit-image" onclick="document.getElementById('fileToUpload').click();">
                            <img src="images/icon-edit-black.svg" alt="">
                            <form id="upload-form" action="bridge-image-upload.php" method="POST" enctype="multipart/form-data">
                            <input type="file" name="fileToUpload" id="fileToUpload" value="Upload Image" onchange="document.getElementById('edit-submit').click();" style="display:none;">
                            <input id="edit-submit" type="submit" value="Upload Image" name="btn-submit" onclick="document.getElementById('upload-form').submit();" style="display:none;> 
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>

<?php
    require_once __DIR__.'/comp_footer.php';
?>