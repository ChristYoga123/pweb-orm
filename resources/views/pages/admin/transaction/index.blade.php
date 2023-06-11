@extends('layouts.admin.app')

@section('content')
<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Data Transaksi
    </h2>
</div>
<!-- BEGIN: Datatable -->
<div class="intro-y datatable-wrapper box p-5 mt-5">
    <table class="table table-report table-report--bordered display datatable w-full">
        <thead>
            <tr>
                <th class="border-b-2 whitespace-no-wrap">ID</th>
                <th class="border-b-2 whitespace-no-wrap">PEMBELI</th>
                <th class="border-b-2 text-center whitespace-no-wrap">VENUE</th>
                <th class="border-b-2 text-center whitespace-no-wrap">MALAM</th>
                <th class="border-b-2 text-center whitespace-no-wrap">STATUS PEMESANAN</th>
                <th class="border-b-2 text-center whitespace-no-wrap">TOTAL HARGA</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                <tr>
                    <td class="border-b">
                        <div class="font-medium whitespace-no-wrap">{{ $transaction->midtrans_booking_code }}</div>
                    </td>
                    <td class="text-center border-b">{{ $transaction->User->name }}</td>
                    <td class="text-center border-b">{{ $transaction->Venue->name }}</td>
                    <td class="text-center border-b">{{ $transaction->night }} Nights</td>
                    <td class="text-center border-b">{{ $transaction->payment_status }}</td>
                    <td class="text-center border-b">Rp{{ $transaction->Venue->price_per_night * $transaction->night }},00</td>
                </tr>          
            @endforeach
        </tbody>
    </table>
</div>
<!-- END: Datatable -->
@endsection