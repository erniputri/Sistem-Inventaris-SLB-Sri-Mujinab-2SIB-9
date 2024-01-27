<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,
initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data - Jadwal Guru & Ruangan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstr
ap.min.css">
</head>

<body style="background: lightgray">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('admin.update',

$data->id) }}" method="post" enctype="multipart/form-data">
@csrf
    @method('PUT')
                            <div class="form-group">
                                <!-- <label class="font-weight-bold">PHOTO</label>

                                <input type="file" class="form-control @error('image') is-invalid @enderror"
                                    name="photo">
                                 error message untuk title -->
                                <!-- @error('photo')
                                <div class="alert alert-danger

mt-2">

                                    {{ $message }}
                                </div>
                                @enderror
                            </div> -->
                            <div class="form-group">
                                <label class="font-weight-bold">Nama</label>

                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    name="nama" placeholder="data

data" value="{{ $data->nama }}">

                                <!-- error message untuk cost -->
                                @error('nama')
                                <div class="alert alert-danger

mt-2">

                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Email</label>

                                <input type="text" class="form-control
@error('email') is-invalid @enderror" name="email" value="{!! $data->email!!}">
                                <!-- error message untuk nama

-->

                                @error('nama')
                                <div class="alert alert-danger

mt-2">

                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Password</label>

                                <input type="password" class="form-control
@error('password') is-invalid @enderror" name="password" rows="5" placeholder="Masukkan jumlah barang"value="{{ $data->password }}">

                                <!-- error message untuk description

-->

                                @error('description')
                                <div class="alert alert-danger

mt-2">

                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-md

btn-primary">SIMPAN</button>

                            <button type="reset" class="btn btn-md

btn-warning">RESET</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.
js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap
.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
    </script>
</body>

</html>