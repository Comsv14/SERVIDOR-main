<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaginasController extends Controller
{
    public function pagina1()
    {
        return 'Estas en pagina 1';
    }

    public function pagina2($id)
    {
        return 'Usuario '.$id;
    }

    public function pagina3($name = null)
    {
        return $name;
    }
}
