<?php
namespace App\Tests\Validators;

use App\Tests\TestCase;

class ValidateTest extends TestCase
{
    protected $validate;
    public function setUp()
    {
        parent::setUp();
        $this->validate = new Validate;
    }

    public function testRule()
    {
        $this->assertInternalType('array', $this->validate->rule);
        $this->assertArrayHasKey('webmaster.recipe', $this->validate->rule);
        $this->assertArrayHasKey('webmaster.category', $this->validate->rule);
    }
}