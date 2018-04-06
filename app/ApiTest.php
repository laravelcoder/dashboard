<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\FilterByUser;

/**
 * Class ApiTest
 *
 * @package App
 * @property string $submitted_user_city
 * @property string $submitted_user_state
 * @property string $name
 * @property string $subject
 * @property string $message
 * @property string $created_by
*/
class ApiTest extends Model
{
    use SoftDeletes, FilterByUser;

    protected $fillable = ['submitted_user_city', 'submitted_user_state', 'name', 'subject', 'message', 'created_by_id'];
    
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setCreatedByIdAttribute($input)
    {
        $this->attributes['created_by_id'] = $input ? $input : null;
    }
    
    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }
    
}
