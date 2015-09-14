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

namespace App\Extend;

use Nocarrier\Hal;
use App\Extend\Module\HalRender;
use Illuminate\Support\Facades\Response AS BaseResponse;

/**
 * Class ResponseFacade
 *
 * @package App\Extend
 * @author  yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class Response extends BaseResponse
{

    /**
     * Hypertext Application Language format
     * usage \Response::hal
     *
     * @param Hal   $data
     * @param int   $status
     * @param array $header
     * @return \Illuminate\Http\Response
     */
    public function hal(Hal $data, $status = 200, array $header = [])
    {
        $hal = new HalRender($data);

        return $hal->render($data, $status, $header);
    }
}
