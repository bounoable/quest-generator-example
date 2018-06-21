<?php

namespace App;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Reward
{
    /**
     * The reward id.
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @var int
     */
    private $id;

    /**
     * The quest the reward belongs to.
     *
     * @ORM\ManyToOne(targetEntity="App\Quest", inversedBy="rewards")
     * @ORM\JoinColumn(onDelete="cascade")
     * @var Quest
     */
    private $quest;

    /**
     * The reward type.
     *
     * @ORM\Column
     * @var string
     */
    private $type;

    /**
     * The reward data.
     *
     * @var array
     */
    private $data = [];

    /**
     * Create a reward.
     */
    public function __construct(Quest $quest, string $type, array $data = [])
    {
        $this->quest = $quest;
        $this->type = $type;
        $this->data = $data;
    }

    /**
     * Get the quest the reward belongs to.
     */
    public function getQuest(): Quest
    {
        return $this->quest;
    }

    /**
     * Get the reward type.
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Get the reward data.
     */
    public function getData(): array
    {
        return $this->data;
    }
}
