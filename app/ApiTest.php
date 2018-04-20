<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
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
    
    
    
}
