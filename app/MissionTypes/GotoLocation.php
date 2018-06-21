<?php

namespace App\MissionTypes;

use App\Mission;
use App\MissionRepository;
use App\Map\LocationRepository;
use Bounoable\Quest\GeneratedMission;
use Bounoable\Quest\AbstractMissionType;
use Bounoable\Quest\Mission as MissionInterface;

class GotoLocation extends AbstractMissionType
{
    const NAME = 'goto-location';

    /**
     * The location repository.
     *
     * @var LocationRepository
     */
    private $locations;

    /**
     * The mission repository.
     *
     * @var MissionRepository
     */
    private $missions;

    /**
     * Initialize the mission type.
     */
    public function __construct(LocationRepository $locations, MissionRepository $missions)
    {
        $this->locations = $locations;
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
            'location' => $this->locations->random()->getId()
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
        return !!$this->location->byId($data['location'] ?? '');
    }
}
