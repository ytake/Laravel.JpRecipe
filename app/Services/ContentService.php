<?php

namespace App\Services;

use App\Parser\ContentParser;
use App\Repositories\FileRepositoryInterface;
use App\Repositories\CategoryRepositoryInterface;

/**
 * Class ContentService
 *
 * @package App\Services
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class ContentService
{
    /** @var CategoryRepositoryInterface */
    protected $category;

    /** @var ContentParser */
    protected $content;

    /** @var FileRepositoryInterface */
    protected $file;

    /**
     * @param ContentParser               $content
     * @param CategoryRepositoryInterface $category
     * @param FileRepositoryInterface     $file
     */
    public function __construct(
        ContentParser $content,
        CategoryRepositoryInterface $category,
        FileRepositoryInterface $file
    ) {
        $this->content = $content;
        $this->category = $category;
        $this->file = $file;
    }

    /**
     * @param array $files
     *
     * @return string[]
     */
    public function getContent(array $files)
    {
        $result = [];
        /** @var \Symfony\Component\Finder\SplFileInfo $file */
        foreach ($files as $file) {
            $category = $this->getContentCategory($file->getRelativePath());
            if (count($category)) {
                $result[] = $this->parsedContent($file->getRealPath());
            }
        }
        return $result;
    }

    /**
     * @param $path
     *
     * @return \Symfony\Component\Finder\SplFileInfo[]
     */
    public function scanRecipeFiles($path)
    {
        return $this->file->scanDirectory($path);
    }

    /**
     * @param $path
     *
     * @return mixed
     */
    public function getContentCategory($path)
    {
        return $this->category->getCategoryBySlug($path);
    }

    /**
     * @param $file
     *
     * @return \string[]
     */
    protected function parsedContent($file)
    {
        return $this->content->parse($this->file->open($file));
    }
}
