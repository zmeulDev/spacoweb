<?php

namespace App\Http\Requests;

use App\Models\Vehicle;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateVehicleRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('vehicle_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:vehicles,name,' . request()->route('vehicle')->id,
            ],
            'model' => [
                'string',
                'nullable',
            ],
            'vin' => [
                'string',
                'nullable',
            ],
            'type' => [
                'required',
            ],
            'plates' => [
                'string',
                'required',
            ],
            'odometer' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'manufacter_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'purchase_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'insurance' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'inspection' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
