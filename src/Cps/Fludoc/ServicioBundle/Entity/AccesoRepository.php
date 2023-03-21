<?php

namespace Cps\Fludoc\ServicioBundle\Entity;

use Doctrine\ORM\EntityRepository;
use General\ComunBundle\Libreria\Filtrar;

class AccesoRepository extends EntityRepository{

    public function cantReg($entidad){
        $em = $this->getEntityManager();
        $sql = 'SELECT count(t.id) FROM '.$entidad.' t';
        $consul = $em->createQuery($sql);
        return $consul->getSingleScalarResult();
    }

    public function findTodos($entidad, $filtro){
        $em = $this->getEntityManager(); 
        $consulta = $em->createQueryBuilder()
                        ->select('t')
                        ->from($entidad, 't')
                        ->leftJoin('t.usuario', 'u');
        if ($filtro != " "){
            $consulta->where('1 = 1');
            $arreglo = explode(";", $filtro);
            $tam = sizeof($arreglo);
            $funFil = new Filtrar();
            for($i = 0; $i < $tam; ++$i){
                if ($arreglo[$i+1] == 'N' or $arreglo[$i+1] == 'NN'){
                    $consulta->andWhere('t.'.$arreglo[$i].' '.$funFil->demeValido($arreglo[$i+1]));
                    $i++;
                }else{
                    if ($arreglo[$i+1] == 'L' or $arreglo[$i+1] == 'NL') $arreglo[$i+2] = '%'.$arreglo[$i+2].'%';
                    $consulta->andWhere('t.'.$arreglo[$i].' '.$funFil->demeValido($arreglo[$i+1]).' :'.$arreglo[$i]);
                    $consulta->setParameter($arreglo[$i], $arreglo[$i+2]);
                    $i = $i + 2;
                }        
            } 
        }
        return $consulta->getQuery();
    }

    public function findOneAnt($entidad, $id){
        $em = $this->getEntityManager();
        $consul = $em->createQuery('SELECT t FROM '.$entidad.' t WHERE t.id != '.$id.'
                                    ORDER BY t.id DESC');
        $consul->setMaxResults(1);
        return $consul->getOneOrNullResult();
    }
    
}
