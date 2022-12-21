<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\RoleResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // Set default array
        $skills = array();

        if (!is_null($this->skill)) {
            // Loop array inside $this->skill and define as variable i
            foreach($this->skill as $i) {
                // Push value of key skill_name from $this->skill array to new array skills
                $skills[] = $i->skill_name;
            }
        }

        return [
            'Name' => $this->user_name,
            'Education' => $this->education ? $this->education->education_name : '',
            'Birthday' => $this->user_birthday,
            'Experience' => $this->experience ? $this->experience->experience_name : '',
            'Last Position' => $this->user_last_position,
            'Applied Position' => $this->user_applied_position,
            'Top 5 Skills' => !is_null($skills) ? implode(", ", $skills) : '', // convert from array to string
            'Email' => $this->user_email,
            'Phone' => $this->user_phone,
            'Resume' => '',
            'Role' => $this->role->role_name
        ];
    }
}
