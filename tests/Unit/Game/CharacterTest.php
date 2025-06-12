<?php

namespace App\Tests\Unit\Game;

use App\Game\Character;
use PHPUnit\Framework\TestCase;

class CharacterTest extends TestCase
{
    public function testCharacterCreation(): void
    {
        $character = new Character('Hero');
        
        $this->assertEquals('Hero', $character->name);
        $this->assertEquals(100, $character->health);
        $this->assertTrue($character->isAlive);
    }

    public function testCharacterTakesDamage(): void
    {
        $character = new Character('Hero');
        
        $character->takeDamage(30);
        
        $this->assertEquals(70, $character->health);
        $this->assertTrue($character->isAlive);
    }

    public function testCharacterDies(): void
    {
        $character = new Character('Hero');
        
        $character->takeDamage(100);
        
        $this->assertEquals(0, $character->health);
        $this->assertFalse($character->isAlive);
    }
}
