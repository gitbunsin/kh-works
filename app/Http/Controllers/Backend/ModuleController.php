<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Model\Backend\Menu;
use App\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $m = Menu::all();
        return view('backend.HRIS.admin.Configuration.index',compact('m'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        dd($request->all());

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
    public  function ModuleUpdate(Request $request){
        $allStatus = $request->status_menu;
        $Module  =  Module::get();
        foreach ($Module as $EachModule){
            $menu_id = $EachModule->id;
            $findModule  =  Module::findOrFail($menu_id);
            if($allStatus){
                $filtered_array = array_filter($allStatus, function ($status_id) use ($menu_id) { return ($status_id == $menu_id); } );
                if($filtered_array){
                    $findModule->status="true";
                    $findModule->update();
                }
                else{
                    $findModule->status="false";
                    $findModule->update();
                }
            }
            else{
                $findModule->status="false";
                $findModule->update();
            }
        }
        return redirect('/administration/view-module')->with('success','Item added Successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        dd('hell0');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
