<?php

namespace App\Game;

/**
 * @property-read string $name Le nom du personnage
 * @property-read int $health Les points de vie du personnage (0-100)
 * @property-read bool $isAlive Indique si le personnage est en vie
 */
class Character
{
    private string $name;
    private int $health;
    private bool $isAlive;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->health = 100;
        $this->isAlive = true;
    }

    /**
     * Magic getter pour accéder aux propriétés en lecture seule
     * @param string $name Nom de la propriété
     * @return mixed
     */
    public function __get($name)  {
        $method = 'get' . ucfirst($name);
        if (method_exists($this, $method)) {
            return $this->$method();
        }
    }
    public function takeDamage(int $damage): void
    {
        $this->health = max(0, $this->health - $damage);
        if ($this->health === 0) {
            $this->isAlive = false;
        }
    }
    private function getName(): string
    {
        return $this->name;
    }

    private function getHealth(): int
    {
        return $this->health;
    }

    private function getIsAlive(): bool
    {
        return $this->isAlive;
    }


}
