<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'role_id',
        'name',
        'identifier',
        'icon',
        'link',
        'desc'
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function submenus()
    {
        return $this->hasMany(Submenu::class);
    }
}
