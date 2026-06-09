<?php
require 'connexion.php'; // charge la variable $pdo

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom     = $_POST['nom'];
    $matiere = $_POST['matiere'];
    $note    = $_POST['note'];

    $pdo->query("INSERT INTO eleves (nom, matiere, note) VALUES ('$nom', '$matiere', $note)");

    header('Location: index.php');
    exit;
}

$stmt = $pdo->query('SELECT * FROM eleves');
$eleves = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Notes</title>
</head>
<body>
<h1>Liste des élèves</h1>

<table cellpadding="6" style="border: 1px solid; padding: 15px; border-collapse: collapse;">
<tr>
<th style="border: 1px solid; padding: 15px;">ID</th>
<th style="border: 1px solid; padding: 15px;">Nom</th>
<th style="border: 1px solid; padding: 15px;">Matiere</th>
<th style="border: 1px solid; padding: 15px;">Note</th>

</tr>
<?php foreach ($eleves as $eleve) : ?>
<tr>
<td style="border: 1px solid; padding: 15px;"><?= $eleve['id'] ?></td>
<td style="border: 1px solid; padding: 15px;"><?= $eleve['nom'] ?></td>
<td style="border: 1px solid; padding: 15px;"><?= $eleve['matiere'] ?></td>
<td style="border: 1px solid; padding: 15px;"><?= $eleve['note'] ?></td>
</tr>
<?php endforeach; ?>
</table>

<h3>Formulaire</h3>
<form method="POST" action="index.php">
    <label>Nom :
        <input type="text" name="nom" required>
    </label>
    <br><br>
    <label>Matière :
        <input type="text" name="matiere" required>
    </label>
    <br><br>
    <label>Note (sur 20) :
        <input type="number" name="note" min="0" max="20" step="0.01" required>
    </label>
    <br><br>
    <button type="submit">Ajouter</button>
</form>

<h3>Moyenne :</h3>
<p>
<?php
$notes = array_column($eleves, 'note');
$total = count($notes);
echo array_sum($notes) / $total;
?>
</p>

</body>
</html>