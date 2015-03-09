<?php namespace App;

use Illuminate\Database\Eloquent\Model;


class Day extends Model {

	public $timestamps = false;

    protected $fillable = ['weekday', 'holiday', 'date'];


    /**
     * Get the users associated with the given day
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('App/User');
    }
}
