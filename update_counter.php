<?php
if (isset($_POST['id'])) {
    $id = intval($_POST['id']);

    // Connexion à la base de données
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=canardsound', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Incrémenter le compteur d'écoutes
        $requete = $pdo->prepare('UPDATE titres SET nombre_ecoutes = nombre_ecoutes + 1 WHERE id = :id');
        $requete->execute(['id' => $id]);

        echo 'Compteur mis à jour pour la chanson ID: ' . $id;
    } catch (PDOException $e) {
        echo 'Erreur de connexion : ' . $e->getMessage();
    }
} else {
    echo 'ID non fourni';
}
?>
