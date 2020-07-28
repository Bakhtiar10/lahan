@extends("template.index")
@section('title') Beranda Admin @endsection
@section("content")

<div class="row">
    <div class="col-lg-6 col-sm-6">
        <div class="counter-box text-center white">
            <div class="text font-17 m-b-5">Statistik Lahan</div>
            <canvas id="chartJenisLahan" height="280" width="600"></canvas>
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

@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>
<script>
    var urlJenisLahan = "{{ route('chartJenisLahan') }}";
    
    
    $(document).ready(function () {
        var total = new Array();
        $.get(urlJenisLahan, function (response) {
            response.forEach(function (dataJenisLahan) {
                total.push(dataJenisLahan.total);
            });

            var ctx = document.getElementById("chartJenisLahan").getContext('2d');        
            var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Lahan Kavling', 'Lahan Pertanian', 'Lahan Perkebunan'],
                    datasets: [{
                        data: total,
                        backgroundColor: ["#a3c7c9","#889d9e","#647678"],
                    }]
                },
                options: {}
            });
        });
    });

</script>
@endsection
