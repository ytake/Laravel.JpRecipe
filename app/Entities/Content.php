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
 * Class Content
 *
 * @property string title
 * @property string description
 * @property string topic
 * @property string body
 * @property int categoryIdentifier
 * @package App\Entities
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class Content
{

    /** @var string */
    protected $title;

    /** @var string */
    protected $description;

    /** @var string */
    protected $topic;

    /** @var string */
    protected $body;

    /** @var int */
    protected $categoryIdentifier;

    /** @var   */
    protected $identifier;

    use Setter;

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getTopic()
    {
        return $this->topic;
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @return string
     */
    public function getCategoryIdentifier()
    {
        return $this->categoryIdentifier;
    }
}
