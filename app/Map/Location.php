<?php

namespace App\Battle;

class Location
{
    /**
     * The location id.
     *
     * @var string
     */
    private $id;

    /**
     * The location's name.
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
     * Get the location id.
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Get the location's name.
     */
    public function getName(): string
    {
        return $this->name;
    }
}
