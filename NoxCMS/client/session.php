<?php
/**
*
* This file is part of the NoxCMS Core package.
*
* @CopyRight (c) PatricNox <https://PatricNox.info>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace NoxCMS;

/**
* General Session class
*/
class session
{
	var $cookie_data = array();
	var $page = array();
	var $data = array();
	var $browser = '';
	var $forwarded_for = '';
	var $host = '';
	var $session_id = '';
	var $ip = '';
	var $load = 0;
	var $time_now = 0;
    var $update_session_page = true;
    
    /**
	* Start session management
	*
	* This is where all session activity begins. We extracts some of the
	* information from the client and server. We test to see if a session already
	* exists. If it does, move on with our life. If it doesn't we shall create a
	* new one after making sure it's possible.
	*
	*/
	function session_begin()
	{
		// Get user information
		$this->time_now				= time();
		$this->cookie_data			= array('u' => 0, 'k' => '');
		$this->update_session_page	= $update_session_page;
		$this->browser				= $request->header('User-Agent');
		$this->referer				= $request->header('Referer');
		$this->forwarded_for		= $request->header('X-Forwarded-For');

		return $this->session_create();
	}
    
    /**
	* Create a new session
	*
	*/
	function session_create()
	{
		$this->data = array();
		return true;
	}

	/**
	* Kills a session
	*
	*/
	function session_kill($new_session = true)
	{
		return true;
	}
}
