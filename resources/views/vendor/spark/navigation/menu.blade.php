<a class="nav-link hover:bg-gray-200">
    About
</a>
<a class="nav-link hover:bg-gray-200">
    Contact
</a>
<a class="nav-link hover:bg-gray-200">
    Blog
</a>
<a :href="user ? '/dashboard' : '#'" @click.prevent="!user ? showLoginModal() : ''" class="nav-link hover:bg-gray-200">
    Account
</a>
<a href="#" @click.prevent="user ? showListingModal() : showLoginModal()" class="btn btn-gray-800 lg:text-sm">
    List Space
</a>
