<?php
namespace App\Validator;

/**
 * trait CustomRule
 * @package App\Validates
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
trait CustomRule
{

    /** @var array */
    protected $errors;

    /** @var array  */
    public $rule = [
        'webmaster.recipe' => [
            'title' => 'required|unique:recipes,title',
            'category_id' => 'required',
            'problem' => 'required',
            'solution' => 'required',
            'discussion' => 'required'
        ],
        'webmaster.category' => [
            'section_id' => 'required',
            'name' => 'required|regex:/^[a-zA-Z]+$/|unique:categories,name',
            'description' => 'required',
        ],
        'search' => [
            'words' => 'required',
        ],
    ];

    /**
     * @param array $attributes
     * @param string $key
     * @return bool
     */
    public function validate(array $attributes, $key)
    {
        $validate = \Validator::make($attributes, $this->rule[$key]);
        if ($validate->passes()) {
            return true;
        }
        $this->setErrors($validate->messages());
        return false;
    }

    /**
     * Set error messages
     * @var \Illuminate\Support\MessageBag
     */
    protected function setErrors($errors)
    {
        $this->errors = $errors;
    }

    /**
     * Retrieve error message bag
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @param null $name
     * @return array
     */
    public function getRule($name = null)
    {
        if(is_null($name)) {
            return $this->rule;
        }
        return $this->rule[$name];
    }
}