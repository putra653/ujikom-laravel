@extends ('admin.admin')
@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<div class="card">
    <div class="card-header">
        <div class="flex justify-between items-center">
            <h4 class="card-title">Edit Tambah</h4>                            

            
        </div>
    </div>
    <div class="p-6">
            <div class="p-6">
              
                @if ($errors->any())
                <div class="my-3">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div> 
                </div> 
                @endif
                <form action="{{ route('update.jenis_simpanan', $jenis_simpanan->kode_jenis_simpanan) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2  gap-6">
                        <div class="lg:col-span-2">
                            <label for="inputAddress" class="text-gray-800 text-sm font-medium inline-block mb-2">Kode Jenis Simpanan</label>
                            <input value="{{old('jenis_simpanan',$jenis_simpanan->kode_jenis_simpanan)}}"  name="kode_jenis_simpanan" type="text" class="form-input" id="inputAddress" readonly>
                            @error('kode_simpanan')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="lg:col-span-2">
                            <label for="inputAddress" class="text-gray-800 text-sm font-medium inline-block mb-2">Nama</label>
                            <input value="{{old('nama',$jenis_simpanan->nama)}}"  name="nama" type="text" class="form-input" id="inputAddress" placeholder=" Masukkan Email Anda ">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="lg:col-span-2">
                            <label for="inputAddress" class="text-gray-800 text-sm font-medium inline-block mb-2">Nominal</label>
                            <input value="{{old('nominal',$jenis_simpanan->nominal)}}"  name="nominal" type="number" class="form-input" id="inputAddress" placeholder=" Masukkan Email Anda ">
                            @error('tanggal')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>                        
                    </div>
                    
                    <button type="submit" class="btn bg-primary text-white">Tambah</button>
                </form>

                    @endsection