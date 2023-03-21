<?php

namespace General\EmpresaBundle\Entity;

use Doctrine\ORM\EntityRepository;

use General\ComunBundle\Libreria\Filtrar;

class ServicioRepository extends EntityRepository{

    public function cantReg($repo){
        $em = $this->getEntityManager();
        $consul = $em->createQuery('SELECT count(z.id) FROM '.$repo.' z');
        return $consul->getSingleScalarResult();
    }

   public function findTodos($repo, $filtro){                                     
        $em = $this->getEntityManager();
        $consulta = $em->createQueryBuilder()
                        ->select('z')
                        ->from($repo, 'z');
        if ($filtro != " "){
            $consulta->where('1 = 1');
            $arreglo = explode(";", $filtro);
            $funFil = new Filtrar();
            $tam = sizeof($arreglo);
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
  
}
