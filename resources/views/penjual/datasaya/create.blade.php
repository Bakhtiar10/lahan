@extends("templatepenjual.index")
@section('title') create @endsection
@section("content")

<div class="container">
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="{{url('penjual/datalahan/simpan')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">

                        <input type="hidden" name="" value="">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="judul_lahan">Judul Lahan</label>
                                <input type="text" value="{{old('judul_lahan')}}" name="judul_lahan" id="judul_lahan"
                                    class="form-control @error('judul_lahan') is-invalid @enderror" placeholder="Masukan Judul Lahan">
                            </div>
                            @error('judul_lahan')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="luas_lahan">Luas Lahan (M2)</label>
                                <input type="text" value="{{old('luas_lahan')}}" name="luas_lahan" class="form-control  @error('luas_lahan') is-invalid @enderror" id="luas_lahan"
                                    placeholder="Masukan Luas">
                            </div>
                            @error('luas_lahan')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="harga_lahan">Harga Lahan</label>
                                <input type="text" value="{{old('harga_lahan')}}" name="harga_lahan" id="harga_lahan"
                                    class="form-control input-harga  @error('harga_lahan') is-invalid @enderror" placeholder="Masukan Harga">
                            </div>
                            @error('harga_lahan')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sertifikat">Sertifikat</label>
                                <select class="form-control  @error('sertifikat') is-invalid @enderror" name="sertifikat" id="sertifikat">
                                    <option value="{{old('sertifikat')}}">-- Pilih Jenis Sertifikat --</option>
                                    <option value="SHM - Sertifikat Hak Milik"
                                        {{old('sertifikat') === 'SHM - Sertifikat Hak Milik' ? 'selected' : ''}}>SHM -
                                        Sertifikat Hak Milik</option>

                                    <option value="HGB - Hak Guna Bangun"
                                        {{old('sertifikat') === 'HGB - Hak Guna Bangun' ? 'selected' : ''}}>HGB - Hak
                                        Guna Bangun</option>

                                    <option value="HP - Hak Pakai"
                                        {{old('sertifikat') === 'HP - Hak Pakai' ? 'selected' : ''}}>HP - Hak Pakai</option>

                                        <option value="Lainnya"
                                        {{old('sertifikat') === 'Lainnya' ? 'selected' : ''}}>Lainnya
                                        </option>
                                </select>
                            </div>
                            @error('sertifikat')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                        

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jenis_lahan">Jenis Lahan</label>
                                <select class="form-control  @error('jenis_lahan') is-invalid @enderror" name="jenis_lahan" id="jenis_lahan">
                                    <option value="{{old('jenis_lahan')}}">-- Pilih Jenis Lahan --</option>
                                    <option value="Lahan Kavling"
                                        {{old('jenis_lahan') === 'Lahan Kavling' ? 'selected' : ''}}>Lahan Kavling
                                    </option>
                                    <option value="Lahan Pertanian"
                                        {{old('jenis_lahan') === 'Lahan Pertanian' ? 'selected' : ''}}>Lahan Pertanian
                                    </option>
                                    <option value="Lahan Perkebunan"
                                        {{old('jenis_lahan') === 'Lahan Perkebunan' ? 'selected' : ''}}>Lahan Perkebunan
                                    </option>
                                </select>
                            </div>
                            @error('jenis_lahan')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" value="{{old('alamat')}}" name="alamat" class="form-control  @error('alamat') is-invalid @enderror"
                                    placeholder="Masukan Alamat" id="alamat">
                            </div>
                            @error('alamat')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="foto">Foto:</label>
                                <input type="file" class="form-control  @error('foto') is-invalid @enderror" name="foto" id="foto">
                            </div>
                            @error('foto')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <input type="hidden" value="{{ Auth::user()->no_hp }}" name="no_hp" class="form-control">
                                <textarea name="deskripsi" id="deskripsi" cols="30" rows="5"class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Masukan deskripsi"></textarea>
                            </div>
                            @error('deskripsi')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="latitude">Latitude</label>
                                <input type="text" id="latitude" name="latitude" class="form-control"
                                    placeholder="Masukan Latitude">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="longitude">Longitude</label>
                                <input type="text" id="longitude" name="longitude" class="form-control"
                                    placeholder="Masukan Longitude">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div id="map" style="width: 1020px; height: 400px; margin-bottom: 10px"></div>
                            <div class="form-group">
                                <a href="{{ url('/penjual/datasaya') }}" class="btn btn-md btn-danger"
                                    type="button">Batal</a>
                                <button type="submit" class="btn btn-md btn-primary">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


@section('script')
<script src="{{asset('assets/js/money.js')}}"></script>
<script>

//MaskMoney
$(document).ready(function() {
    $(".input-harga").maskMoney({ thousands:'.', decimal:',', affixesStay: false, precision: 0});
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