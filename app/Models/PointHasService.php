<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PointHasService extends Model
{
    use HasFactory;

    protected $fillable = [
        'point_id',
        'service_id',
        'price'
    ];

    public function point()
    {
        return $this->belongsTo(Point::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
