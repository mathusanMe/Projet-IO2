<!DOCTYPE html>
<html>
    <head>
        <title>Inscription</title>
    </head>
    <body>
        <main>
            <form>
                <h1>S'inscrire</h1>
                <div>
                    <label for="username">Identifiant:</label>
                    <input type="text" name="username" id="username">
                </div>
                <div>
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email">
                </div>
                <div>
                    <label for="password">Mot de passe:</label>
                    <input type="password" name="password" id="password">
                </div>
                <div>
                    <label for="password2">Confirmer le mot de passe:</label>
                    <input type="password" name="password" id="password">
                </div>
                <div>
                    <label for="agree">
                        <input type="checkbox" name="agree" id="agree" value="yes"/>
                        I agree with the terms of services 
                    </label>
                </div>
                <div>
                    <button type="submit">S'inscrire</button>
                    <footer>Deja membre? <a href="login.php">Se connecter ici!</a></footer>
                </div>
            </form>
        </main>
    </body>
</html>