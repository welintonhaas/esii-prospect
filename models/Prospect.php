<?php

namespace pospect;

/**
 * Classe Model de Prospect
 * @author Welinton Haas
 */
class Prospect{

    /**
    * Código do prospect
    * @var int
    */
    public $codigo;

    /**
    * Nome do prospect
    * @var string
    */
    public $nome;

    /**
    * E-mail do prospect
    * @var string
    */
    public $email;
    
    /**
    * Celular do prospect
    * @var string
    */
    public $celuar;

    /**
    * Facebook do prospect
    * @var string
    */
    public $facebook;

    /**
    * Whatsapp do prospect
    * @var string
    */
    public $whatsapp;

    /**
    * Carrega os atributos da classe prospect
    * @param int $codigo Codigo do prospect
    * @param string $nome Nome do prospect
    * @param string $email E-mail do prospect
    * @param string $celular Celular do prospect
    * @param string $facebook Facebook do prospect
    * @param string $whatsapp Whatsapp do prospect
    * @return void
    */
    public function addProspect($codigo, $nome, $email, $celular, $facebook, $whatsapp)
    {
      $this->codigo = $codigo;
      $this->nome = $nome;
      $this->email = $email;
      $this->celular = $celular;
      $this->facebook = $facebook;
      $this->whatsapp = $whatsapp;
    }
    
}
?>