<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentOutController extends Controller
{
    /** Controller for Document Out Management (Index)  */
    public function index_doc_sekretariat()
    {
        $doc_type = 'Out';
        $doc_department = 'Sekretariat';
        $docs = "";
        return view('docs-management.sekretariat.index', compact('docs', 'doc_department', 'doc_type'));
    }

    public function index_doc_bidang_pemuda()
    {
        $doc_type = 'Out';
        $doc_department = 'Bidang Pemuda';
        $docs = "";
        return view('docs-management.pemuda.index', compact('docs', 'doc_department', 'doc_type'));
    }

    public function index_doc_bidang_olahraga()
    {
        $doc_type = 'Out';
        $doc_department = 'Bidang Olahraga';
        $docs = "";
        return view('docs-management.olahraga.index', compact('docs', 'doc_department', 'doc_type'));
    }
    /* End of Controller for Document Out Management (Index)  */

    /** Controller for Document Out Management (Create) */
    public function create_doc_sekretariat()
    {
        $doc_type = 'Out';
        $doc_department = 'Sekretariat';
        return view('docs-management.sekretariat.add', compact('doc_department', 'doc_type'));
    }

    public function create_doc_bidang_pemuda()
    {
        $doc_type = 'Out';
        $doc_department = 'Bidang Pemuda';
        return view('docs-management.pemuda.add', compact('doc_department', 'doc_type'));
    }

    public function create_doc_bidang_olahraga()
    {
        $doc_type = 'Out';
        $doc_department = 'Bidang Olahraga';
        return view('docs-management.olahraga.add', compact('doc_department', 'doc_type'));
    }
    /* Controller for Document Out Management (Create)  */

    /** Controller for Document Out Management (Store) */
    public function store_doc_sekretariat(Request $request)
    {
        return redirect()->route('doc-sekretariat.index');
    }

    public function store_doc_bidang_pemuda(Request $request)
    {
        return redirect()->route('doc-pemuda.index');
    }

    public function store_doc_bidang_olahraga(Request $request)
    {
        return redirect()->route('doc-olahraga.index');
    }
    /* End of Controller for Document Out Management (Store) */

    /** Controller for Document Out Management (Edit) */
    public function edit_doc_sekretariat($id)
    {
        $doc_type = 'Out';
        $doc_department = 'Sekretariat';
        return view('docs-management.sekretariat.edit', compact('doc_department', 'doc_type'));
    }

    public function edit_doc_bidang_pemuda($id)
    {
        $doc_type = 'Out';
        $doc_department = 'Bidang Pemuda';
        return view('docs-management.pemuda.edit', compact('doc_department', 'doc_type'));
    }

    public function edit_doc_bidang_olahraga($id)
    {
        $doc_type = 'Out';
        $doc_department = 'Bidang Olahraga';
        return view('docs-management.olahraga.edit', compact('doc_department', 'doc_type'));
    }
    /* End of Controller for Document Out Management (Edit) */

    /** Controller for Document Out Management (Update) */
    public function update_doc_sekretariat(Request $request, $id)
    {
        return redirect()->route('doc-sekretariat.index');
    }

    public function update_doc_bidang_pemuda(Request $request, $id)
    {
        return redirect()->route('doc-pemuda.index');
    }

    public function update_doc_bidang_olahraga(Request $request, $id)
    {
        return redirect()->route('doc-olahraga.index');
    }
    /* End of Controller for Document Out Management (Update) */

    /** Controller for Document Out Management (Destroy) */
    public function destroy_doc_sekretariat($id)
    {
        return redirect()->route('doc-sekretariat.index');
    }

    public function destroy_doc_bidang_pemuda($id)
    {
        return redirect()->route('doc-pemuda.index');
    }

    public function destroy_doc_bidang_olahraga($id)
    {
        return redirect()->route('doc-olahraga.index');
    }
    /* End of Controller for Document Out Management (Destroy) */
}