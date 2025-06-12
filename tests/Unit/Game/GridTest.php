<?php

namespace App\Tests\Unit\Game;

use App\Game\Game;
use App\Game\Grid;

use PHPUnit\Framework\TestCase;

class GridTest extends TestCase
{
    public function testGridCreation(): void
    {
        $rows = 3;
        $columns = 4;
        $grid = new Grid($rows, $columns);
        $this->assertEquals($columns, $grid->width);
        $this->assertEquals($rows, $grid->height);

    }

    public function testCellsCreation(): void
    {
        $grid = new Grid(5, 5);

        $this->assertCount(5, $grid->cells);
        foreach ($grid->cells as $row) {
            $this->assertCount(5, $row);
        }
    }


}