<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Server;
use Illuminate\Support\Facades\Storage;

class ServerController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $servers = Server::all();
      return view('servers', compact('servers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        //validazione
        $newServer = new Server;
        $newServer->name = $data['name'];
        $newServer->path = $data['path'];
        $newServer->save();

        return redirect()->route('servers.show', $newServer->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($path)
    {
        $data = Server::where('path', $path)->first();
        //prendo il path e lo concateno per trovare il file
        $file = file('../storage/app/server.txt', FILE_IGNORE_NEW_LINES);
        array_shift($file);
        array_pop($file);

        //lista dei valori che non devono essere presenti nel nuovo array
        $guarded = [
          'OpenVPN CLIENT LIST',
          'Updated',
          'Common Name',
          'ROUTING TABLE',
          'Virtual Address',
          'GLOBAL STATS',
          'Max bcast/mcast queue length',
          'END'
        ];

        $newArray = array();
        foreach($file as $line) {
          $pieces = explode(",", $line);
          $wordToCheck = trim($pieces[0]);
          if(!in_array($wordToCheck, $guarded)) {
            array_push($newArray, $pieces);
          };
        }

        // ciclo per matchare gli elementi
        $data = array();
        foreach ($newArray as $arr => $value){
          foreach ($newArray as $barr => $otherValue) {
            if ($value[0]== $otherValue[1]){
              $diff = array_diff($otherValue, $value);
              $result = array_merge($value, $diff);
              $data[]= $result;
            }
          }
        }
      return view('show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Server::find($id);
        return view('edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $data = $request->all();
        //validazione

        $editServer = Server::find($id);
        $editServer->name = $data['name'];
        $editServer->path = $data['path'];
        $editServer->update();
        return redirect()->route('servers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteServer = Server::find($id);
        $deleteServer->delete();
        return redirect()->route('servers.index');
    }
}
