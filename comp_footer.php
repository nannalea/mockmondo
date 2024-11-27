
    <footer class="push">

        <div id="company" class="column">
            <h6 class="column-title">Firma</h6>
            <ul>
                <li><a href="/momondo">Om</a></li>
                <li><a href="/momondo">Jobmuligheder</a></li>
                <li><a href="/momondo">Mobil</a></li>
                <li><a href="/momondo">Discover</a></li>
                <li><a href="/momondo">Sådan fungerer vi</a></li>
                <li><a href="/momondo">Derfor vælger rejsende Momondo</a></li>
                <li><a href="/momondo">Bæredygtighed</a></li>
                <li><a href="/momondo">Momondo-kuponkoder</a></li>
            </ul>
        </div>

        <div id="contact" class="column">
            <h6 class="column-title">Kontakt os</h6>
            <ul>
                <li><a href="/momondo">Hjælp/FAQ</a></li>
                <li><a href="/momondo">Presse</a></li>
                <li><a href="/momondo">Affiliates</a></li>
                <li><a href="/momondo">Annoncér hos os</a></li>
            </ul>
        </div>

        <div id="more" class="column">
            <h6 class="column-title">Mere</h6>
            <ul>
                <li><a href="/momondo">Flyselskabsgebyrer</a></li>
                <li><a href="/momondo">Flyselskaber</a></li>
            </ul>
        </div>
    
    </footer>

    <?php
    if(! $_SESSION && $_page != 'Signup') {
        require_once __DIR__.'/comp_login.php';
    }
    ?>
    
    <script src="app.js"></script>

</body>
</html>