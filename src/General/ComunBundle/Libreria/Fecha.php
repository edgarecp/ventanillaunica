<?php

namespace General\ComunBundle\Libreria;

class Fecha{

    private $meses  = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 
                            'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
                            
    private $mesesAbr  = array('Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic');
    
    public function getNombreMes($mes){
        return $this->meses[$mes-1];
    }
    
    public function getNombreMesAbr($mes){
        return $this->mesesAbr[$mes-1];
    }
    
}
