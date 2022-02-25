<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);


class Database
{
    private $host = "mysql:host=locahost:8080;dbname=carte";
    private $user = "root";
    private $password = "";

    private function getConnexionDatabase(){
        try{
            return new PDO($this->host, $this->user, $this->password);
        }
        catch(PDOException $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }


    public function create(string $nom, string $prenom, string $lieu_naissance, int $date_naissance,
        string $niveau_etude, string $poste, string $contact, string $image)
    {
        $q = $this->getConnexionDatabase()->prepare("INSERT INTO demande (nom, prenom, lieu_naissance, date_naissance, niveau_etude, poste, contact, image)
        VALUES (:nom, :prenom, :lieu_naissance, :date_naissance, :niveau_etude, :poste, :contact, :image)");
        return $q->execute([
            'nom'            => $nom,
            'prenom'         => $prenom,
            'lieu_naissance' => $lieu_naissance,
            'date_naissance' => $date_naissance,
            'niveau_etude'   => $niveau_etude,
            'poste'          => $poste,
            'contact'        => $contact,
            'image'          => $image,
        ]);
    }

    public function read()
    {
        return $this->getConnexionDatabase()->query("SELECT * FROM demande ORDER BY id")->fetchAll(PDO::FETCH_OBJ);
    } 

    public function readUsers($email, $password)
    {
        $q = $this->getConnexionDatabase()->query("SELECT email, password FROM users WHERE email = :email AND password = :password");
        return $q->execute(["email" => $email, 'password' => $password]);
    } 

    public function update(int $id, string $nom, string $prenom, string $lieu_naissance, int $date_naissance,
        string $niveau_etude,string $poste, string $contact, string $image)
    {
        $q = $this->getConnexionDatabase()->prepare("UPDATE demande SET nom = :nom, prenom = :prenom, 
        lieu_naissance = :lieu_naissance, date_naissance = :date_naissance, niveau_etude = :niveau_etude,
        poste = :poste, contact = :contact, image = :image WHERE id = :id");
        return $q->execute([
            'nom'            => $nom,
            'prenom'         => $prenom,
            'lieu_naissance' => $lieu_naissance,
            'date_naissance' => $date_naissance,
            'niveau_etude'   => $niveau_etude,
            'poste'          => $poste,
            'contact'        => $contact,
            'image'          => $image,
            "id"             => $id
        ]);
    }

    public function delete(int $id): bool
    {
        $q = $this->getConnexionDatabase()->query("DELETE FROM demande WHERE id = :id");
        return $q->execute(['id' => $id]);
    }

}