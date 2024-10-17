<div class="row">
    <!-- left column -->
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Tambah Surat Masuk</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="#" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Nomor Surat Masuk</label>
                        <input name="document_no" type="text" class="form-control" placeholder="Masukan Nomor Surat"
                            value="{{ old('document_no') }}" required>
                        @error('document_no')
                            <small style="color: red;">{{ $message }}</small>
                        @enderror
                    </div>
                    <span class="text-muted float-start">
                        <strong class="text-danger">*</strong> Semua Wajib Diisi
                    </span>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" onclick="history.back()">Kembali</button>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
    <!--/.col (left) -->
</div>
