<?php

namespace App\RewardTypes;

use App\Player;
use App\ItemRepository;
use Bounoable\Quest\GeneratedReward;
use Bounoable\Quest\AbstractRewardType;
use Bounoable\Quest\Reward as RewardInterface;

class Item extends AbstractRewardType
{
    const NAME = 'item';

    /**
     * The item repository.
     *
     * @var ItemRepository
     */
    private $items;

    /**
     * Initialize the reward type.
     */
    public function __construct(ItemRepository $items)
    {
        $this->items = $items;
    }

    protected function getDescription(RewardInterface $reward): string
    {
        return $this->items->byId($reward->getData()['item'])->getName();
    }

    public function generate(): GeneratedReward
    {
        return new GeneratedReward($this->getTypeName(), [
            'item' => $this->items->random()->getId()
        ]);
    }

    public function apply(RewardInterface $reward): void
    {
        $player = Player::load();

        $item = $this->items->byId($reward->getData()['item']);

        $player->addItem($item->getId());
        $player->save();
    }

    public function validateData(array $data): bool
    {
        return !!$this->items->byId($data['item'] ?? '');
    }
}
