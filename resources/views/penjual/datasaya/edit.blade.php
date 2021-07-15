@extends("templatepenjual.index")
@section('title') edit @endsection
@section('content')

    <div class="container">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"></h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{ url('datalahan/update', $data->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">
                        <div class="row">

                            <!-- <input type="hidden" name="_method" value="PUT"> -->

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="judul_lahan">Judul Lahan</label>
                                    <input type="text" name="judul_lahan" class="form-control"
                                        value="{{ old('judul_lahan', $data->judul_lahan) }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="luas_lahan">Luas Lahan</label>
                                    <input type="text" name="luas_lahan" class="form-control"
                                        value="{{ old('luas_lahan', $data->luas_lahan) }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="harga_lahan">Harga Lahan</label>
                                    <input type="text" name="harga_lahan" class="form-control input-harga"
                                        value="{{ old('harga_lahan', $harga_lahan) }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sertifikat">Sertifikat</label>
                                    <select class="form-control" name="sertifikat" id="sertifikat">
                                        <option value="{{ old('sertifikat', $data->sertifikat) }}">-- Pilih Jenis Sertifikat
                                            --
                                        </option>
                                        <option value="SHM - Sertifikat Hak Milik"
                                            {{ $data->sertifikat === 'SHM - Sertifikat Hak Milik' ? 'selected' : '' }}>SHM -
                                            Sertifikat Hak Milik</option>

                                        <option value="HGB - Hak Guna Bangun"
                                            {{ $data->sertifikat === 'HGB - Hak Guna Bangun' ? 'selected' : '' }}>HGB - Hak
                                            Guna Bangun</option>

                                        <option value="HP - Hak Pakai"
                                            {{ $data->sertifikat === 'HP - Hak Pakai' ? 'selected' : '' }}>HP - Hak Pakai
                                        </option>

                                        <option value="Belum Terdaftar"
                                            {{ $data->sertifikat === 'Belum Terdaftar' ? 'selected' : '' }}>Belum Terdaftar
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jenis_lahan">Jenis Lahan</label>
                                    <select class="form-control" name="jenis_lahan" id="jenis_lahan">
                                        <option value="{{ old('jenis_lahan', $data->jenis_lahan) }}">-- Pilih Jenis Lahan --
                                        </option>
                                        <option value="Lahan Kavling"
                                            {{ $data->jenis_lahan == 'Lahan Kavling' ? 'selected' : '' }}>Lahan Kavling
                                        </option>
                                        <option value="Lahan Pertanian"
                                            {{ $data->jenis_lahan == 'Lahan Pertanian' ? 'selected' : '' }}>Lahan
                                            Pertanian
                                        </option>
                                        <option value="Lahan Perkebunan"
                                            {{ $data->jenis_lahan == 'Lahan Perkebunan' ? 'selected' : '' }}>Lahan
                                            Perkebunan
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="kecamatan">Kecamatan</label>
                                    <select class="form-control kecamatan-select @error('kecamatan') is-invalid @enderror"
                                        name="kecamatan" id="kecamatan"></select>
                                </div>
                                @error('kecamatan')
                                    <span style="color:red">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <input type="hidden" value="{{ Auth::user()->no_hp }}" name="no_hp"
                                        class="form-control">
                                    <textarea name="deskripsi" id="deskripsi" cols="30" rows="5"
                                        class="form-control">{{ old('deskripsi', $data->deskripsi) }}</textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" name="alamat" class="form-control"
                                        value="{{ old('alamat', $data->alamat) }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="foto">Foto Lahan</label>
                                    <input type="file" class="form-control" name="foto">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="latitude">Latitude</label>
                                    <input type="text" value="{{ old('latitude', $data->latitude) }}" id="latitude"
                                        name="latitude" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="longitude">Longitude</label>
                                    <input type="text" value="{{ old('longitude', $data->longitude) }}" id="longitude"
                                        name="longitude" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div id="map" style="width: 1020px; height: 400px; margin-bottom: 10px"></div>
                                <div class="form-group">
                                    <a href="{{ url('/user/datasaya') }}" class="btn btn-md btn-danger"
                                        type="button">Batal</a>
                                    <button type="submit" class="btn btn-md btn-primary">Update</button>
                                </div>
                            </div>

                            <!-- <div id="mapid"></div> -->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script src="{{ asset('assets/js/money.js') }}"></script>

    <script>
        const kecamatanArray = ["Adiwerna", "Balapulang", "Bojong", "Bumijawa", "Dukuhturi", "Dukuhwaru", "Jatinegara",
            "Kedungbanteng", "Kramat", "Lebaksiu", "Margasari", "Pagerbarang", "Pangkah", "Slawi", "Suradadi",
            "Talang", "Tarub", "Warureja", "Tegal Timur", "Tegal Barat", "Tegal Selatan", "Margadana"
        ];
        let htmlKecamatan = `<option value="{!! old('kecamatan', $data->jenis_lahan) !!}">--Pilih Kecamatan--</option>`;
        $.each(kecamatanArray, function(key, item) {
            htmlKecamatan +=
                `<option value="${item}" ${ '{{$data->kecamatan}}' === item ? 'selected' : ''}>${item}</option>`
        })
        $('.kecamatan-select').html(htmlKecamatan);
        $(document).ready(function() {
            $(".input-harga").maskMoney({
                thousands: '.',
                decimal: ',',
                affixesStay: false,
                precision: 0
            });
        });
        const lat = document.querySelector('#latitude');
        const long = document.querySelector('#longitude');
        mapboxgl.accessToken =
            'pk.eyJ1IjoiaXNuYS1hbWFsaXlhIiwiYSI6ImNrYmkyZ2tlMDBiMjczMW15eHVlYXBhZW4ifQ.uqVd8rK5Oe49IjUREFnfgw';
        const map = new mapboxgl.Map({
            container: 'map', // container id
            style: 'mapbox://styles/mapbox/streets-v11', // stylesheet location
            center: [109.125595, -6.879704], // starting position [lng, lat]
            zoom: 11 // starting zoom
        });
        map.addControl(new mapboxgl.NavigationControl());
        const marker = new mapboxgl.Marker();
        if (lat.value !== '' && long.value !== '') {
            marker.setLngLat({
                lng: long.value,
                lat: lat.value
            }).addTo(map);
        }
        map.on('click', function(e) {
            lat.value = e.lngLat.lat;
            long.value = e.lngLat.lng;
            marker.setLngLat(e.lngLat).addTo(map);
        });

    </script>
@endsection
