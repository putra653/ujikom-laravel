@extends ('admin.admin')
@section('content')




<div class="p-6">
    
    <div class="card">
        <div class="card-header">
            <div class="flex justify-between items-center">
                <h4 class="card-title">Tambah pegawai</h4>                            
    
                
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
    <form  action="{{route('store.jenis_simpanan')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2  gap-6">
            <div class="form-card">
                <h2 class="fs-title">Pendaftaran</h2>
                <br>
                <div class="lg:col-span-2">
                    <label for="inputAddress" class="text-gray-800 text-sm font-medium inline-block mb-2">Kode Jenis Simpanan</label>
                    @php
                              $kodeJenisSimpanan = autonumber('jenis_simpanan', 'kode_jenis_simpanan', 3, 'JNS');
                    @endphp 
                    <input name="kode_jenis_simpanan" type="text" class="form-input" id="inputAddress" value="{{$kodeJenisSimpanan}}"   readonly>
                    @error('kode_jenis_simpanan')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
            <div class="lg:col-span-2">
                <label for="inputAddress" class="text-gray-800 text-sm font-medium inline-block mb-2">Nama</label>
                <input name="nama" type="text" class="form-input" id="inputAddress" placeholder=" Masukkan Email Anda ">
                @error('email')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div>
                <label for="inputAddress2" class="text-gray-800 text-sm font-medium inline-block mb-2"> Nominal </label>
                <input name="nominal"  type="text" class="form-input" id="inputAddress2" placeholder="Masukkan Telepon Anda">
                @error('telepon')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
        </div>

        

            <br>


        <button type="submit" class="btn bg-primary text-white">Tambah</button>
    </form>
   
</div>
</div>
</div> <!-- end col -->
</div>
@endsection