<navbar :user="user" inline-template>
    <header :class="[showTransition ? 'fadeIn' : 'fadeOut', isOpen ? 'bg-white' : spark.root ? 'fixed top-0 w-full z-20' : '' ]" class="sm:flex sm:justify-between sm:items-center px-4 py-2">
        <div class="flex items-center justify-between">
            <div>
                <a href="/">
                    <img class="h-12" src="/img/sharedspace-logo.svg" alt="Sharedspace logo"/>
                </a>
            </div>
            <div class="sm:hidden flex items-center">
                <button @click="isOpen = !isOpen" class="focus:outline-none">
                    <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24">
                        <path v-if="isOpen" fill-rule="evenodd" d="M18.278 16.864a1 1 0 0 1-1.414 1.414l-4.829-4.828-4.828 4.828a1 1 0 0 1-1.414-1.414l4.828-4.829-4.828-4.828a1 1 0 0 1 1.414-1.414l4.829 4.828 4.828-4.828a1 1 0 1 1 1.414 1.414l-4.828 4.829 4.828 4.828z"/>
                        <path v-if="!isOpen" fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"/>
                    </svg>
                </button>
            </div>
        </div>
        <div :class="isOpen ? 'block' : 'hidden'" class="sm:p-0 px-2 py-2 sm:flex items-center">
            @include('spark::navigation.menu')
        </div>
    </header>
</navbar>
