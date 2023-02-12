<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    use HasFactory;

    protected $fillable = [
        'point_name',
    ];

    /**
     * Get the services associated with the point.
     */
    public function services()
    {
        return $this->hasMany(PointHasService::class);
    }
}
