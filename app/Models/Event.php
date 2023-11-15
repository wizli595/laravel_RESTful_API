<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory;
    /*
        select what gone get a masse assignement 
    */
    protected $fillable = ['name', 'description', 'start_time', 'end_time', 'user_id'];
    /*
        define the relations within the models ** for a lazy Loading **
    */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function attendees(): HasMany
    {
        return $this->hasMany(Attendee::class);
    }
}
