<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentOutController extends Controller
{
    public function index()
    {
        return view('docs-management.out-document.index');
    }

    public function create()
    {
        return view('docs-management.out-document.add');
    }

    public function store(Request $request)
    {
        // code here
    }

    public function show($id)
    {
        return view('docs-management.out-document.detail');
    }

    public function edit($id)
    {
        return view('docs-management.out-document.edit');
    }

    public function update(Request $request, $id)
    {
        // code here
    }

    public function destroy($id)
    {
        // code here
    }
}
