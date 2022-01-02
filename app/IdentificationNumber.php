<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IdentificationNumber extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'service_response' => 'array',
        'inn_status' => 'boolean',

    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function resolveRouteBinding($value)
    {
        $inn = $this->where('inn', $value)->orWhere('id', $value)->first();
        if ($inn) {
            return $inn;
        }
        abort(404);
    }
}
