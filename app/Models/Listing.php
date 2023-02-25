<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    // protected $fillable = ['title', 'company', 'location', 'website','email','tags','description'];
    public function scopeFilter($query, array $filters){
        if($filters['tag'] ?? false){
            $query->where('tags', 'like', "%". $filters['tag'] . "%");
        }

        if($filters['search'] ?? false){
            $query->where('tags', 'like', "%". $filters['search'] . "%")
            ->orWhere('description', 'like', "%". $filters['search'] . "%")
            ->orWhere('title', 'like', "%". $filters['search'] . "%")
            ->orWhere('location', 'like', "%". $filters['search'] . "%")
            ->orWhere('website', 'like', "%". $filters['search'] . "%");
        }
    }
    use HasFactory;
}
