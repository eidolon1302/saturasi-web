    <x-authentication-layout>
        <div class= "flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div class= "w-full rounded-lg border md:mt-0 sm:max-w-md xl:p-0 bg-gray-800 border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight  md:text-2xl text-white">{{ __('Selamat datang!') }}</h1>
                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif      
                    <!-- Form -->
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="space-y-4 md:space-y-6">
                            <div>
                                <x-label for="email" class="block mb-2 text-sm font-medium text-white" value="{{ __('Email') }}" />
                                <x-input class="border sm:text-sm rounded-lg   block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="name@company.com" id="email" type="email" name="email" :value="old('email')" required autofocus />                
                            </div>
                            <div>
                                <x-label cclass="block mb-2 text-sm font-medium text-white" for="password" value="{{ __('Password') }}" />
                                <x-input class="border sm:text-sm rounded-lg   block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" id="password" type="password" name="password" required autocomplete="current-password" />                
                            </div>
                        </div>
                        <div class="flex items-center justify-between mt-6">
                            @if (Route::has('password.request'))
                                <div class="mr-1">
                                    <a class="text-sm underline hover:no-underline" href="{{ route('password.request') }}">
                                        {{ __('Forgot Password?') }}
                                    </a>
                                </div>
                            @endif            
                            <x-button class="ml-3">
                                {{ __('Sign in') }}
                            </x-button>            
                        </div>
                    </form>
                    <x-validation-errors class="mt-4" />   
                    <!-- Footer -->
                    <div class="pt-5 mt-6 border-t border-slate-200 dark:border-slate-700">
                        <div class="text-sm">
                            {{ __('Don\'t you have an account?') }} <a class="font-medium text-indigo-500 hover:text-indigo-600 dark:hover:text-indigo-400" href="{{ route('register') }}">{{ __('Sign Up') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-authentication-layout>
