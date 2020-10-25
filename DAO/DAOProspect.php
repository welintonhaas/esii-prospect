<? 
namespace DAO;
mysqli_report(MYSQLY_REPORT_STRICT);
require_once('../model/Prospect.php');
use model\Prospect;

/**
 * Esta classe é responsável por fazer a comunicação com o banco de dados,
 * promovendo as funções de logar e incluir novo prospect
 * @author Welinton Haas
 *
 */
class DAOProspect{

    /**
    * Inclui um novo prospect no banco de dados
    * @param Prospect $prospect Objeto do tipo Prospect que deverá ser cadastrado
    * @return TRUE|Exception TRUE para inclusão bem sucedida ou Exception para inclusão mal sucedida
    */
    public function incluirProspect($nome, $email, $celular, $facebook, $whatsapp)
    {
        
        try {
            $connDB = $this->conectarBanco();
        } catch (\Exception $e) {
            die($e->getMessage());
        }

        $sqlInsert = $connDB->prepare(" INSERT INTO prospect
                                        (nome, email, celular, facebook, whatsapp)
                                        VALUES
                                        (?, ?, ?, ?, ?)");
        $sqlInsert->bind_param("ssss", $nome, $email, $celular, $facebook, $whatsapp);
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