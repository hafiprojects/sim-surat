<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header d-flex align-items-center">
                <!-- Back Button -->
                <button onclick="window.location.replace(document.referrer);" class="btn btn-secondary btn-sm">
                    <i class="fas fa-arrow-left"></i> Kembali
                </button>

                <!-- Card Title -->
                <h3 class="card-title m-3"><span>Nomor Surat</span> : {{ $doc->document_no }}</h3>
            </div>

            <!-- /.card-header -->
            <!-- form start -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8 col-sm-12">
                        <p><span>Diterima Pada</span> : {{ $doc->received_at->format('d-m-Y') }}</p>
                        <p><span>Dari</span> : {{ $doc->from }}</p>
                        <p><span>Perihal</span> : {{ $doc->subject }}</p>
                        <p><span>Jenis Surat</span> : {{ $doc->documentType->name }}</p>
                        <p><span>Status</span> : {{ $doc->status }}</p>
                        <p><span>Index Disposisi</span> : {{ $doc->document_index ?? '-' }}</p>
                        <p><span>Tanggal Tindakan</span> : {{ optional($doc->finished_at)->format('d-m-Y') }}</p>
                        <p><span>Instruksi Khusus</span> : <br>
                            {{ $doc->instruction_note ?? '-' }}</p>
                        <p><span>Diteruskan Kepada</span> : <br>
                            {!! $doc->forwarded_to ?? '-' !!}</p>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <hr>
                        <p><span>Dokumen Surat</span> :</p>
                        <iframe src="{{ asset($doc->file) }}" frameborder="0" width="100%" height="500px"></iframe>
                    </div>
                </div>
                {{-- <p>File : <a href="{{ asset('storage/' . $doc->file) }}" target="_blank">Lihat File</a></p> --}}
            </div>
        </div>
        <!-- /.card -->
    </div>
    <!--/.col (left) -->
</div>
