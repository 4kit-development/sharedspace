<nav class="fixed w-full bg-gray-100 pin-t z-50 h-20 px-4">
    <div class="flex container mx-auto items-center h-full">
        <a href="/">
            <img src="/img/sharedspace-condensed-logo.png" alt="sharedspace logo" class="w-10 sm:w-10" />
        </a>
        <div class="w-1/2 ml-4 flex-1 mr-4">
            @include('spark::components.simple-listing-search')
        </div>
        <button class="block md:hidden flex items-center px-3 py-2 border rounded text-gray-800 border-gray-800">
            <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
        </button>
        @include('spark::navigation.menu')
    </div>
</nav>
