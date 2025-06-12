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

    public function testCheckEmptyCell(): void
    {

        $grid = new Grid(5, 5);

        $cell = $grid->getCell(1, 1);
        $this->assertEquals('empty', $cell);

    }

    public function testFillCell(): void
    {
        $grid = new Grid(5, 5);
        $content = ['' => ''];
        $cell = $grid->changeCell(1, 1, $content);
        $this->assertEquals($content, $cell->content);
    }

    public function testgetInvalidCell(): void
    {

        $grid = new Grid(1, 1);

        $cell = $grid->getCell(2, 1);
        $this->assertNull($cell);
    }

    public function testfillCellChangeGrid(): void
    {
        $grid = new Grid(5, 5);
        $content = ['' => ''];
        $grid->changeCell(1, 1, $content);
        $this->assertEquals($content, $grid->getCell(1, 1)->content);
    }

    public function testMoveCellContent(): void
    {
        $grid = new Grid(2, 2);
        $content = ['' => ''];
        $grid->changeCell(1, 1, $content);
        $grid->moveContent(1, 1, 2, 2);
        $this->assertEquals($content, $grid->getCell(2, 2)->content);
        $this->assertEquals("empty", $grid->getCell(1, 1)->content);

    }
}