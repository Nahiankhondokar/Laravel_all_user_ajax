<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    
    /**
     * 
     */
    public function index(){
        return view('student.index');
    }



    /**
     * 
     */
    public function store(Request $request){


        // Image uploading system

        if( $request -> hasFile('photo') ){

            $img = $request -> file('photo');
            $unique_name = md5( time() . rand() ) . '.' . $img -> getClientOriginalExtension();
            $img -> move(public_path('media/student'), $unique_name);
        }
        
        Student::create([
            'name'      => $request -> name,
            'email'      => $request -> email,
            'cell'      => $request -> cell,
            'uname'      => $request -> uname,
            'gender'      => $request -> gender,
            'photo'      => $unique_name
        ]);

    }


    /**
     * 
     */
    public function all(){

            $all_students = Student::latest() -> get();

            $content = "";

            $i = 1;

            foreach($all_students as $student){

                

                 $content .= '<tr>';
                    $content .= '<td>'. $i++ .'</td>';
                    $content .= '<td>'. $student -> name .'</td>';
                    $content .= '<td>'. $student -> email .'</td>';
                    $content .= '<td>'. $student -> cell .'</td>';
                    $content .= '<td>'. $student -> uname .'</td>';
                    $content .= '<td>'. $student -> gender .'</td>';
                    $content .= '<td><img src="media/student/'. $student -> photo .'"></td>';
                    $content .= '<td>
                    
                        <a id="view_btn" class="btn btn-sm btn-info" href="" viewId='. $student -> id .'>' . 'view'. '</a>

                        <a id="edit_btn" class="btn btn-sm btn-warning" href="" editId='. $student -> id .'>' . 'Edit'. '</a>

                        <a id="delete_btn" class="btn btn-sm btn-danger" href="" deleteId='. $student -> id .'>' . 'Delete'. '</a>
                    
                    </td>';                          

                $content .= '</tr>';

            }

            echo $content;
       
    }




    /**
     * 
     */
    public function show($id){
        
        $single_student = Student::find($id);
        
        echo json_encode($single_student);

    }




    /**
     * 
     */
    public function delete($id){
        
        $del_student = Student::find($id);

        $data = $del_student -> delete();

        if( $data == true ){
            return "<p class='alert alert-danger'>this user is deleted<button class='close' data-dismiss='alert'>&times;</button></p>";
        }else{
            return false;
        }

    }



    /**
     * 
     */
    public function edit($id){
        
        $eidt_student = Student::find($id);

        echo \json_encode($eidt_student);

    }




}
