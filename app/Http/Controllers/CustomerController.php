<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CustomerController extends Controller
{
    public function show(){
        $all=Customer::all();
        return view('admin.customer.show',compact('all'));
    }

    public function index(){
        return view('admin.customer.add');
    }

    public function create(Request $request){
       // dd($request->all());
              
    //   dd($request->all());
            $request->validate([
               'name' => 'required|max:45',
               'email' => 'required',
               'mobile' => 'required',
               'pic' => 'required|mimes:jpeg,jpg,png,gif|required|max:1000',
            ]); 

            $image_rename='';
            if ($request->hasFile('pic')){
                $image = $request->file('pic');
                $ext=$image->getClientOriginalExtension();
                $image_rename=time() . '_' . rand(100000, 10000000) . '.' .$ext; 
                $image->move(public_path('images'), $image_rename);
            }     

        $insert=Customer::insertGetId([
         'name'=>$request['name'],
         'email'=>$request['email'],
         'mobile'=>$request['mobile'],
         'pic'=> $image_rename,
        ]);

            if($insert){
                return back()->with('success', 'Data Inserted Successfully');
            } else {
                return back()->with('error', 'Query Failed');
            }
    }
         
    public function edit($id){
        $record=Customer::findOrFail($id);
        return view('admin.customer.edit',compact('record'));
    }
        
    public function update(Request $request){
        // dd($request->all());
               
     //   dd($request->all());
              $id=$request->id;
             $request->validate([
                'name' => 'required|max:45',
                'email' => 'required',
                'mobile' => 'required',
                'pic' => 'required|mimes:jpeg,jpg,png,gif|required|max:1000',
             ]); 
                
             $oldimg=Customer::findOrFail($id);
           //  $oldimg['pic'];
             $deleteimg=public_path('images/' .$oldimg['pic']);
             $image_rename='';

             if ($request->hasFile('pic')){
                 $image = $request->file('pic');
                 $ext=$image->getClientOriginalExtension();
                 if(file_exists($deleteimg)){
                    unlink($deleteimg);
                 }

                 $image_rename=time() . '_' . rand(100000, 10000000) . '.' .$ext; 
                 $image->move(public_path('images'), $image_rename);
             }    
             else{
                $image_rename=$oldimg['pic'];
             } 
 
         $update=Customer::where('id',$id)->update([
          'name'=>$request['name'],
          'email'=>$request['email'],
          'mobile'=>$request['mobile'],
          'pic'=> $image_rename,
         ]);
 
             if($update){
                 return back()->with('success', 'Data Updated Successfully');
             } else {
                 return back()->with('error', 'Query Failed');
             }
     }

    public function destroy($id){
        $id=intval($id);
        $customer=Customer::find($id);

        if($customer){

            $imagePath=public_path('images/' .$customer->pic);
            if(file_exists($imagePath)){
                unlink($imagePath);
            }

            $customer->delete();
            return back()->with('success', 'Data deleted Successfully');
        }
    }
}
