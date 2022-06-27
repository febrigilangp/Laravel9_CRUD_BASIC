<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>data pegawai</title>
  </head>
  <body>
    <h1 class="text-center mb-4"> Edit Data pegawai</h1>
    <div class="container">
        <div class="row justify-content-center">
          <div class="col-8">
          <div class="card">
            <div class="card-body">
              <form action="/updatedata/{{$data->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">nama</label>
                  <input type="text" name="nama" class="form-control" id="nama" aria-describedby="emailHelp"
                  value="{{$data -> nama}}">
                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
                  <select class="form-select" name="jeniskelamin" aria-label="Default select example">
                    <option selected>{{$data->jeniskelamin}}</option>
                    <option value="laki-laki">Laki - laki</option>
                    <option value="perempuan">Perempuan</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">No Telpon</label>
                  <input type="number" name="notelp" class="form-control" id="notelp" aria-describedby="emailHelp"
                  value="{{$data->notelp}}">
                </div>
                <button type="submit" class="btn btn-success" >Simpan</button>
              </form>
            </div>
          </div>
    
    </div>
     </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>