<template>
    <div class="flex flex-wrap -mx-4">
        <div class="w-full md:w-1/2 xl:w-1/3 px-4 pb-8" v-for="listing in listings">
            <div class="text-xs text-gray-700">
                ID {{listing.id}}
            </div>
            <div class="flex justify-between items-start border-b border-b-2 border-teal-500 py-2">
                <div class="flex flex-col pr-4">
                    <span class="text-2xl font-700 mb-2">{{listing.title}}</span>
                    <span class="uppercase text-xs">
                        Office space at Parnell, Ponsonby
                    </span>
                </div>
                <div class="flex justify-end">
                    <template v-if="listing.status == 'enabled'">
                        <span class="flex bg-green-200 text-gray-700 font-bold text-sm text-white py-2 px-6 mr-2 uppercase">
                            Active
                        </span>
                    </template>
                    <template v-if="listing.status == 'disabled'">
                        <span class="flex bg-yellow-400 text-gray-700 font-bold text-sm text-white py-2 px-6 mr-2 uppercase">
                            Disabled
                        </span>
                    </template>
                    <template v-if="listing.status == 'expired'">
                        <span class="flex bg-red-400 text-gray-700 font-bold text-sm text-white py-2 px-6 mr-2 uppercase">
                            Expired
                        </span>
                    </template>
                    <dropdown :listing="listing"/>
                </div>
            </div>
            <div class="">
                <img src="https://place-hold.it/500x200" class="w-full"/>
            </div>
            <!-- progress bar -->
            <template v-if="listing.status == 'enabled'">
                <div id="progress" class="h-4 bg-green-200" :style="{ width: listing.progress + '%' }"></div>
            </template>
            <template v-if="listing.status == 'disabled'">
                <div id="progress" class="h-4 bg-yellow-400" :style="{ width: listing.progress + '%' }"></div>
            </template>
            <template v-if="listing.status == 'expired'">
                <div id="progress" class="h-4 bg-red-400" :style="{ width: listing.progress + '%' }"></div>
            </template>
            <!-- start and end dates -->
            <div class="flex pt-2 pb-4">
                <div class="flex-1 text-sm text-left">
                    <span class="font-bold">{{ listing.formatted_listed_at }}</span> start
                </div>
                <div class="flex-1 text-xs text-gray-500 text-center">
                    {{ listing.days_remaining }}
                </div>
                <div class="flex-1 text-sm text-right">
                    end <span class="font-bold">{{ listing.formatted_expired_at }}</span>
                </div>
            </div>
            <!-- stats -->
            <div class="flex justify-between">
                <div>
                    <div class="flex items-center">
                        <svg class="fill-current inline-block h-4 w-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0c5.523 0 10 4.477 10 10s-4.477 10-10 10S0 15.523 0 10 4.477 0 10 0z" fill="url(#paint0_linear)"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10 5a5 5 0 110 10 5 5 0 010-10z" fill="#fff"/>
                            <defs>
                                <linearGradient id="paint0_linear" x1=".431" y1=".861" x2=".431" y2="20" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#F9BEC3"/>
                                    <stop offset=".192" stop-color="#FBC9A8"/>
                                    <stop offset=".47" stop-color="#FCE683"/>
                                    <stop offset=".742" stop-color="#C0E0A2"/>
                                    <stop offset="1" stop-color="#A0E1EA"/>
                                </linearGradient>
                            </defs>
                        </svg>
                        <span class="font-semibold uppercase">{{ listing.plan.type.name }}</span>
                    </div>
                    <span class="block text-gray-500 text-xs mt-2">
                        {{ listing.plan.period }} days listing plan
                    </span>
                </div>
                <!-- views -->
                <div>
                    <div class="flex items-center">
                        <svg class="fill-current inline-block h-4 w-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.15 14.7c2.247 0 4.31-.847 5.938-2.248C16.468 11.264 17.4 9.764 17.4 8.7c0-1.064-.931-2.565-2.309-3.751C13.464 3.547 11.401 2.7 9.15 2.7c-2.25 0-4.314.848-5.942 2.252C1.831 6.139.9 7.64.9 8.7s.933 2.561 2.311 3.748C4.84 13.852 6.903 14.7 9.15 14.7zm0-1.5c-1.868 0-3.59-.709-4.96-1.888C3.11 10.382 2.4 9.24 2.4 8.7c0-.54.709-1.682 1.788-2.612C5.556 4.908 7.279 4.2 9.15 4.2c1.871 0 3.595.707 4.962 1.885 1.08.93 1.788 2.072 1.788 2.615 0 .543-.71 1.685-1.79 2.615-1.368 1.177-3.092 1.885-4.96 1.885zm3-4.5a3 3 0 11-6 0 3 3 0 016 0zM9.213 7.201a1.5 1.5 0 101.435 1.435 1.125 1.125 0 01-1.435-1.435z" fill="#4A4A4A"/>
                        </svg>
                        <span>{{ listing.page_views }}</span>
                    </div>
                    <span class="block text-gray-500 text-xs mt-2">
                        listing views
                    </span>
                </div>
                <!-- saved -->
                <div>
                    <div class="flex items-center">
                        <svg class="fill-current inline-block h-4 w-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M4.502 1.5A1.5 1.5 0 003 3v12c0 .826.57 1.144 1.272.705l4.41-2.756c.176-.11.46-.11.636 0l4.41 2.756C14.43 16.144 15 15.828 15 15V3c0-.826-.672-1.5-1.502-1.5H4.502zm3.385 10.177L4.53 13.774 4.501 3H13.5v10.797l-3.387-2.12a2.151 2.151 0 00-2.226 0z" fill="#4D4D4D"/>
                        </svg>
                        <span>1234</span>
                    </div>
                    <span class="block text-gray-500 text-xs mt-2">listing saved</span>
                </div>
                <!-- email enquiries -->
                <div>
                    <div class="flex items-center">
                        <svg class="fill-current inline-block h-4 w-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                            <mask id="a" fill="#fff">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M15.75 2.25H2.25c-.828 0-1.5.67-1.5 1.496v10.508c0 .827.672 1.496 1.5 1.496h13.5c.828 0 1.5-.67 1.5-1.496V3.746c0-.827-.672-1.496-1.5-1.496zM6.44 9l-4.19 4.19V4.81L6.44 9zm8.25 5.25l-11.382.002L7.5 10.061l.97.97a.75.75 0 001.06 0l.97-.97 4.19 4.19zm1.06-1.06V4.81L11.56 9l4.19 4.19zM3.307 3.75l11.388-.002L9 9.464 3.307 3.75z"/>
                            </mask>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M15.75 2.25H2.25c-.828 0-1.5.67-1.5 1.496v10.508c0 .827.672 1.496 1.5 1.496h13.5c.828 0 1.5-.67 1.5-1.496V3.746c0-.827-.672-1.496-1.5-1.496zM6.44 9l-4.19 4.19V4.81L6.44 9zm8.25 5.25l-11.382.002L7.5 10.061l.97.97a.75.75 0 001.06 0l.97-.97 4.19 4.19zm1.06-1.06V4.81L11.56 9l4.19 4.19zM3.307 3.75l11.388-.002L9 9.464 3.307 3.75z" fill="#4D4D4D"/>
                            <path d="M2.25 13.19h-4v9.656l6.828-6.828-2.828-2.829zM6.44 9l2.828 2.828L12.096 9 9.268 6.172 6.439 9zM2.25 4.81L5.08 1.983l-6.827-6.826-.002 9.654h4zm1.058 9.442L.48 11.424l-6.834 6.834 9.665-.006-.003-4zm11.381-.002v4h9.656l-6.827-6.828-2.829 2.828zM7.5 10.06l2.828-2.828L7.5 4.404 4.672 7.232 7.5 10.061zm.97.97L5.64 13.86 8.47 11.03zm1.06 0l2.829 2.829L9.53 11.03zm.97-.97l2.828-2.828L10.5 4.404 7.672 7.232l2.828 2.829zm5.25 3.13l-2.829 2.828 6.827 6.826.002-9.654h-4zm0-8.38h4v-9.656l-6.828 6.828 2.828 2.829zM11.56 9L8.733 6.172 5.904 9l2.828 2.828L11.561 9zm3.135-5.252L17.53 6.57l6.803-6.829-9.64.006.003 4zM3.307 3.75v-4h-9.63L.473 6.574 3.307 3.75zM9 9.464l-2.834 2.823L9 15.132l2.834-2.845L9 9.464zM2.25 6.25h13.5v-8H2.25v8zm2.5-2.504a2.501 2.501 0 01-2.5 2.504v-8a5.499 5.499 0 00-5.5 5.496h8zm0 10.508V3.746h-8v10.508h8zm-2.5-2.504c1.37 0 2.5 1.11 2.5 2.504h-8a5.498 5.498 0 005.5 5.496v-8zm13.5 0H2.25v8h13.5v-8zm-2.5 2.504a2.501 2.501 0 012.5-2.504v8c3.025 0 5.5-2.449 5.5-5.496h-8zm0-10.508v10.508h8V3.746h-8zm2.5 2.504c-1.37 0-2.5-1.11-2.5-2.504h8a5.498 5.498 0 00-5.5-5.496v8zM5.077 16.018l4.19-4.19L3.61 6.172-.58 10.36l5.657 5.657zM-1.75 4.81v8.38h8V4.811l-8-.002zM9.268 6.172l-4.19-4.19L-.577 7.64l4.189 4.19 5.657-5.657zM3.31 18.252l11.379-.002v-8l-11.384.002.005 8zm1.36-11.02L.48 11.424l5.657 5.657 4.191-4.192-5.656-5.657zm6.627.97l-.97-.97-5.656 5.657.97.97 5.656-5.657zm-4.596 0a3.25 3.25 0 014.596 0l-5.657 5.657a4.75 4.75 0 006.718 0L6.702 8.202zm.97-.97l-.97.97 5.657 5.657.97-.97-5.657-5.657zm0 5.657l4.189 4.19 5.657-5.657-4.19-4.19-5.656 5.657zm12.078.3V4.812h-8v8.377l8 .002zM12.922 1.983l-4.19 4.19 5.657 5.656 4.19-4.189-5.657-5.657zm5.656 8.379L14.39 6.17l-5.657 5.657 4.19 4.19 5.656-5.657zM14.693-.252L3.307-.25v8l11.39-.002-.004-8zm-2.86 12.54L17.53 6.57 11.86.924 6.166 6.641l5.668 5.646zM.474 6.572l5.693 5.714 5.668-5.646L6.14.927.473 6.573z" fill="#4A4A4A" mask="url(#a)"/>
                        </svg>
                        <span>1234</span>
                    </div>
                    <span class="block text-gray-500 text-xs mt-2">email enquiry</span>
                </div>
                <!-- phone enquiries -->
                <div>
                    <div class="flex items-center">
                        <svg class="fill-current inline-block h-4 w-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.249 5.509a.75.75 0 000-1.063L5.334 1.531a1.125 1.125 0 00-1.594.001l-1.59 1.59C1.128 4.144.882 5.995 1.607 7.25c0 0 .869 2.03 4.01 5.17 3.141 3.142 5.133 3.98 5.133 3.98 1.244.744 3.103.475 4.128-.55l1.59-1.59a1.125 1.125 0 00.001-1.594l-2.915-2.915a.75.75 0 00-1.063 0l-.794.795c-.44.439-1.15.44-1.593-.003L7.457 7.896a1.127 1.127 0 01-.003-1.593l.795-.794zM3.21 4.183l1.328-1.327 2.121 2.121-.265.265a2.627 2.627 0 00.002 3.715l2.647 2.647a2.624 2.624 0 003.715.002l.265-.265 2.121 2.121-1.327 1.328c-.552.552-1.669.651-2.296.323 0 0-.283-.14-.417-.212-.251-.136-.553-.32-.902-.556-1.034-.698-2.217-1.678-3.524-2.985-1.308-1.308-2.293-2.498-3.002-3.544-.24-.354-.427-.661-.567-.918-.076-.138-.203-.398-.203-.398-.33-.689-.238-1.774.304-2.317z" fill="#4A4A4A"/>
                        </svg>
                        <span>1234</span>
                    </div>
                    <span class="block text-gray-500 text-xs mt-2">phone enquiry</span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import dropdown from './dropdown'

    export default {
        props: {
            listings: {
                type: Array,
                required: true,
            }
        },
        components: {
            dropdown
        },
    }
</script>
