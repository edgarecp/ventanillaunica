<?php

namespace Cps\Fludoc\AdmBundle\Entity;

use Doctrine\ORM\EntityRepository;

class DerivacionRepository extends EntityRepository{

    public function findUltima($docrecId, $servicioId){
        $em = $this->getEntityManager();
        $consul = $em->createQuery('SELECT t FROM CpsFludocAdmBundle:Derivacion t WHERE t.docrec='.$docrecId.'
                                                                                    AND t.servicio='.$servicioId.'
                                             ORDER BY t.id DESC
                                  ');
        $consul->setMaxResults(1);
        return $consul->getSingleResult();
    }

}
