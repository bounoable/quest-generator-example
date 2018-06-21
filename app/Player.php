<?php

namespace App;

use Symfony\Component\Yaml\Yaml;

class Player
{
    const FILENAME = 'player.yml';

    /**
     * The player's gold.
     *
     * @var int
     */
    private $gold = 0;

    /**
     * The player's items (IDs).
     *
     * @var string[]
     */
    private $items = [];

    /**
     * Create a player.
     */
    protected function __construct(int $gold = 0, array $items = [])
    {
        $this->gold = $gold;
        $this->items = $items;
    }

    /**
     * Create a player.
     */
    public static function create(): self
    {
        return new static;
    }

    /**
     * Load the player.
     */
    public static function load(): self
    {
        $path = storage_path(static::FILENAME);

        if (!file_exists($path)) {
            return static::create();
        }

        $data = Yaml::parseFile($path);

        return new static($data['gold'], $data['items']);
    }

    /**
     * Save the player.
     */
    public function save(): void
    {
        $contents = Yaml::dump([
            'gold' => $this->getGold(),
            'items' => $this->getItems(),
        ]);

        file_put_contents(storage_path(static::FILENAME), $contents);
    }

    /**
     * Get the player's gold.
     */
    public function getGold(): int
    {
        return $this->gold;
    }

    /**
     * Set the player's gold.
     */
    public function setGold(int $amount): void
    {
        $this->gold = $amount;
    }

    /**
     * Get the player's items (IDs).
     *
     * @return string[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * Add an item to the player's inventory.
     */
    public function addItem(string $id): void
    {
        $this->items[] = $id;
    }
}
