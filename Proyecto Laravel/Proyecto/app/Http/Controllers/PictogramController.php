<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Imagen;

class PictogramController extends Controller
{
    public function index()
    {
        $pictograms = Imagen::all();
        return view('pictograms.index', compact('pictograms'));
    }
}
