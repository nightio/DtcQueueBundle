<?php

namespace Dtc\QueueBundle\ORM;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\QueryBuilder;
use Dtc\QueueBundle\Doctrine\DoctrineRunManager;

class RunManager extends DoctrineRunManager
{
    use CommonTrait;

    public function getObjectManager()
    {
        return $this->getObjectManagerReset();
    }

    protected function getOldLiveRuns()
    {
        /** @var EntityManager $objectManager */
        $objectManager = $this->getObjectManager();
        /** @var QueryBuilder $queryBuilder */
        $queryBuilder = $objectManager->createQueryBuilder();
        $queryBuilder->select(['r'])
            ->from($this->getRunClass(), 'r');
        $time = time() - 86400;
        $date = new \DateTime("@$time");
        $queryBuilder->where('r.lastHeartbeatAt < :date');
        $queryBuilder->setParameter(':date', $date);

        return $queryBuilder->getQuery()->getResult();
    }
}
