<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentOut\StoreDocumentRequest;
use App\Http\Requests\DocumentOut\UpdateDocumentRequest;
use Illuminate\Http\Request;
use App\Models\DocumentOut;
use App\Models\DocumentType;
use Illuminate\Support\Facades\File;

use function App\Helpers\hashidDecode;

class DocumentOutController extends Controller
{
    public function index()
    {
        $docs = DocumentOut::all();
        return view('docs-management.out-document.index', compact('docs'));
    }

    public function create()
    {
        $docTypes = DocumentType::all();
        return view('docs-management.out-document.add', compact('docTypes'));
    }

    public function store(StoreDocumentRequest $request)
    {
        $data = $request->validated();

        $fileName = 'surat_keluar_' . time() . '.' . $request->file('file')->getClientOriginalExtension();
        $request->file->move(public_path('documents-out'), $fileName);
        $data['file'] = 'documents-out/' . $fileName;

        $data['created_by_user_id'] = auth()->user()->id;
        DocumentOut::create($data);
        return redirect()->route('doc-out.index')->with('success', 'Dokumen berhasil ditambahkan');
    }

    public function show($id)
    {
        $documentIn = false;
        $doc = DocumentOut::findorFail(hashidDecode($id));
        return view('docs-management.show', compact('doc', 'documentIn'));
    }

    public function edit($id)
    {
        $doc = DocumentOut::findorFail(hashidDecode($id));
        $docTypes = DocumentType::all();
        return view('docs-management.out-document.edit', compact('doc', 'docTypes'));
    }

    public function update(UpdateDocumentRequest $request, $id)
    {
        $data = $request->validated();
        $doc = DocumentOut::findorFail(hashidDecode($id));

        if ($request->hasFile('file')) {
            File::delete(public_path($doc->file));
            $fileName = 'surat_keluar_' . time() . '.' . $request->file('file')->getClientOriginalExtension();
            $request->file->move(public_path('documents-out'), $fileName);
            $data['file'] = 'documents-out/' . $fileName;
        }

        $doc->update($data);
        return redirect()->route('doc-out.index')->with('success', 'Dokumen berhasil diperbarui');
    }

    public function destroy($id)
    {
        $doc = DocumentOut::find(hashidDecode($id));
        if ($doc) {
            $doc->delete();
            File::delete(public_path($doc->file));
            return redirect()->route('doc-out.index')->with('success', 'Dokumen berhasil dihapus');
        }

        return redirect()->route('doc-out.index')->with('error', 'Dokumen tidak ditemukan');
    }
}
