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


@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>

@endsection