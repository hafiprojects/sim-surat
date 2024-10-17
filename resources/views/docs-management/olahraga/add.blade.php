@extends('layouts.app')

@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    @if ($doc_type == 'In')
                        <h1 class="m-0">Tambah Surat Masuk Bidang Olahraga</h1>
                    @elseif ($doc_type == 'Out')
                        <h1 class="m-0">Tambah Surat Keluar Bidang Olahraga</h1>
                    @endif
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Surat</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('main-content')
    @if ($doc_type == 'In')
        @include('docs-management.include._form-surat-masuk')
    @elseif ($doc_type == 'Out')
        @include('docs-management.include._form-surat-keluar')
    @endif
@endsection

@push('scripts')
@endpush
