<?php
//Permet d'initialiser la connexion une seule fois et la réutiliser dans toutes l'application par un require
try{
$bdd = new PDO('mysql:host=localhost;dbname=inventaire','root','root');
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(Exception $e)
{
die('Erreur : '.$e->getMessage());
}
