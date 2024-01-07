<x-app-layout background="bg-white dark:bg-slate-900">
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <!-- Page header -->
        <div class="mb-8">
            <h1 class="text-2xl md:text-3xl text-slate-800 dark:text-slate-100 font-bold">Tooltip ✨</h1>
        </div>

        <div class="border-t border-slate-200 dark:border-slate-700">

            <!-- Components -->
            <div class="space-y-8 mt-8">

                <!-- Tooltip Types -->
                <div>
                    <h2 class="text-2xl text-slate-800 dark:text-slate-100 font-bold mb-6">Tooltip Types</h2>
                    <div class="flex flex-wrap items-center -m-4">
                        
                        <div class="m-4">
                            <div class="flex items-center space-x-2">
                                <!-- Start -->
                                <div
                                    class="relative"
                                    x-data="{ open: false }"
                                    @mouseenter="open = true"
                                    @mouseleave="open = false"
                                >
                                    <button
                                        class="block"
                                        aria-haspopup="true"
                                        :aria-expanded="open"
                                        @focus="open = true"
                                        @focusout="open = false"
                                        @click.prevent            
                                    >
                                        <svg class="w-4 h-4 fill-current text-slate-400 dark:text-slate-500" viewBox="0 0 16 16">
                                            <path d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm0 12c-.6 0-1-.4-1-1s.4-1 1-1 1 .4 1 1-.4 1-1 1zm1-3H7V4h2v5z"  />
                                        </svg>
                                    </button>
                                    <div class="z-10 absolute bottom-full left-1/2 -translate-x-1/2">
                                        <div
                                            class="bg-white dark:bg-slate-700 dark:text-slate-100 border border-slate-200 dark:border-slate-600 p-2 rounded shadow-lg overflow-hidden mb-2"
                                            x-show="open"
                                            x-transition:enter="transition ease-out duration-200 transform"
                                            x-transition:enter-start="opacity-0 translate-y-2"
                                            x-transition:enter-end="opacity-100 translate-y-0"
                                            x-transition:leave="transition ease-out duration-200"
                                            x-transition:leave-start="opacity-100"
                                            x-transition:leave-end="opacity-0"
                                            x-cloak
                                        >
                                            <div class="text-xs whitespace-nowrap">Just a tip</div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End -->
                                <div class="text-sm font-medium text-slate-500 dark:text-slate-400">Label White</div>
                            </div>
                        </div>
                        
                        <div class="m-4">
                            <div class="flex items-center space-x-2">
                                <!-- Start -->
                                <div
                                    class="relative"
                                    x-data="{ open: false }"
                                    @mouseenter="open = true"
                                    @mouseleave="open = false"
                                >
                                    <button
                                        class="block"
                                        aria-haspopup="true"
                                        :aria-expanded="open"
                                        @focus="open = true"
                                        @focusout="open = false"
                                        @click.prevent            
                                    >
                                        <svg class="w-4 h-4 fill-current text-slate-400 dark:text-slate-500" viewBox="0 0 16 16">
                                            <path d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm0 12c-.6 0-1-.4-1-1s.4-1 1-1 1 .4 1 1-.4 1-1 1zm1-3H7V4h2v5z"  />
                                        </svg>
                                    </button>
                                    <div class="z-10 absolute bottom-full left-1/2 -translate-x-1/2">
                                        <div
                                            class="bg-slate-700 border border-slate-600 p-2 rounded overflow-hidden mb-2"
                                            x-show="open"
                                            x-transition:enter="transition ease-out duration-200 transform"
                                            x-transition:enter-start="opacity-0 translate-y-2"
                                            x-transition:enter-end="opacity-100 translate-y-0"
                                            x-transition:leave="transition ease-out duration-200"
                                            x-transition:leave-start="opacity-100"
                                            x-transition:leave-end="opacity-0"
                                            x-cloak
                                        >
                                            <div class="text-xs text-slate-200 whitespace-nowrap">Just a tip</div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End -->
                                <div class="text-sm font-medium text-slate-500 dark:text-slate-400">Label Dark</div>
                            </div>
                        </div>

                        <div class="m-4">
                            <div class="flex items-center space-x-2">
                                <!-- Start -->
                                <div
                                    class="relative"
                                    x-data="{ open: false }"
                                    @mouseenter="open = true"
                                    @mouseleave="open = false"
                                >
                                    <button
                                        class="block"
                                        aria-haspopup="true"
                                        :aria-expanded="open"
                                        @focus="open = true"
                                        @focusout="open = false"
                                        @click.prevent            
                                    >
                                        <svg class="w-4 h-4 fill-current text-slate-400 dark:text-slate-500" viewBox="0 0 16 16">
                                            <path d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm0 12c-.6 0-1-.4-1-1s.4-1 1-1 1 .4 1 1-.4 1-1 1zm1-3H7V4h2v5z"  />
                                        </svg>
                                    </button>
                                    <div class="z-10 absolute bottom-full left-1/2 -translate-x-1/2">
                                        <div
                                            class="min-w-56 bg-white dark:bg-slate-700 dark:text-slate-100 border border-slate-200 dark:border-slate-600 p-2 rounded shadow-lg overflow-hidden mb-2"
                                            x-show="open"
                                            x-transition:enter="transition ease-out duration-200 transform"
                                            x-transition:enter-start="opacity-0 translate-y-2"
                                            x-transition:enter-end="opacity-100 translate-y-0"
                                            x-transition:leave="transition ease-out duration-200"
                                            x-transition:leave-start="opacity-100"
                                            x-transition:leave-end="opacity-0"
                                            x-cloak
                                        >
                                            <div class="text-xs">Excepteur sint occaecat cupidata non proident, sunt in.</div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End -->
                                <div class="text-sm font-medium text-slate-500 dark:text-slate-400">Basic White</div>
                            </div>
                        </div>
                        
                        <div class="m-4">
                            <div class="flex items-center space-x-2">
                                <!-- Start -->
                                <div
                                    class="relative"
                                    x-data="{ open: false }"
                                    @mouseenter="open = true"
                                    @mouseleave="open = false"
                                >
                                    <button
                                        class="block"
                                        aria-haspopup="true"
                                        :aria-expanded="open"
                                        @focus="open = true"
                                        @focusout="open = false"
                                        @click.prevent            
                                    >
                                        <svg class="w-4 h-4 fill-current text-slate-400 dark:text-slate-500" viewBox="0 0 16 16">
                                            <path d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm0 12c-.6 0-1-.4-1-1s.4-1 1-1 1 .4 1 1-.4 1-1 1zm1-3H7V4h2v5z"  />
                                        </svg>
                                    </button>
                                    <div class="z-10 absolute bottom-full left-1/2 -translate-x-1/2">
                                        <div
                                            class="min-w-56 bg-slate-700 border border-slate-600 p-2 rounded overflow-hidden mb-2"
                                            x-show="open"
                                            x-transition:enter="transition ease-out duration-200 transform"
                                            x-transition:enter-start="opacity-0 translate-y-2"
                                            x-transition:enter-end="opacity-100 translate-y-0"
                                            x-transition:leave="transition ease-out duration-200"
                                            x-transition:leave-start="opacity-100"
                                            x-transition:leave-end="opacity-0"
                                            x-cloak
                                        >
                                            <div class="text-xs text-slate-200">Excepteur sint occaecat cupidata non proident, sunt in.</div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End -->
                                <div class="text-sm font-medium text-slate-500 dark:text-slate-400">Basic Dark</div>
                            </div>
                        </div>

                        <div class="m-4">
                            <div class="flex items-center space-x-2">
                                <!-- Start -->
                                <div
                                    class="relative"
                                    x-data="{ open: false }"
                                    @mouseenter="open = true"
                                    @mouseleave="open = false"
                                >
                                    <button
                                        class="block"
                                        aria-haspopup="true"
                                        :aria-expanded="open"
                                        @focus="open = true"
                                        @focusout="open = false"
                                        @click.prevent            
                                    >
                                        <svg class="w-4 h-4 fill-current text-slate-400 dark:text-slate-500" viewBox="0 0 16 16">
                                            <path d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm0 12c-.6 0-1-.4-1-1s.4-1 1-1 1 .4 1 1-.4 1-1 1zm1-3H7V4h2v5z"  />
                                        </svg>
                                    </button>
                                    <div class="z-10 absolute bottom-full left-1/2 -translate-x-1/2">
                                        <div
                                            class="min-w-72 bg-white dark:bg-slate-700 dark:text-slate-100 border border-slate-200 dark:border-slate-600 p-3 rounded shadow-lg overflow-hidden mb-2"
                                            x-show="open"
                                            x-transition:enter="transition ease-out duration-200 transform"
                                            x-transition:enter-start="opacity-0 translate-y-2"
                                            x-transition:enter-end="opacity-100 translate-y-0"
                                            x-transition:leave="transition ease-out duration-200"
                                            x-transition:leave-start="opacity-100"
                                            x-transition:leave-end="opacity-0"
                                            x-cloak
                                        >
                                            <div class="text-sm font-medium text-slate-500 dark:text-slate-500">Excepteur sint occaecat cupidata non proident, sunt in.</div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End -->
                                <div class="text-sm font-medium text-slate-500 dark:text-slate-400">Large White</div>
                            </div>
                        </div>
                        
                        <div class="m-4">
                            <div class="flex items-center space-x-2">
                                <!-- Start -->
                                <div
                                    class="relative"
                                    x-data="{ open: false }"
                                    @mouseenter="open = true"
                                    @mouseleave="open = false"
                                >
                                    <button
                                        class="block"
                                        aria-haspopup="true"
                                        :aria-expanded="open"
                                        @focus="open = true"
                                        @focusout="open = false"
                                        @click.prevent            
                                    >
                                        <svg class="w-4 h-4 fill-current text-slate-400 dark:text-slate-500" viewBox="0 0 16 16">
                                            <path d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm0 12c-.6 0-1-.4-1-1s.4-1 1-1 1 .4 1 1-.4 1-1 1zm1-3H7V4h2v5z"  />
                                        </svg>
                                    </button>
                                    <div class="z-10 absolute bottom-full left-1/2 -translate-x-1/2">
                                        <div
                                            class="min-w-72 bg-slate-700 border border-slate-600 p-3 rounded overflow-hidden mb-2"
                                            x-show="open"
                                            x-transition:enter="transition ease-out duration-200 transform"
                                            x-transition:enter-start="opacity-0 translate-y-2"
                                            x-transition:enter-end="opacity-100 translate-y-0"
                                            x-transition:leave="transition ease-out duration-200"
                                            x-transition:leave-start="opacity-100"
                                            x-transition:leave-end="opacity-0"
                                            x-cloak
                                        >
                                            <div class="text-sm font-medium text-slate-200">Excepteur sint occaecat cupidata non proident, sunt in.</div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End -->
                                <div class="text-sm font-medium text-slate-500 dark:text-slate-400">Large Dark</div>
                            </div>
                        </div>

                        <div class="m-4">
                            <div class="flex items-center space-x-2">
                                <!-- Start -->
                                <div
                                    class="relative"
                                    x-data="{ open: false }"
                                    @mouseenter="open = true"
                                    @mouseleave="open = false"
                                >
                                    <button
                                        class="block"
                                        aria-haspopup="true"
                                        :aria-expanded="open"
                                        @focus="open = true"
                                        @focusout="open = false"
                                        @click.prevent            
                                    >
                                        <svg class="w-4 h-4 fill-current text-slate-400 dark:text-slate-500" viewBox="0 0 16 16">
                                            <path d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm0 12c-.6 0-1-.4-1-1s.4-1 1-1 1 .4 1 1-.4 1-1 1zm1-3H7V4h2v5z"  />
                                        </svg>
                                    </button>
                                    <div class="z-10 absolute bottom-full left-1/2 -translate-x-1/2">
                                        <div
                                            class="min-w-72 bg-white dark:bg-slate-700 dark:text-slate-100 border border-slate-200 dark:border-slate-600 p-3 rounded shadow-lg overflow-hidden mb-2"
                                            x-show="open"
                                            x-transition:enter="transition ease-out duration-200 transform"
                                            x-transition:enter-start="opacity-0 translate-y-2"
                                            x-transition:enter-end="opacity-100 translate-y-0"
                                            x-transition:leave="transition ease-out duration-200"
                                            x-transition:leave-start="opacity-100"
                                            x-transition:leave-end="opacity-0"
                                            x-cloak
                                        >
                                            <div class="text-xs">
                                                <div class="font-medium text-slate-800 mb-0.5">Let's Talk Paragraph</div>
                                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End -->
                                <div class="text-sm font-medium text-slate-500 dark:text-slate-400">Rich White</div>
                            </div>
                        </div>
                        
                        <div class="m-4">
                            <div class="flex items-center space-x-2">
                                <!-- Start -->
                                <div
                                    class="relative"
                                    x-data="{ open: false }"
                                    @mouseenter="open = true"
                                    @mouseleave="open = false"
                                >
                                    <button
                                        class="block"
                                        aria-haspopup="true"
                                        :aria-expanded="open"
                                        @focus="open = true"
                                        @focusout="open = false"
                                        @click.prevent            
                                    >
                                        <svg class="w-4 h-4 fill-current text-slate-400 dark:text-slate-500" viewBox="0 0 16 16">
                                            <path d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm0 12c-.6 0-1-.4-1-1s.4-1 1-1 1 .4 1 1-.4 1-1 1zm1-3H7V4h2v5z"  />
                                        </svg>
                                    </button>
                                    <div class="z-10 absolute bottom-full left-1/2 -translate-x-1/2">
                                        <div
                                            class="min-w-72 bg-slate-700 border border-slate-600 p-3 rounded overflow-hidden mb-2"
                                            x-show="open"
                                            x-transition:enter="transition ease-out duration-200 transform"
                                            x-transition:enter-start="opacity-0 translate-y-2"
                                            x-transition:enter-end="opacity-100 translate-y-0"
                                            x-transition:leave="transition ease-out duration-200"
                                            x-transition:leave-start="opacity-100"
                                            x-transition:leave-end="opacity-0"
                                            x-cloak
                                        >
                                            <div class="text-xs">
                                                <div class="font-medium text-slate-200 mb-0.5">Let's Talk Paragraph</div>
                                                <div class="text-slate-400">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End -->
                                <div class="text-sm font-medium text-slate-500 dark:text-slate-400">Rich Dark</div>
                            </div>
                        </div>                                    
                        
                    </div>
                </div>

                <!-- Tooltip Position -->
                <div>
                    <h2 class="text-2xl text-slate-800 dark:text-slate-100 font-bold mb-6">Tooltip Position</h2>
                    <div class="flex flex-wrap items-center -m-4">
                
                        <div class="m-4">
                            <div class="flex items-center space-x-2">
                                <!-- Start -->
                                <div
                                    class="relative"
                                    x-data="{ open: false }"
                                    @mouseenter="open = true"
                                    @mouseleave="open = false"
                                >
                                    <button
                                        class="block"
                                        aria-haspopup="true"
                                        :aria-expanded="open"
                                        @focus="open = true"
                                        @focusout="open = false"
                                        @click.prevent            
                                    >
                                        <svg class="w-4 h-4 fill-current text-slate-400 dark:text-slate-500" viewBox="0 0 16 16">
                                            <path d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm0 12c-.6 0-1-.4-1-1s.4-1 1-1 1 .4 1 1-.4 1-1 1zm1-3H7V4h2v5z"  />
                                        </svg>
                                    </button>
                                    <div class="z-10 absolute bottom-full left-1/2 -translate-x-1/2">
                                        <div
                                            class="bg-white text-slate-600 border border-slate-200 p-2 rounded shadow-lg overflow-hidden mb-2"
                                            x-show="open"
                                            x-transition:enter="transition ease-out duration-200 transform"
                                            x-transition:enter-start="opacity-0 translate-y-2"
                                            x-transition:enter-end="opacity-100 translate-y-0"
                                            x-transition:leave="transition ease-out duration-200"
                                            x-transition:leave-start="opacity-100"
                                            x-transition:leave-end="opacity-0"
                                            x-cloak
                                        >
                                            <div class="text-xs whitespace-nowrap">Just a tip</div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End -->
                                <div class="text-sm font-medium text-slate-500 dark:text-slate-400">Top</div>
                            </div>
                        </div>

                        <div class="m-4">
                            <div class="flex items-center space-x-2">
                                <!-- Start -->
                                <div
                                    class="relative"
                                    x-data="{ open: false }"
                                    @mouseenter="open = true"
                                    @mouseleave="open = false"
                                >
                                    <button
                                        class="block"
                                        aria-haspopup="true"
                                        :aria-expanded="open"
                                        @focus="open = true"
                                        @focusout="open = false"
                                        @click.prevent            
                                    >
                                        <svg class="w-4 h-4 fill-current text-slate-400 dark:text-slate-500" viewBox="0 0 16 16">
                                            <path d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm0 12c-.6 0-1-.4-1-1s.4-1 1-1 1 .4 1 1-.4 1-1 1zm1-3H7V4h2v5z"  />
                                        </svg>
                                    </button>
                                    <div class="z-10 absolute top-full left-1/2 -translate-x-1/2">
                                        <div
                                            class="bg-white text-slate-600 border border-slate-200 p-2 rounded shadow-lg overflow-hidden mt-2"
                                            x-show="open"
                                            x-transition:enter="transition ease-out duration-200 transform"
                                            x-transition:enter-start="opacity-0 translate-y-2"
                                            x-transition:enter-end="opacity-100 translate-y-0"
                                            x-transition:leave="transition ease-out duration-200"
                                            x-transition:leave-start="opacity-100"
                                            x-transition:leave-end="opacity-0"
                                            x-cloak
                                        >
                                            <div class="text-xs whitespace-nowrap">Just a tip</div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End -->
                                <div class="text-sm font-medium text-slate-500 dark:text-slate-400">Bottom</div>
                            </div>
                        </div>  
                        
                        <div class="m-4">
                            <div class="flex items-center space-x-2">
                                <!-- Start -->
                                <div
                                    class="relative"
                                    x-data="{ open: false }"
                                    @mouseenter="open = true"
                                    @mouseleave="open = false"
                                >
                                    <button
                                        class="block"
                                        aria-haspopup="true"
                                        :aria-expanded="open"
                                        @focus="open = true"
                                        @focusout="open = false"
                                        @click.prevent            
                                    >
                                        <svg class="w-4 h-4 fill-current text-slate-400 dark:text-slate-500" viewBox="0 0 16 16">
                                            <path d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm0 12c-.6 0-1-.4-1-1s.4-1 1-1 1 .4 1 1-.4 1-1 1zm1-3H7V4h2v5z"  />
                                        </svg>
                                    </button>
                                    <div class="z-10 absolute right-full top-1/2 -translate-y-1/2">
                                        <div
                                            class="bg-white text-slate-600 border border-slate-200 p-2 rounded shadow-lg overflow-hidden mr-2"
                                            x-show="open"
                                            x-transition:enter="transition ease-out duration-200 transform"
                                            x-transition:enter-start="opacity-0 translate-y-2"
                                            x-transition:enter-end="opacity-100 translate-y-0"
                                            x-transition:leave="transition ease-out duration-200"
                                            x-transition:leave-start="opacity-100"
                                            x-transition:leave-end="opacity-0"
                                            x-cloak
                                        >
                                            <div class="text-xs whitespace-nowrap">Just a tip</div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End -->
                                <div class="text-sm font-medium text-slate-500 dark:text-slate-400">Left</div>
                            </div>
                        </div>

                        <div class="m-4">
                            <div class="flex items-center space-x-2">
                                <!-- Start -->
                                <div
                                    class="relative"
                                    x-data="{ open: false }"
                                    @mouseenter="open = true"
                                    @mouseleave="open = false"
                                >
                                    <button
                                        class="block"
                                        aria-haspopup="true"
                                        :aria-expanded="open"
                                        @focus="open = true"
                                        @focusout="open = false"
                                        @click.prevent            
                                    >
                                        <svg class="w-4 h-4 fill-current text-slate-400 dark:text-slate-500" viewBox="0 0 16 16">
                                            <path d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm0 12c-.6 0-1-.4-1-1s.4-1 1-1 1 .4 1 1-.4 1-1 1zm1-3H7V4h2v5z"  />
                                        </svg>
                                    </button>
                                    <div class="z-10 absolute left-full top-1/2 -translate-y-1/2">
                                        <div
                                            class="bg-white text-slate-600 border border-slate-200 p-2 rounded shadow-lg overflow-hidden ml-2"
                                            x-show="open"
                                            x-transition:enter="transition ease-out duration-200 transform"
                                            x-transition:enter-start="opacity-0 translate-y-2"
                                            x-transition:enter-end="opacity-100 translate-y-0"
                                            x-transition:leave="transition ease-out duration-200"
                                            x-transition:leave-start="opacity-100"
                                            x-transition:leave-end="opacity-0"
                                            x-cloak
                                        >
                                            <div class="text-xs whitespace-nowrap">Just a tip</div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End -->
                                <div class="text-sm font-medium text-slate-500 dark:text-slate-400">Right</div>
                            </div>
                        </div>                                    
                
                    </div>
                </div>

            </div>

        </div>

    </div>
</x-app-layout>
