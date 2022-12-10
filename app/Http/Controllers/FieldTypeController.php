<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FieldType;
use App\Models\Field;
use App\Http\Controllers\Redirect;
class FieldTypeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function all_field_type(){
        $all_field_type = FieldType::all();
    	return view('admin.field_type.all_field_type')->with(compact('all_field_type'));
    }
    public function add_field_type(){
        $field_type = FieldType::all();
    	return view('admin.field_type.add_field_type')->with(compact('field_type'));
    }

    public function insert_field_type(){
        $data = request()->validate([
            'field_type_name'=>'required',
            'field_type_desc'=>'required',
            'field_type_status'=>'required',
        ]);

        $FieldType = new FieldType();
        $FieldType->field_type_name = $data['field_type_name'];
        $FieldType->field_type_desc = $data['field_type_desc'];
        $FieldType->field_type_status = $data['field_type_status'];

        $FieldType->save();
       
    	return redirect('/all-field-type')->with('success','Thêm loại sân thành công');
    }

    public function edit_field_type($field_type_id){
        $field_type = FieldType::all();
        $field_type_edit = FieldType::find($field_type_id);
    	return view('admin.field_type.edit_field_type')->with(compact('field_type','field_type_edit'));
    }

    public function update_field_type($field_type_id){
        $data = request()->validate([
            'field_type_name'=>'required',
            'field_type_desc'=>'required',
            'field_type_status'=>'required'
        ]);

        $FieldType = FieldType::find($field_type_id);
        $FieldType->field_type_name = $data['field_type_name'];
        $FieldType->field_type_desc = $data['field_type_desc'];
        $FieldType->field_type_status = $data['field_type_status'];

        $FieldType->save();
       
    	return redirect('/all-field-type')->with('success','cập nhật loại sân thành công');
    }
    public function delete_field_type($field_type_id){
        $FieldType = FieldType::find($field_type_id);
        $FieldType->delete();
        return redirect('/all-field-type')->with('success','xoá loại sân thành công');

    }
    // End backend--------------------------------------------------------------------





}
