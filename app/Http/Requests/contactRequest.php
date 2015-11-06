<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class contactRequest extends Request
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
            'fname' => 'required|min:2',
            'lname' => 'required|min:2',
            'phone' => 'required|numeric',
            'payment' => 'required',
            'content' => 'required|min:10',
            'address' => 'required|min:2',
            'invites' => 'required|integer|min:1',
            'service' => 'required',
            'event' => 'required',
        ];
    }
    
    public function messages(){
    	return [
    	    'fname' => 'השם הפרטי חייב להכיל לפחות 2 תווים',
    	    'lname' => 'שם המשפחה חייב להכיל לפחות 2 תווים',
    	    'phone' => 'מספר הפלאפון חייב להיות מספר',
    	    'payment' => 'נא בחר אמצעי תשלום',
    	    'content' => 'ההודעה חייבת להכיל לפחות 10 תווים',
            'address' => 'נא למלאת כתובת',
            'invites' => 'מספר המוזמנים חייב להיות לפחות 1',
            'service' => 'הא לבחור שירות אחד לפחות',
            'event' => 'נא לבחור אירוע',
    	];
    }
}