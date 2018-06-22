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
        $amount = number_format($reward->getData()['amount'], 0, ',', '.');
        return "{$amount} Gold";
    }

    public function generate(): RewardInterface
    {
        return new GeneratedReward($this->getTypeName(), [
            'amount' => mt_rand(1, 10) * 100
        ]);
    }

    public function apply(RewardInterface $reward): void
    {
        $player = Player::load();

        $player->setGold($player->getGold() + $reward->getData()['amount']);
        $player->save();
    }

    public function validateData(array $data): bool
    {
        return is_int($data['amount'] ?? null);
    }
}
