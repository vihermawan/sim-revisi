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
                                <input type="text" class="form-control search-pasien" placeholder="Masukkan Nama Pasien" name="id_pasien"  value="{{$pasien->id}}" readonly="readonly" id="idPasien">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label">Pasien </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control search-pasien" placeholder="Masukkan Nama Pasien" name="nama_pasien"  value="{{$pasien->nama_pasien}}" readonly="readonly">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label">Tgl. Lahir </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control search-pasien" placeholder="Masukkan Nama Pasien" name="tanggal_lahir"  value="{{$pasien->tanggal_lahir}}" readonly="readonly">
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
                            <th>Diagnosa</th>
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
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="tab-pane fade" id="top-justified-tab3">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">Tindakan Rawat Inap</h5>
                </div>
                
                <table class="table datatable-basic" id="tindakanInap">
                    <thead>
                        <tr>
                            <th>Tanggal Permintaan</th>
                            <th>Dokter</th>
                            <th>Tindakan</th>
                            <th>Ruang</th>
                            <th>Status Proses</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                </table>

                <div class="card-header header-elements-inline">
                    <h5 class="card-title">Tindakan Rawat Inap</h5>
                </div>
                
                <table class="table datatable-basic" id="tindakanJalan">
                    <thead>
                        <tr>
                            <th>Tanggal Permintaan</th>
                            <th>Dokter</th>
                            <th>Tindakan</th>
                            <th>Poli</th>
                            <th>Status Proses</th>
                            <th>Jumlah</th>
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
                    { className: "text-center", "targets": [ 2 ] }
                ],
               ajax: {
                   url :'{!! route('pasien.rekmedTransaksiInapJSON') !!}',
                   data : {id:$("#idPasien").val()},
               },
               columns: [
                  {
                     name: 'tanggal_mutasi',
                     data: 'tanggal_mutasi',
                  },
                  {
                     name: 'status_rawat_inap',
                     data: 'status_rawat_inap',

                     render: function(data){
                        return data == '0' ? 'Pulang' : 'Menginap';
                     }
                  },
                  {
                     name: 'nama_ruang',
                     data: 'nama_ruang',
                  },
               ]
            });
    });
    
    $(function(){  
        $('#rawat_jalan').DataTable({
        order: [[ 2, "asc" ]],
            prossessing: true,
            serverside: true,
            "bDestroy": true,
            "columnDefs": [
                { className: "text-center", "targets": [ 2 ] }
            ],
            ajax: {
                url :'{!! route('pasien.rekmedTransaksiJalanJSON') !!}',
                data : {id:$("#idPasien").val()},
            },
            columns: [
                {
                    name: 'tanggal_kunjungan',
                    data: 'tanggal_kunjungan',
                },
                {
                    name: 'nama_poli',
                    data: 'nama_poli',
                },
                {
                    name: 'alasan_diagnosa',
                    data: 'alasan_diagnosa',
                },
            ]
        });
    });

    $(function(){  
        $('#rekamMedisTable').DataTable({
        order: [[ 2, "asc" ]],
            prossessing: true,
            serverside: true,
            "bDestroy": true,
            "columnDefs": [
                { className: "text-center", "targets": [ 7 ] }
            ],
            ajax: {
                url :'{!! route('pasien.rekmedPasienJSON') !!}',
                data : {id:$("#idPasien").val()},
            },
            columns: [
                {
                    name: 'tanggal',
                    data: 'tanggal',
                },
                {
                    name: 'nama_dokter',
                    data: 'nama_dokter',
                },
                {
                    name: 'nama_icd',
                    data: 'nama_icd',
                },
                {
                    name: 'jenis_diagnosa',
                    data : 'jenis_diagnosa',
                },
                {
                    name : 'anamesa',
                    data : 'anamesa',
                },
                {
                    name : 'pemeriksaan_fisik',
                    data : 'pemeriksaan_fisik',
                },
                {
                    name : 'pemeriksaan_penunjang',
                    data : 'pemeriksaan_penunjang',
                },
                {
                    name : 'status_rawat',
                    data : 'status_rawat',

                    render: function(data){
                        return data == '0' ? 'Rawat Jalan' : 'Rawat Inap';
                     }
                }
            ]
        });
    });

    $(function(){  
        $('#tindakanInap').DataTable({
        order: [[ 2, "asc" ]],
            prossessing: true,
            serverside: true,
            "bDestroy": true,
            "columnDefs": [
                { className: "text-center", "targets": [ 4 ] }
            ],
            ajax: {
                url :'{!! route('pasien.TindakanMedisInapJSON') !!}',
                data : {id:$("#idPasien").val()},
            },
            columns: [
                {
                    name: 'tanggal_permintaan',
                    data: 'tanggal_permintaan',
                },
                {
                    name: 'nama_dokter',
                    data: 'nama_dokter',
                },
                {
                    name: 'nama_tindakan',
                    data: 'nama_tindakan',
                },
                {
                    name: 'nama_ruang',
                    data: 'nama_ruang',
                },
                {
                    name: 'status_proses',
                    data: 'status_proses',
                },
                {
                    name: 'jumlah',
                    data: 'jumlah',
                },
            ]
        });
    });


    $(function(){  
        $('#tindakanJalan').DataTable({
        order: [[ 2, "asc" ]],
            prossessing: true,
            serverside: true,
            "bDestroy": true,
            "columnDefs": [
                { className: "text-center", "targets": [ 4 ] }
            ],
            ajax: {
                url :'{!! route('pasien.TindakanMedisJalanJSON') !!}',
                data : {id:$("#idPasien").val()},
            },
            columns: [
                {
                    name: 'tanggal_permintaan',
                    data: 'tanggal_permintaan',
                },
                {
                    name: 'nama_dokter',
                    data: 'nama_dokter',
                },
                {
                    name: 'nama_tindakan',
                    data: 'nama_tindakan',
                },
                {
                    name: 'nama_poli',
                    data: 'nama_poli',
                },
                {
                    name: 'status_proses',
                    data: 'status_proses',
                },
                {
                    name: 'jumlah',
                    data: 'jumlah',
                },
            ]
        });
    });





</script>
@endpush
