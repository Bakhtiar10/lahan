@extends("templatepenjual.index")
@section('title') Peta @endsection
@section('content')
    <style>
        .marker {
            display: block;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            padding: 0;
        }

    </style>
    <div class="container">
        <div class="row" style="padding-top : 50px">
            <div class="col-lg-2">
                <div class="form-group">
                    <select name="kecamatan" id="kecamatan" class="form-control kecamatan-select">
        
                    </select>
                </div>
                <div class="form-group">
                    <select name="jenis_lahan" id="jenis_lahan" class="form-control">
                        <option value="">Pilih Jenis Lahan</option>
                        <option value="Lahan Kavling">Lahan Kavling</option>
                        <option value="Lahan Pertanian">Lahan Pertanian</option>
                        <option value="Lahan Perkebunan">Lahan Perkebunan</option>
                    </select>
                </div>
                <div class="form-group">
                    <select name="harga_lahan" id="harga_lahan" class="form-control">
                        <option value="">Pilih Harga</option>
                        <option value="<100">100.000.000 kebawah</option>
                        <option value="100-200">100.000.000 - 200.000.000</option>
                        <option value="200-300">200.000.000 - 300.000.000</option>
                        <option value=">300">300.000.000 keatas</option>
                    </select>
                </div>
                {{-- <div class="list-group">
                    <a href="javascript:void(0)" id="semua" class="list-group-item active">Semua</a>
                    <a href="javascript:void(0)" id="kapling" class="list-group-item"> Lahan Kapling</a>
                    <a href="javascript:void(0)" id="pertanian" class="list-group-item">Lahan Pertanian</a>
                    <a href="javascript:void(0)" id="perkebunan" class="list-group-item">lahan Perkebunan</a>
                </div> --}}
            </div>
        
            <div class="col-lg-10">
                <div class="container">
                    <div id="map" style="width: 100%; height: 500px; margin-bottom: 10px"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        const url = '{{ config('app.url') }}';
        const kecamatan = document.querySelector('#kecamatan');
        const jenis_lahan = document.querySelector('#jenis_lahan');
        const harga_lahan = document.querySelector('#harga_lahan');

        const imageKapling = '{{ asset('assets/images/icon_marker/kavling.png') }}';
        const imagePertanian = '{{ asset('assets/images/icon_marker/pertanian.png') }}';
        const imagePerkebunan = '{{ asset('assets/images/icon_marker/perkebunan.png') }}';

        let markers = [];

        mapboxgl.accessToken =
            'pk.eyJ1IjoiYmFraHRpYXIxMCIsImEiOiJja2MwbW1tZ20xMnJ6MnNwamQ0dTB0ZXk1In0.iw0dHwmf9eOW0wCoMHhL6A';
        const map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11',
            center: [109.125595, -6.879704],
            zoom: 11
        });
        map.addControl(new mapboxgl.NavigationControl());

        const kecamatanArray = ["Adiwerna", "Balapulang", "Bojong", "Bumijawa", "Dukuhturi", "Dukuhwaru", "Jatinegara",
            "Kedungbanteng", "Kramat", "Lebaksiu", "Margasari", "Pagerbarang", "Pangkah", "Slawi", "Suradadi",
            "Talang", "Tarub", "Warureja", "Tegal Timur", "Tegal Barat", "Tegal Selatan", "Margadana"
        ];

        let htmlKecamatan = '<option value="">Pilih Kecamatan</option>';
        $.each(kecamatanArray, function(key, item) {
            htmlKecamatan += `<option value="${item}">${item}</option>`
        })
        $('.kecamatan-select').html(htmlKecamatan);


        async function loadData(kecamatan, jenis_lahan, harga_lahan) {
            let data = {
                _token: "{{ csrf_token() }}",
                kecamatan: kecamatan !== '' ? kecamatan : undefined,
                jenis_lahan: jenis_lahan !== '' ? jenis_lahan : undefined,
                harga_lahan : harga_lahan !== '' ? harga_lahan : undefined,
            }

            $.ajax({
                type: "GET",
                url: '/pembeli/show/peta/',
                dataType: "json",
                data: data,
                success: function(data) {
                    $.each(data, function(index, item) {
                        const el = document.createElement('div');
                        el.className = 'marker';
                        el.style.width = '32px';
                        el.style.height = '32px';

                        if (item.jenis_lahan === 'Lahan Kavling') {
                            el.style.backgroundImage = `url(${imageKapling})`;
                        } else if (item.jenis_lahan === 'Lahan Pertanian') {
                            el.style.backgroundImage = `url(${imagePertanian})`;
                        } else {
                            el.style.backgroundImage = `url(${imagePerkebunan})`;
                        }

                        let marker = new mapboxgl.Marker(el);
                        showMarkers(item, marker);
                    })
                },
                error: function(error) {
                    console.log(error.responseText);
                }
            });
        }

        kecamatan.addEventListener('change', function() {
            clearMarkers();
            loadData(this.value, jenis_lahan.value, harga_lahan.value);
        });

        jenis_lahan.addEventListener('change', function() {
            clearMarkers();
            loadData(kecamatan.value, this.value, harga_lahan.value);
        });

        harga_lahan.addEventListener('change', function() {
            clearMarkers();
            loadData(kecamatan.value, jenis_lahan.value, this.value);
        });

        function clearMarkers() {
            markers.map((marker) => marker.remove());
            markers = [];
        }

        function showMarkers(item, marker) {
            var image = '';
            if(item.images.length > 0){
                image =`<img src="{!! asset('${item.images[0].foto}') !!}" alt="Tidak ada foto" style=" display: block; margin: 0 auto; width: 95%;">`
            }else{
                image = `<img src="{!! asset('no-image-found.png') !!}" alt="Tidak ada foto" style=" display: block; margin: 0 auto; width: 95%;">`
            }
            const popup = new mapboxgl.Popup({
                    offset: 25
                })
                .setHTML(`
                    ${image}
                    <div class="text-center">
                        <a>${ item.judul_lahan }</a>
                        <div class="text-dark"> ${new Intl.NumberFormat('id-ID',{style: 'currency', currency: 'IDR'}).format(item.harga_lahan)}</div>
                        <div class="text-dark">${item.jenis_lahan}</div>
                        <a href="/detail_lahan/${item.id}"><i>Detail Lahan</i></a>
                    </div>
                `);

            marker.setLngLat({
                lng: item.longitude,
                lat: item.latitude
            }).setPopup(popup).addTo(map);
            markers.push(marker);

        }

        loadData();

    </script>
@endsection
