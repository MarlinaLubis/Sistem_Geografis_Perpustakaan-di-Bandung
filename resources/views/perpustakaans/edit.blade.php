@extends('adminlte::page')

@section('title', 'Data Perpustakaan')

@section('content_header')
    <h1 class="m-0 text-dark">Data Perpustakaan</h1>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
@stop

@section('content')
    <form action="{{ route('perpustakaans.update',$perpustakaan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <td><label for="InputNamaPerpustakaan">Nama Perpustakaan</label></td>
                                <td>:</td>
                                <td><input type="text" name="namaperpustakaan" id="InputNamaPerpustakaan"
                                        placeholder="Masukkan nama perpustakaan" class="form-control" required
                                        value="{{ $perpustakaan->namaperpustakaan }}"></td>
                            </tr>
                            <tr>
                                <td><label for="InputAlamat">Alamat</label></td>
                                <td>:</td>
                                <td><input type="text" name="alamat" id="InputAlamat"
                                        placeholder="Masukkan alamat perpustakaan" class="form-control" required value="{{ $perpustakaan->alamat }}"></td>
                            </tr>
                            <tr>
                                <td><label for="InputAlamat">Jam Operasional</label></td>
                                <td>:</td>
                                <td><input type="text" name="jam" id="InputJam"
                                        placeholder="Masukkan jam operasional" class="form-control" required value="{{ $perpustakaan->jam }}"></td>
                            </tr>
                            <tr>
                                <td><label for="InputLatitude">Latitude</label></td>
                                <td>:</td>
                                <td><input type="text" name="latitude" id="InputLatitude"
                                    placeholder="Masukkan latitude perpustakaan" class="form-control" required value="{{ $perpustakaan->latitude }}"></td>
                            </tr>
                            <tr>
                                <td><label for="InputLongitude">Longitude</label></td>
                                <td>:</td>
                                <td><input type="text" name="longitude" id="InputLongitude"
                                        placeholder="Masukkan longitude perpustakaan" class="form-control" required value="{{ $perpustakaan->longitude }}"></td>
                            </tr>
                            {{-- <tr>
                                <td colspan="3">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="{{ route('perpustakaans.index') }}" class="btn btn-default">Batal</a>
                                </td>

                            </tr> --}}

                        </table>
                        <div style="height: 400px;" id="map"></div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('perpustakaans.index') }}" class="btn btn-danger">Batal</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop
@push('js')
    <script>
        
        var longitude = document.getElementById("InputLongitude").value;
        var latitude = document.getElementById("InputLatitude").value;
        
        var map = L.map('map').setView([latitude, longitude], 17);
        var marker = L.marker([latitude, longitude]).addTo(map);
        
        L.tileLayer('https://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}', {
            maxZoom: 19,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
        }).addTo(map);
        // Define a click event handler
        // var marker;
        function onMapClick(e) {
            // alert("Latitude: " + e.latlng.lat + "\nLongitude: " + e.latlng.lng);
            document.getElementById('InputLongitude').value = e.latlng.lng;
            document.getElementById('InputLatitude').value = e.latlng.lat;

            if (marker) {
                map.removeLayer(marker);
            }

            marker = L.marker(e.latlng).addTo(map)
                .bindPopup("Koordinat: " + e.latlng.toString())
                .openPopup();
        }

        // Add a click event listener to the map
        map.on('click', onMapClick);
    </script>
@endpush
