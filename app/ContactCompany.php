<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ContactCompany
 *
 * @package App
 * @property string $name
 * @property string $logo
*/
class ContactCompany extends Model
{
    protected $fillable = ['name', 'logo'];
    
    
    
}
