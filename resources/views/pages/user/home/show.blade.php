@extends('layouts.user.app')
@section('content')
    <div class="w-full h-screen flex justify-center">
        <div class="mt-36 flex flex-col items-center">
            <h1 class="text-center text-4xl font-semibold text-[#152C5B]">
                {{ $venue->name }}
            </h1>
            <p class="text-center mt-2 text-lg font-light text-[#B0B0B0]">{{ $venue->name }}, Indonesia</p>

            <div class="hero-image my-5">
                <img src="/storage/{{ $venue->hero_image }}" alt="" class="rounded-xl" width="400px">
            </div>
        </div>
    </div>

    <div class="px-24 flex gap-12 my-10">
        <div class="description flex flex-col gap-2 w-[700px]">
            <h1 class="text-lg font-semibold">About the Place</h1>
            <div class="text-justify text-[#B0B0B0]">
                {!! $venue->description !!}
            </div>
        </div>

        <div class="pricing">
            <div class="w-[400px] shadow-md py-12 px-16 flex flex-col gap-5 rounded-lg">
                <h1 class="text-lg font-semibold">Start Booking</h1>
                <h1><span class="text-2xl font-semibold text-green-500">Rp{{ $venue->price_per_night }} </span> <span class="text-2xl font-light">per night</span></h1>
                <form action="{{ route("transaction.store", $venue->slug) }}" method="post">
                    @csrf
                    <div class="q1 flex flex-col gap-3">
                        <h6 class="text-sm">How long will you stay?</h6>
                        <input type="number" class="input w-full border border-gray-400" placeholder="Masukkan jumlah malam" onchange="changePriceData({{ $venue->id }})" name="night">
                    </div>
                    <div class="q2 flex flex-col gap-3">
                        <h6 class="text-sm">Pick a date</h6>
                        <input type="date" class="input w-full border border-gray-400" name="start_date">
                        <h6 class="text-sm mx-auto">To</h6>
                        <input type="date" class="input w-full border border-gray-400" name="end_date">
                        <h6 class="text-sm text-[#B0B0B0]">You will pay <span id="price" class="text-[#152C5B] font-semibold"></span> per <span id="night" class="text-[#152C5B] font-semibold"></span></h6>
                    </div>
                    <button class="btn bg-[#3252DF] text-white">Continue to Book</button>
                </form>
            </div>
        </div>
    </div>

    <div class="mt-10 w-full lg:px-24">
        <div class="house flex flex-col gap-5">
            <p class="text-3xl font-semibold">Galleries</p>
            <div class="flex gap-5">
                @forelse ($venue->VenueGalleries as $gallery)
                    <div class="flex flex-wrap flex-col">
                        <img src="/storage/{{ $gallery->venue_gallery }}" width="263px" height="180px" class="rounded-xl">
                    </div>
                @empty
                    <div class="text-xl font-semibold">Tidak ada Galeri</div>
                @endforelse
            </div>
        </div>
    </div>

@push('script')
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g="crossorigin="anonymous"></script>
<script>
    function changePriceData(id)
    {
        $.ajax({
            url: `http://127.0.0.1:8000/show/${id}/api`,
            method: "GET",
            dataType: "json",
            success: function(data)
            {
                $("span#price").html("Rp" + data.price_per_night * $("input[type=number]").val() + ",-");
                $("span#night").html($("input[type=number]").val() + " nights");
            },
        })
    }
</script>
@endpush
@endsection