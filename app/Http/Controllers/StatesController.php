<?php

namespace App\Http\Controllers;

use App\Models\State;
use Illuminate\Http\Request;

class StatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $stateModel = new State();
        $allStates = $stateModel->select('id', 'title')->get();
        return $allStates;
    }
}
