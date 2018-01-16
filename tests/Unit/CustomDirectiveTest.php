<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Blade;
use Tests\TestCase;

class CustomDirectiveTest extends TestCase
{
    /** @test */
    public function testExample()
    {
        $this->assertFalse(Blade::check('admin'));
    }
}
