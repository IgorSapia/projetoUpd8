<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($state)
    {
        $cityModel = new City;
        $allCities = $cityModel->select('id', 'title')->where('state_id', $state)->get();
        return $allCities;
    }
}
