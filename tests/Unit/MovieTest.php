<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class MovieTest extends TestCase
{

    public function main_page_test(): void
    {
        $response = $this->get(route('movies.index'));

        $response->assertSuccessful();
        $response->assertSee('Popular Movies');
    }
}
