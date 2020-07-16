@extends("templatepembeli.index")
@section('title') Peta @endsection
@section("content")

<div class="col-lg-2">
    <div class="list-group">
        <a href="javascript:void(0)" id="semua" class="list-group-item active">Semua</a>
        <a href="javascript:void(0)" id="kapling" class="list-group-item"> Lahan Kapling</a>
        <a href="javascript:void(0)" id="pertanian" class="list-group-item">Lahan Pertanian</a>
        <a href="javascript:void(0)" id="perkebunan" class="list-group-item">lahan Perkebunan</a>
    </div>
</div>

<div class="col-lg-10">
    <div id="map" style="width: 1080px; height: 500px; margin-bottom: 10px"></div>
</div>
@endsection

@section('script')
<script>
const url = '{{config('app.url')}}';
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


async function getPeta(){
    const peta = await fetch(url+'pembeli/show/peta').then(res => res.json()).then(res => res);

    console.log(peta);

    // console.log(peta);
    peta.forEach(p => {
      let marker = new mapboxgl.Marker();
        showMarker(p, marker);
    });
    


    semua.addEventListener('click', function(){
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

    kapling.addEventListener('click', function(){
        this.classList.add('active');
        semua.classList.remove('active');
        pertanian.classList.remove('active');
        perkebunan.classList.remove('active');

        clearMarkers()

        peta.forEach(p => {
             let marker = new mapboxgl.Marker();
            if(p.jenis_lahan === 'Lahan Kavling'){
            showMarker(p, marker);
            }
        });

    });

    pertanian.addEventListener('click', function(){
        this.classList.add('active');
        kapling.classList.remove('active');
        semua.classList.remove('active');
        perkebunan.classList.remove('active');

        clearMarkers()

        peta.forEach(p => {
            let marker = new mapboxgl.Marker();
            if(p.jenis_lahan === 'Lahan Pertanian'){
            showMarker(p, marker);
            }
        });

    });

    perkebunan.addEventListener('click', function(){
        this.classList.add('active');  
        kapling.classList.remove('active');
        pertanian.classList.remove('active');
        semua.classList.remove('active');

        clearMarkers()

        peta.forEach(p => {
            let marker = new mapboxgl.Marker();
            if(p.jenis_lahan === 'Lahan Perkebunan'){
            showMarker(p, marker);
            }
        });
 
    });

    

}

function clearMarkers(){
    markers.forEach((marker) => marker.remove());
    markers = [];
    console.log(url);
    
  }


function showMarker(p, marker){
    const popup = new mapboxgl.Popup({ offset: 25 })
    .setHTML(`
    <img style=" display: block; margin: 0 auto; width: 95%;"
    src="${url}${p.images[0].foto}" alt="tidak ada foto">
    <div class="text-center"><a>${p.judul_lahan}</a>
    <p class="text-dark">${p.harga_lahan}</p> <a href="/pembeli/detail_lahan/${p.id}"><i
                                                class="">Detail Lahan</i></a></div>`);
    marker.setLngLat({lng: p.longitude, lat: p.latitude}).setPopup(popup).addTo(map);
    markers.push(marker)
  }

getPeta()

</script>
@endsection