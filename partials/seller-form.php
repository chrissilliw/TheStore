<?php


?>

    <form action="form-handlers/seller-form-handler.php" method="post" class="form-wrapper">
        <h3 class="form-title">Registera en ny användare</h3>
        <div class="input-wrapper">
            <label for="firstname" class="sellers-label">Förnamn<span> *</span> </label>
            <input type="text" name="firstname" id="firstname" placeholder="Ditt förnamn">
        </div>
        <div class="input-wrapper">
            <label for="lastname" class="sellers-label">Efternamn<span> *</span></label>
            <input type="text" name="lastname" id="lastname" placeholder="Ditt efternamn">
        </div>
        <div class="input-wrapper">
            <label for="email" class="sellers-label">Email-adress<span> *</span></label>
            <input type="text" name="email" id="email" placeholder="Din e-postadress">
        </div>
        <button type="submit" class="submit-button">Lägg till användare</button>
    </form>
