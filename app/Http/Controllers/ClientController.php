<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clients.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $client= new Client();
        $request->validate([
            'nom'=>'required|min:2|max:20 ',
            'prenom'=>'required |min:2|max:20',
            'telephone'=>'required |max:13',
            'email'=>'required|email',
            'password'=>'required',
        ]);
        $client->nom_client=$request->nom;
        $client->prenom_client=$request->prenom;
        $client->email_client=$request->email;
        $client->telephone_client=$request->telephone;
        $client->mot_de_passe_client=Hash::make($request->password);
        $client->save();
        if ($client->save()) {
            return redirect('/');
        }
    }

    public function login(){
        return view('auth.login');
    }

    public function authenticate(Request $request){

        $client = Client::where('email_client', $request->email)->first();

        if ($client && Hash::check($request->password, $client->mot_de_passe_client)) {
            
            // $test=auth()->guard('client')->login($client);
            // return $test->nom_client;
            return redirect('/dashboardClient')->with('nomClient', $client->prenom_client);
        } 
           
        return back()->withErrors('email et/ou mot de passe incorrect !!!!');
        
    }

    // public function logout(){
    //     auth()->logout();
    //     return redirect('/');
    // }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
