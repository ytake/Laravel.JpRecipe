<?php

class ContentParserTest extends TestCase
{
    /** @var \App\Parser\ContentParser  */
    protected $parser;

    /** @var string  */
    protected $content = '---
Title:    PHPUnitを利用しよう
Topics:   testing
Description:   testing
Keyword: Hello
---
# Header {.problem}
testing';

    /**
     *
     */
    public function setUp()
    {
        parent::setUp();
        $this->parser = new \App\Parser\ContentParser();
    }

    /**
     * content parser test
     */
    public function testParseReturnElement()
    {
        $result = $this->parser->parse($this->content);
        $this->assertInternalType('array', $result);
        $this->assertArrayHasKey('title', $result);
        $this->assertArrayHasKey('topics', $result);
        $this->assertArrayHasKey('body', $result);
        $this->assertArrayHasKey('description', $result);
        $this->assertArrayHasKey('keyword', $result);
    }
}

