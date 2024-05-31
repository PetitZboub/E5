<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classement - Canardsound</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
<?php session_start(); include('header.php'); ?>

    <div class="container">
        <div class="rankings">
            <h2>Classement des Musiques</h2>
            <table>
                <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Artiste</th>
                        <th>Nombre d'écoutes</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Connexion à la base de données
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "canardsound";
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Vérification de la connexion
                    if ($conn->connect_error) {
                        die("La connexion a échoué : " . $conn->connect_error);
                    }

                    // Récupération des données du classement
                    $sql = "SELECT titre, artiste, nombre_ecoutes FROM titres";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Affichage des données dans le tableau
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["titre"] . "</td>";
                            echo "<td>" . $row["artiste"] . "</td>";
                            echo "<td>" . $row["nombre_ecoutes"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>Aucune donnée disponible.</td></tr>";
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
