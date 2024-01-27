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
@include('layouts.shared/page-title',['page_title' => 'Data Tables','sub_title' => 'Tables'])

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="header-title">Basic Data Table</h4>
                <p class="text-muted mb-0">
                    DataTables has most features enabled by default, so all you need to do to use it
                    with your own tables is to call the construction
                    function:
                    <code>$().DataTable();</code>. KeyTable provides Excel like cell navigation on
                    any table. Events (focus, blur, action etc) can be assigned to individual
                    cells, columns, rows or all cells.
                </p>
            </div>
            <div class="card-body">
                <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                        </tr>
                    </thead>


                    <tbody>
                    @forelse ($data as $barang)
    <tr>
        <td>{{ $barang->nama }}</td>
        <td>{{ $barang->jumlah }}</td>
        <td>{{ $barang->kondisi }}</td>
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
