<?php

namespace App\RewardTypes;

use Bounoable\Quest\GeneratedReward;
use Bounoable\Quest\AbstractRewardType;
use Bounoable\Quest\Reward as RewardInterface;

class Gold extends AbstractRewardType
{
    const NAME = 'gold';

    protected function getDescription(RewardInterface $reward): string
    {
        return "{$reward->getData()['amount']} Gold";
    }

    public function generate(): GeneratedReward
    {
    }
}
