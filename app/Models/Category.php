<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'parent_id'
    ];

    /**
     * Scope a query to only include popular users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param   int $perPage
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePagination($query, $perPage)
    {
        return $query->latest()->paginate($perPage);
    }

    /**
     * Scope a query to get all elements condition match is name in category
     *
     * @param Illuminate\Database\Eloquent\Builder $query
     * @param string $nameBase
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearchName($query, $name)
    {
        return $query->where('name', 'like', "%$name%");
    }
}
