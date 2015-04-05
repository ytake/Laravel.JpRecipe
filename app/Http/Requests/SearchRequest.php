<?php
namespace App\Http\Requests;

/**
 * Class SearchRequest
 * @package App\Http\Requests
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class SearchRequest extends Request
{

    /** @var string  */
    protected $redirectRoute = "home.index";

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'words' => 'required'
        ];
    }

    /**
     * Set custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'words.required' => '検索キーワードを入力して下さい'
        ];
    }

}
