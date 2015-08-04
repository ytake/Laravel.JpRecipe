<?php
namespace App\Jobs;

use App\Repositories\AnalyticsRepositoryInterface;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class AnalysisCommand
 * @package App\Jobs
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class AnalysisCommand extends Jobs implements SelfHandling
{

    /** @var int */
    protected $recipeId;

    /**
     * @param $recipe_id
     */
    public function __construct($recipe_id)
    {
        $this->recipeId = $recipe_id;
    }

    /**
     * @param AnalyticsRepositoryInterface $analytics
     * @return void
     */
    public function handle(AnalyticsRepositoryInterface $analytics)
    {
        $analytics->setCount($this->recipeId);
    }
}
