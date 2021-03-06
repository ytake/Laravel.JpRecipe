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
 * Interface CategoryRepositoryInterface
 *
 * @package App\Repositories
 */
interface CategoryRepositoryInterface
{

    /**
     *
     * @param array $attribute
     * @return mixed
     */
    public function save(array $attribute);

    /**
     * @return array|static[]
     */
    public function all();

    /**
     * @param $sectionId
     * @return array|static[]
     */
    public function getCategoryBySection($sectionId);

    /**
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * @param $slug
     * @return mixed
     */
    public function getCategoryBySlug($slug);

    /**
     * @return mixed
     */
    public function getCategoryWithCount();
}
