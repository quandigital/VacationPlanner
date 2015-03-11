<?php namespace App;

use Illuminate\Database\Eloquent\Model;


class Day extends Model
{


    /**
     * Treat these attributes as Carbon instances
     *
     * @var array
     */
    protected $dates = ['date'];


    /**
     * Disable timestamps
     *
     * @var bool
     */
    public $timestamps = false;


    /**
     * These attributes are mass-assignable
     *
     * @var array
     */
    protected $fillable = ['weekday', 'holiday', 'date'];


    /**
     * Get the users associated with the given day
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('App/User')
                    ->withPivot('authorized_by', 'authorized_at')
                    ->withTimestamps();
    }
}
