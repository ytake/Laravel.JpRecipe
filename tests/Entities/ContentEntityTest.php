<?php

use App\Entities\Content;

class ContentEntityTest extends \TestCase
{
    /** @var Content */
    protected $content;

    public function setUp()
    {
        parent::setUp();
        $this->content = new Content;
    }

    public function testSetProperty()
    {
        $this->content->title = 'title';
        $this->assertSame($this->content->getTitle(), 'title');
        $this->content->description = 'title';
        $this->assertSame($this->content->getDescription(), 'title');
        $this->content->topic = 'title';
        $this->assertSame($this->content->getTopic(), 'title');
        $this->content->body = 'title';
        $this->assertSame($this->content->getBody(), 'title');
    }
}
