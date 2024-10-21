@extends('layouts.app')

@push('styles')
    <style>
        .card-title span {
            font-weight: bold !important;
        }

        .card-body p {
            margin-bottom: 0.5rem;
        }

        .card-body span {
            font-weight: bold;
        }
    </style>
@endpush

@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    @if ($documentIn)
                        <h1 class="m-0">Detail Surat Masuk</h1>
                    @else
                        <h1 class="m-0">Detail Surat Keluar</h1>
                    @endif

                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Detail Surat</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('main-content')
    @if ($documentIn)
        @include('docs-management.include._show-surat-masuk')
    @else
        @include('docs-management.include._show-surat-keluar')
    @endif
@endsection

@push('scripts')
@endpush
