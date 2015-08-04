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

namespace App\Repositories;

/**
 * Interface AnalyticsRepositoryInterface
 *
 * @package App\Repositories
 */
interface AnalyticsRepositoryInterface
{

    /**
     * @param $recipeId
     * @return mixed
     */
    public function setCount($recipeId);

    /**
     * @param int $from
     * @param int $to
     * @return mixed
     */
    public function getSortedCount($from = 0, $to = 4);

    /**
     * @return mixed
     */
    public function deleteDisableKey();
}
