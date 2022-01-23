<?php

// Merupakan file yang tergenerate otomatis dengan menggunakan 
// php artisan make:model Student -mc

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use DataTables;

class StudentController extends Controller
{
    // menampilkan data student
    public function index(){
        $data['student'] = Student::all();
        return view('student', $data);
    }
    // fungsi create data
    public function create(){
        $data['gender'] = ['L', 'P'];
        $data['department'] = ['S1 RPL', 'S1 Informatika', 'S1 Biomedis'];
        return view('student_create', $data);
    }
    // fungsi store data ke database
    public function store(Request $request){
        // fungsi validate() kegunaan fungsi tersebut adalah untuk memvalidasi
        // inputan yang dikirim melalui form dan ditangkap melalui Request
        $request -> validate([
            'nim' => 'required|size:8,unique:students',
            'name' => 'required|min:3|max:50',
            'gender' => 'required|in:P,L',
            'department' => 'required',
            'address' => ''
        ]);
        
        $student = new  Student();
        $student->nim = $request->nim;
        $student->name = $request->name;
        $student->gender = $request->gender;
        $student->department = $request->department;
        $student->address = $request->address;
        $student->save();

        // fungsi with() untuk memberikan pesan balikan yang
        // nanti nya akan ditampilkan pada view dari route yang dituju
        return redirect(route('student.index'))->with('pesan','Data berhasil ditambahkan');
    }

    // fungsi edit data
    public function edit($id){
        $data['gender'] = ['L', 'P'];
        $data['department'] = ['S1 RPL', 'S1 Informatika', 'S1 Biomedis'];
        $data['student'] = Student::find($id);

        return view('student_edit', $data);
    }
    // fungsi store data ke database
    public function update(Request $request, $id){
        // fungsi validate() kegunaan fungsi tersebut adalah untuk memvalidasi
        // inputan yang dikirim melalui form dan ditangkap melalui Request
        $request -> validate([
            'nim' => 'required|size:8,unique:students',
            'name' => 'required|min:3|max:50',
            'gender' => 'required|in:P,L',
            'department' => 'required',
            'address' => ''
        ]);
        
        $student = Student::find($id);
        $student->nim = $request->nim;
        $student->name = $request->name;
        $student->gender = $request->gender;
        $student->department = $request->department;
        $student->address = $request->address;
        $student->save();

        // fungsi with() untuk memberikan pesan balikan yang
        // nanti nya akan ditampilkan pada view dari route yang dituju
        return redirect(route('student.index'))->with('pesan','Data berhasil diperbarui');
    }


    // fungsi hapus data
    public function destroy($id){
        $student = Student::find($id);
        $student->delete();

        return  redirect(route('student.index'))->with('pesan','Data berhasil dihapus');
    }


    // fungsi data tables
    public function data(Request $request){
        if($request->ajax()){
            $data = Student::all();
            return DataTables::of($data)
                    ->addItemColumn()
                    ->addColumn('action', function($row){
                        $btn = '
                                <div class="text-center">
                                    <div class="btn-group">
                                        <a href="'.route('student.edit', ['id'=>$row->id]).'" class="edit btn btn-success btn-sm">Edit</a>
                                        <a href="'.route('student.data.destroy', ['id'=>$row->id]).'" class="btn btn-danger btn-sm">Hapus</a>
                                    </div>
                                </div>
                            ';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('student');
    }
}
