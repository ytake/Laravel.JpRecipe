<?php

namespace spec\App\Parser;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ContentParserSpec extends ObjectBehavior
{
    /** @var string  */
    protected $content = '---
Title:    phpspec
Topics:   testing
Description:   testing
Keyword: Hello
---
# Header {.problem}
testing';

    function it_is_initializable()
    {
        $this->shouldHaveType('App\Parser\ContentParser');
    }

    function it_should_be_array_return_parsed_contents()
    {
        $this->parse($this->content)->shouldBeArray();
    }

    function it_should_return_separate_content()
    {
        $result = $this->parse($this->content);
        $result['title']->shouldBeString();
        $result['topics']->shouldBeString();
        $result['description']->shouldBeString();
        $result['keyword']->shouldBeString();
        $result['body']->shouldBeString();
    }
}
