<?php

namespace App\Game;

class Game
{
    /** @var Character[] */
    private array $characters = [];

    public function addCharacter(Character $character): void
    {
        $this->characters[] = $character;
    }

    /**
     * @return Character[]
     */
    public function getCharacters(): array
    {
        return $this->characters;
    }
} 