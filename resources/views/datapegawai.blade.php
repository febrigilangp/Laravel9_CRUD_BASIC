<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    {{-- css toastr --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>data pegawai</title>
  </head>
  <body>
    <h1 class="text-center mb-4">Data pegawai</h1>
    <div class="container">
        <a href="/tambahpegawai"class="btn btn-success" >Tambah + </a>

        {{-- Search data start --}}
        <form action="/pegawai" method="GET">
        <div class="row g-3 align-items-center mt-2">
          <div class="col-auto">
            <input type="search" name="searchData" class="form-control" aria-describedby="passwordHelpInline">
          </div>
        </div>
      </form>
        {{-- Search data end --}}
        {{-- message diatas jika success --}}
        {{-- @if( $message = Session::get('success'))
        <div class="alert alert-success mt-2" role="alert">
            {{$message}}
          </div>
          @endif --}}
        <div class="row">
     <table class="table">
        <thead>
          <tr>
            <th scope="col">No.</th>
            <th scope="col">Nama</th>
            <th scope="col">foto</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">No telp</th>
            <th scope="col">Dibuat</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($data as $index => $i)
            <tr>
              {{-- untuk pagination agar nomer tidak berulang maka ditambah $index + $data -> firtItem() pagination dilaravel document --}}
                <th scope="row">{{$index + $data-> firstItem()}}</th>
                <td>{{ $i -> nama}}</td>
                <td>
                    <img src="{{asset('fotopegawai/'.$i -> foto) }}"  alt="{{$i -> foto}}" style="width: 40px">
                </td>
                <td>{{ $i -> jeniskelamin}}</td>
                <td>{{ $i -> notelp}}</td>
                <td>{{ $i -> created_at -> format('d M Y')}}</td>
                <td>
                    <a href="/tampilkandata/{{ $i -> id}}"  class="btn btn-warning">Edit</a>
                    <a href="#"  class="btn btn-danger delete" data-id="{{$i-> id}}" data-nama="{{$i-> nama}}">Delete</a>
                  
    
                </td>
              </tr>
            @endforeach
        </tbody>
      </table>
      {{ $data->links() }}
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    {{-- Script sweetalert --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    {{-- Script Jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    {{-- Sccript toastr --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  </body>
  <script>
    // Sweetalert start + menggunakan Jquery
    
    $('.delete').click(function(){
        var pegawaiid = $(this).attr('data-id');
        var pegawainama = $(this).attr('data-nama');
        swal({
        title: "Yakin ?",
        text: "Kamu akan menghapus data pegawai dengan nama "+pegawainama+" ",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            window.location = "/deletedata/"+pegawaiid+""
            swal("Data telah berhasil dihapus", {
            icon: "success",
            });
        } else {
            swal("Data tidak jadi dihapus");
        }
        });
    });

    // Sweetalert end
  </script>

  <script>
    @if (Session::has('success'))
    toastr.success("{{Session::get('success')}}")
    @endif

    
  </script>
</html>