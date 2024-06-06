<!-- @extends ('adminlte::page')

@section('title', 'Data Sekolah')

@section('content_header')
<h1 class="m-0 text-dark">Data Sekolah</h1>
@stop

@section('content')
<form action="{{route('sekolahs.store')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body" style="overflow: auto">

                    <table style="width: 100%">
                        <tr>
                            <td><label for="LabelNama">Nama Sekolah</label></td>
                            <td><input type="text" size="70" id="InputNama" placeholder="Nama Sekolah" name="namasekolah"></td>
                        </tr>
                        <tr>
                            <td><label for="LabelAlamat">Alamat Sekolah</label></td>
                            <td><input type="text" size="70" id="InputAlamat" placeholder="Alamat" name="alamat"></td>
                        </tr>
                        <tr>
                            <td><label for="LabelLatitude">Latitude</label></td>
                            <td><input type="text" size="70" id="InputLatitude" placeholder="Latitude" name="latitude"></td>
                        </tr>
                        <tr>
                            <td><label for="LabelLongitude">Longitude</label></td>
                            <td><input type="text" size="70" id="InputLongitude" placeholder="Longitude" name="longitude"></td>
                        </tr>
                    </table>

                    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

                    <!-- Make sure you put this AFTER Leaflet's CSS -->
                    <!-- <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin="">
                    </script>

                    <style>
                        #map {
                            height: 400px;
                        }
                    </style>

                    <div id="map"></div>


                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('sekolahs.index')}}" class="btn btn-default">Batal</a>
                </div>

            </div>
        </div>
    </div>
</form> -->
<!-- @stop --> 

<!-- @push('js')
<script>
    var map = L.map('map').setView([-6.87388483817, 107.575807571], 15); -->

    <!-- // L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    //     maxZoom: 19,
    //     attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    // }).addTo(map); -->


    <!-- // Hybrid: s,h;
    // Satellite: s;
    // Streets: m;
    // Terrain: p;

    // L.tileLayer('https://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}', {
    //     maxZoom: 20,
    //     subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    // }).addTo(map);

    //Membuat titik koordinat
    // var marker;

    // function onMapClick(e) {
    //     document.getElementById('InputLatitude').value = e.latlng.lat;
    //     document.getElementById('InputLongitude').value = e.latlng.lng;

    //     if (marker) {
    //         map.removeLayer(marker);
    //     }

    //     marker = L.marker(e.latlng).addTo(map)
    //         .bindPopup("Koordinat: " + e.latlng.toString())
    //         .openPopup();

    // }
    // // Add a click event listener to the map
    // map.on('click', onMapClick);

    //Membuat polyline
    // var linearray = [];
    // var polyline;

    // map.on('click', function onMapClick(e) {
    //     latitude = e.latlng.lat;
    //     longitude = e.latlng.lng;
    //     document.getElementById('InputLatitude').value = latitude;
    //     document.getElementById('InputLongitude').value = longitude;
    //     linearray.push([latitude, longitude]);

    // if (!marker) {
    //         document.getElementById('InputLatitude').value = latitude;
    //         document.getElementById('InputLongitude').value = longitude;
    // }

    //     marker = L.marker(e.latlng).addTo(map)
    //         .bindPopup("Koordinat: " + e.latlng.toString())
    //         .openPopup();
    //     polyline = L.polyline(linearray, {
    //         color: 'red'
    //     }).addTo(map);
    // });


    //Membuat polygon
    // var linearray = [];
    // var polygon;

    // map.on('click', function onMapClick(e) {
    //     latitude = e.latlng.lat;
    //     longitude = e.latlng.lng;
    //     // document.getElementById('InputLatitude').value = latitude;
    //     // document.getElementById('InputLongitude').value = longitude;
    //     linearray.push([latitude, longitude]);

    // if (!marker) {
    //         document.getElementById('InputLatitude').value = latitude;
    //         document.getElementById('InputLongitude').value = longitude;
    // }

    //     marker = L.marker(e.latlng).addTo(map)
    //         .bindPopup("Koordinat: " + e.latlng.toString())
    //         .openPopup();
    //     polygon = L.polygon(linearray, {
    //         color: 'red'
    //     }).addTo(map);
    // });

    //Membuat circle
    // var circle;

    // map.on('click', function onMapClick(e) {
    //     latitude = e.latlng.lat;
    //     longitude = e.latlng.lng;
    //     document.getElementById('InputLatitude').value = latitude;
    //     document.getElementById('InputLongitude').value = longitude;

        // if (marker) {
        //     map.removeLayer(marker);
        // }
        // Menghapus lingkaran jika sudah ada sebelumnya
        // if (circle) {
        //     map.removeLayer(circle);
        // }

//         marker = L.marker(e.latlng).addTo(map)
//             .bindPopup("Koordinat: " + e.latlng.toString())
//             .openPopup();
//         circle = L.circle([latitude, longitude], {
//             color: 'green',
//             radius: 400
//         }).addTo(map);
//     });
// </script>
// @endpush -->