<?php
namespace App\Validates;

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
    protected $rule = [
        'webmaster.rule' => [
            'title' => 'required|unique:recipes,title',
            'category_id' => 'required',
            'problem' => 'required',
            'solution' => 'required',
            'discussion' => 'required'
        ]
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
} 