<?php namespace App;

use Illuminate\Database\Eloquent\Model;


class Holiday extends Model
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
    protected $fillable = ['id', 'date', 'authorized_by', 'authorized_at'];


    /**
     * Get the user associated with the given holiday
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
