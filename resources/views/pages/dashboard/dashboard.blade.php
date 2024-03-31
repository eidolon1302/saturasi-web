<x-app-layout>
    <div class=" w-full max-w-9xl mx-auto">
        
        <!-- Welcome banner -->
        <x-dashboard.welcome-banner />

        <!-- Dashboard actions -->
        <div class="sm:flex sm:justify-between sm:items-center mb-8">

            <!-- Right: Actions -->
            <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">

                <!-- Datepicker built with flatpickr -->
                {{-- <x-datepicker />                --}}
            </div>

        </div>
        
        <!-- Cards -->
        <div class="grid grid-cols-12 gap-6">

        </div>

    </div>
</x-app-layout>
