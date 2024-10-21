<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentIn\StoreOlahraga;
use App\Http\Requests\DocumentIn\StorePemuda;
use App\Http\Requests\DocumentIn\StoreSekretariat;
use App\Http\Requests\DocumentIn\UpdateOlahraga;
use App\Http\Requests\DocumentIn\UpdatePemuda;
use App\Http\Requests\DocumentIn\UpdateSekretariat;
use App\Models\DocumentIn;
use Illuminate\Http\Request;
use App\Models\DocumentType;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use function App\Helpers\hashidDecode;

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

        return redirect()->route('doc-sekretariat-in.index',)->with('success', 'Dokumen berhasil ditambahkan');
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
        $doc = DocumentIn::findorFail(hashidDecode($id));
        return view('docs-management.show', compact('doc'));
    }

    /** Controller for Document In Management (Edit) */
    public function edit_doc_sekretariat($id)
    {
        $doc = DocumentIn::findorFail(hashidDecode($id));
        $docTypes = DocumentType::all();
        return view('docs-management.sekretariat.edit', compact('doc', 'docTypes'));
    }

    public function edit_doc_bidang_pemuda($id)
    {
        $doc = DocumentIn::findorFail(hashidDecode($id));
        $docTypes = DocumentType::all();
        return view('docs-management.pemuda.edit', compact('doc', 'docTypes'));
    }

    public function edit_doc_bidang_olahraga($id)
    {
        $doc = DocumentIn::findorFail(hashidDecode($id));
        $docTypes = DocumentType::all();
        return view('docs-management.olahraga.edit', compact('doc', 'docTypes'));
    }
    /* End of Controller for Document In Management (Edit) */

    /** Controller for Document In Management (Update) */
    public function update_doc_sekretariat(UpdateSekretariat $request, $id)
    {
        $data = $request->validated();
        $doc = DocumentIn::findorFail(hashidDecode($id));

        if ($request->hasFile('file')) {
            File::delete(public_path($doc->file));
            $fileName = 'document_name_' . time() . '.' . $request->file('file')->getClientOriginalExtension();
            $request->file->move(public_path('documents-in'), $fileName);
            $data['file'] = 'documents-in/' . $fileName;
        }

        $doc->update($data);
        return redirect()->route('doc-sekretariat-in.index')->with('success', 'Dokumen berhasil diupdate');
    }

    public function update_doc_bidang_pemuda(UpdatePemuda $request, $id)
    {
        $data = $request->validated();
        $doc = DocumentIn::findorFail(hashidDecode($id));

        if ($request->hasFile('file')) {
            File::delete(public_path($doc->file));
            $fileName = 'document_name_' . time() . '.' . $request->file('file')->getClientOriginalExtension();
            $request->file->move(public_path('documents-in'), $fileName);
            $data['file'] = 'documents-in/' . $fileName;
        }

        $doc->update($data);
        return redirect()->route('doc-pemuda-in.index')->with('success', 'Dokumen berhasil diupdate');
    }

    public function update_doc_bidang_olahraga(UpdateOlahraga $request, $id)
    {
        $data = $request->validated();
        $doc = DocumentIn::findorFail(hashidDecode($id));

        if ($request->hasFile('file')) {
            File::delete(public_path($doc->file));
            $fileName = 'document_name_' . time() . '.' . $request->file('file')->getClientOriginalExtension();
            $request->file->move(public_path('documents-in'), $fileName);
            $data['file'] = 'documents-in/' . $fileName;
        }

        $doc->update($data);
        return redirect()->route('doc-sekretariat-in.index')->with('success', 'Dokumen berhasil diupdate');
    }
    /* End of Controller for Document In Management (Update) */

    /** Controller for Document In Management (Destroy) */
    public function destroy_doc_sekretariat($id)
    {
        $doc = DocumentIn::find(hashidDecode($id));
        if ($doc->file) {
            File::delete(public_path($doc->file));
            $doc->delete();
            return redirect()->route('doc-sekretariat-in.index')->with('success', 'Dokumen berhasil dihapus');
        }

        return redirect()->route('doc-sekretariat-in.index')->with('error', 'Terjadi Kesalahan');
    }

    public function destroy_doc_bidang_pemuda($id)
    {
        $doc = DocumentIn::find(hashidDecode($id));
        if ($doc->file) {
            File::delete(public_path($doc->file));
            $doc->delete();
            return redirect()->route('doc-pemuda-in.index')->with('success', 'Dokumen berhasil dihapus');
        }

        return redirect()->route('doc-pemuda-in.index')->with('error', 'Terjadi Kesalahan');
    }

    public function destroy_doc_bidang_olahraga($id)
    {
        $doc = DocumentIn::find(hashidDecode($id));
        if ($doc->file) {
            File::delete(public_path($doc->file));
            $doc->delete();
            return redirect()->route('doc-olahraga-in.index')->with('success', 'Dokumen berhasil dihapus');
        }

        return redirect()->route('doc-olahraga-in.index')->with('error', 'Terjadi Kesalahan');
    }
    /* End of Controller for Document In Management (Destroy) */
}
