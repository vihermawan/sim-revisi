@extends('layouts.main')

@section('menu')
	{!! $menus !!}
@endsection

@section('content')
<div class="card">
	<div class="card-header header-elements-inline">
		<h5 class="card-title">Basic datatable</h5>
	</div>

	<div class="card-header header-elements-inline">
	<button type="button" class="btn bg-success btn-labeled btn-labeled-left" data-toggle="modal" data-target="#add-modal"><b><i class="icon-reading"></i></b> Tambah Rawat Inap</button>
	</div>
	<table class="table datatable-basic" id="pasienRawat-tables">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Pasien</th>
				<th>Tanggal Masuk</th>
				<th>Ruang</th>
                <th>Petugas</th>
				<th class="text-center">Actions</th>
			</tr>
		</thead>
	</table>
</div>


<div id="add-modal" class="modal fade" tabindex="-2">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h6 class="modal-title">Form Pendaftaran Baru</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="card-body">
                    <form action="#" id="addForm">
                        <div class="row">
                            <div class="col-md-12">
                                <fieldset>
                                    <legend class="text-uppercase font-size-sm font-weight-bold"><i class="icon-reading mr-2"></i> IDENTITAS PASIEN</legend>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Pasien :</label>
                                        <div class="col-lg-8">
                                            <input type="hidden" name="idPasien" class="form-control id_pasien" />
                                            <input type="text" name="pasien" class="form-control pasien" id="pasien" />
                                            <div class="pasienList"></div>  
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Jenis Kelaamin:</label>
                                        <div class="col-lg-8">
                                            <select class="form-control form-control-select">
                                                <option value="L">Pria</option>
                                                <option value="P">Wanita</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Nama Petugas:</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Asuransi:</label>
                                        <div class="col-lg-8">
                                            <select class="form-control form-control-select">
                                                <option>BPJS</option>
                                                <option>Non BPJS</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Nama Poli:</label>
                                        <div class="col-lg-8">
                                            <select name="id_poli" class="form-control form-control-select">
                                                <option>Poli Anak</option>
                                                <option>Poli Bedah</option>
                                                <option>Poli Gigi</option>
                                                <option>Poli THT</option>
                                                <option>Poli Penyakit Dalam</option>
                                            </select>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>

                        <div class="text-right">
                            <button type="button" class="btn btn-primary add-data">Simpan Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @foreach($pasienrawat as $data)
    <div id="edit-modal{{$data->id_rawat_inap}}" class="modal fade" tabindex="-2">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h6 class="modal-title">Form Pendaftaran Baru</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="card-body">
                    <form action="#">
                        <div class="row">
                            <div class="col-md-12">
                                <fieldset>
                                    <legend class="text-uppercase font-size-sm font-weight-bold"><i class="icon-reading mr-2"></i> IDENTITAS PASIEN</legend>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Nama Pasien :</label>
                                        <div class="col-lg-8">
                                        <input class="form-control" name="nama_pasien" value="{{$data->nama_pasien}}" disabled/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Jenis Kelamin:</label>
                                        <div class="col-lg-8">
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <div class="uniform-choice"><span class="checked"><input type="radio" class="form-input-styled" name="gender" checked="" data-fouc=""></span></div>
                                                    Laki - laki
                                                </label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <div class="uniform-choice"><span><input type="radio" class="form-input-styled" name="gender" data-fouc=""></span></div>
                                                    Perempuan
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Nama Petugas:</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Asuransi:</label>
                                        <div class="col-lg-8">
                                            <select class="form-control form-control-select">
                                                <option>BPJS</option>
                                                <option>Non BPJS</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Nama Poli:</label>
                                        <div class="col-lg-8">
                                            <select class="form-control form-control-select">
                                                <option>Poli Anak</option>
                                                <option>Poli Bedah</option>
                                                <option>Poli Gigi</option>
                                                <option>Poli THT</option>
                                                <option>Poli Penyakit Dalam</option>
                                            </select>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>

                        <div class="text-right">
                            <button type="button" class="btn btn-primary">Simpan Data</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
    @endforeach




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

// delete data
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
           url: "{{ route('pasienRawat.delete') }}",
           method: "GET",
           data: {id: id},
           success: function(){          
                Swal.fire({
                    type: 'success',
                    title: 'Berhasil dihapus!',
                    text: 'Data yang dipilih telah dihapus!',
                });
                $('#delete-modal').modal('hide');
                $('#pasienRawat-tables').DataTable().ajax.reload();
           }
        });
       
    });

//GET ALL DATA
        $(function(){
            $('#pasienRawat-tables').DataTable({
            order: [[ 2, "asc" ]],
               prossessing: true,
               serverside: true,
               "bDestroy": true,
               "columnDefs": [
                    { className: "text-center", "targets": [ 5 ] }
                ],
               ajax: '{!! route('pasienRawat.dataJSON') !!}',
               columns: [
                  { name: 'id', data: 'DT_RowIndex' },
                  {
                     name: 'nama_pasien',
                     data: 'nama_pasien'
                  },
                  {
                     name: 'tanggal_masuk',
                     data: 'tanggal_masuk',
                  },
                  {
                     name: 'nama_kelas',
                     data: 'nama_kelas',
                  },
                  {
                     name: 'nama_user',
                     data: 'nama_user',
                  },
                
                  {
                     name: 'action',
                     data: 'action',
                  },

               ]
            });
         });
        

    $(document).ready(function(){  
      $('.pasien').keyup(function(){  
           var query = $(this).val();  
           if(query != '')  
           {  
                $.ajax({  
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
                    },
                     url:"{{ route('rawatJalan.pasienSearch') }}",  
                     method:"GET",  
                     data:{query:query},  
                     success:function(data)  
                     {  
                         console.log(data);
                          $('.pasienList').fadeIn();  
                          $('.pasienList').html(data);  
                     }  
                });  
           }  
      });  
      $(document).on('click', 'li', function(){  
           $('.pasien').val($(this).text());  
           var id = $(this).attr("id");
           console.log('idd', id);
           $('.id_pasien').val(id);  
           $('.pasienList').fadeOut();  
      });  

 });
 
 $(document).ready(function(){
    $(document).on('click', '.add-data', function(e){
        e.preventDefault();

         $.ajax({
            headers: {
               'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
            },
            url: "{{ route('pasienRawat.addData') }}",
            method: "post",
            data: {formData: JSON.parse(JSON.stringify($('#addForm').serializeArray())) },
            success: function(data){
                console.log(data);
               Swal.fire({
                  type: 'success',
                  title: 'Ruang berhasil di ditambah!',
                  text: 'Ruangan  anda telah berhasil ditambahkan!',
               });
               $("#addForm")[0].reset();
               $('#add-modal').modal('hide');
               $('#rawatJalan-tables').DataTable().ajax.reload();
            }
         });
        
      }); 
    });
</script>

@endpush