<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Canardsound</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <center>
        <h1>Connexion</h1>
    </center>
    <?php
    if (isset($_GET['error'])) {
        echo "<p class='error'>" . htmlspecialchars($_GET['error']) . "</p>";
    }
    ?>
    <form action="connexion_action.php" method="post">
        <label for="email">Email :</label>
        <input type="email" name="email" id="email" required>
        <label for="mot_de_passe">Mot de passe :</label>
        <input type="password" name="mot_de_passe" id="mot_de_passe" required>
        <button type="submit">Se connecter</button>
    </form>

    <script src="scripts.js"></script>
</body>

</html>