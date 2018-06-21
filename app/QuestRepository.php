<?php

namespace App;

class QuestRepository extends Repository
{
    /**
     * Get all quests.
     *
     * @return Quest[]
     */
    public function all(): array
    {
        return $this->em->getRepository(Quest::class)->findAll();
    }

    /**
     * Find a quest by it's id.
     */
    public function byId(int $id): ?Quest
    {
        return $this->em->getRepository(Quest::class)->findOneById($id);
    }
}
