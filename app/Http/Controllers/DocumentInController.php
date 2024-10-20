<?php

namespace App\Http\Controllers;

use App\Models\DocumentIn;
use Illuminate\Http\Request;

class DocumentInController extends Controller
{
    public function index_doc_sekretariat()
    {
        $docs = DocumentIn::where('department', 'Sekretariat')->get();
        return view('docs-management.sekretariat.index', compact('docs'));
    }

    public function index_doc_bidang_pemuda()
    {
        $docs = DocumentIn::where('department', 'Bidang Pemuda')->get();
        return view('docs-management.pemuda.index', compact('docs'));
    }

    public function index_doc_bidang_olahraga()
    {
        $docs = DocumentIn::where('department', 'Bidang Olahraga')->get();
        return view('docs-management.olahraga.index', compact('docs'));
    }
    /* End of Controller for Document In Management (Index)  */

    /** Controller for Document In Management (Create) */
    public function create_doc_sekretariat()
    {
        return view('docs-management.sekretariat.add');
    }

    public function create_doc_bidang_pemuda()
    {
        return view('docs-management.pemuda.add');
    }

    public function create_doc_bidang_olahraga()
    {
        return view('docs-management.olahraga.add');
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
        return view('docs-management.sekretariat.edit');
    }

    public function edit_doc_bidang_pemuda($id)
    {
        return view('docs-management.pemuda.edit');
    }

    public function edit_doc_bidang_olahraga($id)
    {
        return view('docs-management.olahraga.edit');
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
