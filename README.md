# Création d'un formulaire PHP pour la gestion de notes

table eleves (nom, matière, note), affichage de toutes les notes, formulaire d'ajout, affichage de la moyenne calculée en PHP avec array_sum / count

## Lignes de commande pour la création de la table SQL

```sql
CREATE DATABASE IF NOT EXISTS gestion_notes; 
USE gestion_notes; 
CREATE TABLE eleves (
id INT AUTO_INCREMENT PRIMARY KEY,
nom VARCHAR(50) NOT NULL, 
matiere VARCHAR(50), 
note DECIMAL(4,2) 
);
```