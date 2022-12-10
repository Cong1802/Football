<?php

namespace App\Http\Controllers;
use App\Models\FieldType;
use App\Models\Field;
use Illuminate\Http\Request;

class FieldController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function all_field(){
        $all_field = Field::paginate(4);
        $all_field_type = FieldType::all();
    	return view('admin.field.all_field')->with(compact('all_field','all_field_type'));
    }
    public function add_field(){
        $add_field = Field::all();
        $add_field_type = FieldType::all();
        return view('admin.field.add_field')->with(compact('add_field','add_field_type'));
    }
    public function insert_field(){
        $data = request()->validate([
            'field_name'=>'required',
            'field_status'=>'required',
            'field_type_id'=>'required'
        ]);

        $Field = new Field();
        $Field->field_name = $data['field_name'];
        $Field->field_status = $data['field_status'];
        $Field->field_type_id = $data['field_type_id'];


        $Field->save();
       
    	return redirect('/all-field')->with('success','Thêm sân thành công');
    }
    public function edit_field($field_id){
        $field = Field::all();
        $field_type = FieldType::all();
        $field_edit = Field::find($field_id);
    	return view('admin.field.edit_field')->with(compact('field','field_type','field_edit'));
    }

    public function update_field($field_id){
        $data = request()->validate([
            'field_name'=>'required',
            'field_status'=>'required',
            'field_type_id'=>'required'
        ]);

        $Field = Field::find($field_id);
        $Field->field_name = $data['field_name'];
        $Field->field_status = $data['field_status'];
        $Field->field_type_id = $data['field_type_id'];

        $Field->save();
       
    	return redirect('/all-field')->with('success','cập nhật sân thành công');
    }
    public function delete_field($field_id){
        $Field = Field::find($field_id);
        $Field->delete();
        return redirect('/all-field')->with('success','xoá sân thành công');

    }
}
