<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'department' => $this->department,
            'city' => $this->city
        ];
    }
}


// first_name: '',
// last_name: '',
// middle_name: '',
// address: '',
// zip_code: '',
// country_id: '',
// state_id: '',
// city_id: '',
// department_id: '',
// birth_date: '',
// date_hired: ''