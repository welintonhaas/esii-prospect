<? 
/**************************************************
*
* SOFTWARE PARA ARMAZENAR INFORMAÇÕES DE PROSPECTS
* Autor Welinton Haas
* Data: 30/09/2020
*
**************************************************/
namespace models;

class Prospect 
{
    public $codigo;
    public $nome;
    public $email;
    public $celular;
    public $facebook;
    public $whatsapp;
    public $instagram;
    public $endereco;
    public $dataNascimento;

    public function addProspect($nome,$email,$celular,$facebook,$whatsapp,$instagram,$endereco,$dataNascimento)
    {
        $this->nome             = $nome;
        $this->email            = $email;
        $this->celular          = $celular;
        $this->facebook         = $facebook;
        $this->whatsapp         = $whatsapp;
        $this->instagram        = $instagram;
        $this->endereco         = $endereco;
        $this->dataNascimento   = $dataNascimento;
    }
}