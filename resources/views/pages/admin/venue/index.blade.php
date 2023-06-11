@extends('layouts.admin.app')

@section('content')
<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Data Venue
    </h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        <a href="{{ route("admin.venue.create") }}" class="button text-white bg-theme-1 shadow-md mr-2">+ Tambah Data Venue</a>
    </div>
</div>
<!-- BEGIN: Datatable -->
<div class="intro-y datatable-wrapper box p-5 mt-5">
    <table class="table table-report table-report--bordered display datatable w-full">
        <thead>
            <tr>
                <th class="border-b-2 whitespace-no-wrap">NAMA</th>
                <th class="border-b-2 text-center whitespace-no-wrap">GAMBAR UTAMA</th>
                <th class="border-b-2 text-center whitespace-no-wrap">HARGA PER MALAM</th>
                <th class="border-b-2 text-center whitespace-no-wrap">LOKASI</th>
                <th class="border-b-2 text-center whitespace-no-wrap">AKSI</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($venues as $venue)
                <tr>
                    <td class="border-b">
                        <div class="font-medium whitespace-no-wrap">{{ $venue->name }}</div>
                        <div class="text-gray-600 text-xs whitespace-no-wrap">{{ $venue->category }}</div>
                    </td>
                    <td class="text-center border-b">
                        <div class="flex sm:justify-center">
                            <div class="intro-x w-10 h-10 image-fit"></div>
                            <div class="intro-x w-10 h-10 image-fit -ml-5">
                                <img alt="bandung-permai" class="rounded-full" src="/storage/{{ $venue->hero_image }}">
                            </div>
                            <div class="intro-x w-10 h-10 image-fit -ml-5"></div>
                        </div>
                    </td>
                    <td class="text-center border-b">Rp{{ $venue->price_per_night }},00</td>
                    <td class="w-40 border-b">
                        <div class="flex items-center sm:justify-center">{{ $venue->location }}, Indonesia</div>
                    </td>
                    <td class="border-b w-5">
                        <div class="flex sm:justify-center items-center">
                            <a href="#" class="flex items-center mr-3 text-gray-700"> <i data-feather="edit" class="w-4 h-4 mr-1"></i> Detail </a>
                            <a href="{{ route("admin.venue.edit", $venue->slug) }}" class="flex items-center mr-3 text-yellow-500"> <i data-feather="edit" class="w-4 h-4 mr-1"></i> Edit </a>
                            <form action="{{ route("admin.venue.destroy", $venue->slug) }}" method="POST" class="flex items-center mr-3 text-red-500">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="flex">
                                    <i data-feather="trash" class="w-4 h-4 mr-1"></i>
                                    <p>Hapus</p>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>          
            @endforeach
        </tbody>
    </table>
</div>
<!-- END: Datatable -->

@push('script')
    {{-- Alert Script --}}
    @if (session("success"))
        <script>
            // success alert
            Swal.fire(
                "Sukses",
                `{{ session("success") }}`,
                "success"
            );
        </script>
    @elseif(session("error"))
        <script>
            // error alert
            Swal.fire(
                "Gagal",
                `{{ session("error") }}`,
                "error"
            );
        </script>
    @elseif($errors->any())
        <script>
            // erro alert
            Swal.fire(
                "Gagal",
                `@foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach`,
                "error"
            );
        </script>
    @endif
    
    {{-- Additional Script --}}
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

    <script>
        $("form button").on("click", function()
        {
            Swal.fire({
                title: 'Apakah anda yakin ingin menghapus data ini',
                icon: 'warning',
                showDenyButton: true,
                confirmButtonText: 'Hapus',
                denyButtonText: `Batal`,
                }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $('form').submit()
                } else if (result.isDenied) {
                    Swal.fire('Batal', 'Proses menghapus data batal', 'info')
                }
            })
        })
    </script>
@endpush
@endsection