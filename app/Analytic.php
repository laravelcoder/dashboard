<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Analytic
 *
 * @package App
 * @property string $view_name
 * @property string $view_id
*/
class Analytic extends Model
{
    use SoftDeletes;

    protected $fillable = ['view_name', 'view_id'];
    
    
    
}
