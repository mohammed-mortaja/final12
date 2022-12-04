<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::orderBy('id' , 'desc')->simplePaginate(7);
        return response()->view('dashboard.role.index' , compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('dashboard.role.create');

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
            'role_name' => 'required|string|min:3|max:20',
            'user_name' => 'string|min:3|max:20',

        ] , [

            'role_name.required' => 'الإسم مطلوب' ,
            'role_name.min' => 'لا يقبل أقل من 3 حروف' ,
            'role_name.max' => 'لا يقبل أكثر من 20 حروف'
        ]);

        if(! $validator->fails()){
            $roles = new role();
             // $roles->name = $request->input('name');
            // $roles->name = $request->name;
            $roles->role_name = $request->get('role_name');
            $roles->user_name = $request->get('user_name');
            $isSaved = $roles->save();

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
        $roles = role::findOrFail($id);
        return response()->view('dashboard.role.edit' , compact('roles'));
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
            'role_name' => 'required',
        ]);

        if(! $validator->fails()){

            $roles = role::findOrFail($id);
            $roles->name = $request->get('name');
            $roles->user_name = $request->get('user_name');
            $isUpdate = $roles->save();

            return ['redirect' =>route('roles.index')];

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
        $roles = role::destroy($id);
        return response()->json(['icon' => 'success' , 'title' => 'Deleted is Successfully'] , $roles ? 200 : 400);
    }
}
