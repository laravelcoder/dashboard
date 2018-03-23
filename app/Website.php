<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Website
 *
 * @package App
 * @property string $website
*/
class Website extends Model
{
    use SoftDeletes;

    protected $fillable = ['website'];
    
    
    
}
