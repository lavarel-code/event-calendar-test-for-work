<?php

declare(strict_types=1);

namespace App\Http\Requests;

use DateTime;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class EventRequest
 * @package App\Http\Requests
 */
class EventRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'date' => 'required|date_format:Y-m-d',
            'repeatBy' => 'required|integer',
        ];
    }


    /**
     * @return DateTime
     */
    public function date(): DateTime
    {
        return DateTime::createFromFormat('Y-m-d', $this->post('date'));
    }
}
