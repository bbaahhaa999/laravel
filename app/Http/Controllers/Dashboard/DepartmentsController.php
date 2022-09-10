<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $departments = Department::all(); // collection class (object) like array
        return view('dashboard/departments.index',compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dep = Department::all();
        //
        return view('dashboard.departments.create',compact('dep'));
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
            'name' => 'required|string|min:3|max:255',
        ]);
        //$request->input('name')
        //$request->post('name')

        //$department = new Department( $request->all());
        // $department->name = $request->post('name');
        // $department->description = $request->post('description');
        //$department->save();

        $department = Department::create($request->all());
         //PRG post redirect get
        return Redirect::route('dashboard.departments.index')
        ->with('success','Department Created ');
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
            $department = Department::findorfail($id);
        }catch(Exception $e){
            return redirect()->route('dashboard.departments.index')->with('info','Record not found!');
        }
       // $d = Department::all();
        return view('dashboard.departments.edit',compact('department'));
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
        //

        $department = Department::findorfail($id);
        $department->update($request->all());
        // $department->update([
        //     'name' => $request->name,
        //     'description' =>$request->description,
        // ]);
        return Redirect::route('dashboard.departments.index')
        ->with('success','Department Updated ');
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
        Department::destroy($id);

        return Redirect::route('dashboard.departments.index')->with('success','Department Deleted!');
    }
}
