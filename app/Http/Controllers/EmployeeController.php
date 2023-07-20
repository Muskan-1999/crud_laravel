<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Exports\ExportEmployee;
use App\Imports\EmployeeImport;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeController extends Controller
{
    public function index(){
        $employees=Employee::orderBy('id','DESC')->paginate(3);
        return view('employee.list',['employees'=>$employees]);
    }

    public function create(){
     return view('employee.create');
    }

    public function store(Request $request){
    $validator=Validator::make($request->all(),[
        'name'=>'required',
        'email'=>'required|unique',
        'image'=>'sometimes|image:gif,png,jpeg,jpg,jfif'
    ]);
     if($validator->passes()){
     //save the data
      $employee=new Employee();
      $employee->name=$request->name;
      $employee->email=$request->email;
      $employee->address=$request->address;
      $employee->save();

      //upload image here
    if($request->image){
      $ext=$request->image->getClientOriginalExtension();
      $file=time().'.'.$ext;
      $request->image->move(public_path().'/uploads/employees/',$file);
      $employee->image=$file;
      $employee->save();
    } 
  return redirect()->route('employees.index')->with('success','Employee Added Successfully');;

     }
     else{
        return redirect()->route('employees.create')->withErrors($validator)->withInput();
     }
    }

    public function edit($id)
    {
        $employee=Employee::findOrFail($id);
        return view('employee.edit',['employee'=> $employee]);
    }

     public function update($id ,Request $request)
     {
        $validator=Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required',
            'image'=>'sometimes|image:gif,png,jpeg,jpg,jfif'
        ]);
         if($validator->passes()){
         //save the data
          $employee=Employee::find($id);
          $employee->name=$request->name;
          $employee->email=$request->email;
          $employee->address=$request->address;
          $employee->save();
    
          //upload image here
        if($request->image){
          $oldImage=$employee->image;
          $ext=$request->image->getClientOriginalExtension();
          $file=time().'.'.$ext;
          $request->image->move(public_path().'/uploads/employees/',$file);
          $employee->image=$file;
          $employee->save();

          File::delete(public_path().'/uploads/employees/'.$oldImage);
        } 
        $request->session()->flash('success','Employee Edited Successfully');
          return redirect()->route('employees.index');
    
         }
         else{
            return redirect()->route('employees.edit',$id)->withErrors($validator)->withInput();
         }
     }

     public function destroy(Employee $employee,Request $request)
     {
      if($employee->trashed()){
        $employee->forceDelete();
        return redirect()->route('employees.index')->with('success','Employees Details Deleted Permanently');
      }
      // $employee=Employee::findOrFail($id);
      //File::delete(public_path().'/uploads/employees/'.$employee->image);
      // $request->session()->flash('success','Employee Details Deleted Successfully');
      $employee->delete();
      return redirect()->route('employees.index')->with('success','Employees Details Deleted .But want to restore go to archive!!!!.');
        
     }

     public function restore(Employee $employee,Request $request,$id=null)
     {
        Employee::withTrashed()->find($id)->restore();
        return back()->with('success','Restored data');

     }
     public function archive(){
      $employees=Employee::onlyTrashed()->orderBy('id','DESC')->get();
      return view('employee.archive',['employees'=>$employees]);
  }

     public function exportEmployee(Request $request){
      return Excel::download(new ExportEmployee, 'employee.xlsx');
  } 


  public function importView()
  {
     return view('employee.import');
  }
  
  public function importEmployee(Request $request) 
    {
      if(!($request->excel_file)){
        return redirect()->back()->with('error','Select File first');

      }
      try{ 
      $file=$request->file('excel_file');
      $validator=Validator::make($request->all(),[
        //use this
           'excel_file'=>'required|max:50000|mimes:xlsx,csv'
      ]); 
        Excel::import(new EmployeeImport, $file);
        return redirect()->route('employees.index')->with('success','Data Imported');
      }catch(Exception $e){
        return redirect()->back()->with('error','Error Importing data:',$getMessage());
     }
    }

}
