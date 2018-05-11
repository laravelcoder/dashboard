<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Booking
 *
 * @package App
 * @property string $submitted
 * @property string $customername
 * @property string $phone
 * @property string $family_number
 * @property string $email
 * @property string $how_long
 * @property string $requested_date
 * @property time $requested_time
 * @property string $requested_clinic
 * @property string $clinic_id
 * @property string $clinic_email
 * @property string $clinic_address
 * @property string $clinic_phone
 * @property string $clinic_text_numbers
 * @property string $client_firstname
 * @property string $submitted_user_city
 * @property string $submitted_user_state
 * @property string $searched_for
 * @property string $latitude
 * @property string $longitude
 * @property string $country
*/
class Booking extends Model
{
    use SoftDeletes;

    protected $fillable = ['submitted', 'customername', 'phone', 'email', 'family_number', 'how_long', 'requested_date', 'requested_time', 'requested_clinic', 'clinic_id', 'clinic_email', 'clinic_address', 'clinic_phone', 'clinic_text_numbers', 'client_firstname', 'submitted_user_city', 'submitted_user_state', 'searched_for', 'latitude', 'longitude', 'country'];
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

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setRequestedDateAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['requested_date'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        } else {
            $this->attributes['requested_date'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getRequestedDateAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format'));

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d', $input)->format(config('app.date_format'));
        } else {
            return '';
        }
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setRequestedTimeAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['requested_time'] = Carbon::createFromFormat('H:i:s', $input)->format('H:i:s');
        } else {
            $this->attributes['requested_time'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getRequestedTimeAttribute($input)
    {
        if ($input != null && $input != '') {
            return Carbon::createFromFormat('H:i:s', $input)->format('H:i:s');
        } else {
            return '';
        }
    }

}
