<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
 

class BrandController extends Controller
{
    public function show(){
        $all=Brand::all();
        return view('admin.brand.show',compact('all'));
    }

    public function index(){
        return view('admin.brand.add');
    }

    public function create(Request $request){
       // dd($request->all());
              
    //   dd($request->all());
            $request->validate([
               'brandname' => 'required|max:45',
              // 'email' => 'required',
             //  'mobile' => 'required',
               'pic' => 'required|mimes:jpeg,jpg,png,gif|required|max:1000',
            ]); 

            $image_rename='';
            if ($request->hasFile('pic')){
                $image = $request->file('pic');
                $ext=$image->getClientOriginalExtension();
                $image_rename=time() . '_' . rand(100000, 10000000) . '.' .$ext; 
                $image->move(public_path('images'), $image_rename);
            }     

        $insert=Brand::insertGetId([
         'name'=>$request['name'],
        // 'email'=>$request['email'],
        // 'mobile'=>$request['mobile'],
         'pic'=> $image_rename,
        ]);

            if($insert){
                return back()->with('success', 'Data Inserted Successfully');
            } else {
                return back()->with('error', 'Query Failed');
            }
    }
         
    public function edit($id){
        $record=Brand::findOrFail($id);
        return view('admin.brand.edit',compact('record'));
    }
        
    public function update(Request $request){
        // dd($request->all());
               
     //   dd($request->all());
              $id=$request->id;
             $request->validate([
                'name' => 'required|max:45',
              //  'email' => 'required',
              //  'mobile' => 'required',
                'pic' => 'required|mimes:jpeg,jpg,png,gif|required|max:1000',
             ]); 
                
             $oldimg=Brand::findOrFail($id);
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
 
         $update=Brand::where('id',$id)->update([
          'name'=>$request['name'],
        //  'email'=>$request['email'],
        //  'mobile'=>$request['mobile'],
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
        $brand=Brand::find($id);

        if($brand){

            $imagePath=public_path('images/' .$brand->pic);
            if(file_exists($imagePath)){
                unlink($imagePath);
            }

            $brand->delete();
            return back()->with('success', 'Data deleted Successfully');
        }
    }
}
