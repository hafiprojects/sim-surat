<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentIn\StoreOlahraga;
use App\Http\Requests\DocumentIn\StorePemuda;
use App\Http\Requests\DocumentIn\StoreSekretariat;
use App\Models\DocumentIn;
use Illuminate\Http\Request;
use App\Models\DocumentType;
use Illuminate\Support\Facades\Storage;

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
        $docTypes = DocumentType::all();
        return view('docs-management.sekretariat.add', compact('docTypes'));
    }

    public function create_doc_bidang_pemuda()
    {
        $docTypes = DocumentType::all();
        return view('docs-management.pemuda.add', compact('docTypes'));
    }

    public function create_doc_bidang_olahraga()
    {
        $docTypes = DocumentType::all();
        return view('docs-management.olahraga.add', compact('docTypes'));
    }
    /* Controller for Document In Management (Create)  */

    /** Controller for Document In Management (Store) */
    public function store_doc_sekretariat(StoreSekretariat $request)
    {
        $data = $request->validated();

        $fileName = 'document_name_' . time() . '.' . $request->file('file')->getClientOriginalExtension();
        $request->file->move(public_path('documents-in'), $fileName);
        $data['file'] = 'documents-in/' . $fileName;
        $data['department'] = 'Sekretariat';
        $data['created_by_user_id'] = auth()->user()->id;

        DocumentIn::create($data);

        return redirect()->route('doc-sekretariat-in.index',)->with('success', 'Document berhasil ditambahkan');
    }

    public function store_doc_bidang_pemuda(StorePemuda $request)
    {
        $data = $request->validated();

        $fileName = 'document_name_' . time() . '.' . $request->file('file')->getClientOriginalExtension();

        $request->file->move(public_path('documents-in'), $fileName);
        $data['file'] = 'documents-in/' . $fileName;
        $data['department'] = 'Bidang Pemuda';
        $data['created_by_user_id'] = auth()->user()->id;

        DocumentIn::create($data);

        return redirect()->route('doc-pemuda-in.index');
    }

    public function store_doc_bidang_olahraga(StoreOlahraga $request)
    {
        $data = $request->validated();

        $fileName = 'document_name_' . time() . '.' . $request->file('file')->getClientOriginalExtension();

        $request->file->move(public_path('documents-in'), $fileName);
        $data['file'] = 'documents-in/' . $fileName;
        $data['department'] = 'Bidang Olahraga';
        $data['created_by_user_id'] = auth()->user()->id;

        DocumentIn::create($data);

        return redirect()->route('doc-olahraga-in.index');
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
