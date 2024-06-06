@extends('adminlte::page')

@section('title', 'Data Perpustakaan')


@section('content_header')
<div class="row mt-3">
    <div class="col-lg-3 col-6">
        <div class="small-box bg-primary">
            <div class="inner">
                <h3>{{ \App\Models\PERPUSTAKAAN::count() }} Lokasi</h3>
                <p>Data Perpustakaan</p>
            </div>
            <div class="icon">
                <i class="fas fa-book" style="color: white;"></i>
            </div>
        </div>
    </div>
</div>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @if (session('success_message'))
                <div class="alert alert-success">
                    {{session('success_message')}}
                </div>
                @endif

                <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

                <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
                <!-- Elemen untuk peta -->
                <div id="map" style="width:100%; height:500px;"></div>

                <style>
                    #map {
                        width: 100%;
                        height: 500px;
                        top: 0;
                        /* Adjust this value based on your layout and preferences */
                    }
                </style>
                <!-- Akhir Elemen untuk peta -->
                <br>

                <table class="table table-hover table-bordered table-striped" id="example2"">
                        <thead>
                        <tr>
                                <th>Nama Perpustakaan</th>
                                <th>Alamat</th>
                                <th>Jam Operasional</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($perpustakaans as $key => $perpustakaan)
                                <tr>
                                    <td>{{ $perpustakaan->namaperpustakaan }}</td>
                                    <td>{{ $perpustakaan->alamat }}</td>
                                    <td>{{ $perpustakaan->jam }}</td>
                                    <td>{{ $perpustakaan->latitude }}</td>
                                    <td>{{ $perpustakaan->longitude }}</td>
                                    <td>
                                <a href=" {{ route('perpustakaans.show', $perpustakaan->id) }}" class="btn btn-primary">
                    <i class="fas fa-eye"></i> Lihat
                    </a>

                    <a href="{{ route('perpustakaans.edit', $perpustakaan->id) }}" class="btn btn-warning">
                        <i class="fas fa-edit"></i> Edit
                    </a>

                    <form action="{{ route('perpustakaans.destroy', $perpustakaan->id) }}" id="delete-form-{{ $perpustakaan->id }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger" onclick="confirmDelete('{{ $perpustakaan->id }}')">
                            <i class="fas fa-trash-alt"></i> Hapus
                        </button>
                    </form>
                    </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>

                <p class="mb-0"></p>
            </div>
        </div>
    </div>
</div>
@stop

@push('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // Inisialisasi peta menggunakan Leaflet
    var map = L.map('map').setView([-6.900707, 107.615868], 13); // Set initial view to a default location (e.g., Jakarta)

    // Menambahkan layer peta dari Google Maps menggunakan Leaflet
    L.tileLayer('https://{s}.google.com/vt?/lyrs=p&x={x}&y={y}&z={z}', {
        maxZoom: 19,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    }).addTo(map);

    // Menambahkan marker untuk setiap Museum di dalam database
    @foreach($perpustakaans as $perpustakaan)
    var marker = L.marker([{{ $perpustakaan->latitude }}, {{ $perpustakaan->longitude }}]).addTo(map);
    marker.bindPopup("<b>{{ $perpustakaan->namaperpustakaan }}</b><br>Alamat : {{ $perpustakaan->alamat }}<br>Jam Operasional : {{ $perpustakaan->jam }}<br>latitude : {{ $perpustakaan->latitude }}<br>Longitude : {{ $perpustakaan->longitude }}").openPopup();
    @endforeach

    // Menangkap event klik pada peta
    map.on('click', function onMapClick(e) {
        // Mendapatkan koordinat dari event klik
        var lat = e.latlng.lat;
        var lng = e.latlng.lng;

        // Mengisi nilai input latitude dan longitude
        document.getElementById('InputLatitude').value = lat;
        document.getElementById('InputLongitude').value = lng;
    });
</script>


<script>
        function confirmDelete(perpustakaanId) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: 'Anda tidak dapat mengembalikan data yang sudah dihapus!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Trigger the form submission for delete
                    document.getElementById('delete-form-' + perpustakaanId).submit();
                }
            });
        }
    </script>
@endpush