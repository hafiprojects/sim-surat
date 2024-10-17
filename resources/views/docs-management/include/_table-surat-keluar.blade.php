<table id="tableData" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Surat Keluar</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        {{-- @foreach ($documentTypes as $index => $doc)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $doc->name }}</td>
                <td>
                    <a href="#" class="btn btn-sm btn-warning edit-btn"
                        data-url="{{ route('doc-types-management.update', $doc->id) }}"
                        data-name="{{ $doc->name }}" data-toggle="modal"
                        data-target="#editDocumentTypeModal">
                        <i class="fas fa-pencil-alt"></i>&nbsp;&nbsp;Edit
                    </a>
                    <button type="button" class="btn btn-sm btn-danger delete-btn"
                        data-url="{{ route('doc-types-management.destroy', $doc->id) }}" data-toggle="modal"
                        data-target="#deleteDocumentTypeModal">
                        <i class="fas fa-trash"></i>&nbsp;&nbsp;Hapus
                    </button>
                </td>
            </tr>
        @endforeach --}}
    </tbody>
</table>
