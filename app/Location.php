<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Location
 *
 * @package App
 * @property string $nickname
 * @property string $address
 * @property string $address_2
 * @property string $city
 * @property string $state
 * @property string $phone
 * @property string $phone2
 * @property string $storefront
 * @property string $google_map_link
*/
class Location extends Model
{
    use SoftDeletes;

    protected $fillable = ['nickname', 'address', 'address_2', 'city', 'state', 'phone', 'phone2', 'storefront', 'google_map_link'];
    
    
    
}
