<?php
namespace DAO;
mysqli_report(MYSQLY_REPORT_STRICT);
require_once('../model/Usuario.php');
use model\Usuario;

/**
 * Esta classe é responsável por fazer a comunicação com o banco de dados,
 * promovendo as funções de logar e incluir novo usuário
 * @author Paulo Roberto Córdova
 *
 */
class DAOUsuario{

    /**
    * Função para fazer o login no sistema, validando os dados fornecidos pelo usuário
    * @param string $login Login do Usuário
    * @param string $senha Senha do Usuário
    * @return Usuario|Exception
    */
    public function logar($login, $senha){

        try{
            $connDB = $this->conectarBanco();
        }catch (\Exception $e){
            die($e->getMessage());
        }
        
        $usuario = new Usuario();

        $sql = $connDB->prepare("SELECT login, nome, email, celular from usuario
                                    WHERE
                                    login = ?
                                    AND
                                    senha = ?");
        $sql->bind_param('ss', $login, $senha);
        $sql->execute();
        
        if(!$sql->error){
            $resultado = $sql->get_result();

            if($resultado->num_rows === 0){
                $usuario->addUsuario(null, null, null, null, FALSE);
            }else{
                while($linha = $resultado->fetch_assoc()){
                $usuari->addUsuario($linha['login'], $linha['nome'], $linha['email'], $linha['celular'], TRUE);
                }
            }
        }else{
            throw new \Exception("Erro ao executar busca com os dados fornecidos!");
        }

        $sql->close();
        $connDB->close();
    }

    /**
    * Inclui um novo usuário no banco de dados
    * @param Usuario $usuario Objeto do tipo Usuario que deverá ser cadastrado
    * @return TRUE|Exception TRUE para inclusão bem sucedida ou Exception para inclusão mal sucedida
    */
    public function incluirUsuario($nome, $email, $login, $senha)
    {

        try {
            $connDB = $this->conectarBanco();
        } catch (\Exception $e) {
            die($e->getMessage());
        }

        $sqlInsert = $connDB->prepare("INSERT INTO usuario
                                        (nome, email, login, senha)
                                        VALUES
                                        (?, ?, ?, ?)");
        $sqlInsert->bind_param("ssss", $nome, $email, $login, $senha);
        $sqlInsert->execute();

        if(!$sqlInsert->error){
            $retorno =  TRUE;
        }else{
            throw new \Exception("Não foi possível incluir novo usuário!");
            die;
        }

        $connDB->close();
        $sqlInsert->close();
        return $retorno;
    }

   /**
    * Efetua conexão com ob banco de dados
    * @return MySQLi|Exception Retorna a conexão com o banco de dados MySQL se ela for estabelecida com sucesso ou Exception para inclusão mal sucedida
    */
    private function conectarBanco()
    {

        if(!defined('DS')){
            define('DS', DIRECTORY_SEPARATOR );
        }
        if(!defined('BASE_DIR')){
            define('BASE_DIR', dirname(__FILE__).DS );
        }

        require_once(BASE_DIR.'bd_config.php');

        try{
            $conn = new \MySQLi($dbhost, $user, $password, $db);
            return $conn;
        }catch(mysqli_sql_exception $e){
            throw new \Exception($e);
            die;
        }

    }
}
?>