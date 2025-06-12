<?php

namespace App\Tests\Unit\Game;

use App\Game\Game;
use App\Game\Character;
use PHPUnit\Framework\TestCase;

class GameTest extends TestCase
{
    public function testGameCreation(): void
    {
        $game = new Game();
        
        $this->assertEmpty($game->getCharacters());
    }

    public function testAddCharacter(): void
    {
        $game = new Game();
        $hero = new Character('Hero');
        
        $game->addCharacter($hero);
        
        $this->assertCount(1, $game->getCharacters());
        $this->assertSame($hero, $game->getCharacters()[0]);
    }

    public function testAddMultipleCharacters(): void
    {
        $game = new Game();
        $hero1 = new Character('Hero1');
        $hero2 = new Character('Hero2');
        
        $game->addCharacter($hero1);
        $game->addCharacter($hero2);
        
        $this->assertCount(2, $game->getCharacters());
        $this->assertSame($hero1, $game->getCharacters()[0]);
        $this->assertSame($hero2, $game->getCharacters()[1]);
    }
} 