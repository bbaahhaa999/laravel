<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Leave;
use App\Models\Leavetype;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LeavesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leaves = Leave::all(); // collection class (object) like array
        $leavetypes = Leavetype::all();
        return view('dashboard/leaves.index',compact('leaves','leavetypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $leavetypes = Leavetype::all();
        $leave = Leave::all();
        //
        return view('dashboard.leaves.create',compact('leave','leavetypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'leave_type' => 'required|string|min:3|max:255',
        ]);
        $leaves = Leave::create($request->all());
        //PRG post redirect get
       return Redirect::route('dashboard.leaves.index')
       ->with('success','Leaves Request Created ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
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
            $leaves = Leave::findorfail($id);
        }catch(Exception $e){
            return redirect()->route('dashboard.leaves.index')->with('info','Record not found!');
        }
       // $d = Department::all();
        return view('dashboard.leaves.edit',compact('leaves'));
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
        $leave = Leave::findorfail($id);
        $leave->update($request->all());
       
        return Redirect::route('dashboard.leaves.index')
        ->with('success','Leave Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Leave::destroy($id);

        return Redirect::route('dashboard.leaves.index')->with('success','Leave Deleted!');
    }
}
