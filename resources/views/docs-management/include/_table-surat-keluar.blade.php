<table id="tableData" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal Dikirim</th>
            <th>No Surat</th>
            <th>Jenis Surat</th>
            <th>Kepada</th>
            <th>Perihal</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($docs as $index => $doc)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $doc->sent_at->format('Y-m-d') }}</td>
                <td>{{ $doc->document_no }}</td>
                <td>{{ $doc->documentType->name }}</td>
                <td>{{ $doc->to }}</td>
                <td>{{ $doc->subject }}</td>
                <td>
                    <a href="{{ route($routingEndpointAlias[1], $doc->hashid) }}" class="btn btn-sm btn-info">
                        <i class="fas fa-eye"></i>&nbsp;&nbsp;Lihat
                    </a>
                    <a href="{{ route($routingEndpointAlias[0], $doc->hashid) }}" class="btn btn-sm btn-warning">
                        <i class="fas fa-pencil-alt"></i>&nbsp;&nbsp;Edit
                    </a>
                    <button type="button" class="btn btn-sm btn-danger delete-btn"
                        data-url="{{ route($routingEndpointAlias[2], $doc->hashid) }}">
                        <i class="fas fa-trash"></i>&nbsp;&nbsp;Hapus
                    </button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
