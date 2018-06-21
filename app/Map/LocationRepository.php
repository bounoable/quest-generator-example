<?php

namespace App\Map;

class LocationRepository
{
    /**
     * The list of locations.
     *
     * @var Location[]
     */
    private $locations = [];

    /**
     * Initialize the repository.
     */
    public function __construct()
    {
        $this->createLocations();
    }

    /**
     * Create example locations.
     */
    protected function createLocations(): void
    {
        $this->locations = [
            new Location('westeros', 'Westeros'),
            new Location('wall', 'Die Mauer'),
            new Location('pentos', 'Pentos')
        ];
    }

    /**
     * Find a location by it's id.
     */
    public function byId(string $id): ?Location
    {
        foreach ($this->locations as $location) {
            if ($location->getId() === $id) {
                return $location;
            }
        }

        return null;
    }

    /**
     * Get a random location.
     */
    public function random(): ?Location
    {
        return count($this->locations) ? $this->locations[array_rand($this->locations)] : null;
    }
}
