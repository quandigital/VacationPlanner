<?php namespace App;

use Illuminate\Database\Eloquent\Model;


class Holiday extends Model
{


    /**
     * Treat these attributes as Carbon instances
     *
     * @var array
     */
    protected $dates = ['date', 'authorized_at'];

    /**
     * Disable timestamps
     *
     * @var bool
     */
    //public $timestamps = false;


    /**
     * These attributes are mass-assignable
     *
     * @var array
     */
    protected $fillable = ['id', 'user_id', 'date', 'authorized_by', 'authorized_at'];


    /**
     * Get the user associated with the given holiday
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
