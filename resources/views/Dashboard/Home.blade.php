@extends('layouts/main')

@section('main')
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->



        <!-- Layout container -->
        <div class="layout-page">

          <!-- Content wrapper -->
          <div class="content-wrapper">

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-lg-3 col-md-6  mb-4">
                    <div class="card">
                      <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                          <div class="avatar flex-shrink-0">
                            <i class="bx bx-time  bx-md"></i>
                          </div>
                          <div class="dropdown">
                            <button
                              class="btn p-0"
                              type="button"
                              id="cardOpt3"
                              data-bs-toggle="dropdown"
                              aria-haspopup="true"
                              aria-expanded="false"
                            >
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                              <a class="dropdown-item" href="/laporan">View More</a>

                            </div>
                          </div>
                        </div>
                        <span class="fw-semibold d-block mb-1">Jumlah Laporan</span>
                        <h3 class="card-title mb-2">{{ $all_laporan }}</h3>
                      </div>
                    </div>
                  </div>
                <div class="col-lg-3 col-md-6  mb-4">
                    <div class="card">
                      <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                          <div class="avatar flex-shrink-0">
                            <i class="bx bx-category  bx-md"></i>
                          </div>
                          <div class="dropdown">
                            <button
                              class="btn p-0"
                              type="button"
                              id="cardOpt3"
                              data-bs-toggle="dropdown"
                              aria-haspopup="true"
                              aria-expanded="false"
                            >
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                              <a class="dropdown-item" href="/kategori">View More</a>

                            </div>
                          </div>
                        </div>
                        <span class="fw-semibold d-block mb-1">Kategori Laporan</span>
                        <h3 class="card-title mb-2">{{ $kategori_laporan }}</h3>
                      </div>
                    </div>
                </div>
                  <div class="col-lg-3 col-md-6 col-6 mb-4">
                    <div class="card">
                      <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                          <div class="avatar flex-shrink-0">
                            <i class="bx bx-map-alt    bx-md"></i>
                          </div>
                          <div class="dropdown">
                            <button
                              class="btn p-0"
                              type="button"
                              id="cardOpt3"
                              data-bs-toggle="dropdown"
                              aria-haspopup="true"
                              aria-expanded="false"
                            >
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                              <a class="dropdown-item" href="/wilayah">View More</a>

                            </div>
                          </div>
                        </div>
                        <span class="fw-semibold d-block mb-1">Wilayah</span>
                        <h3 class="card-title mb-2">{{ $wilayah }}</h3>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6 col-6 mb-4">
                    <div class="card">
                      <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                          <div class="avatar flex-shrink-0">
                            <i class="bx bx-timer  bx-md"></i>
                          </div>
                          <div class="dropdown">
                            <button
                              class="btn p-0"
                              type="button"
                              id="cardOpt3"
                              data-bs-toggle="dropdown"
                              aria-haspopup="true"
                              aria-expanded="false"
                            >
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                              <a class="dropdown-item" href="">View More</a>

                            </div>
                          </div>
                        </div>
                        <span class="fw-semibold d-block mb-1">Laporan Hari Ini</span>
                        <h3 class="card-title mb-2">{{ $today }}</h3>
                      </div>
                    </div>
                  </div>
              </div>
                 <!-- Content -->
                <!-- Total Revenue -->
                <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
                  <div class="card">
                    <div class="row row-bordered g-0">
                      <div class="col-md-12">

                        <div class="col-lg-2 ms-3 mt-3 mb-4 d-flex gap-4">
                          <select class="form-select filter-chart col-lg-1 " name="" id="periode">
                              <option value="daily">Harian</option>
                              <option value="monthly">Bulanan</option>
                              <option value="yearly">Tahunan </option>
                          </select>

                          <select class="form-select filter-chart col-lg-1" name="" id="kategori">
                              <option value="">Pilih Kategori</option>
                              @foreach ( $categories as $category)
                              <option value="{{ $category->id }}">{{ $category->jenis_laporan }} &nbsp;&nbsp;</option>
                              @endforeach
                          </select>

                          <select class="form-select filter-chart col-lg-1" name="" id="daerah">
                            <option value="">Pilih Wilayah</option>
                              @foreach ( $daerah as $daera)
                              <option value="{{ $daera->id }}">{{ $daera->wilayah }} &nbsp;&nbsp;</option>
                              @endforeach
                          </select>

                          <select class="form-select filter-chart col-lg-1" name="" id="kanal">
                            <option value="">Pilih Kanal </option>
                              @foreach ( $kanals as $kanal)
                              <option value="{{ $kanal->id }}">{{ $kanal->kanal_laporan }} &nbsp;&nbsp;</option>
                              @endforeach
                          </select>

                        </div>
                      </div>
                      <div id="container">
                      </div>


                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--/ Total Revenue -->

    <!-- / Layout wrapper -->

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    @push('script')


    <script>



        laporan_chart()

        function laporan_chart(){
          $.ajax({
          url: "{{ route('filter_kategori') }}",
          data: {
          kategori:$('#kategori').val(),
          periode:$('#periode').val(),
          daerah:$('#daerah').val(),
          kanal:$('#kanal').val(),
        },
        success: function(response){
            Highcharts.chart('container', {
                title: {
                    text: 'Data Aduan Masyarakat Perbulan/Pertahun',
                    align: 'center'
                },
                subtitle: {
                    text: ' ',
                    align: 'left'
                },
                xAxis: {
                    categories: response.periode
                },
                series: [{
                    type: 'column',
                    name: 'Laporan',
                    colorByPoint: true,
                    data: response.total,
                    showInLegend: false
                }]
            });
        }
    })

}

$('.filter-chart').on('change', function(){
    laporan_chart()
});



</script>

@endpush



@endsection
