<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

use DB;
use Carbon\Carbon;
use App\Http\Requests;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$messages=DB::table('messages')->get();
        //Eloquent
        $messages=Message::all();
        return view('messages.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('messages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* 1ra forma
        $message= new Message;
        $message->email=$request->input('email');
        $message->pwd=$request->input('pwd');
        $message->save();*/
        //permite visualizar la variable y lo demas no se ejecuta
        //dd($request->all());
        Message::create($request->all());
        return redirect()->route('messages.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */ 
    public function show($id)
    {
        //Message::findOrFail() permite controlar el error con status 404, y creas un archivo para que en caso de fallo lo envie a llamar
        $message=Message::findOrFail($id);
        return view('messages.show',compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $message=Message::findOrFail($id);
        return view('messages.edit',compact('message'));
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
        Message::findOrFail($id)->update($request->all());
        return redirect()->route('messages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Message::findOrFail($id)->delete();
        return redirect()->route('messages.index');

    }
}
