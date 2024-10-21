<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Surat Keluar</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route($updateRoute, $doc->hashid) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Nomor Surat Keluar <span class="text-danger">*</span></label>
                                <input name="document_no" type="text" class="form-control"
                                    placeholder="Masukan Nomor Surat"
                                    value="{{ old('document_no', $doc->document_no) }}" required>
                                @error('document_no')
                                    <small style="color: red;">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Tanggal Surat Keluar <span class="text-danger">*</span></label>
                                <input name="sent_at" type="date" class="form-control"
                                    value="{{ old('sent_at', $doc->sent_at ? $doc->sent_at->format('Y-m-d') : '') }}"
                                    required>
                                @error('sent_at')
                                    <small style="color: red;">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Kepada <span class="text-danger">*</span></label>
                                <input name="to" type="text" class="form-control"
                                    value="{{ old('to', $doc->to) }}" placeholder="Nama Penerima/ Instansi Tujuan"
                                    required>
                                @error('to')
                                    <small style="color: red;">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Perihal <span class="text-danger">*</span></label>
                                <input name="subject" type="text" class="form-control"
                                    value="{{ old('subject', $doc->subject) }}" placeholder="Keperluan Surat" required>
                                @error('subject')
                                    <small style="color: red;">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Jenis Surat <span class="text-danger">*</span></label>
                                <select name="document_type_id" class="form-control" required>
                                    <option value="">-- Pilih Jenis Surat --</option>
                                    @foreach ($docTypes as $docType)
                                        <option value="{{ $docType->id }}"
                                            {{ old('document_type_id', $doc->document_type_id) == $docType->id ? 'selected' : '' }}>
                                            {{ $docType->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('document_type_id')
                                    <small style="color: red;">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Dokumen Surat Keluar</label>
                                <input type="file" class="form-control" name="file" accept="application/pdf">
                                <!-- Optionally, you can display the current file for reference -->
                                @if ($doc->file)
                                    <small>Current File: <a href="{{ asset($doc->file) }}"
                                            target="_blank">{{ $doc->file }}</a></small> <br>
                                    <small>kosongkan jika tidak ingin dirubah </small>
                                    <br>
                                @endif
                                @error('file')
                                    <small style="color: red;">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Catatan</label>
                                <textarea name="note" class="form-control" rows="3" placeholder="Catatan">{{ old('note', $doc->note) }}</textarea>
                                @error('note')
                                    <small style="color: red;">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <hr>
                    <span class="text-muted float-start">
                        <strong class="text-danger">*</strong> Wajib Diisi
                    </span>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="button" class="btn btn-primary"
                        onclick="window.location.replace(document.referrer);">Kembali</button>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
    <!--/.col (left) -->
</div>
