<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Box;

class BasicTest extends TestCase
{
    public function testBoxContents()
    {
        $box = new Box(['toy', 'doll']);
        $this->assertFalse($box->has('mouse'));
        $this->assertTrue($box->has('toy'));
        $this->assertTrue($box->has('doll'));
    }

    public function testTakeOneFromTheBox()
    {
        $box = new Box(['toy', 'doll']);
        $this->assertEquals('toy', $box->takeOne());
        $this->assertEquals('doll', $box->takeOne());
        $this->assertNull($box->takeOne());
    }
}
