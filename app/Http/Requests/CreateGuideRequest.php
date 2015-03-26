<?php namespace Style\Http\Requests;

use Style\Http\Requests\Request;

class CreateGuideRequest extends Request {

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
			'slug' => 'required|alphadash|unique:guides|max:100',
      'title'     => 'required',
      'content'   => 'required',
		];
	}

}
