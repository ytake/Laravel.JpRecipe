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

namespace App\Http\Controllers;

use App\Services\FeedService;

/**
 * Class FeedController
 *
 * @package App\Controllers\Api
 * @author  yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class FeedController extends Controller
{

    /** @var FeedService */
    protected $feed;

    /**
     * @param FeedService $feed
     */
    public function __construct(FeedService $feed)
    {
        $this->feed = $feed;
    }

    /**
     * @get("feed/{format?}", as="feed.index")
     * @param string $format
     * @return mixed
     */
    public function getIndex($format = 'atom')
    {
        return $this->feed->getFeed($format);
    }

    /**
     * @Get("sitemap.xml", as="sitemap")
     * @return \Illuminate\Http\Response
     */
    public function getSiteMap()
    {
        return response(
            $this->feed->getSiteMap(),
            200,
            [
                "Content-Type" => "application/xml; charset=UTF-8"
            ]
        );
    }
}
