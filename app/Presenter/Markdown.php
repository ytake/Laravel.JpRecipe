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

namespace App\Presenter;

use ParsedownExtra;
use Ytake\LaravelAspect\Annotation\Cacheable;

/**
 * Class Markdown
 *
 * @package App\Presenter
 * @author  yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 *
 * @see     https://help.github.com/articles/github-flavored-markdown
 */
class Markdown implements MarkdownInterface
{
    /** @var ParsedownExtra */
    protected $parser;

    /**
     * @param ParsedownExtra $parser
     */
    public function __construct(ParsedownExtra $parser)
    {
        $this->parser = $parser;
    }

    /**
     * @Cacheable(cacheName="recipe:render",tags={"recipe"},key={"#cacheKey"})
     * @param      $text
     * @param null $cacheKey
     * @return mixed|string
     */
    public function render($text, $cacheKey = null)
    {
        return $this->parser->text($text);
    }

    /**
     * @param $string
     * @return mixed
     */
    public function convertToRef($string)
    {
        /*
        if (preg_match_all("/\[\[((.*?))\]\]/us", $string, $matches)) {

            foreach ($matches[0] as $key => $match) {
                $recipe = $this->recipe->getRecipeFromTitle($matches[1][$key]);
                if ($recipe) {
                    if (isset($matches[1][$key])) {
                        $replace = $matches[1][$key];
                        $ref = "[{$replace}](" . route('home.recipe', [$recipe->recipe_id]) . ")";
                        $string = str_replace($match, $ref, $string);
                    }
                }
            }
        }
        */
        return $string;
    }
}
