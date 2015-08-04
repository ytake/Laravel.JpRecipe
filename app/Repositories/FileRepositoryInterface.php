<?php

namespace App\Repositories;

/**
 * Class FileRepository
 *
 * @package App\Repositories
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
interface FileRepositoryInterface
{

    /**
     * @param $directory
     *
     * @return array
     */
    public function scanDirectory($directory);
}
