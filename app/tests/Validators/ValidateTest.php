<?php
namespace App\Tests\Validators;

use App\Tests\TestCase;

class ValidateTest extends TestCase
{
    /** @var Validate */
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

    /**
     * @expectedException \ErrorException
     */
    public function testNotFoundValidate()
    {
        $this->validate->validate([], 'testing');
    }

    public function testValidate()
    {
        $this->assertSame(false, $this->validate->validate([], 'webmaster.recipe'));
        $this->assertInstanceOf("Illuminate\Support\MessageBag", $this->validate->getErrors());
        $this->assertSame(true, $this->validate->validate(['words' => 'testing'], 'search'));
    }
}