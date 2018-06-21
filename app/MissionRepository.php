<?php

namespace App;

class MissionRepository extends Repository
{
    /**
     * Get all missions.
     *
     * @return Mission[]
     */
    public function all(): array
    {
        return $this->em->getRepository(Mission::class)->findAll();
    }
}
