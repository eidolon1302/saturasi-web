<div class="col-span-full xl:col-span-8 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">
    <header class="px-5 py-4 border-b border-slate-100 dark:border-slate-700">
        <h2 class="font-semibold text-slate-800 dark:text-slate-100">Partai Politik</h2>
    </header>
    <div x-data="handleSelect">
        <div class="p-3">

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="table-auto w-full dark:text-slate-300">
                    <!-- Table header -->
                    <thead class="text-xs uppercase text-slate-400 dark:text-slate-500 bg-slate-50 dark:bg-slate-700 dark:bg-opacity-50 rounded-sm">
                        <tr>
                            <th class="p-2">
                                <div class="font-semibold text-left">Nomor</div>
                            </th>
                            <th class="p-2">
                                <div class="font-semibold text-center">Partai Politik</div>
                            </th>
                            <th class="p-2">
                                <div class="font-semibold text-right">Action</div>
                            </th>
                        </tr>
                    </thead>
                    <!-- Table body -->
                    <tbody class="text-sm" x-data="{ open: false }">
                        <!-- Row -->
                        @forelse ($partais as $key => $item)
                        <tr>
                            <td class="p-2">
                                <div class="text-left">{{ $item->nomor }}</div>
                            </td>
                            <td class="p-2 ">
                                <div class="flex items-center justify-center">
                                    <img class="w-8 h-8 rounded-full mr-2" src="{{ asset('/storage/partais/'.$item->image) }}" width="32" height="32" alt="Group 01" />
                                    <div class="text-slate-800 dark:text-slate-100">{{ $item->name }}</div>
                                </div>
                            </td>
                            <td class="p-2">
                                
                                <div class="m-1.5">
                                    <!-- Delete Modal -->
                                    <!-- BEGIN: Delete User -->
                                    <div  x-data="{ deleteModalOpen: false }">
                                        <button 
                                            class="float-right btn p-1.5 shrink-0 rounded bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 hover:border-slate-300 dark:hover:border-slate-600 shadow-sm ml-2"
                                            @click.prevent="deleteModalOpen = true"
                                            aria-controls="danger-modal">
                                            <svg class="w-4 h-4 fill-current text-slate-500" viewBox="0 0 16 16">
                                                <path d="M11.7.3c-.4-.4-1-.4-1.4 0l-10 10c-.2.2-.3.4-.3.7v4c0 .6.4 1 1 1h4c.3 0 .5-.1.7-.3l10-10c.4-.4.4-1 0-1.4l-4-4zM4.6 14H2v-2.6l6-6L10.6 8l-6 6zM12 6.6L9.4 4 11 2.4 13.6 5 12 6.6z" />
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
                            </td>

                        </tr>
                        @empty
                            <div class="px-5 py-4 font-light text-slate-800 dark:text-slate-100">
                                Data Partai belum tersedia.
                            </div>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>