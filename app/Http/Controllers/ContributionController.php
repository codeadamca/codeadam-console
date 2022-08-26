<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

use App\Models\Contribution;

class ContributionController extends Controller
{

    public function list()
    {

        return view('contributions.list', [
            'contributions' => Contribution::orderBy('username', 'ASC')->get()
        ]);

    }

    public function delete(Contribution $contribution)
    {
        
        $contribution->delete();

        return redirect('/contributions/list')
            ->with('message', 'Contribution has been deleted!');                
        
    }
    
}
