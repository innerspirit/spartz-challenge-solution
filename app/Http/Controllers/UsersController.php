<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class UsersController extends Controller {

	/**
	 * Register a user's visit to a particular city.
	 *
	 * @return Response bool Whether the action succeded or not.
	 */
	public function registerVisit()
	{
		
	}

	/**
	 * Return a list of cities the user has visited.
	 *
	 * @return Response array The cities the user has visited.
	 */
	public function cities($uid)
	{
		$user = \App\User::find($uid);

		if (empty($user)) {
			return ['error' => 'Invalid user ID'];
		}

		$visitedCities = $user->visitedCities()->withPivot('visited_on')->paginate();

		if (!count($visitedCities)) {
			return ['error' => 'The user has not visited any cities.'];
		}

		return $visitedCities->toArray();
	}

}
