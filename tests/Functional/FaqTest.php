<?php

class FaqTest extends \TestCase
{
    /** @var \App\Http\Controllers\FaqController */
    protected $controller;

    public function setUp()
    {
        parent::setUp();
        $this->controller = new \App\Http\Controllers\FaqController();
    }

    public function testAccessFaq()
    {
        /** @var \Illuminate\View\View $content */
        $content = $this->controller->index();
        $this->assertSame('home.faq.index', $content->getName());
        $renderSection = $content->getFactory()->getSections();
        $this->assertArrayHasKey('title', $renderSection);
        $this->assertSame($renderSection['title'], 'Laravel Recipes日本語版FAQ');
    }
}
