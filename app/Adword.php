<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Adword
 *
 * @package App
 * @property string $client_customer_id
 * @property string $user_agent
 * @property string $client_id
 * @property string $client_secret
 * @property string $refresh_token
 * @property string $authorization_uri
 * @property string $redirect_uri
 * @property string $token_credential_uri
 * @property string $scope
*/
class Adword extends Model
{
    use SoftDeletes;

    protected $fillable = ['client_customer_id', 'user_agent', 'client_id', 'client_secret', 'refresh_token', 'authorization_uri', 'redirect_uri', 'token_credential_uri', 'scope'];
    
    
    
}
