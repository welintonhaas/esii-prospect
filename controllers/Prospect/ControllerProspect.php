<?php
namespace controller;

$separador = DIRECTORY_SEPARATOR;
$root = $_SERVER['DOCUMENT_ROOT'];

require_once($root.'../DAO/DAOProspect.php');

use DAO\DAOProspect;

/**
 * Esta classe serve para tratar as regras de negócio pertinentes à 
 * classe Prospect.
 * Seu escopo limita-se às funções da entidade Prospect
 * 
 * @author Welinton Haas
 * 
 */
class ControllerProspect{

    /**
     * Recebe os dados de Cadastro, faz o devido tratamento e envia para o DAO executar
     * no banco de dados
     * @param string $nome Nome do Prospect
     * @param string $email Email do Prospect
     * @param string $celular Celular do Prospect
     * @param string $facebook Facebook do Prospect
     * @param string $whatsapp Whatsapp do Prospect
     * @return TRUE|Exception Retorna TRUE caso a inclusão tenha sido bem sucedida
     * ou uma Exception caso não tenha.
     */
    public function salvarProspect($nome, $email, $celular, $facebook, $whatsapp){
        $daoProspect = new DAOProspect();

        try{
            $retorno = $daoProspect->incluirProspect($nome, $email, $celular, $facebook, $whatsapp);
        }catch(\Exception $e){
            throw new \Exception($e->getMessage());
        }

        return $retorno;
    }

    /**
     * Recebe os dados do Usuário, faz o devido tratamento e envia para o DAO executar
     * no banco de dados
     * @param string $id ID do Prospect que será atualizado
     * @param string $nome Nome do Prospect
     * @param string $email Email do Prospect
     * @param string $celular Celular do Prospect
     * @param string $facebook Facebook do Prospect
     * @param string $whatsapp Whatsapp do Prospect
     * @return TRUE|Exception Retorna TRUE caso a inclusão tenha sido bem sucedida
     * ou uma Exception caso não tenha.
     */
    public function alterarProspect($id, $nome, $email, $celular, $facebook, $whatsapp){
        $daoProspect = new DAOProspect();

        try{
            $retorno = $daoProspect->atualizarProspect($id, $nome, $email, $celular, $facebook, $whatsapp);
        }catch(\Exception $e){
            throw new \Exception($e->getMessage());
        }

        return $retorno;
    }

    /**
     * Recebe os dados do Usuário, faz o devido tratamento e envia para o DAO executar
     * no banco de dados
     * @param string $id ID do Prospect que será removido
     * @return TRUE|Exception Retorna TRUE caso a exclusão tenha sido bem sucedida
     * ou uma Exception caso não tenha.
     */
    public function eliminarProspect($id){
        $daoProspect = new DAOProspect();

        try{
            $retorno = $daoProspect->excluirProspect($id);
        }catch(\Exception $e){
            throw new \Exception($e->getMessage());
        }

        return $retorno;
    }

    /**
    * Buscar um prospect no banco de dados
    * @param string $email Email do Prospect que deverá ser encontrado
    * @return nome Retorna o nome do prospec encontrado
    */
    public function econtrarProspect($email){
        $daoProspect = new DAOProspect();

        try{
            $retorno = $daoProspect->buscarProspect($email);
        }catch(\Exception $e){
            throw new \Exception($e->getMessage());
        }

        return $retorno;
    }

    /**
    * Buscar um prospect no banco de dados
    * @param int $cod_prospect Código do Prospect que deverá ser encontrado
    * @return Prospect Retorna o prospec encontrado
    */
    public function econtrarUmProspect($cod_prospect){
        $daoProspect = new DAOProspect();

        try{
            $retorno = $daoProspect->buscarUmProspect($cod_prospect);
        }catch(\Exception $e){
            throw new \Exception($e->getMessage());
        }

        return $retorno;
    }

    /**
    * Lista todos prospect do banco de dados
    * @return Prospect[] Retorna um array de prospects
    */
    public function exibirProspects(){
        $daoProspect = new DAOProspect();

        try{
            $retorno = $daoProspect->listarProspect();
        }catch(\Exception $e){
            throw new \Exception($e->getMessage());
        }

        return $retorno;
    }

}

 ?>