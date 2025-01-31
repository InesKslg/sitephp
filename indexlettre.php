
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Connexion BD
$host = 'localhost';
$dbname = 'lettre_noel';
$username = 'root';
$password = 'root';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Échec de la connexion : " . $e->getMessage());
}

    //lettre

$nom = htmlspecialchars($_POST['nom']);
$prenom = htmlspecialchars($_POST['prenom']);
$age = htmlspecialchars($_POST['age']);
$sexe = htmlspecialchars($_POST['sexe']);
$comportement = htmlspecialchars($_POST['comportement']);
$message_perso = htmlspecialchars($_POST['message']);
$liste_cadeaux = htmlspecialchars($_POST['cadeaux']);
$email = htmlspecialchars($_POST['email']);
$first_name = htmlspecialchars($_POST['nom']);
$last_name = htmlspecialchars($_POST['prenom']);
$age = htmlspecialchars($_POST['age']);
$gender = htmlspecialchars($_POST['sexe']);
$behavior = htmlspecialchars($_POST['comportement']);
$personal_message = htmlspecialchars($_POST['message']);
$gift_list = htmlspecialchars($_POST['cadeaux']);
$email = htmlspecialchars($_POST['email']);

$query = "INSERT INTO donnees_enfant (nom, prenom, age, sexe, comportement, message_perso, liste_cadeaux, email) 
VALUES ('$nom', '$prenom', '$age', '$sexe', '$comportement', '$message_perso', '$liste_cadeaux', '$email')";


    //phrase en fonction du comportement
    switch ($comportement) {
        case "sage":
            $phrase = "j'aimerais bien trouver sous le sapin une récompense pour tous les efforts que j'ai faits,";
            break;
        case "parfaitement sage":
            $phrase = "J'espère que tu nous apporteras du bonheur et plein de belles surprises sous le sapin,";
            break;
        case "moyennement sage":
            $phrase = "J'espère que tu pardonneras mes petites bêtises et que tu nous apporteras quand même de beaux cadeaux,";
            break;
        case "pas sage du tout":
            $phrase = "Je sais que tu apportes seulement des cadeaux aux enfants sages...";
            break;
    }

    
    echo "<h2>Voici ta jolie lettre :</h2>";
    echo "<p>Cher Père Noël,</p>";
    echo "<p>Je m'appelle $last_name et j'ai $age ans. Cette année, $phrase même si, je l'avoue, j'ai parfois fait quelques petites bêtises (mais des toute petites promis !)</p>";
    echo "<p>Alors, voici ma petite liste de cadeaux : $gift_list.</p>";
    echo "<p>Merci beaucoup Père Noël, j'espère que tu vas me gâter... Je t'attends avec impatience !</p>";
    echo "<p> PS : $personal_message</p>";
    echo "<p> ~ $first_name $last_name ~ </p>";
} else {


//formulaireCSSHTML
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lettre au Père Noël</title>
    <style>
        
        body {
            font-family: Arial, sans-serif;
            background-image: url('http://localhost/lettre_noel/image.png');
            background-size: cover; 
            background-repeat: no-repeat; 
            background-position: center; 
            padding: 20px;
        }

        .form-container {
            background-color: rgba(255, 255, 255, 0.9); 
            padding: 80px;
            box-shadow: 0 4px 8px rgba(1, 1, 1, 1);
            max-width: 600px;
            margin: auto;
        }

        h1 {
            text-align: center;
            color: #4CAF50;
        }

        label {
            display: block;
            margin-top: 8px;
            font-weight: bold;
        }

        input, select, textarea, button {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 9px;
            border: 1px solid #ccc;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            margin-top: 20px;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Écris ta lettre au Père Noël</h1>
        
        <form action="" method="post">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required>

            <label for="prenom">Prenom :</label>
            <input type="text" id="prenom" name="prenom" required>

            <label for="age">Âge :</label>
            <input type="number" id="age" name="age" required>

            <label for="sexe">Tu es :</label>
            <select id="sexe" name="sexe" required>
                <option value="garçon">Garçon</option>
                <option value="fille">Fille</option>
            </select>

            <label for="comportement">Comment t'es-tu comporté cette année ?</label>
            <select id="comportement" name="comportement" required>
                <option value="sage">Sage</option>
                <option value="très sage">Très sage</option>
                <option value="moyennement sage">Moyennement sage</option>
                <option value="désobéissant">Désobéissant</option>
            </select>

            <label for="message">Ton message personnel au Père Noël :</label>
            <textarea id="message" name="message" rows="4" required></textarea>

            <label for="cadeaux">Liste des cadeaux souhaités :</label>
            <input type="text" id="cadeaux" name="cadeaux" required>

            <label for="email">Ton email :</label>
            <input type="email" id="email" name="email" required>

            <button type="submit">Clique si tu veux voir ta lettre</button>
        </form>
    </div>
</body>
</html>
<?php
}
?>
