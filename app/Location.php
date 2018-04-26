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
 * @property string $clinic
 * @property string $contact_person
*/
class Location extends Model
{
    use SoftDeletes;

    protected $fillable = ['nickname', 'address', 'address_2', 'city', 'state', 'phone', 'phone2', 'storefront', 'google_map_link', 'clinic_id', 'contact_person_id'];
    protected $hidden = [];
    
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setClinicIdAttribute($input)
    {
        $this->attributes['clinic_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setContactPersonIdAttribute($input)
    {
        $this->attributes['contact_person_id'] = $input ? $input : null;
    }
    
    public function clinic()
    {
        return $this->belongsTo(Clinic::class, 'clinic_id')->withTrashed();
    }
    
    public function contact_person()
    {
        return $this->belongsTo(Contact::class, 'contact_person_id');
    }
    
    public function zipcodes() {
        return $this->hasMany(Zipcode::class, 'location_id');
    }
}
