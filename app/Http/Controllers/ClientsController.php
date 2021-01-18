<?php

namespace App\Http\Controllers;

use App\Http\Resources\clientsRessource;
use App\Models\Clients;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
      /**
     * Get list clients par ordi
     *
     * @param  Request  $request
     * @return Response
     */
    public function searchClients(Request $request)
    {
        $word = $request->word;
        $listClients =  Clients::where('nom','LIKE',"%".$word."%")
        ->orWhere('prenom','LIKE',"%".$word."%")
        ->get();
        return clientsRessource::collection($listClients);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createClient(Request $request)
    {
        echo "NOM : ".$request->input('name');
        $client = new Clients();
        $client->name = $request->input('name');
        $client->firstname = $request->input('firstname');
        $client->save();
        return $client;
    }
   
}
