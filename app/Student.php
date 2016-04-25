<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
 protected $table = 'students';
protected $fillable = [
	'imie', 
	'nazwisko', 
	'adres',
	'kod_pocztowy',
	'miejscowosc',
	'telefon'
];
protected $hidden = [];
}
