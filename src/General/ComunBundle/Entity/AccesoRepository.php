<?php

namespace General\ComunBundle\Entity;

use Doctrine\ORM\EntityRepository;
use General\ComunBundle\Libreria\Filtrar;

class AccesoRepository extends EntityRepository{

    public function cantReg(){
        $em = $this->getEntityManager();
        $sql = 'SELECT count(z.id) FROM GeneralComunBundle:Acceso z';
        $consul = $em->createQuery($sql);
        return $consul->getSingleScalarResult();
    }

    public function findTodos($filtro){
        $em = $this->getEntityManager(); 
        $consulta = $em->createQueryBuilder()
                        ->select('z')
                        ->from('GeneralComunBundle:Acceso', 'z')
                        ->leftJoin('z.usuario', 'u');
        if ($filtro != " "){
            $consulta->where('1 = 1');
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

    public function findOneAnt($id){
        $em = $this->getEntityManager();
        $consul = $em->createQuery('SELECT z FROM GeneralComunBundle:Acceso z WHERE z.id != '.$id.'
                                    ORDER BY z.id DESC');
        $consul->setMaxResults(1);
        return $consul->getOneOrNullResult();
    }
    
}
