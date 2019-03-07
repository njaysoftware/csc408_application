<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Illuminate\Notifications\Notifiable;

class Movie extends Model
{
    protected $table = 'movies';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'rating', 'length', 'onDVD', 'onBluRay', 'description'
    ];

    public function rentors()
    {
        //defines the relationship between movies and the user table
        return $this->belongsToMany('App\User', 'rentals');
    }
}
