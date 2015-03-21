<?php
namespace App\Commands;

use App\Repositories\AnalyticsRepositoryInterface;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class AnalysisCommand
 * @package App\Commands
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class AnalysisCommand extends Command implements SelfHandling
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
