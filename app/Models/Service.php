<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_name',
        'service_desc'
    ];

    public function point()
    {
        return $this->hasOne(PointHasService::class);
    }

    public function price()
    {
        return $this->hasOne(PointHasService::class);
    }
}
