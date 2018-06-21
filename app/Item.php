<?php

namespace App;

class Item
{
    /**
     * The item id.
     *
     * @var string
     */
    private $id;

    /**
     * The item name.
     *
     * @var string
     */
    private $name;

    /**
     * Create an item.
     */
    public function __construct(string $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * Get the item id.
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Get the item name.
     */
    public function getName(): string
    {
        return $this->name;
    }
}
