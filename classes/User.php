<?php
namespace classes;
require_once './config.php';


class User {

    private $name;
    private $cpf;
    private $email;
    private $password;
    private $pdo;
    private CurrentAccount $currentAccount;

    public function __construct($pdo, $name = null, $cpf = null, $email = null, $password = null ) {
        $this->pdo = $pdo;  
        $this->setName($name);
        $this->setCpf($cpf);
        $this->setEmail($email);
        $this->setPassword($password);
        if($name != null && $cpf != null && $email != null && $password != null) {
            $this->create($name, $cpf, $email, $password);
        }
    }

    public function create($name, $cpf, $email, $password) {
        if(!$this->readByCpf($cpf)) {
            $create = $this->pdo->prepare("INSERT INTO users(name, cpf, email, password) VALUES(:name, :cpf, :email, :password )");
            $create->bindValue(":name", $name);
            $create->bindValue(":cpf", $cpf);
            $create->bindValue(":email", $email);
            $create->bindValue(":password", password_hash($password, PASSWORD_BCRYPT));
            $create->execute();
        } 
    }

    public function readByCpf($cpf) {
        $read = $this->pdo->prepare("SELECT * FROM users WHERE cpf = :cpf");
        $read->bindValue(":cpf", $cpf);
        $read->execute();
        if($read->rowCount() > 0) {
            $info = $read->fetch();
            return $info;
        } else {
            return false;
        }
    }

    public function getName() {
       $explode = explode(" ", $this->name);
       return $explode[0];
    }
    private function setName($name) {
        $this->name = ucwords($name);
    }

    public function getCpf() {
        return $this->cpf;
    }
    private function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function geEmail() {
        return $this->email;
    }
    private function setEmail($email) {
        $this->email = $email;
    }

    public function getPassword() {
        return $this->password;
    }
    private function setPassword($password) {
        $this->password = $password;
    }
}