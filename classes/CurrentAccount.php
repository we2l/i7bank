<?php
namespace classes;
require_once __DIR__.'/Bank.php';

class CurrentAccount extends Bank {

    private $user;
    private $status;
    private $agency;
    private $account;
    private $pdo;


    public function __construct($pdo, $cpf) {
        $this->pdo = $pdo;
        $this->status = true;
        $this->balance = 0;
        $this->cpf = $cpf;
        $this->setAgency();
        $this->setAccount($cpf);
        $this->registerUserInBank($cpf);
    }

    private function registerUserInBank($cpf) {
        $register = $this->pdo->prepare("INSERT INTO accountbank(id_usuario, status, agency, account, balance)
        VALUES(:id_usuario, :status, :agency, :account, :balance) ");
        
        if(!$this->readBank($cpf)) {

            $register->bindValue(":id_usuario", $cpf);
            $register->bindValue(":status", $this->status);
            $register->bindValue(":agency", $this->agency);
            $register->bindValue(":account", $this->account);
            $register->bindValue(":balance", 0);
            $register->execute();
        }
    }

    public function readBank($cpf) {
        $read = $this->pdo->prepare("SELECT * FROM accountbank WHERE id_usuario = :cpf");
        $read->bindValue(":cpf", $cpf);
        $read->execute();
        if($read->rowCount() > 0) {
            $info = $read->fetch();
            return $info;
        } else {
            return false;
        }
    }

    public function readUser($cpf) {
        $user = $this->pdo->prepare("SELECT * FROM users WHERE cpf = :cpf");
        $user->bindValue(":cpf", $cpf);
        $user->execute();
        if($user->rowCount() > 0) {
            $this->user = $user->fetch();
        } else {
            return false;
        }
    }

    public function withdraw($value, $cpf) {
        if($this->readBank($cpf)['balance'] === 0 || $value > $this->readBank($cpf)['balance']) {
            $errorValue = "Valor indisponível para saque";
            return $errorValue;
        } else {
            $balance = $this->readBank($cpf)['balance'] -= $value;
            $this->setBalanceSql($balance, $cpf);
            echo "teste";
        }
    }

    public function deposit($value, $cpf) {
        $balance = $this->readBank($cpf)['balance'] += $value;
        $this->setBalanceSql($balance, $cpf);
    }

    public function closeAccount($cpf) {
        $this->status = false;
        $closeSql = $this->pdo->prepare("UPDATE accountbank SET status = 0 WHERE id_usuario = :cpf");
        $closeSql->bindValue(":cpf", $cpf);
        $closeSql->execute();
    }
    
    public function getUser() {
        return $this->user;
    }
    
    private function setAgency() {
        $this->agency = '352521';
    }
    public function getAgency() {
        return $this->agency;
    }

    private function setAccount() {
        $this->account = '10005789';  
    }
    public function getAccount() {
        return $this->account;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function setBalanceSql($value, $cpf) {
        $balanceSql = $this->pdo->prepare("UPDATE accountbank SET balance = :value WHERE id_usuario = :cpf");
        $balanceSql->bindValue(":cpf", $cpf);
        $balanceSql->bindValue(":value", $value);
        $balanceSql->execute();
    }
    public function getBalance($cpf) {
        $balance = $this->readBank($cpf)['balance'];
        return 'R$ '.number_format($balance, 2, ',', '.');
    }
    
}