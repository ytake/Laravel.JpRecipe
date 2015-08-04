<?php
/**
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\AnalyticsService;

/**
 * Class CleanCommand
 *
 * @package App\Commands
 * @author  yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class CleanCommand extends Command
{
    /** @var string  */
    protected $name = 'jp-recipe:cleanup';

    /** @var string  */
    protected $description = "redis cleanup";

    /** @var AnalyticsService */
    protected $analytics;

    /**
     * @param AnalyticsService $analytics
     */
    public function __construct(AnalyticsService $analytics)
    {
        parent::__construct();
        $this->analytics = $analytics;
    }

    /**
     * @throws \Exception
     * @throws \Predis\Connection\ConnectionException
     */
    public function fire()
    {
        try {
            $this->analytics->deleteAnalyze();
            $this->info("cleanup for Redis keys");
        } catch (\Predis\Connection\ConnectionException $error) {
            throw $error;
        }
    }
}
