<?php

namespace App;

use Doctrine\ORM\Mapping as ORM;
use Bounoable\Quest\Quest as QuestInterface;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="App\QuestRepository")
 */
class Quest implements QuestInterface
{
    /**
     * The quest id.
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @var int
     */
    private $id;

    /**
     * The quest missions.
     *
     * @ORM\OneToMany(targetEntity="App\Mission", mappedBy="quest")
     * @var ArrayCollection
     */
    private $missions;

    /**
     * The quest rewards.
     *
     * @ORM\OneToMany(targetEntity="App\Reward", mappedBy="quest")
     * @var ArrayCollection
     */
    private $rewards;

    /**
     * Get the quest id.
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get the quest missions.
     *
     * @return Mission[]
     */
    public function getMissions(): array
    {
        return $this->missions->toArray();
    }

    /**
     * Get the quest rewards.
     *
     * @return Reward[]
     */
    public function getRewards(): array
    {
        return $this->rewards->toArray();
    }
}
