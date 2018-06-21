<?php

namespace App;

use Doctrine\ORM\EntityRepository;

class QuestRepository extends EntityRepository
{
    /**
     * Get all quests.
     *
     * @return Quest[]
     */
    public function all(): array
    {
        return $this->findAll();
    }

    /**
     * Find a quest by it's id.
     */
    public function byId(int $id): ?Quest
    {
        return $this->findOneById($id);
    }

    /**
     * Save a quest.
     */
    public function save(Quest $quest): void
    {
        $em = $this->getEntityManager();

        $em->persist($quest);
        $em->flush($quest);
    }

    /**
     * Delete a quest.
     */
    public function delete(Quest $quest): void
    {
        $em = $this->getEntityManager();

        $em->remove($quest);
        $em->flush($quest);
    }
}
