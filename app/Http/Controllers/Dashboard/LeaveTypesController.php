<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Leavetype;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LeaveTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leavetypes = Leavetype::all();
        return view('dashboard/leavetypes.index',compact('leavetypes'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $leavetypes = Leavetype::all();
        //
        return view('dashboard.leavetypes.create',compact('leavetypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $leavetypes = Leavetype::create($request->all());
        return Redirect::route('dashboard.leavetypes.index')
        ->with('success','Leave type Created!');
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
          try{
            $leavetypes = Leavetype::findorfail($id);
        }catch(Exception $e){
            return redirect()->route('dashboard.leavetypes.index')->with('info','Record not found!');
        }
       // $d = Department::all();
        return view('dashboard.leavetypes.edit',compact('leavetypes'));
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
        $leavetypes = Leavetype::findorfail($id);
        $leavetypes->update($request->all());
       
        return Redirect::route('dashboard.leavetypes.index')
        ->with('success','Leave Types Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Leavetype::destroy($id);

        return Redirect::route('dashboard.leavetypes.index')->with('success','Leave Type Deleted!');
    }
}
