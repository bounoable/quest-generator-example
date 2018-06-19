<?php

namespace App\Battle;

class CharacterRepository
{
    /**
     * The list of characters.
     *
     * @var Character[]
     */
    private $characters = [];

    /**
     * Initialize the repository.
     */
    public function __construct()
    {
        $this->createCharacters();
    }

    /**
     * Create example characters.
     */
    protected function createCharacters(): void
    {
        $this->characters = [
            new Character('bob', 'Bob'),
            new Character('steve', 'Steve'),
            new Character('luke', 'Luke')
        ];
    }

    /**
     * Get all characters.
     *
     * @return Character[]
     */
    public function all(): array
    {
        return $this->characters;
    }

    /**
     * Find a character by it's id.
     */
    public function byId(string $id): ?Character
    {
        foreach ($this->characters as $character) {
            if ($character->getId() === $id) {
                return $character;
            }
        }

        return null;
    }

    /**
     * Get a random character.
     */
    public function random(): ?Character
    {
        return count($this->characters) ? $this->characters[array_rand($this->characters)] : null;
    }
}
