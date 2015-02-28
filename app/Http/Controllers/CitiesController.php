<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Request as CurrentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\City;

class CitiesController extends Controller {

	/**
	 * List the cities in a given state.
	 *
	 * @return array cities
	 */
	public function fromState($state)
	{
		$cities = City::where('state', $state)->simplePaginate(5);

		if (!count($cities)) {
			return ['error' => 'No cities found.'];
		}
		return [
			$cities->toArray()
		];
	}

	/**
	 * List cities near a particular city.
	 *
	 * @return Response
	 */
	public function nearCity($state, $city)
	{
		$city = City::where('name', $city)->first();

		$range = CurrentRequest::input('range', 25);

		if (empty($city)) {
			return ['error' => 'The specified city was not found.'];
		}

		$distanceField = "( 3959 * acos( cos( radians({$city->latitude}) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians({$city->longitude}) ) + sin( radians({$city->latitude}) ) * sin( radians( latitude ) ) ) )";

		$closeCities = DB::table('cities')->select(DB::raw("id, $distanceField as distance"))->where('id', '!=', $city->id)->having('distance', '<', $range)->orderBy('distance')->simplePaginate(5);

		if (!count($closeCities)) {
			return ['error' => 'No cities found within the specified mile radius.'];
		}
		return [
			$closeCities->toArray()
		];
	}

}
