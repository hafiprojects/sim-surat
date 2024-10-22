<?php

namespace App\Http\Controllers;

use App\Models\DocumentIn;
use App\Models\DocumentOut;
use App\Models\DocumentType;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $DocumentInCount = DocumentIn::count();
        $DocumentOutCount = DocumentOut::count();
        $DocumentTypeCount = DocumentType::count();
        $usersCount = User::count();
        return view('dashboard', compact('DocumentInCount', 'DocumentOutCount', 'DocumentTypeCount', 'usersCount'));
    }
}
