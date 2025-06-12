<?php

namespace App\Game;


class Grid
{

    public readonly int $width;
    public readonly int $height;
    private array $cells = [];


    public function __construct(int $rows, int $columns)
    {
        $this->height = $rows;
        $this->width = $columns;
        $this->initializeGrid();
    }



    /**
     * Magic getter pour accéder aux propriétés en lecture seule
     * @param string $name Nom de la propriété
     * @return mixed
     */
    public function __get($name)
    {
        $method = 'get' . ucfirst($name);
        if (method_exists($this, $method)) {
            return $this->$method();
        }
    }



    // /**
    //  * Get the value of width
    //  */ 
    // public function getwidth()
    // {
    //     return $this->width;
    // }

    // /**
    //  * Get the value of height
    //  */ 
    // public function getheight()
    // {
    //     return $this->height;
    // }

    /**
     * Set the value of cells
     *
     * @return  self
     */
    public function initializeGrid()
    {
        for ($i = 0; $i < $this->width; $i++) {
            $this->cells[$i] = [];
            for ($j = 0; $j < $this->height; $j++) {
                $this->cells[$i][$j] = (object) [];
            }
        }

        return $this;
    }

    /**
     * Get the value of cells
     */
    public function getCells()
    {
        return $this->cells;
    }
}
