@extends('layouts.backend')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="block">
                    <div class="block-content">

                        <form method="POST" action={{ route('reimbesement-store') }} enctype="multipart/form-data">
                            @csrf
                            <div class="">
                                <div class="col-sm-12 p-2">
                                        <input type="hidden" name="name" value="{{ $users->name }}">
                                        <input type="hidden" name="position" value="{{ $users->position }}">
                                        <input type="hidden" name="penempatan" value="{{ $users->penempatan }}">

                                        <div class="input-group mb-3">
                                            <div class="w-25">Nama</div>
                                            <div class="w-75">: <strong>{{ $users->name }}</strong></div>
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="w-25">Posisi</div>
                                            <div class="w-75">: <strong>{{ $users->position }}</strong></div>
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="w-25">Penempatan</div>
                                            <div class="w-75">: <strong>{{ $users->penempatan }}</strong></div>
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="w-25">Nama Outlet</div>
                                            <div class="w-75"><input type="text" name="outlet_name" class="form-control" placeholder="Masukkan nama outlet..."> </div>
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="w-25">Tanggal</div>
                                            <div class="w-75"><input type="date" name="reimbesement_date" class="form-control"> </div>
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

                                    <div class="input-group mb-3">
                                        <div class="col-1">
                                            <button class="btn btn-secondary" type="button"><i class="si si-action-redo"></i></button>
                                        </div>
                                        <div class="col-2">Keterangan</div>
                                        <div class="col-9"><input type="text" name="berangkat" class="form-control" placeholder="Masukkan keterangan keberangkatan"> </div>
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="col-1"></div>
                                        <div class="col-2">Jarak (KM)</div>
                                        <div class="col-2"><input type="number" id="jarak_1" name="jarak_1" step="any" class="form-control" onKeyDown="berangkat();" value="0" min="0"></div>
                                        {{-- <div class="col-2">Nominal (Rp)</div>
                                        <div class="col-2"><input type="number" id="nominal_1_txt"  step="any" class="form-control" disabled></div> --}}
                                        <div class="col-7"><input type="file" name="image_1" accept="image/png, image/jpeg, image/jpg" class="form-control"></div>
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="col-1">
                                            <button class="btn btn-secondary" type="button"><i class="si si-action-undo"></i></button>
                                        </div>
                                        <div class="col-2">Keterangan</div>
                                        <div class="col-9"><input type="text" name="pulang" class="form-control" placeholder="Masukkan keterangan kepulangan"> </div>
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="col-1"></div>
                                        <div class="col-2">Jarak (KM)</div>
                                        <div class="col-2"><input type="number" id="jarak_2" name="jarak_2" step="any" class="form-control" onKeyDown="pulang();" value="0" min="0"></div>
                                        {{-- <div class="col-2">Nominal (Rp)</div>
                                        <div class="col-2"><input type="number" id="nominal_2_txt" value="0" step="any" class="form-control" disabled></div> --}}
                                        <div class="col-7"><input type="file" name="image_2" accept="image/png, image/jpeg, image/jpg" class="form-control"></div>
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="col-1">
                                            <button class="btn btn-secondary" type="button"><i class="si si-cup"></i></button>
                                        </div>
                                        <div class="col-2">Keterangan</div>
                                        <div class="col-9"><input type="text" name="makan" class="form-control" placeholder="Masukkan keterangan makan"> </div>
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="col-1"></div>
                                        <div class="col-2">Nominal (Rp)</div>
                                        <div class="col-2"><input type="number" name="nominal_3" step="any" class="form-control" value="0" min="0"></div>
                                        <div class="col-7"><input type="file" name="image_3" accept="image/png, image/jpeg, image/jpg" class="form-control"></div>
                                    </div>

                                    {{-- <div class="input-group mb-3">
                                        <div class="col-1"></div>
                                        <div class="col-2">Jumlah (Rp) :</div>
                                        <div class="col-9"><input type="text" class="form-control" id="subtotal" value="0" disabled></div>
                                    </div> --}}

                                    <div class="input-group mb-3">
                                        <div class="w-100"><button type="submit" class="btn btn-primary w-100">Simpan Data</button></div>
                                    </div>

                                    {{-- <div id="newinput"></div>
                                    <div class="text-center">
                                        <button id="rowAdder" type="button" class="btn btn-secondary w-25 mb-5">
                                            Tambah Keterangan
                                        </button>
                                    </div> --}}

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

<script>

        // $("#rowAdder").click(function () {
        //     newRowAdd =
        //     '<div id="row">'+
        //     '<div class="input-group mb-3">'+
        //         '<div class="col-1">'+
        //             '<button class="btn btn-danger" id="DeleteRow" type="button">'+
        //             '<i class="si si-trash"></i></button>'+
        //         '</div>'+
        //         '<div class="col-2">Keterangan</div>'+
        //             '<div class="col-9"><input type="text" name="keterangan[]" class="form-control"> </div>'+
        //         '</div>'+
        //         '<div class="input-group mb-3">'+
        //             '<div class="col-1"></div>'+
        //             '<div class="col-2">Nominal (Rp)</div>'+
        //             '<div class="col-7"><input type="text" name="nominal[]" class="form-control"></div>'+
        //             '<div class="col-2"><input type="file" name="image[]" class="form-control"></div>'+
        //     '</div>'+
        //     '</div>';

        //     $('#newinput').append(newRowAdd);
        // });

        // $("body").on("click", "#DeleteRow", function () {
        //     $(this).parents("#row").remove();
        // })

        function berangkat(e){
            let input = document.getElementById("jarak_1").value;
            alert(input)
            document.getElementById("nominal_1_tx").value = input * 2500;
         }
</script>


@endsection
