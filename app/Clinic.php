<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Clinic
 *
 * @package App
 * @property string $nickname
 * @property string $clinic_email
 * @property string $clinic_phone
 * @property string $clinic_phone_2
 * @property string $logo
*/
class Clinic extends Model
{
    use SoftDeletes;

    protected $fillable = ['nickname', 'clinic_email', 'clinic_phone', 'clinic_phone_2', 'logo'];
    
    
    
}
