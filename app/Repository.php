<?php

namespace App;

use Doctrine\ORM\EntityManagerInterface;

class Repository
{
    /**
     * The entity manager.
     *
     * @var EntityManagerInterface
     */
    protected $em;

    /**
     * Initialize the repository.
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * Save an entity.
     */
    public function save($entity): void
    {
        $entities = is_array($entity) ? $entity : func_get_args();

        foreach ($entities as $entity) {
            $this->em->persist($entity);
        }

        $this->em->flush($entities);
    }

    /**
     * Delete an entity.
     */
    public function delete($entity): void
    {
        $entities = is_array($entity) ? $entity : func_get_args();

        foreach ($entities as $entity) {
            $this->em->remove($entity);
        }

        $this->em->flush($entities);
    }
}
