<div 
    class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto " 
    x-data="{broadcastModalOpen: false,}">
    <div wire:loading>
        <x-loading />
    </div>

    <!-- Page header -->
    <div class="sm:flex sm:justify-between sm:items-center mb-5">

        <!-- Left: Title -->
        <div class="mb-4 sm:mb-0">
            <h1 class="text-2xl md:text-3xl text-slate-800 dark:text-slate-100 font-bold">Partai</h1>
            <h3 class="text-slate-800 dark:text-slate-100 "   >List partai politik</h3>
        </div>

        <!-- Right: Actions -->
        <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">

            <!-- search -->
            
            <div class="relative">
                <div>
                    <input id="feed-search-desktop" class="form-input w-full pl-9 bg-white dark:bg-slate-800" type="text" placeholder="Search…" wire:model.live="q" />
                    <button class="absolute inset-0 right-auto group" type="submit" aria-label="Search">
                        <svg class="w-4 h-4 shrink-0 fill-current text-slate-400 dark:text-slate-500 group-hover:text-slate-500 dark:group-hover:text-slate-400 ml-3 mr-2" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7 14c-3.86 0-7-3.14-7-7s3.14-7 7-7 7 3.14 7 7-3.14 7-7 7zM7 2C4.243 2 2 4.243 2 7s2.243 5 5 5 5-2.243 5-5-2.243-5-5-5z" />
                            <path d="M15.707 14.293L13.314 11.9a8.019 8.019 0 01-1.414 1.414l2.393 2.393a.997.997 0 001.414 0 .999.999 0 000-1.414z" />
                        </svg>
                    </button>
                </div>
            </div>
            
            <!-- tambah pemngumuman -->
            <button class="btn bg-indigo-500 hover:bg-indigo-600 text-white">
                <svg class="w-4 h-4 fill-current opacity-50 shrink-0" viewBox="0 0 16 16">
                    <path d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z"/>
                </svg>
                <a @click.prevent="broadcastModalOpen = true">Tambah Partai</span>
                </a>
            </button>
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
        
                            <form wire:submit="save" class="px-5 py-4">
                                <div class="space-y-3">
                                    <div class="w-full">
                                        <div>
                                            <label class="block text-sm font-medium mb-1" for="name">Judul</label>  
                                            <input 
                                                type="title" name="title" id="title" class="form-input w-full" placeholder="Pengumuman"
                                                wire:model="title">
                                            @error('title')
                                                <div class="text-xs mt-1 text-rose-500">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        
                                        <div>
                                            <label class="block text-sm font-medium mb-1" for="name">Isi Pesan</label>
                                            <textarea 
                                                type="message" name="message" id="message" class="form-input w-full" placeholder="..."
                                                wire:model="message"></textarea>
                                            @error('message')<div class="text-xs mt-1 text-rose-500">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                </div>
                                {{-- button --}}
                                <div class="px-5 py-4 border-t border-slate-200">
                                    <div class="flex flex-wrap justify-end space-x-2">
                                        <button 
                                                class="btn-sm border-slate-200 hover:border-slate-300 text-slate-600"         
                                                @click="broadcastModalOpen = false" 
                                                wire:click="clear">
                                            Batal
                                        </button>
                                        <button 
                                                class="btn-sm bg-indigo-500 hover:bg-indigo-600 text-white" 
                                                type="submit" 
                                                @click="broadcastModalOpen = false">
                                            Simpan
                                        </button>
                                    </div>
                                </div>
                            </form>
                            
                            
                        </div>
                    </div>
                </div>
                
            </div>

        </div>

    </div>
        <!-- table -->
        {{-- <x-dashboard.announcement-table :announcements=$announcements/> --}}
        <!-- pagination -->
        <div class="mt-8 flex justify-between">
            <select wire:model.live="pagination" class="form-select">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="35">35</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
            {{-- <div class="w-full ml-2">{{ $announcements->links() }}</div> --}}
        </div>
    </div>

</div>
