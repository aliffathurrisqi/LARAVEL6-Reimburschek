@extends('layouts.backend')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="block">
                    <div class="block-content">

                        <form method="POST" action={{ route('reimbesement-store') }}>
                            @csrf
                            <div class="">
                                <div class="col-sm-12 p-2">

                                        <div class="input-group mb-3">
                                            <div class="w-25">Nama</div>
                                            <div class="w-75">: <strong>{{ $reimbesements->person }}</strong></div>
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="w-25">Posisi</div>
                                            <div class="w-75">: <strong>{{ $reimbesements->position }}</strong></div>
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="w-25">Penempatan</div>
                                            <div class="w-75">: <strong>{{ $reimbesements->penempatan }}</strong></div>
                                        </div>

                                        {{-- <div class="input-group mb-3">
                                            <div class="w-25">Nama Outlet</div>
                                            <div class="w-75">: <strong>{{ $reimbesements->outlet_name }}</strong></div>
                                        </div> --}}

                                        {{-- <div class="input-group mb-3">
                                            <div class="w-25">Tanggal</div>
                                            <div class="w-75">: <strong>{{ $reimbesements->created_at->format('d F Y') }}</strong></div>
                                        </div> --}}

                                        <table class="table table-bordered  table-vcenter js-dataTable-full">
                                            <thead>
                                                <tr>
                                                    <th class="d-none d-sm-table-cell text-center">Tanggal</th>
                                                    <th class="d-none d-sm-table-cell text-center">Nama Outlet</th>
                                                    <th class="d-none d-sm-table-cell text-center">Keterangan</th>
                                                    <th class="d-none d-sm-table-cell text-center">Nominal</th>
                                                    <th class="d-none d-sm-table-cell w-25 text-center">Bukti</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-center" rowspan="3">{{ $reimbesements->reimbesement_date->isoFormat("D MMMM Y") }}</td>
                                                    <td class="text-center" rowspan="3">{{ $reimbesements->outlet_name }}</td>
                                                    <td class="font-w600">
                                                        {{ $reimbesements->details[0]->berangkat }}
                                                    </td>
                                                    <td>
                                                        Rp {{ number_format($reimbesements->details[0]->nominal_1, 2,",",".") }}
                                                    </td>
                                                    <td>
                                                        <img class="img-fluid w-100" src="{{ asset('media/photos/'.$reimbesements->details[0]->image_1.'') }}">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="font-w600">
                                                        {{ $reimbesements->details[0]->pulang }}
                                                    </td>
                                                    <td>
                                                        Rp {{ number_format($reimbesements->details[0]->nominal_2, 2,",",".") }}
                                                    </td>
                                                    <td>
                                                        <img class="img-fluid w-100" src="{{ asset('media/photos/'.$reimbesements->details[0]->image_2.'') }}">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="font-w600">
                                                        {{ $reimbesements->details[0]->makan }}
                                                    </td>
                                                    <td>
                                                        Rp {{ number_format($reimbesements->details[0]->nominal_3, 2,",",".") }}
                                                    </td>
                                                    <td>
                                                        <img class="img-fluid w-100" src="{{ asset('media/photos/'.$reimbesements->details[0]->image_3.'') }}">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" class="text-right">Total</td>
                                                    <td><strong>Rp {{ number_format($reimbesements->details[0]->total, 2,",",".") }}</strong></td>
                                                </tr>
                                            </tbody>
                                        </table>

                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Page Content -->

@endsection
