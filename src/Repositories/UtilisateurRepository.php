<?php

class UtilisateurRepository
{
    public function create(
        $name,
        $surname,
        $email,
        $mdp,
        $compte_active
    ) {
        $database = new Database();

        $query = $database->getDb()->prepare('
            INSERT INTO utilisateur (name, surname, email, mdp, compte_active) 
            VALUES (:name, :surname, :email, :mdp, :compte_active)
        ');

        $query->execute([
            'name' => $name,
            'surname' => $surname,
            'email' => $email,
            'mdp' => $mdp,
            'compte_active' => $compte_active,
        ]);
    }
}
