<?php namespace ArrayUsers\Auth;

use Illuminate\Contracts\Auth\User as UserContract;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Config;

class ArrayUserProvider implements UserProvider {

    /**
     * Array of users
     *
     * @var array
     */
    protected $_users;
    
    /**
     * 
     */
    public function __construct()
    {
        $this->_users = Config::get('array-user-provider.users');
    }
    
	/**
	 * Retrieve a user by their unique identifier.
	 *
	 * @param  mixed  $identifier
	 * @return \Illuminate\Contracts\Auth\Authenticatable|null
	 */
	public function retrieveById($identifier)
    {
        return null;
    }

	/**
	 * Retrieve a user by by their unique identifier and "remember me" token.
	 *
	 * @param  mixed   $identifier
	 * @param  string  $token
	 * @return \Illuminate\Contracts\Auth\Authenticatable|null
	 */
	public function retrieveByToken($identifier, $token)
    {
        throw new \ErrorException('Not implemented');
    }

	/**
	 * Update the "remember me" token for the given user in storage.
	 *
	 * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
	 * @param  string  $token
	 * @return void
	 */
	public function updateRememberToken(Authenticatable $user, $token)
    {
        throw new \ErrorException('Not implemented');
    }

	/**
	 * Retrieve a user by the given credentials.
	 *
	 * @param  array  $credentials
	 * @return \Illuminate\Contracts\Auth\Authenticatable|null
	 */
	public function retrieveByCredentials(array $credentials)
    {
        $userFound = false;
        foreach($this->_users as $id => $user)
        {
            if ( $credentials['login'] == $user['login'] )
            {
                $userFound = true;
                break;
            }
        }
        
        if ( ! $userFound )
        {
            return null;
        }

        $user = new ArrayUser([
            'id' => $id,
            'login' => $user['login'],
            'password' => $user['password'],
        ]);

        if ( ! $this->validateCredentials($user, $credentials) )
        {
            return null;
        }
        
        return $user;
    }

	/**
	 * Validate a user against the given credentials.
	 *
	 * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
	 * @param  array  $credentials
	 * @return bool
	 */
	public function validateCredentials(Authenticatable $user, array $credentials)
    {
		return sha1($credentials['password']) == $user->getAuthPassword();
    }

}