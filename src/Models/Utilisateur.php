<?php

class Utilisateur
{
    private $id;
    private $name;
    private $surname;
    private $email;
    private $mdp;
    private $compte_active;

    public function getId()
    {
        return $this->id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    public function getSurname()
    {
        return $this->surname;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setMdp($mdp)
    {
        $this->mdp = $mdp;
    }

    public function getMdp()
    {
        return $this->mdp;
    }

    public function setCompte_Active($compte_active)
    {
        $this->compte_active = $compte_active;
    }

    public function getCompte_Active()
    {
        return $this->compte_active;
    }
}

?>