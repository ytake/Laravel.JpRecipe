<?php

namespace App\Services;

use App\Repositories\AnalyticsRepositoryInterface;

/**
 * Class AnalyticsService
 *
 * @package App\Services
 */
class AnalyticsService
{
    /** @var AnalyticsRepositoryInterface  */
    protected $analyze;

    /**
     * @param AnalyticsRepositoryInterface $analyze
     */
    public function __construct(AnalyticsRepositoryInterface $analyze)
    {
        $this->analyze = $analyze;
    }

    /**
     * delete analyze data
     * @return void
     */
    public function deleteAnalyze()
    {
        $this->analyze->deleteDisableKey();
    }
}
