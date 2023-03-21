<?php

namespace Cps\Fludoc\AdmBundle\Entity;

use Doctrine\ORM\EntityRepository;
use General\ComunBundle\Libreria\Filtrar;

class DocrecRepository extends EntityRepository{

    public function cantReg(){
        $em = $this->getEntityManager();
        $sql = 'SELECT count(z.id) FROM CpsFludocAdmBundle:Docrec z';
        $consul = $em->createQuery($sql);
        return $consul->getSingleScalarResult();
    }
    
    public function cantRegXServ($servicioId, $tipo){
        $em = $this->getEntityManager();
        $sql = 'SELECT count(t.id) FROM CpsFludocAdmBundle:Docrec t WHERE t.servicioActual='.$servicioId;        
        if ($tipo == 'XRecep') $sql .= ' AND t.estadoActual = 1';
        if ($tipo == 'Recep')  $sql .= ' AND t.estadoActual != 1';
        if ($tipo == 'Histo'){  
            $sql = 'SELECT count(t.id) FROM CpsFludocAdmBundle:Docrec t JOIN t.derivaciones d WHERE d.servicio='.$servicioId;
            $sql .= ' AND d.estado > 2';
        }
        $consul = $em->createQuery($sql);
        return $consul->getSingleScalarResult();
    }

    public function findTodos($servicioId, $filtro, $tipo){
        $em = $this->getEntityManager();
        $consulta = $em->createQueryBuilder()
                        ->select('z')
                        ->from('CpsFludocAdmBundle:Docrec', 'z')
                        ->leftJoin('z.estadoActual', 'e')
                        ->leftJoin('z.servicioActual', 's')
                        ->Where('z.servicioActual = '.$servicioId)
                        ;   
        if ($tipo == 'XRecep') $consulta->andWhere('z.estadoActual = 1');
        if ($tipo == 'Recep')  $consulta->andWhere('z.estadoActual != 1');
        if ($tipo == 'Histo'){
            $consulta = $em->createQueryBuilder()
                        ->select('z')
                        ->from('CpsFludocAdmBundle:Docrec', 'z')
                        ->leftJoin('z.derivaciones', 'd')
                        ->Where('d.servicio = '.$servicioId)
//                        ->andWhere('d.estado > 2')
                         ;
        }      

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
    
    public function findTodos1($filtro){
        $em = $this->getEntityManager();
        $consulta = $em->createQueryBuilder()
                        ->select('z')
                        ->from('CpsFludocAdmBundle:Docrec', 'z')
                        ->leftJoin('z.estadoActual', 'e')
                        ->leftJoin('z.servicioActual', 's');
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
}
