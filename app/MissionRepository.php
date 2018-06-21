<?php

namespace App;

use Doctrine\ORM\EntityRepository;

class MissionRepository extends EntityRepository
{
    /**
     * Get all missions.
     *
     * @return Mission[]
     */
    public function all(): array
    {
        return $this->findAll();
    }

    /**
     * Save a mission.
     */
    public function save(Mission $mission): void
    {
        $em = $this->getEntityManager();

        $em->persist($mission);
        $em->flush($mission);
    }
}
