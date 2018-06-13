<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ManageRequest;
use App\Rules\ValidPhone;
use App\User;
use App\Map;
use App\Employee;
use App\Department;
use Keygen;
use Hash;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home()
    {
        return view('layouts.bootstrap');
    }

    public function index()
    {
        $employees = Employee::all();

        return view('manager.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();

        return view('manager.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ManageRequest $request)
    {
        /*$request->validate([
            'employee' => 'required|min:5',
            'location' => 'required|min:5',
            'department_id' => 'required',
            'email' => 'required|min:5|email',
            'phone_1' => ['required', new ValidPhone],
            'phone_2' => [new ValidPhone]
        ]);*/
     
        $employee = new Employee($request->all());
        $employee->employee = $request['employee'];
        $employee->code = Keygen::numeric(7)->prefix('TM-')->generate();
        $employee->location = $request['location'];
        $employee->user_id = auth()->user()->id;
        $employee->address = $request['address'];
        $employee->department_id = $request['department_id'];
        $employee->phone_1 = $request['phone_1'];
        $employee->phone_2 = $request['phone_2'];
        $employee->email = $request['email'];
        $employee->date = date('Y-m-d');
        $employee->save();

        $request->session()->flash('created', 'The employee was create with success!');

        return redirect()->route('agenda.index');  
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
        $employee = Employee::findOrFail($id);
        $departments = Department::all();

        return view('manager.edit', compact('employee', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ManageRequest $request, $id)
    {
        $employee = Employee::where('id', $id)->first();

        $employee->employee = $request['employee'];
        $employee->location = $request['location'];
        $employee->address = $request['address'];
        $employee->department_id = $request['department_id'];
        $employee->phone_1 = $request['phone_1'];
        $employee->phone_2 = $request['phone_2'];
        $employee->email = $request['email'];
        $employee->date = $employee->date;
        $employee->save();

        $request->session()->flash('updated', 'The employee was update with success!');

        return redirect()->route('agenda.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $employee = Employee::find($id)->delete();

        $request->session()->flash('destroyed', 'The employee was delete with success!');

        return back();
    }
}
