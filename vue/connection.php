<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    
    <title>Connexion - Stock-Sens</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            color: #007bff;
            margin-bottom: 20px;
        }

        form {
            display: inline-block;
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        .message {
            color: #007bff;
            margin-bottom: 20px;
        }
    </style>
<body>

<?php
// Vérifier si le formulaire de connexion a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vos informations de connexion à la base de données
    $serveur = "localhost:3309";
    $utilisateur = "root";
    $mot_de_passe = "";
    $base_de_donnees = "gestion_stock_dclic";

    // Établir une connexion à la base de données
    $connexion = new mysqli($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);

    // Vérifier la connexion
    if ($connexion->connect_error) {
        die("Échec de la connexion à la base de données : " . $connexion->connect_error);
    }

    // Récupérer les données du formulaire
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Vérifier les informations d'identification dans la base de données
    $query = "SELECT * FROM admin WHERE id='$username' and mdp ='$password'";
    $result = $connexion->query($query);

    // Si l'utilisateur est trouvé dans la base de données
    if ($result->num_rows > 0) {
        // Rediriger vers le tableau de bord
        header("Location: dashboard.php");
       
        exit();
    } else {
        echo "Identifiants incorrects. Veuillez réessayer.";
    }

    // Fermer la connexion à la base de données
    $connexion->close();
}
?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
<h2>Connexion Stock-Sens</h2>

    <label for="username">Id d'utilisateur :</label><br>
    <input type="text" id="username" name="username"><br>
    <label for="password">Mot de passe :</label><br>
    <input type="password" id="password" name="password"><br><br>
    <button type="submit">Se connecter</button>
</form>

</body>
</html>