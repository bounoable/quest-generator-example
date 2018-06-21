<?php

namespace App;

use Doctrine\ORM\Mapping as ORM;
use Bounoable\Quest\Mission as MissionInterface;

/**
 * @ORM\Entity
 */
class Mission implements MissionInterface
{
    /**
     * The mission id.
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @var int
     */
    private $id;

    /**
     * The quest the mission belongs to.
     *
     * @ORM\ManyToOne(targetEntity="App\Quest", inversedBy="missions")
     * @ORM\JoinColumn(onDelete="cascade")
     * @var Quest
     */
    private $quest;

    /**
     * The mission type.
     *
     * @ORM\Column
     * @var string
     */
    private $type;

    /**
     * The mission data.
     *
     * @var array
     */
    private $data = [];

    /**
     * The completion status.
     *
     * @ORM\Column(type="boolean")
     * @var bool
     */
    private $completed = false;

    /**
     * Create a mission.
     */
    public function __construct(Quest $quest, string $type, array $data = [])
    {
        $this->quest = $quest;
        $this->type = $type;
        $this->data = $data;
    }

    /**
     * Get the quest the mission belongs to.
     */
    public function getQuest(): Quest
    {
        return $this->quest;
    }

    /**
     * Get the mission type.
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Get the mission data.
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * Determine if the mission has been completed.
     */
    public function isCompleted(): bool
    {
        return $this->completed;
    }
}
