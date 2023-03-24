<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use SoftDeletes, Sluggable;

    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];
    
    public static function nextId()
    {
        return self::withTrashed()->max('id') + 1 ?: 1;
    }

    public function series(){
        
        return $this->belongsTo(Series::class);
    }
    public function readmes()
    {
        return $this->hasMany(Readme::class);
    }
    public function embeds()
    {
        return $this->hasMany(Embed::class);
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
