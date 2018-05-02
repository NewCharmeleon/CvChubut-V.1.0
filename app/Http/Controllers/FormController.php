<?php

namespace App\Http\Controllers;
use App\ActividadEspecifica;
use Illuminate\Http\Request;

class FormController extends Controller
{
  function index()
  {
      $actividadEspecificas = ActividadEspecifica::all();
      return view('form', compact('actividadEspecificas'));
  }
}
