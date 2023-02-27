<?php
    require_once('./functions.php');

    if (isset($_POST['send'])) {
        // dd($_POST);

        $link = connectDB();
        $sql = 'INSERT INTO users (`email`, `password`) VALUES (:email, :password)';

        $sth = $link->prepare($sql);
        $sth->execute([
            'email' => $_POST['email'],
            'password' => $_POST['password']
        ]);

        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
    <form method="POST">
        <label for="email">Email</label>
        <input 
            type="email" 
            name="email" 
            id="email" 
            value="" 
            placeholder="Entrez votre adresse email" 
            required
        />
        <label for="email2">Confirmation</label>
        <input 
            type="email" 
            name="email2" 
            id="email2" 
            value="" 
            placeholder="Confirmez votre adresse email" 
            required
        />

        <label for="password">Mot de passe</label>
        <input 
            type="password" 
            name="password" 
            id="password" 
            value="" 
            placeholder="Entrez votre mot de passe" 
            required
        />
        <label for="password">Confirmation</label>
        <input 
            type="password" 
            name="password2" 
            id="password2" 
            value="" 
            placeholder="Confirmer votre mot de passe" 
            required
        />
        <input type="submit" value="Créer" name="send" />
    </form>
    <a href="login.php">Vous avez déjà un compte ?</a>
</body>
</html>