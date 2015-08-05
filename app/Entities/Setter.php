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

namespace App\Entities;

/**
 * Class Setter
 *
 * @package App\Entities
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
trait Setter
{
    /**
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        try {
            $reflectionProperty = new \ReflectionProperty($this, $name);
            if (!$reflectionProperty->isPublic()) {
                $reflectionProperty->setAccessible(true);
            }
            $reflectionProperty->setValue($this, $value);
        } catch (\ReflectionException $e) {
            return;
        }
    }
}
