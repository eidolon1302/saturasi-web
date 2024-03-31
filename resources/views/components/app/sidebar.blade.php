<div class="min-w-fit">
    <!-- Sidebar backdrop (mobile only) -->
    <div
        class="fixed inset-0 bg-slate-900 bg-opacity-30 z-40 lg:hidden lg:z-auto transition-opacity duration-200"
        :class="sidebarOpen ? 'opacity-100' : 'opacity-0 pointer-events-none'"
        aria-hidden="true"
        x-cloak
    ></div>

    <!-- Sidebar -->
    <div
        id="sidebar"
        class="flex flex-col absolute z-40 left-0 top-0 lg:hidden h-[100dvh] overflow-y-scroll no-scrollbar w-64 2xl:!w-64 shrink-0 bg-slate-950 p-4 transition-all duration-200 ease-in-out"
        :class="sidebarOpen ? 'max-lg:translate-x-0' : 'max-lg:-translate-x-64'"
        @click.outside="sidebarOpen = false"
        @keydown.escape.window="sidebarOpen = false"
    >

        <!-- Sidebar header -->
        <div class="flex justify-between mb-10 pr-3 sm:px-2">
            <!-- Close button -->
            <button class="lg:hidden text-slate-500 hover:text-slate-400" @click.stop="sidebarOpen = !sidebarOpen" aria-controls="sidebar" :aria-expanded="sidebarOpen">
                <span class="sr-only">Close sidebar</span>
                <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.7 18.7l1.4-1.4L7.8 13H20v-2H7.8l4.3-4.3-1.4-1.4L4 12z" />
                </svg>
            </button>
        </div>

        <!-- Links -->
        <div class="space-y-8">
            <!-- Pages group -->
            <div>
                <h3 class="text-xs uppercase text-slate-500 font-semibold pl-3">
                    <span class="hidden lg:block lg:sidebar-expanded:hidden 2xl:hidden text-center w-6" aria-hidden="true">•••</span>
                    <span class="lg:hidden lg:sidebar-expanded:block 2xl:block">ENVIER</span>
                </h3>
                <ul class="mt-3">
                    <!-- Home -->
                    <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if(in_array(Request::segment(1), ['home'])){{ 'bg-slate-900' }}@endif">
                        <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if(in_array(Request::segment(1), ['home'])){{ 'hover:text-slate-200' }}@endif" href="{{ route('home') }}">
                            <div class="flex items-center">
                                
                                <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">About</span>
                            </div>
                        </a>
                    </li>
                    <!-- Experience -->
                    <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if(in_array(Request::segment(1), ['experience'])){{ 'bg-slate-900' }}@endif">
                        <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if(in_array(Request::segment(1), ['experience'])){{ 'hover:text-slate-200' }}@endif" href="{{ route('experience') }}">
                            <div class="flex items-center">
                                <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Experience</span>
                            </div>
                        </a>
                    </li>
                    <!-- Project -->
                    <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if(in_array(Request::segment(1), ['project'])){{ 'bg-slate-900' }}@endif">
                        <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if(in_array(Request::segment(1), ['project'])){{ 'hover:text-slate-200' }}@endif" href="{{ route('project') }}">
                            <div class="flex items-center">
                                <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Project</span>
                            </div>
                        </a>
                    </li>
                    <!--Contact -->
                    <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if(in_array(Request::segment(1), ['contact'])){{ 'bg-slate-900' }}@endif">
                        <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if(in_array(Request::segment(1), ['contact'])){{ 'hover:text-slate-200' }}@endif" href="{{ route('contact') }}">
                            <div class="flex items-center">
                                <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Contact</span>
                            </div>
                        </a>
                    </li>
                    <!-- Social Media and Git -->
                    

                    <!-- Community -->
                    
                    <!-- Milestone -->
                    
                    <!-- Teams -->
                    
                    <!-- Change Log -->
                          
                    <!-- Utility -->

                </ul>
            </div>
            <!-- More group -->
            
        </div>

        <!-- Expand / collapse button -->
        <div class="pt-3 hidden lg:inline-flex 2xl:hidden justify-end mt-auto">
            <div class="px-3 py-2">
                <button @click="sidebarExpanded = !sidebarExpanded">
                    <span class="sr-only">Expand / collapse sidebar</span>
                    <svg class="w-6 h-6 fill-current sidebar-expanded:rotate-180" viewBox="0 0 24 24">
                        <path class="text-slate-400" d="M19.586 11l-5-5L16 4.586 23.414 12 16 19.414 14.586 18l5-5H7v-2z" />
                        <path class="text-slate-600" d="M3 23H1V1h2z" />
                    </svg>
                </button>
            </div>
        </div>

    </div>
</div>