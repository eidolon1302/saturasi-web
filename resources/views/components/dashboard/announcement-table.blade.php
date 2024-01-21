<div class="bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700 mb-8">
    <header class="px-5 py-4">
        <h2 class="font-semibold text-slate-800 dark:text-slate-100">Semua pengumuman</h2>
    </header>
    <div x-data="handleSelect">

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="table-auto w-full dark:text-slate-300 divide-y divide-slate-200 dark:divide-slate-700">
                <!-- Table header -->
                <thead class="text-xs uppercase text-slate-500 dark:text-slate-400 bg-slate-50 dark:bg-slate-900/20 border-t border-slate-200 dark:border-slate-700">
                    <tr>
                        <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                            <div class="font-semibold text-left">Title</div>
                        </th>
                        <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                            <div class="font-semibold text-left">Isi</div>
                        </th>
                        <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                            <div class="font-semibold">Tanggal</div>
                        </th>
                        <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                            <div class="font-semibold">Action</div>
                        </th>
                        
                    </tr>
                </thead>
                <!-- Table body -->
                    <tbody class="text-sm" x-data="{ open: false }">
                        @forelse ($announcements as $key => $item)
                        <!-- Row -->
                        <tr>
                            <td class=" last:pr-5 py-3 whitespace-nowrap ">
                                <div class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">{{ $item->title }}</div>
                            </td>
                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="font-medium text-slate-800 dark:text-slate-100">{!! $item->message !!}</div>
                            </td>
                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="text-center font-medium text-emerald-500">{{ strftime("%d %B %Y", strtotime($item->created_at)) }}</div>
                            </td>
                            <!-- Action loop -->
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
                            </td>

                            {{-- <td class="text-center">
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('announcements.destroy', $announcement->id) }}" method="POST">
                                    <a href="{{ route('announcements.show', $announcement->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                    <a href="{{ route('announcements.edit', $announcement->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                </form>
                            </td> --}}
                        </tr>
                        @empty
                        <div class="px-5 py-4 font-light text-slate-800 dark:text-slate-100">
                            Data pengumuman belum tersedia.
                        </div>
                        @endforelse
                    </tbody>
            </table>
        </div>
    </div>
</div>