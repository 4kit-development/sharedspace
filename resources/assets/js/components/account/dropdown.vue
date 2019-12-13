<template>
    <div class="relative">
        <span @click="isOpen = !isOpen" class="flex border-gray-700 border text-sm py-3 px-2 items-center flex rounded-sm cursor-pointer">
            <svg class="fill-current text-gray-700 w-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 13 3">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M1.5 3a1.5 1.5 0 100-3 1.5 1.5 0 000 3zM6.5 3a1.5 1.5 0 100-3 1.5 1.5 0 000 3zM11.5 3a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"/>
            </svg>
        </span>
        <div v-if="isOpen" class="absolute right-0 mt-2 py-2 w-40 bg-white rounded-sm shadow-xl border-gray-200 border-1px">
            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Upgrade listing</a>
            <a :href="'/listing/' + listing.id" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">View listing</a>
            <a :href="'/listing/edit/' + listing.id" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Edit listing</a>
            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Show history</a>
            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Stop listing</a>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'listing'
        ],
        data() {
            return {
                isOpen: false
            }
        },
        created() {
            const handleEscape = (e) => {
                if (e.key === 'Esc' || e.key === 'Escape') {
                    this.isOpen = false
                }
            }
            document.addEventListener('keydown', handleEscape)
            this.$once('hook:beforeDestroy', () => {
                document.removeEventListener('keydown', handleEscape)
            })
        }
    }
</script>
