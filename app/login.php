<?php
    require_once('./functions.php');

    if (isset($_POST['send'])) {
        // dd($_POST);

        $link = connectDB();
        $sql = 'SELECT * FROM users WHERE email=:email AND password = :password';

        $sth = $link->prepare($sql);
        $sth->execute([
            'email' => $_POST['email'],
            'password' => $_POST['password']
        ]);

        $result = $sth->fetch();
        // dd($result);
        if (count($result) != 0) {
            $_SESSION['user'] = $result;
            header("Location: index.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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

        <label for="password">Mot de passe</label>
        <input 
            type="password" 
            name="password" 
            id="password" 
            value="" 
            placeholder="Entrez votre mot de passe" 
            required
        />
        <input type="submit" value="Login" name="send" />
    </form>
    <a href="registration.php">Pas encore de compte ?</a>
</body>
</html>