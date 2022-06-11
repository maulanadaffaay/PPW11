<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Boostrap  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Font Awesome -->
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" 
        integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>

    <title>Buku Tamu</title>
</head>
<body style="background-image: url('images/FMIPA-1.jpg');  background-size:970px;">
    <div class="container">
        <div class="float-end mt-5 my-3 ml-2">
            @auth
                <a href="{{ url('/dashboard') }}" class="btn btn-primary" type="button">
                    Home
                </a>
            @else
                <a href="{{ route('login') }}" class="btn btn-primary ml-3" type="button">
                    Log in
                </a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-secondary ml-3" type ="button">
                        Register
                    </a>
                @endif
            @endauth
        </div>
    </div>
    <div class="container mt-5 d-flex justify-content-center">
        
        <div class="card " style="width: 1100px">
            <div class="card-header mw-100 h-100 text-center">
                <h1><b>Buku Pegawai Kantor</b></h1>
            </div>
            <div class="card-body">
                <div class="container table-title">
                    <div class="row">
                        @auth
                        <div class="col-sm-6 my-3">
                            <a href="konfigurasi.php" class="btn btn-success" data-toggle="modal"><i class="fas fa-plus-circle"></i> 
                                <span>Add Data</span>
                            </a>						
                        </div>
                        @endauth
                    </div>
                </div>

                <!-- Table -->
                <div class="container table-responsive mt-3">
                    <table class="table align-center text-center table-bordered table-hover table-striped">
                        <thead class="table-primary">
                            <tr>
                                <th>Nomor</th>
                                <th>Nama</th>
                                <th>No HP</th>
                                <th>Alamat</th>
                                <th>Gender</th>
                                @auth
                                    <th>Aksi</th>
                                @endauth    
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($data as $row)
                                <tr>
                                    <td>
                                        {{ $row->id }}
                                    </td>
                                    <td>
                                        {{ $row->Nama }}
                                    </td>
                                    <td>
                                        {{ $row->No_HP }}
                                    </td>
                                    <td>
                                        {{ $row->Alamat }}
                                    </td>
                                    <td>
                                        {{ $row->Gender }}
                                    </td>
                                    @auth
                                    <td>
                                        <a href="" type="button" class="btn btn-secondary btn-sm">
                                            <i class="fas fa-pen"></i>  Edit
                                        </a>
                                        
                                        <a href="" type="button" class="btn btn-danger btn-sm" 
                                            onClick="return confirm('Are You Sure Want to Delete this List?')">
                                            <i class="fas fa-trash"></i>  Delete
                                        </a>
                                    </td>
                                    @endauth
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>