<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
    <title>Inscription</title>
</head>
<body>
    <div class="header">
        <h2>S'incrire</h2>
    </div>
	
    <form method="post" action="register.php">
  	    <?php include('errors.php'); ?>
  	    <div>
  	        <label>Nom d'utilisateur</label>
  	        <input type="text" name="username" value="<?php echo $username; ?>">
  	    </div>
  	    <div>
  	        <label>Email</label>
  	        <input type="email" name="email" value="<?php echo $email; ?>">
  	    </div>
  	    <div>
  	        <label>Mot de passe</label>
  	        <input type="password" name="password_1">
  	    </div>
  	    <div>
  	        <label>Confirmer le mot de passe</label>
  	        <input type="password" name="password_2">
  	    </div>
  	    <div>
  	    <button type="submit" name="reg_user">S'inscrire</button>
  	    </div>
  	    <p>
  		    Déjà membre? <a href="login.php">Se connecter</a>
  	    </p>
    </form>
</body>
</html>