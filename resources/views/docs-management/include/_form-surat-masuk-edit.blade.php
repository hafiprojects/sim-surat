<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Surat Masuk</h3>
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
                                <label>Nomor Surat Masuk <span class="text-danger">*</span></label>
                                <input name="document_no" type="text" class="form-control"
                                    placeholder="Masukan Nomor Surat"
                                    value="{{ old('document_no', $doc->document_no) }}" required>
                                @error('document_no')
                                    <small style="color: red;">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Tanggal Surat Masuk <span class="text-danger">*</span></label>
                                <input name="received_at" type="date" class="form-control"
                                    value="{{ old('received_at', optional($doc->received_at)->format('Y-m-d')) }}"
                                    required>
                                @error('received_at')
                                    <small style="color: red;">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Dari <span class="text-danger">*</span></label>
                                <input name="from" type="text" class="form-control"
                                    value="{{ old('from', $doc->from) }}" placeholder="Nama Pengirim/ Intansi Pengirim"
                                    required>
                                @error('from')
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
                            <div class="form-group">
                                <label>Jenis Surat <span class="text-danger">*</span></label>
                                <select name="document_type_id" class="form-control" required>
                                    <option value="">-- Pilih Jenis Surat --</option>
                                    @foreach ($docTypes as $types)
                                        <option value="{{ $types->id }}"
                                            {{ $types->id == $doc->document_type_id ? 'selected' : '' }}>
                                            {{ $types->name }}
                                        </option>
                                    @endforeach

                                </select>
                                @error('document_type_id')
                                    <small style="color: red;">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Dokumen Surat Masuk</label>
                                <input type="file" class="form-control" name="file" accept="application/pdf">
                                @if ($doc->file)
                                    <small>Current File: <a href="{{ asset($doc->file) }}"
                                            target="_blank">{{ $doc->file }}</a></small> <br>
                                    <small>kosongkan jika tidak ingin dirubah </small>
                                @endif
                                @error('file')
                                    <small style="color: red;">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Status <span class="text-danger">*</span></label>
                                <select name="status" class="form-control" required>
                                    <option value="">-- Pilih Status --</option>
                                    <option value="Diterima"
                                        {{ old('status', $doc->status) == 'Diterima' ? 'selected' : '' }}>Diterima
                                    </option>
                                    <option value="Diteruskan"
                                        {{ old('status', $doc->status) == 'Diteruskan' ? 'selected' : '' }}>Diteruskan
                                    </option>
                                    <option value="Selesai"
                                        {{ old('status', $doc->status) == 'Selesai' ? 'selected' : '' }}>Selesai
                                    </option>
                                </select>
                                @error('status')
                                    <small style="color: red;">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Index Dokumen Disposisi</label>
                                <input name="document_index" type="text" class="form-control"
                                    value="{{ old('document_index', $doc->document_index) }}"
                                    placeholder="Masukan Index Surat">
                                @error('document_index')
                                    <small style="color: red;">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Tanggal Tindakan Penyelesaian</label>
                                <input name="finished_at" type="date" class="form-control"
                                    value="{{ old('finished_at', optional($doc->finished_at)->format('Y-m-d')) }}">
                                @error('finished_at')
                                    <small style="color: red;">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Instruksi Khusus</label>
                                <textarea name="instruction_note" class="form-control" rows="3" placeholder="Instruksi Khusus">{{ old('instruction_note', $doc->instruction_note) }}</textarea>
                                @error('instruction_note')
                                    <small style="color: red;">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Diteruskan Kepada</label>
                                <textarea name="forwarded_to" class="form-control" rows="3" placeholder="Catatan Surat">{{ old('forwarded_to', $doc->forwarded_to) }}</textarea>
                                <small>Gunakan tag &lt;br&gt; untuk menambahkan enter</small>
                                @error('forwarded_to')
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
