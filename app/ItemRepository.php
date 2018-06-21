<?php

namespace App;

class ItemRepository
{
    /**
     * The list of items.
     *
     * @var Item[]
     */
    private $items = [];

    public function __construct()
    {
        $this->createItems();
    }

    protected function createItems(): void
    {
        $this->items = [
            new Item('apple', 'Apfel'),
            new Item('sword', 'Sword'),
            new Item('hat', 'Hut'),
            new Item('water', 'Krug Wasser')
        ];
    }

    /**
     * Find an item by it's id.
     */
    public function byId(string $id): ?Item
    {
        foreach ($this->items as $item) {
            if ($item->getId() === $id) {
                return $item;
            }
        }

        return null;
    }

    /**
     * Get a random item.
     */
    public function random(): ?Item
    {
        return count($this->items) ? $this->items[array_rand($this->items)] : null;
    }
}
