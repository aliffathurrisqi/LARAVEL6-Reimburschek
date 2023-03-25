@extends('layouts.backend')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="block">
                    <div class="block-content">

                        <form method="POST" action={{ route('reimbesement-update') }} enctype="multipart/form-data">
                            @csrf
                            <div class="">
                                <div class="col-sm-12 p-2">
                                        {{-- <input type="hidden" name="name" value="{{ $reimbesements->name }}">
                                        <input type="hidden" name="position" value="{{ $reimbesements->position }}">
                                        <input type="hidden" name="penempatan" value="{{ $reimbesements->penempatan }}"> --}}
                                        <input type="hidden" name="id" value="{{ $reimbesements->id }}">
                                        <div class="input-group mb-3">
                                            <div class="w-25">Nama</div>
                                            <div class="w-50">: <strong>{{ $reimbesements->person }}</strong></div>
                                            <div class="w-25"><button type="submit" class="btn btn-primary w-100">Simpan Data</button></div>
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="w-25">Posisi</div>
                                            <div class="w-75">: <strong>{{ $reimbesements->position }}</strong></div>
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="w-25">Penempatan</div>
                                            <div class="w-75">: <strong>{{ $reimbesements->penempatan }}</strong></div>
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="w-25">Nama Outlet</div>
                                            <div class="w-75"><input type="text" name="outlet_name" class="form-control" value="{{ $reimbesements->outlet_name }}"> </div>
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="w-25">Tanggal</div>
                                            <div class="w-75"><input type="date" name="reimbesement_date" class="form-control" value="{{ $reimbesements->reimbesement_date }}"> </div>
                                        </div>


                                        <h5 class="text-center">Reimbesement Data</h5>

                                    {{-- <div id="row">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <button class="btn btn-danger"
                                                    id="DeleteRow" type="button">
                                                    <i class="bi bi-trash"></i>
                                                    Delete
                                                </button>
                                            </div>
                                            <input type="text"
                                                class="form-control m-input">
                                        </div>
                                    </div> --}}

                                    @foreach ($reimbesements->details as $key => $item)

                                    @if ($key > 0)
                                    <div id="row">
                                    @endif

                                    <div class="input-group mb-3">
                                        <div class="col-1">
                                            @if ($key > 0)
                                                <button class="btn btn-danger" id="DeleteRow" type="button">
                                                <i class="si si-trash"></i></button>
                                            @else
                                                <button class="btn btn-secondary" type="button"><i class="si si-menu"></i></button>
                                            @endif

                                        </div>
                                        <div class="col-2">Keterangan</div>
                                        <div class="col-9"><input type="text" name="keterangan[]" class="form-control" value="{{ $item->keterangan }}"> </div>
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="col-1"></div>
                                        <div class="col-2">Nominal (Rp)</div>
                                        <div class="col-7"><input type="number" step="any" name="nominal[]" class="form-control" value="{{ number_format($item->nominal, 2,".","") }}"></div>
                                        <div class="col-2"><input type="file" name="image[]" accept="image/png, image/jpeg,image/jpg" class="form-control" value="{{ $item->image }}"></div>
                                    </div>
                                    @if ($key > 0)
                                    </div>
                                    @endif
                                    @endforeach

                                    <div id="newinput"></div>
                                    <div class="text-center">
                                        <button id="rowAdder" type="button" class="btn btn-secondary w-25 mb-5">
                                            Tambah Keterangan
                                        </button>
                                    </div>

                                    {{-- <div class="input-group mb-3">
                                        <div class="col-10 text-center"><strong>Total</strong></div>
                                        <div class="col-2"><strong>Rp 500000</strong></div>
                                    </div> --}}
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Page Content -->

<script type="text/javascript">

        $("#rowAdder").click(function () {
            newRowAdd =
            '<div id="row">'+
            '<div class="input-group mb-3">'+
                '<div class="col-1">'+
                    '<button class="btn btn-danger" id="DeleteRow" type="button">'+
                    '<i class="si si-trash"></i></button>'+
                '</div>'+
                '<div class="col-2">Keterangan</div>'+
                    '<div class="col-9"><input type="text" name="keterangan[]" class="form-control"> </div>'+
                '</div>'+
                '<div class="input-group mb-3">'+
                    '<div class="col-1"></div>'+
                    '<div class="col-2">Nominal (Rp)</div>'+
                    '<div class="col-7"><input type="text" name="nominal[]" class="form-control"></div>'+
                    '<div class="col-2"><input type="file" name="image[]" class="form-control"></div>'+
            '</div>'+
            '</div>';

            $('#newinput').append(newRowAdd);
        });

        $("body").on("click", "#DeleteRow", function () {
            $(this).parents("#row").remove();
        })
</script>


@endsection
