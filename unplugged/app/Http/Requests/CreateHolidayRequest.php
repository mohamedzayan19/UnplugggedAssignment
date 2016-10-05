<?php

namespace App\Http\Requests;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\Request;

class CreateHolidayRequest extends Request
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
        $start = new \DateTime(Input::get('start')); 
        $start->modify('-1 day');
        $start = $start->format('Y-m-d');
        return [
            //
            'title' => ['required','min:3','max:15'],
            'start' => ['required'],
            'end' => ['required','after:'.$start],
            
        ];
    }
}
