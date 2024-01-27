@extends('layouts.vertical', ['title' => 'Datatables', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('css')
    @vite([
        'node_modules/datatables.net-bs5/css/dataTables.bootstrap5.min.css',
        'node_modules/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css',
        'node_modules/datatables.net-fixedcolumns-bs5/css/fixedColumns.bootstrap5.min.css',
        'node_modules/datatables.net-fixedheader-bs5/css/fixedHeader.bootstrap5.min.css',
        'node_modules/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css',
        'node_modules/datatables.net-select-bs5/css/select.bootstrap5.min.css',
    ])
@endsection

@section('content')
@include('layouts.shared/page-title',['page_title' => '','sub_title' => 'Tables'])

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="header-title">Tabel Barang</h4>
            </div>
            <div class="card-body">
            <a href="{{ route('barang.create') }}" class="btn btn-primary">Tambah</a>

                <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                <thead>
                <tr>
                    <th>Nama</th>
                    <th>Jumlah</th>
                    <th>Kondisi</th>
                    <th style="text-align: center;">Aksi</th>
                </tr>
            </thead>



                    <tbody>
                    @forelse ($data as $barang)
    <tr>    
    <tr>
        <td>{{ $barang->nama }}</td>
        <td>{{ $barang->jumlah }}</td>
        <td>{{ $barang->kondisi }}</td>
        <td class="text-center">
                                        <form onsubmit="return

confirm('Apakah Anda Yakin ?');" action="{{
route('barang.destroy', $barang->id) }}" method="post">
                                            <a href="{{

route('barang.edit', $barang->id) }}" class="btn

btn-sm btn-primary">EDIT</a>

                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
    </tr>
    </tr>
@empty
    <tr>
        <td colspan="6">No data available</td>
    </tr>
@endforelse

                    </tbody>
                </table>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div> <!-- end row-->

@endsection

@section('script')
@vite(['resources/js/pages/datatable.init.js'])
@endsection
