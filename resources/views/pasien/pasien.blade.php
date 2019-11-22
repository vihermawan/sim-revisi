@extends('layouts.main')

@section('menu')
	{!! $menus !!}
@endsection

@section('content')
<div class="card">
	<div class="card-header header-elements-inline">
		<h5 class="card-title">Tabel Pasien</h5>
	</div>

	<table class="table datatable-basic" id="pasien">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pasien</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Status</th>
                <th>Agama</th>
                <th>Umur</th>
                <th>Pendidikan</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
    </table>
</div>

@foreach ($pasien as $data)
<!--Modal Form Edit Pasien -->
<div id="edit-modal" class="modal fade" tabindex="-3">
    <div class="modal-dialog modal-full">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h6 class="modal-title">Edit Data Pasien</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="card-body">
                <form id="addForm" name="addForm">
                    <div class="row">
                        <div class="col-md-12">
                        <legend class="text-uppercase font-size-sm font-weight-bold"><i class="icon-reading mr-2"></i> IDENTITAS PASIEN</legend>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <fieldset>        
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Nomor Rumah Sakit :</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" placeholder="Masukkan Nama Pasien" id="id" name="id" value="{{$data->id}}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Nama Pasien :</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" placeholder="Masukkan Nama Pasien" id="nama_pasien" name="nama_pasien"  value="{{$data->nama_pasien}}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">No Identitas :</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" placeholder="Masukkan Nomor identitas" id="no_identitas" name="no_identitas">
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-lg-4 d-block">Pilih Jenis Kelamin:</label>
                                    <div class="col-lg-8">
                                        <div class="form-check form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-input-styled" value="L" id="jenis_kelamin" name="jenis_kelamin" data-fouc>
                                                Laki-laki
                                            </label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-input-styled" value="P" id="jenis_kelamin" name="jenis_kelamin"  data-fouc>
                                                Perempuan
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-lg-4">Alamat Pasien:</label>
                                    <div class="col-lg-8">
                                        <textarea rows="2" cols="3" class="form-control" id="alamat" name="alamat"></textarea>
                                    </div>
                                </div>

                                 <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Tanggal Kunjungan :</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control"  placeholder="Masukkan Nama Pasien" id="tanggal_kunjungan" name="tanggal_kunjungan">
                                    </div>
                                </div> 
                            </fieldset>
                        </div>
                        <div class="col-md-4">
                            <fieldset>

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Provinsi:</label>
                                    <div class="col-lg-8">
                                        <select class="form-control select" data-fouc  name="propinsi" id="propinsi">
                                            <option>Pilih Provinsi</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Kabupaten:</label>
                                    <div class="col-lg-8">
                                        <select class="form-control select" data-fouc  name="kabupaten" id="kabupaten">
                                            <option>Pilih Kabupaten</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Kecematan:</label>
                                    <div class="col-lg-8">
                                        <select class="form-control select" data-fouc  name="kecamatan" id="kecamatan">
                                            <option>Pilih Kecematan</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Desa:</label>
                                    <div class="col-lg-8">
                                        <select class="form-control select" data-fouc  name="kelurahan" id="kelurahan">
                                            <option>Pilih Desa</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Golongan Darah:</label>
                                    <div class="col-lg-8">
                                        <select class="form-control select" data-fouc id="golongan_darah" name="golongan_darah">
                                            <option>Pilih Goldar</option>
                                            <option value="-">Tidak Mengetahui</option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="O">O</option>
                                            <option value="AB">AB</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Status:</label>
                                    <div class="col-lg-8">
                                        <select class="form-control select" data-fouc id="status" name="status">
                                            <option>Status</option>
                                            <option value="-">Tidak Mengetahui</option>
                                            <option value="Menikah">Menikah</option>
                                            <option value="Belum Menikah">Belum Menikah</option>
                                            <option value="Janda">Janda</option>
                                            <option value="Duda">Duda</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Asuransi:</label>
                                    <div class="col-lg-8">
                                        <select class="form-control select" data-fouc id="id_role_pembayaran" name="id_role_pembayaran">
                                            <option>Pilih Asuransi</option>
                                            <option value="1">BPJS</option>
                                            <option value="2">Umum</option>
                                        </select>
                                    </div>
                                </div>
                            </fieldset>
                        </div>

                        <div class="col-md-4">
                            <fieldset>

                            <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Agama:</label>
                                    <div class="col-lg-8">
                                        <select class="form-control select" data-fouc id="agama" name="agama">
                                            <option>Pilih Agama</option>
                                            <option value="-">Tidak Mengetahui</option>
                                            <option value="islam">Islam</option>
                                            <option value="kristen">Kristen</option>
                                            <option value="protestan">Protestan</option>
                                            <option value="budha">Budha</option>
                                            <option value="hindu">Hindu</option>
                                            <option value="konghucu">Konghucu</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Tempat Lahir:</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" placeholder="Masukkan Tempat Lahir" id="tempat_lahir" name="tempat_lahir">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Tgl Lahir:</label>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-calendar5"></i></span>
                                            </span>
                                            <input type="text" class="form-control" id="anytime-month-numeric" placeholder="Masukkan Tanggal Lahir&hellip;">
                                        </div>
                                    </div>
                                </div>  

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Umur:</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" placeholder="Masukkan Umur" id="umur" name="umur">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Pekerjaan:</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" placeholder="Masukkan Pekerjaan" id="pekerjaan" name="pekerjaan">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Pendidikan:</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" placeholder="Masukkan Pendidikan" id="pendidikan" name="pendidikan">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Nama Wali :</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" placeholder="Masukkan Nama Wali" id="nama_wali" name="nama_wali">
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>

                    <div class="text-right">
                        <button type="button" class="btn btn-primary add_data">Simpan Data</button>
                    </div>
                </form>
            </div>  
        </div>
        <!-- /2 columns form -->
    </div>
</div>
<!--End Modal Edit Pasien-->
@endforeach


 <!--Modal delete -->
 <div id="delete-modal" class="modal fade" tabindex="-3">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h6 class="modal-title">Delete Data</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
    
            <div class="modal-body">
                <div class="col-xl-12">
                    <div class="card-body">
                        <p>Anda yakin ingin menghapus data ini?</p>
                    </div>
                </div>
            </div>
    
            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Batal</button>
                <button type="button" class="btn bg-danger delete-data">Delete</button>
            </div>
        </div>
    </div>
</div>
<!--End Modal delete-->


<!--Modal delete -->
<div id="rekam-medis" class="modal fade" tabindex="-3">
    <div class="modal-dialog modal-full">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h6 class="modal-title">Delete Data</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
    
            <div class="modal-body">
                <div class="col-xl-12">
                    <div class="page-header-content header-elements-inline">
                        <div class="page-title">
                            <h3>
                                <span class="font-weight-semibold">Nama Pasien : </span>
                            </h3>
                            <h5>
                                <span class="font-weight-semibold">No RM : </span>
                            </h5>
                            <h5>
                                <span class="font-weight-semibold">Umur : </span>
                            </h5>
                        </div>
                    </div>  
                    <div class="col-xl-12">
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
                                                    <table class="table datatable-basic">
                                                        <thead>
                                                            <tr>
                                                                <th>Tanggal</th>
                                                                <th>Jenis</th>
                                                                <th>Poli</th>
                                                                <th>Kamar</th>
                                                                <th>Tanggal Pulang</th>
                                                                <th class="text-center">Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Maxwell</td>
                                                                <td>Maben</td>
                                                                <td>Regional Representative</td>
                                                                <td>25 Feb 1988</td>
                                                                <td>Regional Representative</td>
                                                                <td><span class="badge badge-danger">Suspended</span></td>                                                        
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
        
                                                <div class="tab-pane fade" id="top-justified-tab2">
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
                                                        <tbody>
                                                            <tr>
                                                                <td>Maxwell</td>
                                                                <td>Maben</td>
                                                                <td>Regional Representative</td>
                                                                <td>25 Feb 1988</td>
                                                                <td>Regional Representative</td>
                                                                <td>25 Feb 1988</td>
                                                                <td>Regional Representative</td>
                                                                <td><span class="badge badge-danger">Suspended</span></td>                                                        
                                                            </tr>
                                                        </tbody>
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
                                                        <tbody>
                                                            <tr>
                                                                <td>Maxwell</td>
                                                                <td>Maben</td>
                                                                <td>Regional Representative</td>
                                                                <td>25 Feb 1988</td>
                                                                <td>Regional Representative</td>
                                                                <td>25 Feb 1988</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>        
                </div>
                
            </div>
    
            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Batal</button>
                <button type="button" class="btn bg-success delete-data">Delete</button>
            </div>
        </div>
    </div>
</div>
<!--End Modal delete-->
    
    
    
    


@endsection



@push('scripts')
<script>
     //edit ruangan
    $(document).on('click', '.edit-data-pasien', function(){
         var id = $(this).attr("id");
         $('.edit-data').attr("id", id);
    });

    $(document).on('click', '.edit-data', function(e){
        e.preventDefault();
         var id = $(this).attr("id");
         console.log("ini id ", id);
        
        //  $.ajax({
        //     headers: {
        //        'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
        //     },
        //     url: "{{ route('pasien.editPasien') }}",
        //     method: "post",
        //     data: {id: id, formData: JSON.parse(JSON.stringify($('#editForm').serializeArray())) },
        //     success: function(data){
        //         console.log(data)
        //         Swal.fire({
        //           type: 'success',
        //           title:'Data berhasil di ubah!',
        //           text: 'Data pasien yang anda pilih telah diubah!',
        //        });
        //        $('#edit-modal').modal('hide');
        //        $('#pasien').DataTable().ajax.reload();
        //     }
        //  });
        
      });

    // delete ruangan
    $(document).on('click', '.delete-modal', function(){
       var id = $(this).attr("id");
       $('.delete-data').attr("id", id);
    });

    $(document).on('click', '.delete-data', function(){
        var id = $(this).attr("id"); 
        $.ajax({
           headers: {
              'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
           },
           url: "{{ route('pasien.delete') }}",
           method: "GET",
           data: {id: id},
           success: function(){          
                Swal.fire({
                    type: 'success',
                    title: 'Data berhasil dihapus!',
                    text: 'Data Pasien yang anda pilih telah dihapus!',
                });
                $('#delete-modal').modal('hide');
                $('#pasien').DataTable().ajax.reload();
           }
        });
       
    });

     // delete ruangan
     $(document).on('click', '.rekam-medis-modal', function(){
       var id = $(this).attr("id");
       $('.rekam-medis').attr("id", id);
    });
    

     //GET ALL DATA
     $(function(){
            $('#pasien').DataTable({
            order: [[ 2, "asc" ]],
               prossessing: true,
               serverside: true,
               "bDestroy": true,
               "columnDefs": [
                    { className: "text-center", "targets": [ 8 ] }
                ],
               ajax: '{!! route('pasien.dataJSON') !!}',
               columns: [
                  { name: 'id', data: 'DT_RowIndex' },
                  {
                     name: 'nama_pasien',
                     data: 'nama_pasien',
                  },
                  {
                     name: 'jenis_kelamin',
                     data: 'jenis_kelamin',
                     
                     render: function(data){
                        return data == 'L' ? 'Laki-Laki' : 'Perempuan';
                     }
                  },
                  {
                     name: 'alamat',
                     data: 'alamat',
                  },
                  {
                     name: 'status',
                     data: 'status',
                  },
                  {
                     name: 'agama',
                     data: 'agama',
                  },
                  {
                     name: 'umur',
                     data: 'umur',
                  },
                  {
                     name: 'pendidikan',
                     data: 'pendidikan',
                  },
                  {
                     name: 'action',
                     data: 'action',
                  },

               ]
            });
         });
</script>
@endpush

@section('js')
    <script src="{{asset('/template/global_assets/js/plugins/forms/selects/select2.min.js')}}"></script>
    <script src="{{asset('/template/global_assets/js/demo_pages/form_select2.js')}}"></script>
    <script src="{{asset('/template/global_assets/js/demo_pages/form_layouts.js')}}"></script>
    <script src="{{asset('/template/global_assets/js/plugins/extensions/jquery_ui/interactions.min.js')}}"></script>
    <script src="{{asset('/template/global_assets/js/plugins/forms/styling/uniform.min.js')}}"></script>
    <script src="{{asset('/template/global_assets/js/demo_pages/form_inputs.js')}}"></script>
@endsection
