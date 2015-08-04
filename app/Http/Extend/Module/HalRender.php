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

namespace App\Extend\Module;

use Nocarrier\Hal;

/**
 * Hypertext Application Language返却の実装
 * Class HalRender
 *
 * @package App\Extend\Module
 * @author  yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class HalRender
{

    /** @var \Nocarrier\Hal */
    protected $hal;

    /** @var array */
    protected $headers = [
        'Content-Type' => 'application/hal+json'
    ];

    /**
     * @param Hal $hal
     */
    public function __construct(Hal $hal)
    {
        $this->hal = $hal;
    }

    /**
     * @param     $data
     * @param int $status
     * @param     $header
     * @return \Illuminate\Http\Response
     */
    public function render(Hal $data, $status = 200, $header)
    {
        $header = array_merge($this->headers, $header);

        return \Response::make($data->asJson(), $status, $header);
    }
}
