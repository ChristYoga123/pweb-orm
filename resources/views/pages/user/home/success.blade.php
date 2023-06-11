@extends('layouts.user.app')

@section('content')
    <div class="w-full h-screen flex justify-center items-center">
        <div class="flex flex-col gap-5">
            <h1 class="text-4xl text-[#152C5B] font-semibold">Yeay! Transaksi Sukses</h1>
            <img src="{{ asset("assets/images/success.png") }}" alt="">
            <a href="/"><button class="btn w-full bg-[#152C5B] text-white">Kembali ke Home</button></a>
        </div>
    </div>
@endsection