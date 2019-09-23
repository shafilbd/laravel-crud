<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Bio;
use Illuminate\Support\Facades\DB;


class BioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::select('select * from bio');
        return view('index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->get('name');
        $address = $request->get('address');

        $data = DB::insert('insert into bio(name,address) value(?,?)', [$name, $address]);
        if ($data) {
            $red = redirect('/')->with('success', 'Data successfully added');
        }
        else{
            $red = redirect('posts')->with('success', 'Data not Inserted');
        }
        return $red;
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
    public function edit($id)
    {
        $posts = DB::select('select * from bio where id=?', [$id]);
        return view('update', ['posts' => $posts]);
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
        $name = $request->get('name');
        $address = $request->get('address');
        $posts = DB::update('update bio set name=?, address=? where id=?', [$name, $address, $id]);

        if($posts){
            $red = redirect('/')->with('success', 'Data has been updated');
        } else{
            $red = redirect('/'.$id)->with('success', 'Data failed!!!!!!');
        }
        return $red;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Bio::findOrFail($id);
        $data->delete();
        return $data;
    }
}
