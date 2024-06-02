<?php
namespace Isaac\EcommerceDesafio\Servicos\ErroDeValidacao;

class FormatoValidacao Extends \Exception{
    public function __construct($message = 'Formato Inválido', $code = 0, \Exception $previous = null) {
        parent::__construct($message, $code, $previous);
    }
    
    public function __toString()
    {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}