<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,
initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Barang</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstr
ap.min.css">
</head>

<body style="background: lightgray">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('barang.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
          
                            <div class="form-group">
                                <label class="font-weight-bold">Nama</label>

                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    name="nama" placeholder="Nama 

Barang">

                                <!-- error message untuk prodi -->
                                @error('nama')
                                <div class="alert alert-danger

mt-2">

                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Jumlah</label>

                                <input type="text" class="form-control
@error('kapasitas') is-invalid @enderror" name="jumlah" >
<!-- error message untuk due_date

-->

@error('kapasitas')
<div class=" alert alert-danger mt-2">

                                {{ $message }}
                            </div>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Kondisi</label>

                        <textarea class="form-control
@error('kondisi') is-invalid @enderror" name="kondisi" rows="5" placeholder="">{{ old('pass') }}</textarea>

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
    CKEDITOR.replace('description');
    </script>
</body>
</html>