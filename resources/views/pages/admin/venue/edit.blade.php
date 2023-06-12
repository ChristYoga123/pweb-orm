@extends('layouts.admin.app')

@section('content')
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">Tambah Data Venue</h2>
</div>
<div class="grid grid-cols-12 lg:grid-cols-none gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-6">
        <!-- BEGIN: Form Layout -->
        <div class="intro-y box p-5">
            <form action="{{ route("admin.venue.update", $venue->slug) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div>
                    <label>Nama Venue</label>
                    <input type="text" class="input w-full border mt-2" placeholder="Masukkan nama venue" name="name" value="{{ $venue->name }}">
                </div>
                <div class="mt-5">
                    <label>Kategori Venue</label>
                    <select name="category" class="select2 w-full mt-2">
                        <option value="House" {{ $venue->category == "House" ? "selected" : "" }}>House</option>
                        <option value="Hotel" {{ $venue->category == "Hotel" ? "selected" : "" }}>Hotel</option>
                        <option value="Apartment" {{ $venue->category == "Apartment" ? "selected" : "" }}>Apartment</option>
                    </select>
                </div>
                <div class="mt-5">
                    <label>Lokasi Venue</label>
                    <input type="text" class="input w-full border mt-2" placeholder="Masukkan lokasi venue" name="location" value="{{ $venue->location }}">
                </div>
                <div class="mt-5">
                    <label>Harga Venue Per Malam</label>
                    <input type="number" class="input w-full border mt-2" placeholder="Masukkan harga venue" name="price_per_night" value="{{ $venue->price_per_night }}">
                </div>
                <div class="mt-5">
                    <label>Gambar Utama Venue</label>
                    @if ($venue->hero_image)
                        <img src="/storage/{{ $venue->hero_image }}" class="image-preview" alt="" width="300px">
                    @else
                        <img class="image-preview" alt="" width="300px">
                    @endif
                    <input type="hidden" name="old_image" value="{{ $venue->hero_image }}">
                    <input type="file" class="image-input input w-full border mt-2" name="hero_image" onchange="previewImage()">
                </div>
                <div class="mt-5">
                    <label>Galeri Venue (Pilih beberapa file sekaligus dengan format PNG. Boleh diisi kosong apabila tidak ingin mengubah galeri yang telah tersimpan)</label>
                    <input type="file" class="image-input input w-full border mt-2" name="gallery_venue[]" multiple>
                </div>
                <div class="mt-5">
                    <label>Deskripsi Venue</label>
                    <textarea data-feature="basic" class="summernote mt-2" name="description">{{ $venue->description }}</textarea>
                </div>
                <div class="text-right mt-5">
                    <button type="button" class="button w-24 border text-gray-700 mr-1">Cancel</button>
                    <button type="submit" class="button w-24 bg-theme-1 text-white">Save</button>
                </div>
            </form>
        </div>
        <!-- END: Form Layout -->
    </div>
</div>
@push('script')
    @if(session("error"))
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

    <script>
        function previewImage()
        {
            const image_input = document.querySelector(".image-input");
            const image_preview = document.querySelector(".image-preview");
            
            image_preview.style.display = "block";

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image_input.files[0]);

            oFReader.onload = function(oFREvent) {
                image_preview.src = oFREvent.target.result;
            }
        }
    </script>
@endpush
@endsection