<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'discription',
        'user_id',
    ];
    
    public function replies()
        {
            return $this->hasMany(Reply::class);
        }
        
    public function getPaginateByLimit(int $limit_count = 10)
        {
            // updated_atで降順に並べたあと、limitで件数制限をかける
            return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
        }
        
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

