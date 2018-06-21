<?php

namespace App;

class QuestRepository extends Repository
{
    public function all(): array
    {
        return $this->em->getRepository(Quest::class)->findAll();
    }

    public function active(): array
    {
        return $this->em->getRepository(Quest::class)->findByCompleted(false);
    }

    public function completed(): array
    {
        return $this->em->getRepository(Quest::class)->findByCompleted(true);
    }

    /**
     * Find a quest by it's id.
     */
    public function byId(int $id): ?Quest
    {
        return $this->em->getRepository(Quest::class)->findOneById($id);
    }
}
