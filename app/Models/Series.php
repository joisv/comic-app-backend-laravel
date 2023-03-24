<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Series extends Model
{
    use SoftDeletes, Sluggable;
    
    protected $guarded = ['id'];
    protected $casts = [
        'views' => 'integer', // atau 'biginteger' jika Anda menggunakan tipe biginteger
    ];
   
    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'series_genre');
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
    public function status()
    {
        return $this->belongsTo(Status::class);
    }
    public function info()
    {
        return $this->hasOne(Info::class);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}

