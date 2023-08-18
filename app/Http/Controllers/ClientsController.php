<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
/** Start Models **/
    use App\Models\Client;
/** End Models **/


class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $documentValue = $request->input('document_value');
        $name = $request->input('name');
        $birthdate = $request->input('birthdate');
        $gender = $request->input('gender');
        $state = $request->input('state');
        $city = $request->input('city');

        $clientModel = new Client();
        $paginateSearch = $clientModel->query()
                    ->document($documentValue)
                    ->name($name)
                    ->birthdate($birthdate)
                    ->gender($gender)
                    ->city($city)
                    ->state($state)
                    ->join('cities', 'cities.id', 'city_id')
                    ->join('states', 'states.id', 'cities.state_id')
                    ->select('name', 'document_value', 'birthdate', 'gender', 'states.title as state', 'cities.title as city_name')
                    ->paginate(10);
       
        return $paginateSearch;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $request->validate([
                'document_value'    => 'required|numeric|unique:clients,document_value',
                'name'              => 'required|string',
                'address'           => 'required|string',
                'birthdate'         => 'required|date',
                'gender'            => 'required|in:1,2', 
                'city_id'           => 'required|exists:cities,id'       
            ]);
            $clientModel = new Client();
            $clientModel->fill($request->all())->save();
            return response()->json(['return' => true], 201);
        } catch(ValidationException $e){
            $errors = $e->validator->errors();
            return response()->json(['return' => false, 'errors' => $errors], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return $client;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        try{
            $request->validate([
                'document_value'    => 'required|numeric|unique:clients,document_value,'. $client->id,
                'name'              => 'required|string',
                'address'           => 'required|string',
                'birthdate'         => 'required|date',
                'gender'            => 'required|in:1,2', 
                'city_id'           => 'required|exists:cities,id'       
            ]);
            $clientModel = new Client();
            $clientModel->find($client->id)->fill($request->all())->save();
            return response()->json(['return' => true], 204);
        } catch(ValidationException $e){
            $errors = $e->validator->errors();
            return response()->json(['return' => false, 'errors' => $errors], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $clientModel = new Client();
        $clientModel->find($client->id)->delete();
        return response()->json([], 204);
    }
}
