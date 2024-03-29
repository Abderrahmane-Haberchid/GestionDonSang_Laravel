<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                    </a>
                </div>

                <!-- Navigation Links -->
                
                @if(Auth::user()->usertype == 'Donneur')

                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Mon Profile') }}
                    </x-nav-link>
                </div>
                
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('fairedon')" :active="request()->routeIs('fairedon')">
                        {{ __('Faire un Don') }}
                    </x-nav-link>
                </div>
                
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('printcard.view')" :active="request()->routeIs('printcard.view')">
                        {{ __('Imprimer Carte Donateur') }}
                    </x-nav-link>
                </div>

                @endif

                @if(Auth::user()->usertype == 'Patient')

                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Mon Profile') }}
                    </x-nav-link>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('besoinsang.view')" :active="request()->routeIs('besoinsang.view')">
                        {{ __('Besoin de Sang') }}
                    </x-nav-link>
                </div>  

                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('alldon.view')" :active="request()->routeIs('alldon.view')">
                        {{ __('Voir les Donneurs') }}
                    </x-nav-link>
                </div> 

                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('cartedon.view')" :active="request()->routeIs('cartedon.view')">
                        {{ __('Imprimer Carte d\'adhésion') }}
                    </x-nav-link>
                </div>      
                @endif

                @if(Auth::user()->usertype == 'Admin')
                <?php
                    $registercount = DB::table('users')->where('etat', '=', 'no')->count();
                    $allapnts = DB::table('apnts')->where('etat', '=', 'En Cours')->count();
                    $patients = DB::table('users')->where('usertype', '=', 'Patient')->count();
                    $donneurs = DB::table('users')->where('usertype', '=', 'Donneur')->count();
                ?>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __("Demande d'inscription")}}  ({{$registercount}}) 
                    </x-nav-link>
                </div>  
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('allrdv.view')" :active="request()->routeIs('allrdv.view')">
                        {{ __('Rendez-Vous') }} ({{$allapnts}}) 
                    </x-nav-link>
                </div>  
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('patient.view')" :active="request()->routeIs('patient.view')">
                        {{ __('Patients') }} ({{$patients}}) 
                    </x-nav-link>
                </div> 
                
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('donneur.view')" :active="request()->routeIs('donneur.view')">
                        {{ __('Donateurs') }} ({{$donneurs}}) 
                    </x-nav-link>
                </div>  

                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('stocksang.view')" :active="request()->routeIs('stocksang.view')">
                        {{ __('Stock Sang') }}
                    </x-nav-link>
                </div>  
                
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('equip.view')" :active="request()->routeIs('equip.view')">
                        {{ __('Equipements') }}
                    </x-nav-link>
                </div> 
                         
                @endif
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div>Bienvenu {{ Auth::user()->fname }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{Route('logout')}}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Se déconnecter') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <!--<div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Tableau de Bord') }}
            </x-responsive-nav-link>
        </div>-->

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->lname }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
               
               <form method="POST" action="">
                    @csrf
                    
                    @if(Auth::user()->usertype == 'Donneur')
                       
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Mon Profile') }}

                    </x-responsive-nav-link>
                    
                    <x-responsive-nav-link :href="route('fairedon')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Faire un don') }}
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('printcard.view')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Imprimer carte donnateur') }}
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Se déconnecter') }}
                    </x-responsive-nav-link>
                    @endif

                    @if(Auth::user()->usertype == 'Patient')

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Mon Profile') }}
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('besoinsang.view')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Besoin Sang') }}
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('alldon.view')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Voir Donateur') }}
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('cartedon.view')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __("Imprimer Carte D'adhésion") }}
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Se déconnecter') }}
                    </x-responsive-nav-link>

                    @endif

                    
                </form>
            </div>
        </div>
    </div>
</nav>
