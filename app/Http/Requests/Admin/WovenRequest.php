<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class WovenRequest extends FormRequest
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
        $otherValidation = [];
        $validation      = [
            'date'                  => "required",
            'customer_id'           => "required",
            'label'                 => "required",
            'designer_id'           => "required",
            'design_number'         => "required",
            'salesrep_id'           => "required",
            'weaver_id'             => "required",
            'warps_id'              => "required",
            'picks'                 => "required",
            'total_picks'           => "required",
            'wastage'               => "required",
            'finishing_id'          => "required",
            'cost_in_roll'          => "required",
            'total_cost'            => "required",
            'customer_grade'        => "required",
            'category'              => "required",
            'length'                => "required",
            'width'                 => "required",
            'sq_inch'               => "required",
            'cost_sq_inch'          => "required",
        ];
        
        if ($this->isMethod("post")) {
            $otherValidation = [
                'design_image'      => "required",
                'design_file'       => "required",
            ];
        }
      
        return array_merge($validation, $otherValidation);
    }
}
