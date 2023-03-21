<?php

namespace General\ComunBundle\Libreria;

class Filtrar{

    private $opCarN = array('L' => 'Like',  'NL' => 'No Like', '=' => 'Igual','#'  => 'Diferente', 'N' => 'Nulo', 'NN' => 'No Nulo');
    private $opCar  = array('L' => 'Like',  'NL' => 'No Like', '=' => 'Igual','#'  => 'Diferente',);
    private $opEnt  = array('=' => 'Igual', '#' => 'Diferente');
    private $op     = array('=' => 'Igual', '#' => 'Diferente', '>' => '>', '>=' => '>=', '<' => '<', '<=' => '<=');
    private $opN    = array('=' => 'Igual', '#' => 'Diferente', '>' => '>', '>=' => '>=', '<' => '<', '<=' => '<=', 'N' => 'Nulo', 'NN' => 'No Nulo');
    
    public function convertirACadena($arrayFiltro){
        $resp = "";
        $llaves = array_keys($arrayFiltro);
        $tam = sizeof($llaves)-1;
        $campos = array();
        for($i = 0; $i < $tam; ++$i){
            if (substr($llaves[$i], 0, 4) != 'fil_')
                $campos[] = $llaves[$i];
        }
        $tam = sizeof($campos);
        $cadenaFiltro = "";
        for($i = 0; $i < $tam; ++$i){
            $var = $campos[$i];
            $varOp = 'fil_'.$var;
            if ($arrayFiltro[$varOp] == 'N' or $arrayFiltro[$varOp] == 'NN'){
                $cadenaFiltro .= $var.";";
                $cadenaFiltro .= $arrayFiltro[$varOp].";";
            }else{
                if ($arrayFiltro[$var]){
                    $cadenaFiltro .= $var.";";
                    $cadenaFiltro .= $arrayFiltro[$varOp].";";
                    $cadenaFiltro .= $arrayFiltro[$var].";";
                }
            }            
        }    
        if ($cadenaFiltro != "") 
            $cadenaFiltro = substr($cadenaFiltro, 0 ,-1);
        else
            $cadenaFiltro = " ";
        return $cadenaFiltro;
    }
    
    public function demeValido($cod){
        switch ($cod){
            case "L"  : $resp = "LIKE";        break;
            case "NL" : $resp = "NOT LIKE";    break;
            case "N"  : $resp = "IS NULL";     break;
            case "NN" : $resp = "IS NOT NULL"; break;
            case "#"  : $resp = "<>";          break;
            case "="  : $resp = "=";           break;
            case ">=" : $resp = ">=";          break;
            case "<=" : $resp = "<=";          break;
            case ">"  : $resp = ">";           break;
            case "<"  : $resp = "<";           break;
        }
        return $resp;
    }
    
    public function getOpCar(){
        return $this->opCar;
    }
    
    public function getOpCarN(){
        return $this->opCarN;
    }
    
    public function getOpEnt(){
        return $this->opEnt;
    }
        
    public function getOp(){
        return $this->op;
    }
        
    public function getOpN(){
        return $this->opN;
    }    
    
}
