@extends('layouts.user.app')
@section('content')
    {{-- Hero --}}
    <div class="w-full h-screen flex justify-center items-center">
        <div class="flex gap-32">
            <div class="hero-text flex flex-col gap-10 my-auto">
                <h1 class="text-5xl font-bold text-[#152C5B] flex flex-col gap-7">
                    <span>Forget Busy Work</span>
                    <span>Start Next Vacation</span>
                </h1>

                <div class="w-96 text-[#B0B0B0] text-justify font-light">
                    <p>We provide what you need to enjoy your holiday with family. Time to make another memorable moments.</p>
                </div>

                <button class="btn bg-[#3252DF] w-64 text-white font-medium">Show Me More</button>
            </div>

            <div class="hero-image">
                <img src="{{ asset("assets/images/hero.png") }}" alt="">
            </div>
        </div>
    </div>

    {{-- Content --}}
    <div class="mt-10 w-full lg:px-24">
        <div class="house flex flex-col gap-5">
            <p class="text-3xl font-semibold">House</p>
            <div class="flex gap-5">
                @forelse ($houses as $house)
                    <div class="flex flex-wrap flex-col">
                        <a href="{{ route("venue.show", $house->slug) }}">
                            <img src="/storage/{{ $house->hero_image }}" class="rounded-lg" width="263px" height="180px">
                            <div class="house-text mt-3">
                                <p class="text-xl font-medium">{{ $house->name }}</p>
                                <p class="text-sm text-[#B0B0B0] font-light">{{ $house->location }}, Indonesia</p>
                            </div>
                        </a>
                    </div>
                @empty
                    <h1 class="text-xl font-bold">Tidak ada Data</h1>
                @endforelse
            </div>
        </div>

        <div class="hotel flex flex-col gap-5 mt-10">
            <p class="text-3xl font-semibold">Hotel</p>
            <div class="flex gap-5">
                @forelse ($hotels as $hotel)
                    <div class="flex flex-wrap flex-col">
                        <a href="{{ route("venue.show", $hotel->slug) }}">
                            <img src="/storage/{{ $hotel->hero_image }}" class="rounded-lg" width="263px" height="180px">
                            <div class="house-text mt-3">
                                <p class="text-xl font-medium">{{ $hotel->name }}</p>
                                <p class="text-sm text-[#B0B0B0] font-light">{{ $hotel->location }}, Indonesia</p>
                            </div>
                        </a>
                    </div>
                @empty
                    <h1 class="text-xl font-bold">Tidak ada Data</h1>
                @endforelse
            </div>
        </div>

        <div class="apartment flex flex-col gap-5 mt-10">
            <p class="text-3xl font-semibold">Apartment</p>
            <div class="flex gap-5">
                @forelse ($apartments as $apartment)
                    <div class="flex flex-wrap flex-col">
                        <a href="{{ route("venue.show", $apartment->slug) }}">
                            <img src="/storage/{{ $apartment->hero_image }}" class="rounded-lg" width="263px" height="180px">
                            <div class="house-text mt-3">
                                <p class="text-xl font-medium">{{ $apartment->name }}</p>
                                <p class="text-sm text-[#B0B0B0] font-light">{{ $apartment->location }}, Indonesia</p>
                            </div>
                        </a>
                    </div>
                @empty
                    <h1 class="text-xl font-bold">Tidak ada Data</h1>
                @endforelse
            </div>
        </div>
    </div>

    {{-- Testimony --}}
    <div class="w-full px-24 my-20">
        <div class="flex gap-16">
            <img src="{{ asset("assets/images/family.png") }}" alt="">
            <div class="flex flex-col gap-10 my-auto">
                <p class="text-2xl font-medium">Happy Family</p>
                <div class="flex flex-col gap-5">
                    <img src="{{ asset("assets/images/stars.png") }}" alt="" width="200px">
                    <p class="text-4xl font-light">
                        What a great trip with my family and I should try again next time soon ...
                    </p>
                    <p class="text-lg font-light text-[#B0B0B0]">Angga, Product Designer</p>
                </div>
                <button class="btn bg-[#3252DF] w-64 text-white font-medium">Read Their Story</button>
            </div>
        </div>

    </div>
@endsection