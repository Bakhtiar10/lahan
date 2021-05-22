@extends("template.index")
@section('title') Beranda Admin @endsection
@section('content')

    <div class="row">
        <div class="col-lg-4 col-sm-4">
            <div class="counter-box text-center white">
                <div class="text font-17 m-b-5">Statistik Lahan Terjual</div>
                <canvas id="chartJenisLahan" height="280" width="400"></canvas>
            </div>
        </div>
        <div class="col-lg-4 col-sm-4">
            <div class="counter-box text-center white">
                <div class="text font-17 m-b-5">Statistik Lahan Belum Terjual</div>
                <canvas id="chartJenisLahanBelumTerjual" height="280" width="400"></canvas>
            </div>
        </div>
        <div class="col-lg-4 col-sm-4">

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
        var urlJenisLahan = "{{ route('chartJenisLahanTerjual') }}";
        var urlJenisLahanBelumTerjual = "{{ route('chartJenisLahanBelumTerjual') }}";

        $(document).ready(function() {
            var total = new Array();
            var labelTerjual = new Array();
            var totalBelumTerjual = new Array();
            var labelBelumTerjual = new Array();

            $.get(urlJenisLahan, function(response) {
                response.forEach(function(dataJenisLahan) {
                    labelTerjual.push(dataJenisLahan.jenis_lahan)
                    total.push(dataJenisLahan.total);
                });

                var ctx = document.getElementById("chartJenisLahan").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        // labels: ['Lahan Kavling', 'Lahan Perkebunan', 'Lahan Pertanian'],
                        labels: labelTerjual,
                        datasets: [{
                            data: total,
                            backgroundColor: [
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                        }]
                    },
                    options: {}
                });
            });

            $.get(urlJenisLahanBelumTerjual, function(response) {
                response.forEach(function(dataJenisLahanBelumTerjual) {
                    labelBelumTerjual.push(dataJenisLahanBelumTerjual.jenis_lahan)
                    totalBelumTerjual.push(dataJenisLahanBelumTerjual.total)
                });

                var ctxBelumTerjual = document.getElementById('chartJenisLahanBelumTerjual').getContext(
                    '2d');
                var chartJenisLahanBelumTerjual = new Chart(ctxBelumTerjual, {
                    type: 'pie',
                    data: {
                        labels: labelBelumTerjual,
                        datasets: [{
                            data: totalBelumTerjual,
                            // backgroundColor: ["#a3c7c9","#889d9e","#647678"],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                            ],
                        }]
                    },
                    options: {}
                })
            })
        });

    </script>
@endsection
