<?php 
namespace controller;

$separador = DIRECTORY_SEPARATOR;
$root = $_SERVER['DOCUMENT_ROOT'];

require_once($root.'/DAO/DAOUsuario.php');

use DAO\DAOUsuario;

/**
 * Esta classe serve para tratar as regras de negócio pertinentes à 
 * classe Usuário.
 * Seu escopo limita-se às funções da entidade Usuário
 * 
 * @author Paulo Roberto Córdova
 * 
 */
class ControllerUsuario{

    /**
     * Recebe os dados de login, faz o devido tratamento e envia para o DAO executar
     * no banco de dados
     * @param string $login Login do usuário
     * @param string $senha Senha do usuário
     * @return Usuario
     */
    public function fazerLogin($login, $senha){
        $daoUsuario = new DAOUsuario();

        try{
            $usuario = $daoUsuario->logar($login, $senha);
        }catch(\Exception $e){
            throw new \Exception($e->getMessage());
        }

        unset($daoUsuario);
        return $usuario;
    }

    /**
     * Recebe os dados de cadastro, faz o devido tratamento e envia para o DAO executar
     * no banco de dados
     * @param string $nome Nome do usuário
     * @param string $email Email do usuário
     * @param string $celular Celular do usuário
     * @param string $login Login do usuário
     * @param string $senha Senha do usuário
     * @return TRUE|Exception Retorna TRUE caso a inclusão tenha sido bem sucedida
     * ou uma Exception caso não tenha.
     */
    public function salvarUsuario($nome, $email, $celular, $login, $senha){
        $daoUsuario = new DAOUsuario();

        try{
            $retorno = $daoUsuario->incluirUsuario($nome, $email, $celular, $login, $senha);
        }catch(\Exception $e){
            throw new \Exception($e->getMessage());
        }

        return $retorno;
    }

}

?>