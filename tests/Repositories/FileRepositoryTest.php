<?php

class FileRepositoryTest extends \TestCase
{
    /** @var \App\Repositories\FileRepository */
    protected $repository;
    public function setUp()
    {
        parent::setUp();
        $this->repository = new \App\Repositories\FileRepository(
            new \Illuminate\Filesystem\Filesystem()
        );
    }

    public function testScanDirectory()
    {
        $scan = $this->repository->scanDirectory(base_path('tests/docs/recipes'));
        $this->assertInternalType('array', $scan);
        $this->assertCount(3, $scan);
    }
}
