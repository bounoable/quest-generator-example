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
     * Create a player.
     */
    public function __construct(int $gold = 0)
    {
        $this->gold = $gold;
    }

    /**
     * Load the player.
     */
    public static function load(): self
    {
        $path = storage_path(static::FILENAME);

        if (!file_exists($path)) {
            return new static;
        }

        $data = Yaml::parseFile($path);

        return new static($data['gold']);
    }

    /**
     * Save the player.
     */
    public function save(): void
    {
        $contents = Yaml::dump([
            'gold' => $this->getGold()
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
}
