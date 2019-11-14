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

 <!--Modal edit ruangan -->
 @foreach($pasien as $data)
<div id="edit-modal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h6 class="modal-title">Edit Pasien</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <div class="col-xl-12">
                    <!-- Form -->
                    <div class="card-body">
                        <form id="editForm" name="editForm">
                            <div class="row">
                                <div class="col-md-12">
                                <fieldset>  <legend class="text-uppercase font-size-sm font-weight-bold"><i class="icon-reading mr-2"></i> DATA PASIEN</legend></fieldset>
                                </div>
                                <div class="col-md-6">
                                    <fieldset>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label">Nama Pasien :</label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" placeholder="Masukkan Nama Pasien" id="nama_pasien" name="nama_pasien" value="{{$data->nama_pasien}}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label">Jenis Kelamin:</label>
                                            <div class="col-lg-8">
                                                <select class="form-control select" data-fouc id="jenis_kelamin" name="jenis_kelamin" value="{{$data->jenis_kelamin}}">
                                                    <option>Pilih Jenis Kelamin </option>
                                                    <option value="L">Laki-laki</option>
                                                    <option value="P">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-4">Alamat Pasien:</label>
                                            <div class="col-lg-8">
                                                <textarea rows="3" cols="3" class="form-control" id="alamat" name="alamat" value="{{$data->alamat}}"></textarea>
                                            </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                            <label class="col-lg-4 col-form-label">Propinsi:</label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" placeholder="Masukkan Provinsi" id="provinsi" name="provinsi" value="{{$data->provinsi}}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label">Kabupaten:</label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" placeholder="Masukkan Kabupaten" id="kabupaten" name="kabupaten" value="{{$data->kabupaten}}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label">Kecamatan:</label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" placeholder="Masukkan Kecamatan" id="kecamatan" name="kecamatan" value="{{$data->kecamatan}}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label">Desa:</label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" placeholder="Masukkan Desa" id="desa" name="desa" value="{{$data->desa}}">
                                            </div>
                                        </div>

                                    
                                    
                                    </fieldset>
                                </div>

                                <div class="col-md-6">
                                    <fieldset>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label">Golongan Darah:</label>
                                            <div class="col-lg-8">
                                                <select class="form-control select" data-fouc id="golongan_darah" name="golongan_darah" value="{{$data->golongan_darah}}">
                                                    <option>Pilih Goldar</option>
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
                                                <select class="form-control select" data-fouc id="status" name="status" value="{{$data->status}}">
                                                <option>Status</option>
                                                    <option value="Menikah">Menikah</option>
                                                    <option value="Belum Menikah">Belum Menikah</option>
                                                    <option value="Janda">Janda</option>
                                                    <option value="Duda">Duda</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label">Tempat Lahir:</label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" placeholder="Masukkan Tempat Lahir" id="tempat_lahir" name="tempat_lahir" value="{{$data->tempat_lahir}}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label">Umur:</label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" placeholder="Masukkan Tempat Lahir" id="umur" name="umur" value="{{$data->umur}}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label">Tgl Lahir:</label>
                                            <div class="col-lg-8">
                                                <input type="date" class="form-control" placeholder="Masukkan Tempat Lahir" id="tanggal_lahir " name="tanggal_lahir" value="{{$data->tanggal_lahir}}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label">Pekerjaan:</label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" placeholder="Masukkan Pekerjaan" id="pekerjaan" name="pekerjaan" value="{{$data->pekerjaan}}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label">Pendidikan:</label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" placeholder="Masukkan Pendidikan" id="pendidikan" name="pendidikan" value="{{$data->pendidikan}}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label">Agama:</label>
                                            <div class="col-lg-8">
                                                <select class="form-control select" data-fouc id="agama" name="agama" value="{{$data->agama}}">
                                                    <option>Pilih Agama</option>
                                                    <option value="islam">Islam</option>
                                                    <option value="kristen">Kristen</option>
                                                    <option value="protestan">Protestan</option>
                                                    <option value="budha">Budha</option>
                                                    <option value="hindu">Hindu</option>
                                                    <option value="konghucu">Konghucu</option>
                                                </select>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                        <!-- /Form -->
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                <button type="button" class="btn bg-success edit-data">Save changes</button>
            </div>
        </div>
    </div>
</div>
@endforeach
<!--End Modal edit ruangan--> 


<!--Modal delete -->
<div id="delete-modal" class="modal fade" tabindex="-2">
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
        
         $.ajax({
            headers: {
               'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
            },
            url: "{{ route('pasien.editPasien') }}",
            method: "post",
            data: {id: id, formData: JSON.parse(JSON.stringify($('#editForm').serializeArray())) },
            success: function(data){
                console.log(data)
                Swal.fire({
                  type: 'success',
                  title:'Data berhasil di ubah!',
                  text: 'Data pasien yang anda pilih telah diubah!',
               });
               $('#edit-modal').modal('hide');
               $('#pasien').DataTable().ajax.reload();
            }
         });
        
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
