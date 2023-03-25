@extends('layouts.backend')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <div class="my-50 text-center">
            <h2 class="font-w700 text-black mb-10">Selamat Datang, {{ $users->name }}</h2>
            <h3 class="h5 text-muted mb-0">Welcome to Reimbuscheck.</h3>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 col-xl-5">
                <div class="block">
                    <div class="block-content">
                        <p class="text-muted text-justify">
                            Jangan pernah engkau berhenti belajar, karena tanpa kau sadar apa yang kau pelajari akan berguna di suatu saat nanti. Mungkin bukan sekarang tapi kau akan sadar esok hari.
                        </p>
                        <p class="text-right">
                            ~ Aliffathur Risqi Hidayat
                        </p>
                        {{-- <p class="text-muted">
                            Feel free to use any examples you like from the full versions to build your own pages. <strong>Wish you all the best and happy coding!</strong>
                        </p> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection
