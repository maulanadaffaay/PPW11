<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <title>Buku Pegawai Kantor</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-8">
            @auth
                <div class="card">
                    <div class="card-header mw-100 h-100 text-center" style="background-color: rgb(97, 255, 142);">
                        <h2 class="mt-0 mb-0" style="color: rgb(0, 0, 0); font-size: 22px;"><b>Silahkan Isi Data Berikut</b></h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('pegawai.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nama :</label>
                                <input type="text" name="Nama" class="form-control @error('Nama') is-invalid @enderror" placeholder="Isi Nama Lengkap Anda" autocomplete="off" value="{{ old('Nama') }}">
                                @error('Nama')
                                    <div class="col-sm-2"></div> {{-- dummy --}}
                                    <div class="text-danger col-sm-10">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">No HP :</label>
                                <input type="text" name="No_HP" class="form-control @error('No_HP') is-invalid @enderror" placeholder="Isi No HP Anda" autocomplete="off" value="{{ old('No_HP') }}">
                                @error('No_HP')
                                    <div class="col-sm-2"></div> {{-- dummy --}}
                                    <div class="text-danger col-sm-10">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Alamat :</label>
                                <input type="text" name="Alamat" class="form-control @error('Alamat') is-invalid @enderror" placeholder="Isi Alamat Anda" autocomplete="off" value="{{ old('Alamat') }}">
                                @error('Alamat')
                                    <div class="col-sm-2"></div> {{-- dummy --}}
                                    <div class="text-danger col-sm-10">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Gender :</label>
                                <select class="form-select @error('Gender') is-invalid @enderror" name="Gender" aria-label="Default select example">
                                    <option @if(!old('Gender')) selected @endif value="">Pilih...</option>
                                    <option @if(old('Gender') == "Laki-laki") selected @endif value="Laki-Laki">Laki-laki</option>
                                    <option @if(old('Gender') == "Perempuan") selected @endif value="Perempuan">Perempuan</option>
                                </select>
                                @error('Gender')
                                    <div class="col-sm-2"></div> {{-- dummy --}}
                                    <div class="text-danger col-sm-10">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Foto : </label>
                                <img class="img-preview img-fluid mb-3 col-sm-5" >
                                <input type="file" name="foto" accept="image/*" class="form-control @error('foto') is-invalid @enderror" onchange="previewImage()" id="foto" value="{{ old('foto') }}">
                                @error('foto')
                                    <div class="col-sm-2"></div> {{-- dummy --}}
                                    <div class="text-danger col-sm-10">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="aksi" value="tambah" class="btn btn-success me-2">
                                    Submit
                                </button>
                                <a href="{{ route('main') }}" type="button" class="btn btn-danger">
                                    Cancel 
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            @endauth
            </div>
        </div>
    </div>
    <script>
        function previewImage(){
            const image = document.querySelector('#foto');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display ='block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(ofREvent){
                imgPreview.src = ofREvent.target.result;
            }
        }
    </script>
</body>


</html>