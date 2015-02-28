<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Request as CurrentRequest;

use Illuminate\Http\Request;

class UsersController extends Controller {

	/**
	 * Register a user's visit to a particular city.
	 *
	 * @return Response bool Whether the action succeded or not.
	 */
	public function registerVisit($uid)
	{
		$user = \App\User::find($uid);

		if (empty($user)) {
			return ['error' => 'Invalid user ID.'];
		}

		$city = \App\City::where(['name' => CurrentRequest::input('city'), 'state' => CurrentRequest::input('state')])->first();

		if (empty($city)) {
			return ['error' => 'Invalid city and state.'];
		}

		$user->visitedCities()->attach($city->id);

		return ['result' => 'Success'];
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
			return ['error' => 'Invalid user ID.'];
		}

		$visitedCities = $user->visitedCities()->withPivot('visited_on')->paginate();

		if (!count($visitedCities)) {
			return ['error' => 'The user has not visited any cities.'];
		}

		return $visitedCities->toArray();
	}

}
