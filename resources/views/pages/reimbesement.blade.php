@extends('layouts.backend')

@section('css_before')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/dataTables.bootstrap4.css') }}">
@endsection

@section('js_after')
    <!-- Page JS Plugins -->
    <script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('js/pages/tables_datatables.js') }}"></script>
@endsection

@section('content')
    <!-- Page Content -->
    <div class="content">
        {{-- <div class="my-50 text-center">
            <h2 class="font-w700 text-black mb-10">DataTables Example</h2>
            <h3 class="h5 text-muted mb-0">Plugin Integration</h3>
        </div> --}}

        <!-- Info -->
        {{-- <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="block">
                    <div class="block-content">
                        <p class="text-muted">
                            This page showcases how easily you can add a plugin’s JS/CSS assets and init it using custom JS code.
                        </p>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- END Info -->

        <!-- Dynamic Table Full -->
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Reimbesement</h3>
            </div>

            <div class="block-content block-content-full">

            <form action="{{ route('reimbesement') }}">
                <div class="form-group row">
                    <div class="col-lg-3">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    From :
                                </span>
                            </div>
                            <input type="date" class="form-control" name="from" id="from"
                            @if (request()->get('from'))
                                value="{{ request()->get('from') }}"
                            @endif>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    To :
                                </span>
                            </div>
                            <input type="date" class="form-control" name="to" id="to"
                            @if (request()->get('to'))
                                value="{{ request()->get('to') }}"
                            @endif>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="input-group">
                            <button class="btn btn-primary mr-3">Search</button>
                            <button type="button" class="btn btn-primary" id="btn-print" onclick="print()">Print</button>
                        </div>
                    </div>
                </div>
            </form>


                <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th class="d-none d-sm-table-cell">Reimbesement Date</th>
                            <th class="d-none d-sm-table-cell">Nama Outlet</th>
                            <th class="d-none d-sm-table-cell">Total (Rp)</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reimbesements as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="font-w600">
                                {{-- {{ date('d F Y', strtotime($item->reimbesement_date)) }} --}}
                                {{ $item->reimbesement_date->isoFormat("D MMMM Y")}}
                            </td>
                            <td class="d-none d-sm-table-cell">
                                {{ $item->outlet_name }}
                            </td>
                            <td>
                                Rp {{ number_format($item->details[0]->total, 2,",",".") }}
                            </td>
                            <td class="text-center text-white">
                                <a class="btn btn-sm btn-secondary text-dark" href="/alfari_reimbesement/reimbesement/{{ $item->id }}">
                                    <i class="fa fa-eye"></i>
                                </a>
                                {{-- <a class="btn btn-sm btn-secondary text-dark" href="/reimbesement/{{ $item->id }}/edit">
                                    <i class="fa fa-pencil"></i>
                                </a> --}}
                                <button type="button" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#modal-large-delete{{ $item->id }}">
                                    <i class="fa fa-times"></i>
                                </button>
                            </td>
                        </tr>

                        <div class="modal" id="modal-large-delete{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-large" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <form method="POST" action= "{{ route('reimbesement-destroy') }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                    <div class="block block-themed block-transparent mb-0">
                                        <div class="block-header bg-secondary">
                                            <h3 class="block-title">Hapus Data</h3>
                                            <div class="block-options">
                                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                                    <i class="si si-close"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="block-content">
                                            Apakah anda yakin ingin menghapus data <strong>{{$item->outlet_name}} ?</strong>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn text-white bg-secondary">Hapus</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        @endforeach
                    </tbody>
                </table>

                {{-- <div>{{ $reimbesements[0]->details }}</div> --}}

            </div>
        </div>
        <!-- END Dynamic Table Full -->
    </div>
    <!-- END Page Content -->

    <script>
        function print(){
            let from = document.getElementById("from").value;
            let to = document.getElementById("to").value;

            window.location = "/alfari_reimbesement/reimbesement/history/print?from=" + from + "&to=" + to;
         }
    </script>

@endsection
