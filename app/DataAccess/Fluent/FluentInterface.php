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

namespace App\DataAccess\Fluent;

/**
 * Interface FluentInterface
 *
 * @package App\Repositories\Fluent
 */
interface FluentInterface
{
    /**
     * @param array $attributes
     * @return mixed
     */
    public function add(array $attributes);

    /**
     * @param array $columns
     * @return mixed
     */
    public function all(array $columns = ['*']);

    /**
     * @param       $id
     * @param array $columns
     * @param int   $lifeTime
     * @return mixed
     */
    public function find($id, array $columns = ['*'], $lifeTime = 120);

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id);

    /**
     * @param       $id
     * @param array $attributes
     * @return mixed
     */
    public function update($id, array $attributes);
}
