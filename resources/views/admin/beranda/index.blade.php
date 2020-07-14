@extends("template.index")
@section('title') Beranda Admin @endsection
@section("content")

<div class="row">
    <div class="col-lg-6 col-sm-6">
        <div class="counter-box text-center white">
            <div class="text font-17 m-b-5">Statistik Lahan</div>
            <div id="chart" style="width: 50px; height: 10px; margin-bottom: 10px"></div>
        </div>
    </div>
    <div class="col-lg-6 col-sm-6">

        <div class="counter-box text-center white">
            <div class="text font-17 m-b-5">Jumlah User</div>
            <div id="" style="height: 135px">
                <h5 style="text-align: center; margin-top: 90px"> Penjual : {{ count($penjual) }}</h5>
                <h5 style="text-align: center;">Pembeli : {{ count($pembeli) }}</h5>
            </div>
        </div>
    </div>
</div>
<script>
var options = {
    series: [1, 2, 3],
    chart: {
        width: 380,
        type: 'pie',
    },
    labels: ['Lahan Kavling', 'Lahan Perkebunan', 'Lahan Pertanian'],
    responsive: [{
        breakpoint: 480,
        options: {
            chart: {
                width: 200
            },
            legend: {
                position: 'bottom'
            }
        }
    }]
};

var chart = new ApexCharts(document.querySelector("#chart"), options);
chart.render();
</script>


<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    <strong>Kabupaten</strong> Tegal
                </h2>
            </div>
            <div class="col-lg-10">
                <div id="map" style="width: 1000px; height: 400px; margin-bottom: 10px"></div>
            </div>
            @endsection

            @section('script')
            <script>
            const url = '{{config('
            app.url ')}}';
            const semua = document.querySelector('#semua');
            const kapling = document.querySelector('#kapling');
            const pertanian = document.querySelector('#pertanian');
            const perkebunan = document.querySelector('#perkebunan');

            let markers = [];

            mapboxgl.accessToken =
                'pk.eyJ1IjoiYmFraHRpYXIxMCIsImEiOiJja2MwbW1tZ20xMnJ6MnNwamQ0dTB0ZXk1In0.iw0dHwmf9eOW0wCoMHhL6A';
            const map = new mapboxgl.Map({
                container: 'map', // container id
                style: 'mapbox://styles/mapbox/streets-v11', // stylesheet location
                center: [109.125595, -6.879704], // starting position [lng, lat]
                zoom: 11 // starting zoom
            });
            map.addControl(new mapboxgl.NavigationControl());


            async function getPeta() {
                const peta = await fetch(url + 'pembeli/show/peta').then(res => res.json()).then(res => res);

                console.log(peta);

                // console.log(peta);
                peta.forEach(p => {
                    let marker = new mapboxgl.Marker();
                    showMarker(p, marker);
                });


                semua.addEventListener('click', function() {
                    this.classList.add('active');
                    kapling.classList.remove('active');
                    pertanian.classList.remove('active');
                    perkebunan.classList.remove('active');

                    clearMarkers()

                    peta.forEach(p => {
                        let marker = new mapboxgl.Marker();
                        showMarker(p, marker);
                    });

                });

                kapling.addEventListener('click', function() {
                    this.classList.add('active');
                    semua.classList.remove('active');
                    pertanian.classList.remove('active');
                    perkebunan.classList.remove('active');

                    clearMarkers()

                    peta.forEach(p => {
                        let marker = new mapboxgl.Marker();
                        if (p.jenis_lahan === 'Lahan Kavling') {
                            showMarker(p, marker);
                        }
                    });

                });

                pertanian.addEventListener('click', function() {
                    this.classList.add('active');
                    kapling.classList.remove('active');
                    semua.classList.remove('active');
                    perkebunan.classList.remove('active');

                    clearMarkers()

                    peta.forEach(p => {
                        let marker = new mapboxgl.Marker();
                        if (p.jenis_lahan === 'Lahan Pertanian') {
                            showMarker(p, marker);
                        }
                    });

                });

                perkebunan.addEventListener('click', function() {
                    this.classList.add('active');
                    kapling.classList.remove('active');
                    pertanian.classList.remove('active');
                    semua.classList.remove('active');

                    clearMarkers()

                    peta.forEach(p => {
                        let marker = new mapboxgl.Marker();
                        if (p.jenis_lahan === 'Lahan Perkebunan') {
                            showMarker(p, marker);
                        }
                    });

                });



            }

            function clearMarkers() {
                markers.forEach((marker) => marker.remove());
                markers = [];
                console.log(url);

            }


            function showMarker(p, marker) {
                const popup = new mapboxgl.Popup({
                        offset: 25
                    })
                    .setHTML(`
    <img style=" display: block; margin: 0 auto; width: 95%;"
    src="${url}${p.images[0].foto}" alt="tidak ada foto">
    <div class="text-center"><a>${p.judul_lahan}</a>
    <p class="text-dark">${p.harga_lahan}</p></div>`);
                marker.setLngLat({
                    lng: p.longitude,
                    lat: p.latitude
                }).setPopup(popup).addTo(map);
                markers.push(marker)
            }

            getPeta()
            </script>
        </div>
    </div>
    <!-- #END# Example -->
</div>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>

@endsection