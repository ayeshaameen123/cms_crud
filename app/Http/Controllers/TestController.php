<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=array(
            'list'=>DB::table('tests')->get()
        );
        return view('test.test',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'fname'=>'required',
            'lname'=>'required',
            'email'=>'required',
            'bdate'=>'required'
        ]);
        $first_name = $request->input('fname');
        $last_name = $request->input('lname');
        $email = $request->input('email');
        $bdate = $request->input('bdate');
        $grade = $request->input('grade');
        $data=array('fname'=>$first_name,"lname"=>$last_name,"email"=>$email,"bdate"=>$bdate,"grade"=>$grade);
     $query=  DB::table('tests')->insert($data);
        echo "Record inserted successfully.<br/>";
        if ($query){
            return back()->with('success','Record inserted successfully');
        }
        else{
            return back()->with('fail','something wrong');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function show(Test $test)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//echo $id;
        $row=DB::table('tests')
            ->where('id',$id)
            ->first();
        $data=[
            'Info'=>$row,
            'Title'=>'Edit'
            ];
        return  view('test.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([

            'fname'=>'required',
            'lname'=>'required',
            'email'=>'required',
            'bdate'=>'required'
        ]);
        $updating=DB::table('tests')
            ->where('id',$request->input('id'))
            ->update([
                'fname'=>$request->input('fname'),
                'lname'=>$request->input('lname'),
                'email'=>$request->input('email'),
                'bdate'=>$request->input('bdate'),
                'grade'=>$request->input('grade'),
            ]);
      return redirect('test');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        $data = Student::find($id)-delete();
        $delete=DB::table('tests')->where('id',$id)->delete();
        return redirect('test');
    }
}
