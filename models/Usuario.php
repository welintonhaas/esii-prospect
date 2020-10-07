<? 
/**************************************************
*
* SOFTWARE PARA ARMAZENAR INFORMAÇÕES DE PROSPECTS
* Autor Welinton Haas
* Data: 30/09/2020
*
**************************************************/
namespace models;

class Usuario 
{
    public $codigo;
    public $login;
    public $senha;
    public $nome;
    public $email;
    public $celular;

    public function addUsuario($login,$senha,$nome,$email,$celular)
    {
        $this->login    = $login;
        $this->senha    = $senha;
        $this->nome     = $nome;
        $this->email    = $email;
        $this->celular  = $celular;
    }

}