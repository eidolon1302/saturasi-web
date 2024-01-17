<div 
    class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto"
    x-data="{ 
        broadcastModalOpen: false,
    }">
    <div wire:loading>
        <x-loading />
    </div>
    <!-- Page header -->
    <div class="sm:flex sm:justify-between sm:items-center mb-4 md:mb-2">

        <!-- Left: Title -->
        <div class="mb-4 sm:mb-0">
            <h1 class="text-2xl md:text-3xl text-slate-800 font-bold">
                Pengumuman
            </h1>
        </div>

        <!-- Right: Actions -->
        <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">
            {{-- Filter Modal --}}
            <div>
                {{-- <div>
                    <button
                        class="btn bg-white border-slate-200 hover:border-slate-300 text-slate-500 hover:text-slate-600"
                        @click.prevent="filterModalOpen = true"
                        aria-controls="filter-modal">
                        <span class="sr-only">Filter</span><wbr>
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 16 16">
                            <path d="M9 15H7a1 1 0 010-2h2a1 1 0 010 2zM11 11H5a1 1 0 010-2h6a1 1 0 010 2zM13 7H3a1 1 0 010-2h10a1 1 0 010 2zM15 3H1a1 1 0 010-2h14a1 1 0 010 2z" />
                        </svg>
                    </button>

                    <div
                        class="fixed inset-0 bg-slate-900 bg-opacity-30 z-50 transition-opacity"
                        x-show="filterModalOpen"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100"
                        x-transition:leave="transition ease-out duration-100"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                        aria-hidden="true"
                        x-cloak
                    ></div>

                    <div
                        id="filter-modal"
                        class="fixed inset-0 z-50 overflow-hidden flex items-center my-4 justify-center px-4 sm:px-6"
                        role="dialog"
                        aria-modal="true"
                        x-show="filterModalOpen"
                        x-transition:enter="transition ease-in-out duration-200"
                        x-transition:enter-start="opacity-0 translate-y-4"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in-out duration-200"
                        x-transition:leave-start="opacity-100 translate-y-0"
                        x-transition:leave-end="opacity-0 translate-y-4"
                        x-cloak
                    >
                        <div class="bg-white rounded shadow-lg overflow-auto max-w-lg w-full max-h-full" 
                            @click.outside="filterModalOpen = false" 
                            @keydown.escape.window="filterModalOpen = false">

                            <div class="px-5 py-3 border-b border-slate-200">
                                <div class="flex justify-between items-center">
                                    <div class="font-semibold text-slate-800">Filter data</div>
                                    <button class="text-slate-400 hover:text-slate-500" @click="filterModalOpen = false">
                                        <div class="sr-only">Close</div>
                                        <svg class="w-4 h-4 fill-current">
                                            <path d="M7.95 6.536l4.242-4.243a1 1 0 111.415 1.414L9.364 7.95l4.243 4.242a1 1 0 11-1.415 1.415L7.95 9.364l-4.243 4.243a1 1 0 01-1.414-1.415L6.536 7.95 2.293 3.707a1 1 0 011.414-1.414L7.95 6.536z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>

                             <div class="px-5 py-4">
                                <div class="space-y-3">
                                    
                                    <div>
                                        <label class="block text-sm font-medium mb-1" for="filter_unit">Kategori</label>
                                        <select 
                                            id="fil_unit" name="fil_unit" class="form-select w-full"
                                            wire:model="filter_unit">
                                            <option selected value="">Pilih kategori</option>    
                                            @foreach ($units as $unit)
                                            <option value="{{$unit->code}}">{{$unit->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="grid gap-2 md:grid-cols-2">
                                        <div>
                                            <label class="block text-sm font-medium mb-1" for="filter_prov">Provinsi</label>
                                            <select  
                                                id="filter_prov" name="filter_prov" class="form-select w-full"
                                                wire:model="filter_prov" wire:change="$emit('changedProvince')">
                                                <option selected value="">Pilih provinsi</option>    
                                                @foreach ($provinces as $province)
                                                <option value="{{$province->id}}">{{$province->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    
                                        <div>
                                            <label class="block text-sm font-medium mb-1" for="filter_kab">Kabupaten/Kota</label>
                                            <select 
                                                id="filter_kab" name="filter_kab" class="form-select w-full"
                                                wire:model="filter_kab" wire:change="$emit('changedRegency')" >
                                                <option selected value="">Pilih kabupaten/kota</option>    
                                                @foreach ($regencies as $regency)
                                                <option value="{{$regency->id}}">{{$regency->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div>
                                            <label class="block text-sm font-medium mb-1" for="filter_kec">Kecamatan</label>
                                            <select 
                                                id="filter_kec" name="filter_kec" class="form-select w-full"
                                                wire:model="filter_kec" wire:change="$emit('changedDistrict')">
                                                <option selected value="">Pilih kecamatan</option>   
                                                @foreach ($districts as $district)
                                                <option value="{{$district->id}}">{{$district->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div>
                                            <label class="block text-sm font-medium mb-1" for="filter_desa">Kelurahan/Desa</label>
                                            <select 
                                                id="filter_desa" name="filter_desa" class="form-select w-full"
                                                wire:model="filter_desa">
                                                <option selected value="">Pilih kelurahan/desa</option>   
                                                @foreach ($villages as $village)
                                                <option value="{{$village->id}}">{{$village->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>                            
                            
                            <div class="px-5 py-4 border-t border-slate-200">
                                <div class="flex flex-wrap justify-end space-x-2">
                                    <button class="btn-sm border-slate-200 hover:border-slate-300 text-slate-600" @click="filterModalOpen = false">Tutup</button>
                                    <button 
                                        class="btn-sm bg-indigo-500 hover:bg-indigo-600 text-white"
                                        wire:click='resetFil'>Reset</button>
                                </div>
                            </div>
                        </div>
                    </div>                                            
                </div> --}}
            </div>
            <!-- Search form -->
            <form class="relative">
                <label for="action-search" class="sr-only">Search</label>
                <input 
                    id="action-search" class="form-input pl-9 focus:border-slate-300" type="search" placeholder="Search…"
                    wire:model.debounce.1500ms="search">
                <button class="absolute inset-0 right-auto group" type="button" aria-label="Search" disabled>
                    <svg class="w-4 h-4 shrink-0 fill-current text-slate-400 group-hover:text-slate-500 ml-3 mr-2"
                        viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M7 14c-3.86 0-7-3.14-7-7s3.14-7 7-7 7 3.14 7 7-3.14 7-7 7zM7 2C4.243 2 2 4.243 2 7s2.243 5 5 5 5-2.243 5-5-2.243-5-5-5z">
                        </path>
                        <path
                            d="M15.707 14.293L13.314 11.9a8.019 8.019 0 01-1.414 1.414l2.393 2.393a.997.997 0 001.414 0 .999.999 0 000-1.414z">
                        </path>
                    </svg>
                </button>
            </form>
        </div>

    </div>

    <div class="mb-5">
        {{-- <span class="font-medium">Unit Kerja</span> --}}
        <p class="text-sm">List Pesan Pengumuman</p>
    </div>

    <div class="mb-5 flex flex-wrap">
        <a 
            class="btn my-2 bg-indigo-500 hover:bg-indigo-600 text-white" role="button"
            @click.prevent="broadcastModalOpen = true">
            <svg class="w-4 h-4 fill-current opacity-50 shrink-0" viewBox="0 0 16 16">
                <path d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z"></path>
            </svg>
            <span class="ml-2">Tambah Pengumuman</span>
        </a>
    </div>

    <!-- Table -->
    <div class="bg-white">
        <div>

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="table-auto w-full">
                    <!-- Table header -->
                    <thead class="text-xs font-semibold uppercase text-slate-500 border-t border-b border-slate-200">
                        <tr>
                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="font-semibold text-left">Judul</div>
                            </th>
                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="font-semibold text-left">Isi</div>
                            </th>
                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="font-semibold text-left">Tanggal</div>
                            </th>
                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="font-semibold text-left sr-only">Action</div>
                            </th>
                        </tr>
                    </thead>
                    <!-- Table body -->
                    <tbody class="text-sm divide-y divide-slate-200 border-b border-slate-200">
                        <!-- Row -->
                        @forelse ($data as $key => $item)
                        <tr>
                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="font-medium text-left text-slate-800">{{ $item->title }}</div>
                            </td>
                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="text-left">{{ $item->message }}</div>
                            </td>
                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="text-left">{{ strftime("%d %B %Y", strtotime($item->created_at)) }}</div>
                            </td>
                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px">
                                <div class="flex items-center">
                                    <div class="m-1.5">
                                        <!-- Delete Modal -->
                                        <!-- BEGIN: Delete User -->
                                        <div x-data="{ deleteModalOpen: false }">
                                            <button 
                                                class="btn border-slate-200 hover:border-slate-300"
                                                @click.prevent="deleteModalOpen = true"
                                                aria-controls="danger-modal">
                                                <svg class="w-4 h-4 fill-current text-rose-500 shrink-0" viewBox="0 0 16 16">
                                                    <path d="M5 7h2v6H5V7zm4 0h2v6H9V7zm3-6v2h4v2h-1v10c0 .6-.4 1-1 1H2c-.6 0-1-.4-1-1V5H0V3h4V1c0-.6.4-1 1-1h6c.6 0 1 .4 1 1zM6 2v1h4V2H6zm7 3H3v9h10V5z" />
                                                </svg>
                                            </button>
                                        
                                            <!-- Modal backdrop -->
                                            <div
                                                class="fixed inset-0 bg-slate-900 bg-opacity-30 z-50 transition-opacity"
                                                x-show="deleteModalOpen"
                                                x-transition:enter="transition ease-out duration-200"
                                                x-transition:enter-start="opacity-0"
                                                x-transition:enter-end="opacity-100"
                                                x-transition:leave="transition ease-out duration-100"
                                                x-transition:leave-start="opacity-100"
                                                x-transition:leave-end="opacity-0"
                                                aria-hidden="true"
                                                x-cloak
                                            ></div>
                                            <!-- Modal dialog -->
                                            <div
                                                id="danger-modal"
                                                class="fixed inset-0 z-50 overflow-hidden flex items-center my-4 justify-center px-4 sm:px-6"
                                                role="dialog"
                                                aria-modal="true"
                                                x-show="deleteModalOpen"
                                                x-transition:enter="transition ease-in-out duration-200"
                                                x-transition:enter-start="opacity-0 translate-y-4"
                                                x-transition:enter-end="opacity-100 translate-y-0"
                                                x-transition:leave="transition ease-in-out duration-200"
                                                x-transition:leave-start="opacity-100 translate-y-0"
                                                x-transition:leave-end="opacity-0 translate-y-4"
                                                x-on:broadcast-saved.window="deleteModalOpen = false"
                                                x-cloak
                                            >
                                                <div class="bg-white rounded shadow-lg overflow-auto max-w-lg w-full max-h-full" @click.outside="deleteModalOpen = false" @keydown.escape.window="deleteModalOpen = false">
                                                    <div class="p-5 flex space-x-4">
                                                        <!-- Icon -->
                                                        <div class="w-10 h-10 rounded-full flex items-center justify-center shrink-0 bg-rose-100">
                                                            <svg class="w-4 h-4 shrink-0 fill-current text-rose-500" viewBox="0 0 16 16">
                                                                <path d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm0 12c-.6 0-1-.4-1-1s.4-1 1-1 1 .4 1 1-.4 1-1 1zm1-3H7V4h2v5z" />
                                                            </svg>
                                                        </div>
                                                        <!-- Content -->
                                                        <div>
                                                            <!-- Modal header -->
                                                            <div class="mb-2">
                                                                <div class="text-lg font-semibold text-slate-800">Hapus pengumuman {{ $item->title }}?</div>
                                                            </div>
                                                            <!-- Modal content -->
                                                            <div class="text-sm mb-10">
                                                                <div class="space-y-2">
                                                                    <p>Proses ini tidak dapat dibatalkan. Apakah anda yakin?</p>
                                                                </div>
                                                            </div>
                                                            <!-- Modal footer -->
                                                            <div class="flex flex-wrap justify-end space-x-2">
                                                                <button class="btn-sm border-slate-200 hover:border-slate-300 text-slate-600" @click="deleteModalOpen = false">Batal</button>
                                                                <button 
                                                                    class="btn-sm bg-rose-500 hover:bg-rose-600 text-white" 
                                                                    {{-- @click="deleteModalOpen = false" --}}
                                                                    {{-- wire:click="$emit('delete', {!! $member !!} )" --}}
                                                                    wire:click='delete({{ $item }})'>
                                                                    Ya, Hapus
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                            
                                        </div>
                                        <!-- END: Delete User -->
                                    </div>
                                </div>
                            </div>
                        </tr>
                        @empty
                        <tr class="text-slate-600 text-center">
                            <td colspan="4">
                                Tidak Ada Data
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    
    <!-- Pagination -->
    <div class="mt-8 flex justify-between">
        <select wire:model="item" id="item" class="w-20 form-select box sm:mt-0">
            <option value="10">10</option>
            <option value="25">25</option>
            <option value="35">35</option>
            <option value="50">50</option>
            <option value="100">100</option>
        </select>
        <div class="w-full ml-2">{{ $data->links() }}</div>
    </div>


    {{-- Modal Content --}}
    <div>
        <div>
            <div
                class="fixed inset-0 bg-slate-900 bg-opacity-30 z-50 transition-opacity"
                x-show="broadcastModalOpen"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-out duration-100"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                aria-hidden="true"
                x-cloak
            ></div>

            <div
                id="broadcast-modal"
                class="fixed inset-0 z-50 overflow-hidden flex items-center my-4 justify-center px-4 sm:px-6"
                role="dialog"
                aria-modal="true"
                x-show="broadcastModalOpen"
                x-transition:enter="transition ease-in-out duration-200"
                x-transition:enter-start="opacity-0 translate-y-4"
                x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in-out duration-200"
                x-transition:leave-start="opacity-100 translate-y-0"
                x-transition:leave-end="opacity-0 translate-y-4"
                x-on:broadcast-saved.window="broadcastModalOpen = false"
                x-cloak
            >
                <div class="bg-white rounded shadow-lg overflow-auto max-w-lg w-full max-h-full" 
                    @click.outside="broadcastModalOpen = false" 
                    @keydown.escape.window="broadcastModalOpen = false">

                    <div class="px-5 py-3 border-b border-slate-200">
                        <div class="flex justify-between items-center">
                            <div class="font-semibold text-slate-800">Tambah Pengumuman</div>
                            <button class="text-slate-400 hover:text-slate-500" @click="broadcastModalOpen = false">
                                <div class="sr-only">Close</div>
                                <svg class="w-4 h-4 fill-current">
                                    <path d="M7.95 6.536l4.242-4.243a1 1 0 111.415 1.414L9.364 7.95l4.243 4.242a1 1 0 11-1.415 1.415L7.95 9.364l-4.243 4.243a1 1 0 01-1.414-1.415L6.536 7.95 2.293 3.707a1 1 0 011.414-1.414L7.95 6.536z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="px-5 py-4">
                        <div class="space-y-3">
                            <div class="w-full">
                                <div>
                                    <label class="block text-sm font-medium mb-1" for="name">Judul</label>
                                    <input 
                                        type="title" name="title" id="title" class="form-input w-full" placeholder="Pengumuman"
                                        wire:model.defer="new_data.title">
                                    @error('new_data.title')<div class="text-xs mt-1 text-rose-500">{{ $message }}</div>@enderror
                                </div>
                               
                                <div>
                                    <label class="block text-sm font-medium mb-1" for="name">Isi Pesan</label>
                                    <textarea 
                                        type="message" name="message" id="message" class="form-input w-full" placeholder="..."
                                        wire:model.defer="new_data.message"></textarea>
                                    @error('new_data.message')<div class="text-xs mt-1 text-rose-500">{{ $message }}</div>@enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="px-5 py-4 border-t border-slate-200">
                        <div class="flex flex-wrap justify-end space-x-2">
                            <button 
                                class="btn-sm border-slate-200 hover:border-slate-300 text-slate-600" 
                                wire:click="clear" @click="broadcastModalOpen = false">
                                Batal
                            </button>
                            <button 
                                class="btn-sm bg-indigo-500 hover:bg-indigo-600 text-white"
                                wire:click="save">
                                Simpan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

    <!-- Start -->
    <div x-show="openAlertSaved" 
        x-data="{ openAlertSaved: false }"
        x-on:broadcast-saved.window="openAlertSaved = true"
        class="text-right sticky bottom-5 right-5 z-10">
        <div class="inline-flex min-w-80 px-4 py-2 rounded-sm text-sm bg-indigo-100 border border-indigo-200 text-indigo-600 ">
            <div class="flex w-full justify-between items-start">
                <div class="flex">
                    <svg class="w-4 h-4 shrink-0 fill-current opacity-80 mt-[3px] mr-3" viewBox="0 0 16 16">
                        <path d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zM7 11.4L3.6 8 5 6.6l2 2 4-4L12.4 6 7 11.4z" />
                    </svg>
                    <div>{{ $warning_msg ?? "" }}</div>
                </div>
                <button class="opacity-70 hover:opacity-80 ml-3 mt-[3px]" @click="openAlertSaved = false">
                    <div class="sr-only">Close</div>
                    <svg class="w-4 h-4 fill-current">
                        <path d="M7.95 6.536l4.242-4.243a1 1 0 111.415 1.414L9.364 7.95l4.243 4.242a1 1 0 11-1.415 1.415L7.95 9.364l-4.243 4.243a1 1 0 01-1.414-1.415L6.536 7.95 2.293 3.707a1 1 0 011.414-1.414L7.95 6.536z" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <!-- End -->
</div>
