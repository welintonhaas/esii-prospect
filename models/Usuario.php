<?php

namespace models;

/**
 * Classe Model de Usuário
 * @author Paulo Roberto Córdova
 */
class Usuario{

    /**
    * Login do usuário
    * @var string
    */
    public $login;

    /**
    * Nome do usuário
    * @var string
    */
    public $nome;

    /**
    * E-mail do usuário
    * @var string
    */
    public $email;

    /**
    * Celular do usuário
    * @var string
    */
    public $celular;

    /**
    * Identifica se o usuário está ou não logado
    * @var boolean
    */
    public $logado;

    /**
    * Carrega os atributos da classe usuário
    * @param string $login Login do Usuário
    * @param string $nome Nome do Usuário
    * @param string $email E-mail do Usuário
    * @param string $celular Celular do Usuário
    * @param boolean $logado Identifica se o Usuário está ou não logado
    * @return void
    */
    public function addUsuario($login, $nome, $email, $celular, $logado)
    {
        $this->login = $login;
        $this->nome = $nome;
        $this->email = $email;
        $this->celular = $celular;
        $this->logado = $logado;
    }

}
?>