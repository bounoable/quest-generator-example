<?php

namespace App\MissionTypes;

use App\Mission;
use App\MissionRepository;
use App\Battle\CharacterRepository;
use Bounoable\Quest\GeneratedMission;
use Bounoable\Quest\AbstractMissionType;
use Bounoable\Quest\Mission as MissionInterface;

class DefeatCharacter extends AbstractMissionType
{
    const NAME = 'defeat-character';

    /**
     * The character repository.
     *
     * @var CharacterRepository
     */
    private $characters;

    /**
     * The mission repository.
     *
     * @var MissionRepository
     */
    private $missions;

    /**
     * Initialize the mission type.
     */
    public function __construct(CharacterRepository $characters, MissionRepository $missions)
    {
        $this->characters = $characters;
        $this->missions = $missions;
    }

    protected function getDescription(MissionInterface $mission): string
    {
        $character = $this->characters->byId($mission->getData()['character']);

        return "Besiege {$character->getName()} im Kampf.";
    }

    public function generate(): GeneratedMission
    {
        return new GeneratedMission($this->getTypeName(), [
            'character' => $this->characters->random()
        ]);
    }

    public function start(GeneratedMission $generated): MissionInterface
    {
        $mission = new Mission($generated->getType(), $generated->getData());

        $this->missions->save($mission);

        return $mission;
    }

    public function check(MissionInterface $mission): bool
    {
        return $mission->isCompleted();
    }

    public function validateData(array $data): bool
    {
        return is_string($this->characters->byId($data['character'] ?? ''));
    }
}
