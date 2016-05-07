<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

use App\Http\Requests;

class StudentController extends Controller
{
    public function index() 
{
	$students = Student::all()->sortByDesc('nazwisko');
	return View('students.index', ['students' => $students ]);
}

public function create()
{
	return View('students.create');
}

public function store(Request $request)
{ 
	$student = new Student();
	$student->imie = $request->imie;
	$student->nazwisko = $request->nazwisko;
	$student->adres = $request->adres;
	$student->kod_pocztowy = $request->kod_pocztowy;
	$student->miejscowosc = $request->miejscowosc;
	$student->telefon = $request->telefon;
	$student->save();
	return redirect('students');
}


public function show($id)
{ 
	$student = Student::findOrFail($id);
	return view('students.show', ['student'=>$student]);   
}

public function edit($id)
{
	$student = Student::findOrFail($id);
	return view('students.edit', ['student'=>$student]);  
}

public function update(Request $request, $id)
{
	$student = Student::findOrFail($id);
	$student->imie = $request->imie;
	$student->nazwisko = $request->nazwisko;
	$student->adres = $request->adres;
	$student->kod_pocztowy = $request->kod_pocztowy;
	$student->miejscowosc = $request->miejscowosc;
	$student->telefon = $request->telefon;
	$student->save();
	//return 'Poprawnie dokonano aktualizacji';
	return redirect('students');
}

public function destroy($id)
{
	$student = Student::findOrFail($id);
	$student->delete();
	//return 'Student usuniêty'; 
	return redirect('students');
}

}
