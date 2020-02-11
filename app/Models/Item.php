<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Item
 * @package App\Models
 */
class Item extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $table = 'items';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [ 'deleted_at' ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'first_field',
        'second_field',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'updated_at',
        'deleted_at',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'first_field' => 'string',
        'second_field' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'first_field'  => [ 'required', 'string', 'max:35' ],
        'second_field' => [ 'required', 'string', 'max:65535' ],
    ];

    /**
     * Send the item created notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendItemCreatedNotification( $token )
    {
        $this->notify( new ResetPasswordNotification( $token ) );
    }

    /**
     * Send the item updated notification.
     *
     * @return void
     */
    public function sendItemUpdatedNotification()
    {
        $this->notify( new VerifyEmailNotification );
    }
}
