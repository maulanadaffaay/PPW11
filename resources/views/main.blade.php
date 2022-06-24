<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <title>Buku Pegawai Kantor</title>
</head>
<body style="background-image: url('images/FMIPA-1.jpg');  background-size:970px;">
    <div class="container">
        <div class="float-end mt-5 my-3 me-2">
            @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-primary">Log Out</button>
                </form>   
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
                            <a href="{{ route ('pegawai.create') }}" class="btn btn-success" data-toggle="modal"><i class="fas fa-plus-circle"></i> 
                                <span>Add Data</span>
                            </a>						
                        </div>
                        @endauth
                    </div>
                </div>

                <div class="container">
                    @if(session()->has('success_create'))
                        <div class="alert alert-success mt-3" role="alert">{{ session('success_create') }}</div>
                    @elseif(session()->has('success_edit'))
                        <div class="alert alert-success mt-3" role="alert">{{ session('success_edit') }}</div>
                    @elseif(session()->has('success_remove'))
                        <div class="alert alert-success mt-3" role="alert">{{ session('success_remove') }}</div>
                    @endif
                </div>
                <!-- Table -->
                <div class="container table-responsive mt-3">
                    <table class="table align-center text-center table-bordered table-hover table-striped">
                        <thead class="table-primary">
                            <tr>
                                <th>Nomor</th>
                                <th>Nama</th>
                                <th>Foto</th>
                                <th>No HP</th>
                                <th>Alamat</th>
                                <th>Gender</th>
                                @auth
                                    <th style="width:16%;">Aksi</th>
                                @endauth    
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($pegawais as $pegawai)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>
                                        {{ $pegawai->Nama }}
                                    </td>
                                    <td>
                                        <img src="{{ asset('storage/'. $pegawai->foto) }}" style="width:50px;" alt="">
                                    </td>
                                    <td>
                                        {{ $pegawai->No_HP }}
                                    </td>
                                    <td>
                                        {{ $pegawai->Alamat }}
                                    </td>
                                    <td>
                                        {{ $pegawai->Gender }}
                                    </td>
                                    @auth
                                    <td>
                                        <div class="d-flex justify-content-md-evenly">
                                            <a href="{{ route('pegawai.edit', $pegawai->id) }}" type="button" class="btn btn-secondary btn-sm">
                                                <i class="fas fa-pen"></i>   Edit 
                                            </a>
                                            
                                            <form action="{{ route('pegawai.destroy', $pegawai->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onClick="return confirm('Are You Sure Want to Delete this List?')">
                                                    <i class="fa-solid fa-trash-can"></i>    Delete
                                                </button>
                                            </form>
                                        </div>
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