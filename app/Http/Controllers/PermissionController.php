<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;


class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Permissions = Permission::orderBy('id' , 'desc')->simplePaginate(7);
        return response()->view('dashboard.Permission.index' , compact('Permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('dashboard.Permission.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        
        $validator = validator($request->all() , [
            'permission_name' => 'required|string|min:3|max:20',
            'user_name' => 'string|min:3|max:20',

        ] , [

            'permission_name.required' => 'الإسم مطلوب' ,
            'permission_name.min' => 'لا يقبل أقل من 3 حروف' ,
            'permission_name.max' => 'لا يقبل أكثر من 20 حروف'
        ]);

        if(! $validator->fails()){
            $Permissions = new Permission();
             // $Permissions->name = $request->input('name');
            // $Permissions->name = $request->name;
            $Permissions->permission_name = $request->get('permission_name');
            $Permissions->permission_name = $request->get('user_name');
            $isSaved = $Permissions->save();

            if($isSaved){
                return response()->json(['icon' => 'success' , 'title' => "تمت الإضافة بنجاح"] , 200);
            }
            else{
                return response()->json(['icon' => 'error' , 'title' => "فشلت عملية التخزين"], 400);
            }
        }
        else {
            return response()->json(['icon' => 'error' , 'title' => $validator->getMessageBag()->first()] , 400);
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
        $Permissions = Permission::findOrFail($id);
        return response()->view('dashboard.Permission.edit' , compact('Permissions'));
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
        $validator = validator($request->all() , [
            'permission_name' => 'required',
        ]);

        if(! $validator->fails()){

            $Permissions = Permission::findOrFail($id);
            $Permissions->name = $request->get('name');
            $Permissions->user_name = $request->get('user_name');
            $isUpdate = $Permissions->save();

            return ['redirect' =>route('Permissions.index')];

            if($isUpdate){
                return response()->json(['icon' => 'success' , 'title' => "تمت عملية التعديل بنجاح"] , 200);
            }
            else{
                return response()->json(['icon' => 'error' , 'title' => "فشلت عملية التعديل "] , 400);

            }
        }
        else{
            return response()->json(['icon' => 'error' , 'title' => $validator->getMessageBag()->first()] , 400);
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
        $Permissions = Permission::destroy($id);
        return response()->json(['icon' => 'success' , 'title' => 'Deleted is Successfully'] , $Permissions ? 200 : 400);
    }
}
