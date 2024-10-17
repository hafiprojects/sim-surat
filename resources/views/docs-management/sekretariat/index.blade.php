@extends('layouts.app')

@push('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush

@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    @if ($doc_type == 'In')
                        <h1 class="m-0">Manajemen Surat Masuk Sekretariat</h1>
                    @elseif ($doc_type == 'Out')
                        <h1 class="m-0">Manajemen Surat Keluar Sekretariat</h1>
                    @endif
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Jenis Surat</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('main-content')
    <div class="card">
        <div class="card-header">
            @if ($doc_type == 'In')
                <a href="{{ route('doc-sekretariat-in.create') }}" class="btn btn-info">
                    <i class="fas fa-plus"></i>
                    &nbsp;&nbsp;Tambah Surat Masuk
                </a>
            @elseif ($doc_type == 'Out')
                <a href="{{ route('doc-sekretariat-out.create') }}" class="btn btn-info">
                    <i class="fas fa-plus"></i>
                    &nbsp;&nbsp;Tambah Surat Keluar
                </a>
            @endif
        </div>
        <div class="card-body">
            @if ($doc_type == 'In')
                @include('docs-management.include._table-surat-masuk')
            @elseif ($doc_type == 'Out')
                @include('docs-management.include._table-surat-keluar')
            @endif
        </div>
        <!-- /.card-body -->
    </div>
@endsection

@push('scripts')
    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Toast.fire({
                    icon: 'success',
                    title: "{{ session('success') }}",
                });
            });
        </script>
    @endif
    @if (session('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Toast.fire({
                    icon: 'error',
                    title: "{{ session('error') }}",
                });
            });
        </script>
    @endif

    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

    <script>
        $(function() {
            $("#tableData").DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endpush
