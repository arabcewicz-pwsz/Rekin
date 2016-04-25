<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Subject;

use App\Http\Requests;

class SubjectController extends Controller
{
    public function index() 
{
	$subjects = Subject::all()->sortByDesc('nazwa');
	return View('subjects.index', ['subjects' => $subjects ]);
}

public function create()
{
	return View('subjects.create');
}

public function store(Request $request)
{ 
	$subject = new Subject();
	$subject->przedmiot = $request->przedmiot;
	$subject->save();
	return redirect('subjects');
}

public function show($id)
{ 
	$subject = Subject::findOrFail($id);
	return view('subjects.show', ['subject'=>$subject]);   
}

public function edit($id)
{
	$subject = Subject::findOrFail($id);
	return view('subjects.edit', ['subject'=>$subject]);  
}


public function update(Request $request, $id)
{
	$subject = Subject::findOrFail($id);
	$subject->przedmiot = $request->przedmiot;
	$subject->save();
	return 'Poprawnie dokonano aktualizacji';
}

public function destroy($id)
{
	$subject = Subject::findOrFail($id);
	$subject->delete();
	return 'subject usunięty';  
}

}
