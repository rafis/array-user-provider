<?php namespace ArrayUsers\Auth;

use Illuminate\Auth\GenericUser;

class ArrayUser extends GenericUser {
    
	/**
	 * Get the token value for the "remember me" session.
	 *
	 * @return string
	 */
	public function getRememberToken()
    {
        throw new \ErrorException('Not implemented');
    }

	/**
	 * Set the token value for the "remember me" session.
	 *
	 * @param  string  $value
	 * @return void
	 */
	public function setRememberToken($value)
    {
        throw new \ErrorException('Not implemented');
    }

	/**
	 * Get the column name for the "remember me" token.
	 *
	 * @return string
	 */
	public function getRememberTokenName()
    {
        throw new \ErrorException('Not implemented');
    }
    
}
