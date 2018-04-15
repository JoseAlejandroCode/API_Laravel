<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client as Client;
use Illuminate\Support\Facades\DB;

class ClientsController extends Controller
{
    function index()
    {
        $client = new Client();
        $data = [];
        $data['clients'] = $client->all();
        //return view('clients/index', $data );
        return $data;
    }

    function modify($id, Request $request,  Client $client)
    {
        $data = $request->json()->all();

        if ($request->isMethod('patch')) {

            $selected_client = $client->find($id);

            $selected_client->title = $data['title'];
            $selected_client->name = $data['name'];
            $selected_client->last_name = $data['last_name'];
            $selected_client->address = $data['address'];
            $selected_client->zip_code = $data['zip_code'];
            $selected_client->city = $data['city'];
            $selected_client->state = $data['state'];
            $selected_client->email = $data['email'];

            $selected_client->save();


            return [ 'modified' => true];
            //return redirect('clients');
        }

    }

    function newClient( Request $request, Client $client )
    {

        $data = $request->json()->all();

        if ($request->isMethod('put')) {
            
            $client->insert( $data );
            return [ 'created' => true ];
            //return redirect('clients');
        }

    }

    function show( $id, Client $client )
    {
        $data['modify'] = 1;
        $client_data = $client->find( $id );
        
        $data['id'] = $client_data->id;
        $data['title'] = $client_data->title;
        $data['name'] = $client_data->name;
        $data['last_name'] = $client_data->last_name;
        $data['address'] = $client_data->address;
        $data['zip_code'] = $client_data->zip_code;
        $data['city'] = $client_data->city;
        $data['state'] = $client_data->state;
        $data['email'] = $client_data->email;

        //return view('clients/form', $data );
        return $data;
    }
}
