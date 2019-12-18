@extends('layouts.main')

@section('menu')
	{!! $menus !!}
@endsection

@section('content')
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Tabel Pasien</h5>
    </div>
    <div class="card-header">
        <form id="addForm">
            <div class="row">
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label">No. RM </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control search-pasien" placeholder="Masukkan Nama Pasien" name="id_pasien"  value="{{$rawatJalan->id_pasien}}" readonly="readonly" id="idPasien">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label">Pasien </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control search-pasien" placeholder="Masukkan Nama Pasien" name="nama_pasien"  value="{{$rawatJalan->nama_pasien}}" readonly="readonly">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label">Tgl. Lahir </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control search-pasien" placeholder="Masukkan Nama Pasien" name="tanggal_lahir"  value="{{$rawatJalan->tanggal_lahir}}" readonly="readonly">
                            </div>
                        </div>
                    </div>
            </div>
        </form>
    </div>
    <div class="col-md-12">
        <ul class="nav nav-tabs nav-tabs-top nav-justified">
            <li class="nav-item"><a href="#top-justified-tab1" class="nav-link active" data-toggle="tab">Transaksi Medis</a></li>
            <li class="nav-item"><a href="#top-justified-tab2" class="nav-link" data-toggle="tab">Rekam Medis</a></li>
            <li class="nav-item"><a href="#top-justified-tab3" class="nav-link" data-toggle="tab">Tindakan Medis</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="top-justified-tab1">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">Transaksi Rawat Inap</h5>
                </div>
                <table class="table datatable-basic" id="rawat_inap">
                    <thead>
                        <tr>
                            <th>Tanggal Mutasi</th>
                            <th>Status</th>
                            <th>Ruang</th>
                            <th>Tanggal Pulang</th>
                        </tr>
                    </thead>
                </table>

                <div class="card-header header-elements-inline">
                    <h5 class="card-title">Transaksi Rawat Jalan</h5>
                </div>

                <table class="table datatable-basic" id="rawat_jalan">
                    <thead>
                        <tr>
                            <th>Tanggal Kunjungan</th>
                            <th>Poli</th>
                        </tr>
                    </thead>
                </table>

                
            </div>
            <div class="tab-pane fade" id="top-justified-tab2">
                <table class="table datatable-basic" id="rekamMedisTable">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Dokter</th>
                            <th>ICD</th>
                            <th>Diagnosa</th>
                            <th>Anamesa</th>
                            <th>P.Fisik</th>
                            <th>P.Penunjang</th>
                            <th>Jenis</th>
                            <th>Poli</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="tab-pane fade" id="top-justified-tab3">
                <table class="table datatable-basic">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Dokter</th>
                            <th>Tindakan</th>
                            <th>Data</th>
                            <th>ICD9-CM</th>
                            <th>Jenis Rawat</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
        
</div>






@endsection

@push('scripts')
<script>
    $(function(){
            $('#rawat_inap').DataTable({
            order: [[ 2, "asc" ]],
               prossessing: true,
               serverside: true,
               "bDestroy": true,
               "columnDefs": [
                    { className: "text-center", "targets": [ 5 ] }
                ],
               ajax: '{!! route('pasien.rekmedTransaksiJSON') !!}',
               columns: [
                //   { name: 'id', data: 'id' },
                  {
                     name: 'tanggal_kunjungan',
                     data: 'tanggal_kunjungan',
                  },
                  {
                     name: 'nama_poli',
                     data: 'nama_poli',
                  },
                  {
                     name: 'nama_ruang',
                     data: 'nama_ruang',
                  },
                  {
                     name: 'tanggal_lahir',
                     data: 'tanggal_lahir',
                  },
                  {
                     name: 'status',
                     data: 'status',
                  },
                  {
                     name: 'alamat',
                     data: 'alamat',
                  },

               ]
            });
         });
</script>

@endpush
