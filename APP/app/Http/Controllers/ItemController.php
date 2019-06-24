<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info = [
            "version"=>1.0,
            "description"=>"Gerenciamento de cadastro de itens"
        ];

        return response($info,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {

            $name = $request->input('name');

            $item = new Item();            
            $item->name = $name;
            $item->save();
            return response($item,201);

        } catch (\Throwable $th) {
            return response(["msg"=>$th->getMessage()]);
        }

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
        //
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
        $name = $request->input('name');

        $item = Item::find($id);

        if($item){

            try {
                
                $item->name = $name;
                $item->save();
                return response($item,200);

            } catch (\Throwable $th) {
                return response(["msg"=>$th->getMessage()]);  
            }
           
        }else{
            return response(['msg'=>"Item não existe"],404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);

        if($item){
            $item->delete();
            return response($item,200);
        }else{
            return response(['msg'=>"Item não existe"],404);
        }
    }
}
