<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SlideRequest extends FormRequest
{
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
          'texto'   => 'required',
          'img'   => 'required',
          'ativo'   => 'required',
      ];
  }

  public function attributes(){
      return[
        'texto'   => 'Titulo',
      ];
  }
}
