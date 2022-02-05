@extends('layouts.admin')

@section('content')

<div class="container-fluid">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h5 mb-0 text-gray-800">Data Admin</h1>
            
</div>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
<div class="row container bg-white md-5">

@if (count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>            
        @endforeach
    </ul>
</div>
@endif

@if (Session::has('success'))
<p class="alert alert-success">{{ Session::get('success')}}</p><br/>
@endif

  <!-- Modal Create -->
  <div class="modal fade" id="modalberita" tabindex="-1" aria-labelledby="modalberitaLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalberitaLabel">New Post</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form action="{{url('berita/store')}}" method="post" >
        {{-- {{ crsf_field() }} --}}
        @csrf
            <div class="modal-body">
                <div class="form-group">
                <table border="0">
                            <tr>
                            <td width="30%"><label>Kode</label></td>
                            <td width="70%"><input type="text" name="kode_b" class="form-control" id="kode_b" aria-describedby="kode_b" readonly></td>
                            </tr>
                            <tr>
                            <tr>
                              <td width="30%"><label>Kategori</label></td>
                              <td width="70%" colspan="4"><input type="text" name="ketegori" class="form-control" id="kategori" aria-describedby="kategori" required></td> 
                            </tr>
                            <tr>
                            <td width="30%"><label>Judul</label></td>
                              <td width="70%"><input type="text" name="judul" class="form-control" id="judul" aria-describedby="judul" required></td>
                            </tr>
                            <tr>
                              <td width="20%"><label>Foto</label></td>
                              <td width="80%" colspan="4">
                              <div class="custom-file mb-3">
                                <input type="file" class="custom-file-input" id="validatedCustomFile" required>
                                <label class="custom-file-label" for="validatedCustomFile">Pilih file...</label>
                                <div class="invalid-feedback">Example invalid custom file feedback</div>
                              </div>
                            </tr>
                            <tr>
                              <td width="30%"><label>Isi</label></td>
                              <td width="70%" colspan="4"><textarea class="form-control" id="message-text" required></textarea></td> 
                            </tr>

                      </table>
        </div>

        <div class="modal-footer">
          <button align="right" type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
      </div>
      </div>
    </div>
  </div>

  <!-- Modal Edit -->
  <div class="modal fade" id="editberita" tabindex="-1" aria-labelledby="editberitaLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
              <h5 class="modal-title" id="editberitaLabel">Edit berita</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
        </div>

            <form id="editForm" action="" method="post" >
              @csrf
              <input type="hidden" name="_method" value="PATCH">
                <div class="modal-body">
                    <div class="form-group">
                    <table border="0">
                            <tr>
                            <td width="30%"><label>Kode</label></td>
                            <td width="70%"><input type="text" name="kode_b" class="form-control" id="kode_b" aria-describedby="kode_b" readonly></td>
                            </tr>
                            <tr>
                            <tr>
                              <td width="30%"><label>Kategori</label></td>
                              <td width="70%" colspan="4"><input type="text" name="ketegori" class="form-control" id="kategori" aria-describedby="kategori" required></td> 
                            </tr>
                            <tr>
                            <td width="30%"><label>Judul</label></td>
                              <td width="70%"><input type="text" name="judul" class="form-control" id="judul" aria-describedby="judul" required></td>
                            </tr>
                            <tr>
                              <td width="20%"><label>Foto</label></td>
                              <td width="80%" colspan="4">
                              <div class="custom-file mb-3">
                                <input type="file" class="custom-file-input" id="validatedCustomFile" required>
                                <label class="custom-file-label" for="validatedCustomFile">Pilih file...</label>
                                <div class="invalid-feedback">Example invalid custom file feedback</div>
                              </div>
                            </tr>
                            <tr>
                              <td width="30%"><label>Isi</label></td>
                              <td width="70%" colspan="4"><textarea class="form-control" id="message-text" required></textarea></td> 
                            </tr>

                      </table>
        
                    </div>
                </div>


            <div class="modal-footer">
              <button align="right" type="submit" class="btn btn-primary">Update</button>
            </div>

            </form>
        </div>
      </div>
    </div>
  </div>

   <!-- Modal View -->
   <div class="modal fade" id="viewberita" tabindex="-1" aria-labelledby="viewberitanLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="viewberitaLabel">Berita</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                    <div class="modal-body">
                    <div class="form-group">
                      <table border="0">
                          @foreach ($datas as $value)
                            <tr>
                              <td width="30%"><label>Kode</label></td>
                              <td width="2%">:</td>
                              <td width="30%">{{$value->kode_b}}</td>
                              <td width="7%" rowspan="4"></td>
                              <td width=>Foto/Video</td>
                            </tr>
                            <tr>
                              <td width="30%"><label>Kategori</label></td>
                              <td width="2%">:</td>
                              <td width="30%">{{$value->kategori}}</td>
                              <td width="20%" rowspan="3"><img src="assets/images/latihanrutin.jpeg" alt="First One" width="100%"></img></td>
                              
                            </tr>
                            <tr>
                              <td width="30%"><label>Judul</label></td>
                              <td width="2%">:</td>
                              <td width="30%">{{$value->judul}}</td>
                            </tr>
                            <tr>
                              <td width="30%"><label>Isi</label></td>
                              <td width="2%">:</td>
                              <td></td>
                            </tr>
                            <tr>
                              <td width="30%" colspan="5" ><p align="justify">{{$value->isi}}</p></td>
                            </tr>

                      </table>
                          @endforeach

                        </div>
                </div>

                <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">OK</span>
                  </button> 
                  
                </div>
                </form>
              </div>
              </div>
            </div>
          </div>

<div class="d-flex justify-content-between">
  <div width="70%">
    <button class="btn btn-info" data-toggle="modal" data-target="#modalberita">New Post</button>
  </div>
    <form action="{{url('berita')}}" method="GET" class="form-inline my-2 my-lg-0">
        <div width="22%"> <input class="form-control mr-sm-2 ml-2" type="text" name="keyword" value="{{ $keyword }}">  </div>
        <div width="8%"> <button class="btn btn-outline-success my-1 my-sm-0 ml-4" type="submit">Cari</button></div>
    </form>
</div>


    <table class="table table-bordered table-responsive table-hover mt-2" width="50%">
        <thead class="table-dark">
        <tr align="center" >
            <th width="5%">NO</th>
            <th width="15%">KODE</th>
            <th width="45%">KATEGORI</th>
            <th width="45%">JUDUL</th>
            <th width="40%">FOTO</th>
            <th colspan="3" width="10%">AKSI</th>
        </tr>
        </thead>
        <?php $i=1 ?>
        @foreach ($datas as $value)
            <tr>
                <td align="center" >{{$i++}}</td>
                <td>{{$value->kode_b}}</td>
                <td>{{$value->kategori}}</td>
                <td>{{$value->judul}}</td>
                <td>{{$value->foto}}</td>
                <td align="right"><button class="btn btn-info" data-toggle="modal" data-target="#viewberita">Lihat</button></td>
                <td align="right"><button class="btn btn-success" data-id="{{$value->id}}" data-kode="{{$value->kode_b}}" data-kategori="{{$value->ketegori}}" data-judul="{{$value->judul}}" data-foto="{{$value->foto}}" data-toggle="modal" data-target="#editberita">Edit</button></td>
                
                <td>
                    <form action="{{url('berita/'.$value->id)}}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <button class="btn btn-danger" type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
            
        @endforeach
    </table>

</div>
    </div>

</div>
    {{ $datas->links() }}

@endsection

@section('script')
  <script>
    $('#editadmin').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      let res = null;
      fetch("{{url('api/next-semester')}}").then(res => {
        return res.text();
      }).then(data => {
        $("#kode_s").val(data);
      })

      var id = button.data('id')
      var kode = button.data('kode')
      var semester = button.data('smtr')
      var url = "{{url('semester')}}/" + id;

      $("#e_kode_s").val(kode)
      $("#e_smtr").val(semester)
      $("#editForm").attr("action", url)
    })

    $('#modaladmin').on('show.bs.modal', function (event) {
      fetch("{{url('api/next-semester')}}").then(res => {
        
        console.log(res);
        return res.text();
      }).then(data => {
        $("#kode_s").val(data);
        console.log(data);
      })
      
    })
  </script> 
@endsection