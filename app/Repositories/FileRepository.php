<?php

namespace App\Repositories;

use Illuminate\Filesystem\Filesystem;

/**
 * Class FileRepository
 *
 * @package App\Repositories
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class FileRepository implements FileRepositoryInterface
{
    /** @var Filesystem  */
    protected $file;

    /**
     * @param Filesystem $file
     */
    public function __construct(Filesystem $file)
    {
        $this->file = $file;
    }

    /**
     * @param $directory
     *
     * @return array
     */
    public function scanDirectory($directory)
    {
        return $this->file->allFiles($directory);
    }
}
