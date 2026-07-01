<?php

class Database
{
    private $host = "localhost";
    private $dbname = "fitconnect";
    private $username = "root";
    private $password = "";

    private $connexion = null;

    public function getConnection()
    {
        if ($this->connexion == null) {

            try {

                $this->connexion = new PDO(
                    "mysql:host={$this->host};dbname={$this->dbname};charset=utf8",
                    $this->username,
                    $this->password
                );

                $this->connexion->setAttribute(
                    PDO::ATTR_ERRMODE,
                    PDO::ERRMODE_EXCEPTION
                );

                $this->connexion->setAttribute(
                    PDO::ATTR_DEFAULT_FETCH_MODE,
                    PDO::FETCH_ASSOC
                );

            } catch (PDOException $e) {

                die("Erreur de connexion : " . $e->getMessage());

            }

        }

        return $this->connexion;
    }
}