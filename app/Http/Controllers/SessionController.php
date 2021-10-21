<?php

namespace App\Http\Controllers;

use App\Models\Session;
use Illuminate\Http\Request;


class SessionController extends Controller
{
    function __construct()
    {
        $this->middleware('permission: ver-session | crear-session | editar-session | borrar-session', ['only' => ['index']]);
        $this->middleware('permission: crear-session', ['only' => ['create','store']]);
        $this->middleware('permission: editar-session', ['only' => ['edit','update']]);
        $this->middleware('permission: borrar-session', ['only' => ['delete']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sessions= Session::paginate(5);
        return view('sessions.index',compact('sessions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sessions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'titulo'=>'required',
            'motivo' =>'required',
            'duracion' =>'required',
        ]);
        Session::create($request->all());
        return redirect()->route('sessions.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Session $session)

    {
        return view('sessions.edit',compact('session')) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Session $session)
    {
        request()->validate([
            'titulo'=>'required',
            'motivo' =>'required',
            'duracion' =>'required',
        ]);
        $session->update($request->all());
        return redirect()->route('sessions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Session $session)
    {
        $session->delete();
        return redirect()->route('sessions.index');
    }
}
