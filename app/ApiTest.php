<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ApiTest
 *
 * @package App
 * @property string $name
 * @property string $subject
 * @property string $message
 * @property string $submitted_user_city
 * @property string $submitted_user_state
 * @property string $searched_for
 * @property string $email
*/
class ApiTest extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'subject', 'message', 'submitted_user_city', 'submitted_user_state', 'searched_for', 'email'];
    
    
    
}
