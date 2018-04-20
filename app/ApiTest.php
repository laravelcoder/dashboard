<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ApiTest
 *
 * @package App
 * @property string $submitted
 * @property string $name
 * @property string $email
 * @property string $subject
 * @property string $message
 * @property string $submitted_user_city
 * @property string $submitted_user_state
 * @property string $searched_for
 * @property string $latitide
 * @property string $longetude
 * @property string $country
*/
class ApiTest extends Model
{
    use SoftDeletes;

    protected $fillable = ['submitted', 'name', 'email', 'subject', 'message', 'submitted_user_city', 'submitted_user_state', 'searched_for', 'latitide', 'longetude', 'country'];
    protected $hidden = [];
    
    

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setSubmittedAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['submitted'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        } else {
            $this->attributes['submitted'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getSubmittedAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format'));

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d', $input)->format(config('app.date_format'));
        } else {
            return '';
        }
    }
    
}
