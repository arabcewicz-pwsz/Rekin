<?php

namespace App\Http\Controllers;

class PagesController extends Controller {

	public function getIndex() {
		return view('welcome');

 	}
	/*public function getOceny() {
		$first = 'Aneta';
		$last = 'Hania';

		$fullname = $first . " " . $last;
		$email = "glrosebd.gmail.com";
		return view('pages.oceny')->withFullname($fullname)->withEmail($email);

	}*/
	public function getWiadomosci() {
		return view('pages.wiadomosci');

	}
		
	public function getPrzedmioty() {
		return view('pages.przedmioty');

	}
	

}