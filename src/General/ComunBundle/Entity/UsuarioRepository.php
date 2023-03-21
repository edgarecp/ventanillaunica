<?php

namespace General\ComunBundle\Entity;

use Doctrine\ORM\EntityRepository;
use General\ComunBundle\Libreria\Filtrar;

class UsuarioRepository extends EntityRepository{

    public function cantReg($repo, $perfilId){
        $em = $this->getEntityManager();
        $sql = 'SELECT count(z.id) FROM '.$repo.' z';
        if ($perfilId != 1)   $sql .= ' WHERE z.perfil != 1';
        $consul = $em->createQuery($sql);        
        return $consul->getSingleScalarResult();
    }

    public function findTodos($repo, $filtro, $perfilId){                                     
        $em = $this->getEntityManager();   
        $consulta = $em->createQueryBuilder()
                        ->select('z')
                        ->from($repo, 'z')
                        ->leftJoin('z.perfil', 'p')
                        ->where('1 = 1');
        if ($perfilId != 1)   $consulta->andWhere('z.perfil != 1');                        
        if ($filtro != " "){
            $arreglo = explode(";", $filtro);
            $tam = sizeof($arreglo);
            $funFil = new Filtrar();
            for($i = 0; $i < $tam; ++$i){
                if ($arreglo[$i+1] == 'N' or $arreglo[$i+1] == 'NN'){
                    $consulta->andWhere('z.'.$arreglo[$i].' '.$funFil->demeValido($arreglo[$i+1]));
                    $i++;
                }else{
                    if ($arreglo[$i+1] == 'L' or $arreglo[$i+1] == 'NL') $arreglo[$i+2] = '%'.$arreglo[$i+2].'%';
                    $consulta->andWhere('z.'.$arreglo[$i].' '.$funFil->demeValido($arreglo[$i+1]).' :'.$arreglo[$i]);
                    $consulta->setParameter($arreglo[$i], $arreglo[$i+2]);
                    $i = $i + 2;
                }        
            } 
        }
        return $consulta->getQuery();
    }

    public function findTodosActivos(){
        $em = $this->getEntityManager();
        $consulta = $em->createQuery('SELECT t FROM GeneralComunBundle:Usuario z WHERE fch_fin IS NULL ORDER BY z.nombre');
        return $consulta;
    }
    
    public function findAjaxValue($value){
        $em = $this->getEntityManager();
        $consulta = $em->createQuery('SELECT z FROM GeneralComunBundle:Usuario z WHERE z.nombre LIKE %'.$value.'%');
        return $consulta;
    }  
}
