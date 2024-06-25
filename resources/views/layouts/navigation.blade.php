<nav class="bg-gray-900 fixed w-full z-99" x-data="{ isOpen: false }">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="flex h-16 items-center justify-between">
      <div class="flex items-center">
        <div class="flex-shrink-0">
          @guest
          <a href="/">
            <x-application-logo class="block h-9 w-auto fill-current" />
          </a>
          @else
          <a href="{{ Auth::user()->role == 'admin' ? route('admin.dashboard') : route('user.dashboard')}}">
            <x-application-logo class="block h-9 w-auto fill-current" />
          </a>
          @endguest
        </div>
        <div class="hidden md:block">
          <div class="ml-10 flex items-baseline space-x-4">
            @guest
              <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
              <x-nav-link href="/about" :active="request()->is('about')">Tentang Kami</x-nav-link>
              <x-nav-link href="/contact" :active="request()->is('contact')">Kontak</x-nav-link>
            @endguest

            @auth
              <x-nav-link :href="Auth::user()->role == 'owner' ? route('owner.dashboard') : route('admin.dashboard')" :active="Auth::user()->role == 'owner' ? request()->routeIs('owner.dashboard') : request()->routeIs('admin.dashboard')">
                {{ __('Home') }}
              </x-nav-link>
              <x-nav-link href="{{ route('mobils.index') }}" :active="request()->routeIs('mobils.index')">
                {{ __('Mobil') }}
              </x-nav-link>
            @endauth
          </div>
        </div>
      </div>
      <!-- Settings Dropdown -->
      <div class="hidden sm:flex sm:items-center sm:ml-6">
        <x-dropdown align="right" width="48">
          <x-slot name="trigger">
            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
              @auth
                <div>{{ Auth::user()->name }}</div>
              @else
                <div>Belum Login</div>
              @endauth
              <div class="ml-1">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
              </div>
            </button>
          </x-slot>
          <x-slot name="content">
            @auth
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                  {{ __('Log Out') }}
                </x-dropdown-link>
              </form>
            @else
              <x-dropdown-link :href="route('login')">
                {{ __('Login') }}
              </x-dropdown-link>
              <x-dropdown-link :href="route('register')">
                {{ __('Register') }}
              </x-dropdown-link>
            @endauth
          </x-slot>
        </x-dropdown>
      </div>
      <!-- Hamburger -->
      <div class="-mr-2 flex md:hidden">
        <!-- Mobile menu button -->
        <button type="button" @click="isOpen = !isOpen" class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" aria-controls="mobile-menu" aria-expanded="false">
          <span class="absolute -inset-0.5"></span>
          <span class="sr-only">Open main menu</span>
          <svg :class="{'hidden': isOpen, 'block': !isOpen }" class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
          <svg :class="{'block': isOpen, 'hidden': !isOpen }" class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
    </div>
  </div>

  <div x-show="isOpen" class="md:hidden" id="mobile-menu">
    <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
      @guest
        <x-responsive-nav-link href="/" :active="request()->is('/')">Home</x-responsive-nav-link>
        <x-responsive-nav-link href="/about" :active="request()->is('about')">Tentang Kami</x-responsive-nav-link>
        <x-responsive-nav-link href="/contact" :active="request()->is('contact')">Kontak</x-responsive-nav-link>
      @endguest

      @auth
        <x-responsive-nav-link :href="Auth::user()->role == 'owner' ? route('owner.dashboard') : route('admin.dashboard')" :active="Auth::user()->role == 'owner' ? request()->routeIs('owner.dashboard') : request()->routeIs('admin.dashboard')">Home</x-responsive-nav-link>
        <x-responsive-nav-link href="{{ url('/admin/data-mobil/') }}" :active="request()->is('posts')">Mobil</x-responsive-nav-link>
      @endauth
    </div>
  </div>
</nav>
