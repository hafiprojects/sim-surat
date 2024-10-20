<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentInController extends Controller
{
    public function index_doc_sekretariat()
    {
        $doc_department = 'Sekretariat';
        $docs = "";
        return view('docs-management.sekretariat.index', compact('docs', 'doc_department'));
    }

    public function index_doc_bidang_pemuda()
    {
        $doc_department = 'Bidang Pemuda';
        $docs = "";
        return view('docs-management.pemuda.index', compact('docs', 'doc_department'));
    }

    public function index_doc_bidang_olahraga()
    {
        $doc_department = 'Bidang Olahraga';
        $docs = "";
        return view('docs-management.olahraga.index', compact('docs', 'doc_department'));
    }
    /* End of Controller for Document In Management (Index)  */

    /** Controller for Document In Management (Create) */
    public function create_doc_sekretariat()
    {
        $doc_department = 'Sekretariat';
        return view('docs-management.sekretariat.add', compact('doc_department'));
    }

    public function create_doc_bidang_pemuda()
    {
        $doc_department = 'Bidang Pemuda';
        return view('docs-management.pemuda.add', compact('doc_department'));
    }

    public function create_doc_bidang_olahraga()
    {
        $doc_department = 'Bidang Olahraga';
        return view('docs-management.olahraga.add', compact('doc_department'));
    }
    /* Controller for Document In Management (Create)  */

    /** Controller for Document In Management (Store) */
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
    /* End of Controller for Document In Management (Store) */

    public function show_doc($id)
    {
        return view('docs-management.show');
    }

    /** Controller for Document In Management (Edit) */
    public function edit_doc_sekretariat($id)
    {
        $doc_department = 'Sekretariat';
        return view('docs-management.sekretariat.edit', compact('doc_department'));
    }

    public function edit_doc_bidang_pemuda($id)
    {
        $doc_department = 'Bidang Pemuda';
        return view('docs-management.pemuda.edit', compact('doc_department'));
    }

    public function edit_doc_bidang_olahraga($id)
    {
        $doc_department = 'Bidang Olahraga';
        return view('docs-management.olahraga.edit', compact('doc_department'));
    }
    /* End of Controller for Document In Management (Edit) */

    /** Controller for Document In Management (Update) */
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
    /* End of Controller for Document In Management (Update) */

    /** Controller for Document In Management (Destroy) */
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
    /* End of Controller for Document In Management (Destroy) */
}
