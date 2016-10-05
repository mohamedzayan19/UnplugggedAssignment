<?php

namespace App\Http\Requests;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\Request;

class CreateProjectRequest extends Request
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

        $end = new \DateTime(Input::get('end')); 
        $end->modify('+1 day');
        $end = $end->format('Y-m-d');

        $phase1Start = new \DateTime(Input::get('phase1Start')); 
        $phase1Start->modify('-1 day');
        $phase1Start = $phase1Start->format('Y-m-d');

        $phase1End = new \DateTime(Input::get('phase1End')); 
        #$phase1End->modify('-1 day');
        $phase1End = $phase1End->format('Y-m-d');

        $phase3Start = new \DateTime(Input::get('phase3Start')); 
        #$phase3Start->modify('+1 day');
        $phase3Start = $phase3Start->format('Y-m-d');

        $phase2Start = new \DateTime(Input::get('phase2Start')); 
        $phase2Start->modify('-1 day');
        $phase2Start = $phase2Start->format('Y-m-d');

        $phase2End = new \DateTime(Input::get('phase2End')); 
        #$phase2End->modify('-1 day');
        $phase2End = $phase2End->format('Y-m-d');

        $phase3Start1 = new \DateTime(Input::get('phase3Start')); 
        $phase3Start1->modify('-1 day');
        $phase3Start1 = $phase3Start1->format('Y-m-d');
        return [
            //
            'title' => ['required','min:3','max:15'],
            'description' => ['required','min:3','max:15'],
            'start' => ['required'],
            'end' => ['required','after:'.$start],
            'phase2Title' => ['required'],
            'phase1Start' => ['required','after:'.$start,'before:'.$end],

            'phase1End' => ['required','after:'.$start,'before:'.$end,
            'after:'.$phase1Start],

            'phase2Title' => ['required'],

            'phase2Start' => ['required','after:'.$start,'before:'.$end,
            'after:'.$phase1End,'before:'.$phase3Start],

            'phase2End' => ['required','after:'.$start,'before:'.$end,
            'after:'.$phase2Start,'before:'.$phase3Start],

            'phase3Title' => ['required'],

            'phase3Start' => ['required','after:'.$start,'before:'.$end,
            'after:'.$phase2End],

            'phase3End' => ['required','after:'.$start,'before:'.$end,
            'after:'.$phase3Start1],
            
        ];
    }
}
