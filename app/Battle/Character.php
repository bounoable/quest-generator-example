<?php

namespace App\Battle;

class Character
{
    /**
     * The character id.
     *
     * @var string
     */
    private $id;

    /**
     * The character's name.
     *
     * @var string
     */
    private $name;

    /**
     * Create a character.
     */
    public function __construct(string $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * Get the character id.
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Get the character's name.
     */
    public function getName(): string
    {
        return $this->name;
    }
}
