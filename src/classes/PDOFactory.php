<?php


class PDOFactory
{
    public static function connexion(): PDO
    {
        try {
            return new PDO('mysql:host=db;dbname=jeu_combat_php', 'root', 'example');
        } catch (Exception $e) {
            die("Erreur : " . $e->getMessage());
        }
    }
}