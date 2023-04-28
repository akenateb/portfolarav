<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        "title","content","category_id","user_id"
    ];

    protected static function boot(){
        parent::boot();
        if (!app()->runningInConsole()){
            self::creating(function (Article $article){
                $article->user_id = auth()->id();
            });
        }

    }

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo{
        return $this->belongsTo(Category::class);
    }

    public function getCreateAtFormattedAttribute():string{
        return Carbon::parse($this->created_at)->format("d-m-Y H:i");
    }

    public function getExcerptAttribute():string{
        return Str::excerpt($this->content);
    }
}
