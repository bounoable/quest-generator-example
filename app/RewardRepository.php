<?php

namespace App;

use Doctrine\ORM\EntityRepository;

class RewardRepository extends EntityRepository
{
    /**
     * Save a reward.
     */
    public function save(Reward $reward): void
    {
        $em = $this->getEntityManager();

        $em->persist($reward);
        $em->flush($reward);
    }
}
