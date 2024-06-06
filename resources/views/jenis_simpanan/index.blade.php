@extends ('admin.admin')
@section('content')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<div class="card">
                        <div class="card-header">
                            <div class="flex justify-between items-center">
                                <h4 class="card-title">Simpanan</h4>
                                <div class="flex items-center gap-2">
                                   
                                </div>
                            </div>
                        </div>
                        <div class="col">
                        <a href="{{route('jenis_simpanan.tambah')}}" class="btn btn-primary">Tambah</a>
                        <a href="{{route('jenis_simpanan.invoice')}}" class="btn btn-danger">Invoice</a>
                    </div>
<div class="overflow-x-auto">
    <div class="min-w-full inline-block align-middle">
        <div class="border rounded-lg divide-y divide-gray-200 dark:border-gray-700 dark:divide-gray-700">
            <div class="py-3 px-4">
               
            </div>
            <div class="overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                           
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kode Jenis Simpanan</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nominal</th>
                            <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                       
                           @foreach ($jenis_simpanan as $item)
                    <tr>
                            
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">{{ $item->kode_jenis_simpanan }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">{{ $item->nama }}</td>   
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{$item->nominal}}</td>   
                            <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                <a class="text-primary hover:text-sky-700" href="{{route('edit.jenis_simpanan', $item->kode_jenis_simpanan)}}">Edit</a>//
                                <form action="{{ route('delete.jenis_simpanan', $item->kode_jenis_simpanan)}}" method="POST">
                                    @csrf
                                <button class="text-danger hover:text-sky-700" type="submit">Delete</button>
                            </form>
                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
           
        </div>
    </div>
</div>

@endsection