@extends ('admin.admin')
@section('content')

<?php
    use Illuminate\Support\Facades\DB;

    $setting = DB::table('pengaturan')->first();

?>
<div class="card p-6">
                    <!-- Grid -->
                    <div class="flex justify-between">
                        <div>
                            <img src="{{asset('storage/back/setting/'.$setting->foto_perusahaan)}}" class="h-15 w-20" >
                                
                            
                        </div>
                        <!-- Col -->

                        <div class="text-end">
                            <h2 class="text-2xl md:text-3xl font-semibold text-gray-800 dark:text-gray-200">Invoice</h2>
                            <span class="mt-1 block text-gray-500"></span>

                            <address class="mt-4 not-italic text-gray-800 dark:text-gray-200">
                                <h5>Nama Perusahaan :{{$setting->nama_perusahaan}}</h5><br>
                                <h5>Address:{{$setting->alamat}}</h5><br>
                                
                            </address>
                        </div>
                        <!-- Col -->
                    </div>
                    <!-- End Grid -->

                    <!-- Grid -->
                   
                    <!-- End Grid -->

                    <!-- Table -->
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                               
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kode Anggota</th>
                                {{-- <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nip</th> --}}
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nik</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Alamat</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Telepon</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                           
                               @foreach ($anggota as $item)
                        <tr>
                                
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">{{$item->kode_anggota}}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">{{$item->nik}}</td>   
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{$item->nama}}</td>   
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{$item->alamat}}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{$item->email}}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{$item->telepon}}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{$item->status}}</td>
                                
                        </tr>
    
                        @endforeach
                        </tbody>
                    </table>
                    <!-- End Table -->

                    <!-- Flex -->
                    <div class="mt-8 flex justify-end">
                        <div class="w-full max-w-2xl sm:text-end space-y-2">
                            <!-- Grid -->
                            {{-- <div class="grid grid-cols-2 sm:grid-cols-1 gap-3 sm:gap-2">
                                <dl class="grid sm:grid-cols-5 gap-x-3">
                                    <dt class="col-span-3 font-semibold text-gray-800 dark:text-gray-200">Subtotal:</dt>
                                    <dd class="col-span-2 text-gray-500">$2750.00</dd>
                                </dl>

                                <dl class="grid sm:grid-cols-5 gap-x-3">
                                    <dt class="col-span-3 font-semibold text-gray-800 dark:text-gray-200">Total:</dt>
                                    <dd class="col-span-2 text-gray-500">$2750.00</dd>
                                </dl>

                                <dl class="grid sm:grid-cols-5 gap-x-3">
                                    <dt class="col-span-3 font-semibold text-gray-800 dark:text-gray-200">Tax:</dt>
                                    <dd class="col-span-2 text-gray-500">$39.00</dd>
                                </dl>

                                <dl class="grid sm:grid-cols-5 gap-x-3">
                                    <dt class="col-span-3 font-semibold text-gray-800 dark:text-gray-200">Amount paid:</dt>
                                    <dd class="col-span-2 text-gray-500">$2789.00</dd>
                                </dl>

                                <dl class="grid sm:grid-cols-5 gap-x-3">
                                    <dt class="col-span-3 font-semibold text-gray-800 dark:text-gray-200">Due balance:</dt>
                                    <dd class="col-span-2 text-gray-500">$0.00</dd>
                                </dl>
                            </div> --}}
                            <!-- End Grid -->
                        </div>
                    </div>
                    <!-- End Flex -->

                    <div class="mt-8 sm:mt-12">
                        <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Thank you!</h4>
                       
                        {{-- <div class="mt-2">
                            <p class="block text-sm font-medium text-gray-800 dark:text-gray-200">example@site.com</p>
                            <p class="block text-sm font-medium text-gray-800 dark:text-gray-200">+1 (062) 109-9222</p>
                        </div> --}}
                    </div>

                    <div class="flex items-center justify-between">
                        <p class="mt-5 text-sm text-gray-500"></p>

                        <div class="flex gap-2 items-center print:hidden">
                            <a href="javascript:window.print()" class="btn bg-primary text-white"><i class="mgc_print_line text-lg me-1"></i> Print</a>
                            
                        </div>
                    </div>
                </div>

        @endsection