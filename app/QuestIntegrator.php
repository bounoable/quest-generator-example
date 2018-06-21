<?php

namespace App;

use Bounoable\Quest\GeneratedQuest;
use Bounoable\Quest\Quest as QuestInterface;
use Bounoable\Quest\Reward as RewardInterface;
use Bounoable\Quest\Mission as MissionInterface;
use Bounoable\Quest\Integration\QuestIntegrator as Integrator;

class QuestIntegrator implements Integrator
{
    /**
     * The quest repository.
     *
     * @var QuestRepository
     */
    private $quests;

    /**
     * The mission repository.
     *
     * @var MissionRepository
     */
    private $missions;

    /**
     * The reward repository.
     *
     * @var RewardRepository
     */
    private $rewards;

    /**
     * Initialize the quest integrator.
     */
    public function __construct(QuestRepository $quests, MissionRepository $missions, RewardRepository $rewards)
    {
        $this->quests = $quests;
        $this->missions = $missions;
        $this->rewards = $rewards;
    }

    public function start(GeneratedQuest $generated): QuestInterface
    {
        $quest = new Quest;

        $this->quests->save($quest);

        foreach ($generated->getMissions() as $generatedMission) {
            $this->createMission($quest, $generatedMission);
        }

        foreach ($generated->getRewards() as $generatedReward) {
            $this->createReward($quest, $generatedReward);
        }

        return $this->quests->byId($quest->getId());
    }

    protected function createMission(Quest $quest, MissionInterface $generated): void
    {
        $mission = new Mission($quest, $generated->getType(), $generated->getData());

        $this->missions->save($mission);
    }

    protected function createReward(Quest $quest, RewardInterface $generated): void
    {
        $reward = new Reward($quest, $generated->getType(), $generated->getData());

        $this->rewards->save($reward);
    }

    public function complete(QuestInterface $quest): void
    {
        if (!$quest instanceof Quest) {
            return;
        }

        $this->quests->delete($quest);
    }
}
