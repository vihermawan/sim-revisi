@extends('layouts.main')

@section('menu')
	{!! $menus !!}
@endsection

@section('content')
<div class="card"> 
    <div class="card-body">
        <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs nav-tabs-top nav-justified">
                <li class="nav-item"><a href="#top-justified-tab1" class="nav-link active" data-toggle="tab">Transaksi Medis</a></li>
                <li class="nav-item"><a href="#top-justified-tab2" class="nav-link" data-toggle="tab">Rekam Medis</a></li>
                <li class="nav-item"><a href="#top-justified-tab3" class="nav-link" data-toggle="tab">Tindakan Medis</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="top-justified-tab1">
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">No. RM </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control search-pasien" placeholder="Masukkan Nama Pasien" name="pasien"  value="{{$rawatJalan->id_pasien}}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Pasien </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control search-pasien" placeholder="Masukkan Nama Pasien" name="pasien"  value="{{$rawatJalan->nama_pasien}}" disabled>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Tgl. Lahir </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control search-pasien" placeholder="Masukkan Nama Pasien" name="pasien"  value="{{$rawatJalan->tanggal_lahir}}" disabled>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Tgl. Masuk </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control search-pasien" placeholder="Masukkan Nama Pasien" name="pasien"  value="{{$rawatJalan->tanggal_kunjungan}}" disabled>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Dokter</label>
                                    <div class="col-lg-6">
                                        <select class="form-control select select2"  name="poli">
                                            @foreach($dokter as $data)
                                            <option value="{{$data->id}}" <?php echo ($data->id === $rawatJalan->id_dokter) ? 'selected' : '';?>>{{$data->nama_dokter}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Poliklinik</label>
                                    <div class="col-lg-6">
                                        <select class="form-control select select2"  name="poli">
                                            @foreach($poli as $data)
                                            <option value="{{$data->id}}" <?php echo ($data->id === $rawatJalan->id_poli) ? 'selected' : '';?>>{{$data->nama_poli}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-6 text-right mr-0">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Catatan </label>
                                    <div class="col-lg-8">
                                        <textarea  rows="3" cols="3" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Alergi </label>
                                    <div class="col-lg-8">
                                        <textarea  rows="3" cols="3" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Alergi </label>
                                    <div class="col-lg-8">
                                        <textarea  rows="3" cols="3" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="top-justified-tab2">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button class="btn bg-success" id="tambahRM">Tambah Rekam Medis</button>
                        </div>
                    </div>
                    <table class="table datatable-basic">
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
</div>


<!-- Basic modal -->
<div id="modal_default" class="modal fade" tabindex="-1" data-backdrop="false">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Basic modal</h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>

							<div class="modal-body">
    
							</div>

							<div class="modal-footer">
								<button type="button" class="btn btn-link" data-dismiss="modal" id="closeModal">Close</button>
								<button type="button" class="btn bg-primary" id="saveModal">Save changes</button>
							</div>
						</div>
					</div>
				</div>
				<!-- /basic modal -->

@endsection

@push('scripts')
<script>
    $('.select2').select2();

    $(document).ready(function(){

        $("#tambahRM").on('click', function(){

            $("#modal_default").modal('show');

        });

    });
</script>

@endpush
