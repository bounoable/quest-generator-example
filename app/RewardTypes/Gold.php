<?php

namespace App\RewardTypes;

use App\Player;
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
        return new GeneratedReward($this->getTypeName(), [
            'amount' => mt_rand(1, 10) * 100
        ]);
    }

    public function apply(RewardInterface $reward): void
    {
        $player = Player::load();

        $player->setGold($reward->getData()['amount']);
        $player->save();
    }

    public function validateData(array $data): bool
    {
        return is_int($data['amount'] ?? null);
    }
}
