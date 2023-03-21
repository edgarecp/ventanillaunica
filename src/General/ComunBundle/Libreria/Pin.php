<?php

namespace General\ComunBundle\Libreria;

class Pin{

    private $letrasM  = 'ABCDEFGHIJKLMNPQRSTUVWXYZ';
    private $letrasm  = 'abcdefghijklmnpqrstuvwxyz';
    private $numeros  = '123456789';
    
    public function getPinNum($cantDigitos){
        $resp = '';
        $conj = $this->numeros;
        for ($i=0; $i<$cantDigitos; $i++) $resp .= substr($conj, rand(0,strlen($conj)-1),1);
        return $resp;
    }
    
    public function getPinLet($cantDigitos){
        $resp = '';
        $conj = $this->letrasM.$this->letrasm;
        for ($i=0; $i<$cantDigitos; $i++) $resp .= substr($conj, rand(0,strlen($conj)-1),1);
        return $resp;
    }
    
    public function getPin($cantDigitos){
        $resp = '';
        $conj = $this->letrasM.$this->letrasm.$this->numeros;
        for ($i=0; $i<$cantDigitos; $i++) $resp .= substr($conj, rand(0,strlen($conj)-1),1);
        return $resp;
    }
    
    public function getPinMin($cantDigitos){
        $resp = '';
        $conj = $this->letrasm.$this->numeros;
        for ($i=0; $i<$cantDigitos; $i++) $resp .= substr($conj, rand(0,strlen($conj)-1),1);
        return $resp;
    }    
}
