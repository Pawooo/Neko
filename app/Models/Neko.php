<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Neko extends Model
{
    use HasFactory;
    // protected $table = 'nekoreg'; Specify a table (gets prioritized)

    protected $fillable = ['name', 'user_id', 'tags', 'dob', 'desc', 'img', 'palate', 'vaccines', 'location', 'breed', 'purrsound'];

    public function scopeFilter($query, array $filters) {
        if($filters['tag'] ?? false) {
            return $query->where('tags', 'like', '%' . request('tag') . '%');
        }

        if($filters['nekosagashi'] ?? false) { 
            return $query->where('name', 'like', '%' . request('nekosagashi') . '%')
                         ->orWhere('desc', 'like', '%' . request('nekosagashi'). '%')
                         ->orWhere('tags', 'like', '%' . request('nekosagashi'). '%')
                         ->orWhere('palate', 'like', '%' . request('nekosagashi'). '%')
                         ->orWhere('location', 'like', '%' . request('nekosagashi'). '%')
                         ->orWhere('breed', 'like', '%' . request('nekosagashi'). '%');
        }
        // What do you do with fallbacks in this case? 
    }
    // Bind cards to a user
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
