
    <form action="form-handlers/seller-form-handler.php" method="POST" class="form-wrapper">
        <h3>Registera en ny användare</h3>
        <div class="input-wrapper">
            <label for="firstname" class="input-label">Förnamn<pre>*</pre> </label>
            <input type="text" name="firstname" id="firstname" placeholder="Ditt förnamn">
        </div>
        <div class="input-wrapper">
            <label for="lastname" class="input-label">Efternamn<pre>*</pre></label>
            <input type="text" name="lastname" id="lastname" placeholder="Ditt efternamn">
        </div>
        <div class="input-wrapper">
            <label for="email" class="input-label">Email-adress<pre>*</pre></label>
            <input type="text" name="email" id="email" placeholder="Din e-postadress">
        </div> 
        <button type="submit" class="submit-button">Lägg till användare</button>
    </form>