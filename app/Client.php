<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class Client extends Model implements Authenticatable
{
    protected $table = 'clients';
    protected $fillable = ['nom','prenom','age','adresse','ville','email','password'];
    public $timestamps = true;
    public static $rules = array();
    public function commandes()
    {
        return $this->hasMany('App\Commande','client_id','commande_id');
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    /**
     * Get the name of the unique identifier for the user.
     *
     * @return string
     */
    public function getAuthIdentifierName()
    {
        
    }

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {

    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {

    }

    /**
     * Get the token value for the "remember me" session.
     *
     * @return string
     */
    public function getRememberToken()
    {

    }

    /**
     * Set the token value for the "remember me" session.
     *
     * @param  string  $value
     * @return void
     */
    public function setRememberToken($value)
    {

    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {

    }
}
