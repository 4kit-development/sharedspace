//import searchRouting from './search-routing.js';

$script(
    '',
    function() {
        var search = instantsearch({
            searchClient: algoliasearch(
                'QPN820WO0Q',
                '52557bf2c07e2a0440469a77ece8385a'
            ),
            indexName: 'listings',
            routing: true,
            // routing: searchRouting
        });

        var infoWindow = null;
        var mapListener = null;
        var isMarkerEvent = false;

        search.addWidgets([
            instantsearch.widgets.configure({
                aroundLatLngViaIP: false,
                hitsPerPage: 12,
            }),

            // instantsearch.widgets.searchBox({
            //     container: '#search-box',
            //     placeholder: 'Where are you going?',
            //     showSubmit: false,
            //     cssClasses: {
            //         input: 'form-control',
            //     },
            // }),

            instantsearch.widgets.hits({
                container: '#hits',
                escapeHTML: true,
                cssClasses: {
                    root: 'px-2',
                    list: ['flex', 'flex-wrap', '-mx-2'],
                },
                templates: {
                    item(hit) {
                        return `
                            <div class="px-2 pt-4 pb-8">
                                <div class="relative pb-5/6">
                                    <img class="absolute h-full w-full object-cover shadow-md" src="${hit.primary_image}">
                                </div>
                                <div class="relative px-2 -mt-12 py-4" style="background-image: linear-gradient(180deg, rgba(255,255,255, 0) 0%, rgba(0, 0, 0, 1) 100%);">
                                    <div class="bg-transparent flex justify-between">
                                        <div class="flex">
                                            <div class="flex items-center pr-2" onclick="console.log(${hit.id})">
                                                <svg class="fill-current h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 20">
                                                    <path d="M.6 19.073H.596a.306.306 0 00.01-.005zm.159-.102c.041-.032.087-.072.134-.12l.241-.237A275.479 275.479 0 013.73 16.09l.154-.148c2.413-2.306 2.981-2.814 3.478-2.814.488 0 1.089.519 3.587 2.818l.155.142a262.904 262.904 0 012.703 2.532l.249.236c.136.128.22.185.241.216-.06-.014-.046-.107-.046-.283V1.993c0-.686-.556-1.243-1.242-1.243H1.992C1.307.75.75 1.307.75 1.993v16.796c0 .068.003.13.009.182zm6.339-4.394a.753.753 0 00.009.006z" fill="#000" stroke="#FFF" stroke-width="1.5" fill-rule="evenodd" fill-opacity=".2"/>
                                                </svg>
                                            </div>
                                            <div class="flex items-center px-2">
                                                <svg class="fill-current h-4 w-4 pr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 8 15">
                                                    <path d="M5.832 10.593l-.23 2.445c-.063.669-.654 1.211-1.315 1.211H3.082c-.663 0-1.253-.545-1.315-1.21l-.23-2.446h-.26c-.663 0-1.084-.531-.94-1.19l.681-3.105c.145-.657.8-1.19 1.463-1.19h2.407c.664 0 1.318.531 1.463 1.19l.68 3.105c.144.657-.275 1.19-.938 1.19h-.261zM3.685 4.499A1.816 1.816 0 011.88 2.67c0-1.01.807-1.829 1.804-1.829.996 0 1.803.819 1.803 1.829s-.807 1.828-1.803 1.828zm.96 5.863c.052-.545.547-.987 1.103-.986h.046l-.617-2.813c-.022-.101-.188-.236-.289-.236H2.481c-.1 0-.267.136-.289.236l-.611 2.811h.045c.555 0 1.047.45 1.097.988l.241 2.56c.004.042.076.108.118.108h1.205c.043 0 .114-.065.118-.107l.24-2.56zm-.96-7.082a.605.605 0 00.6-.61c0-.336-.268-.609-.6-.609a.605.605 0 00-.602.61c0 .336.27.609.602.609z" fill="#FFF" fill-rule="evenodd"/>
                                                </svg>
                                                <span class="text-white text-sm">${hit.formatted_capacity}</span>
                                            </div>
                                            <div class="flex items-center px-2">
                                                <svg class="fill-current h-4 w-4 pr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 12">
                                                    <path d="M6.038 9.812h4.366V1.28H1.986v4.43c.244-.106.514-.164.797-.164h1.412c1.105 0 2 .893 2 1.995v1.494c0 .275-.056.538-.157.777zM.784 2.06C.784.956 1.669.061 2.78.061H9.61a2 2 0 011.998 2v6.97c0 1.104-.886 2-1.998 2H2.781a2 2 0 01-1.997-2v-6.97zm1.202 4.705v3.047h3.007V6.765H1.986z" fill="#FFF" fill-rule="evenodd"/>
                                                </svg>
                                                <span class="text-white text-sm">${hit.formatted_area}</span>
                                            </div>
                                        </div>
                                        <div class="flex items-center">
                                            <span class="text-white text-sm font-semibold">${hit.formatted_cost}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="pt-3">
                                    <a href="/listing/ + ${hit.id}">
                                        <span class="font-bold text-lg text-gray-700">
                                            ${hit.address}
                                        </span>
                                    </a>
                                </div>
                                <div class="pt-1">
                                    <span class="text-sm text-gray-500">
                                        ${hit.formatted_tags}
                                    </span>
                                </div>
                            </div>
                        `;
                    },
                    empty:
                        '<div class="text-center">No results found matching <strong>{{query}}</strong>.</div>',
                },
            }),

            instantsearch.widgets.pagination({
                container: '#pagination',
                scrollTo: '#results',
                cssClasses: {
                    list: 'pagination',
                    selectedItem: 'active',
                },
            }),

            instantsearch.widgets.stats({
                container: '#stats',
                templates: {
                    text: `{{nbHits}}`,
                },
                cssClasses: {
                    text: ['text-4xl font-bold'],
                },
            }),

            instantsearch.widgets.currentRefinements({
                container: '#current-refinements',
                includedAttributes: ['category', 'suburb']
            }),

            // instantsearch.widgets.menu({
            //     container: '#tags',
            //     attribute: 'tags',
            // }),

            // instantsearch.widgets.refinementList({
            //     container: '#room_types',
            //     attribute: 'room_type',
            //     sortBy: ['name:asc'],
            //     cssClasses: {
            //         item: ['col-sm-3'],
            //     },
            // }),

            instantsearch.widgets.rangeSlider({
                container: '#price',
                attribute: 'price',
                pips: false,
                precision: 1,
            }),

            instantsearch.widgets.rangeSlider({
                container: '#area',
                attribute: 'rooms',
                pips: false,
                precision: 1,
            }),

            instantsearch.widgets.searchBox({
                container: '#searchbox',
                placeholder: 'Keyword',
                showSubmit: false,
                showReset: false,
                cssClasses: {
                    input: 'focus:outline-none  text-sm'
                }
            }),

            instantsearch.widgets.geoSearch({
                container: '#map',
                cssClasses: {
                    map: 'sticky?lg:h-(screen-16)',
                    root: 'relative',
                    control: ['absolute', 'top-0', 'ml-16', 'mt-3', 'bg-white', 'rounded', 'p-2'],
                    input: 'mr-1',
                    label: 'text-sm',

                },
                googleReference: window.google,
                enableRefineControl: true,
                customHTMLMarker: {
                    createOption: function(hit) {
                        return {
                            title: hit.description,
                        };
                    },
                    events: {
                        click(event) {
                            isMarkerEvent = true;
                            google.maps.event.removeListener(mapListener);
                            mapListener = window.google.maps.event.addListener(event.map, "click", function(e) {
                                if(isMarkerEvent) {
                                    isMarkerEvent = false;
                                } else {
                                    infoWindow.close();
                                }
                            });
                            if (infoWindow) {
                                infoWindow.close();
                            }

                            infoWindow = new window.google.maps.InfoWindow({
                                content: '<div class="max-w-sm overflow-hidden w-64 h-full mx-auto">\n' +
                                        '        <div class="relative">\n' +
                                        '            <a href="\'/listing\ ' + event.item.id + '">\n' +
                                        '                <img class="w-64 h-48" src="' + event.item.picture_url + '">\n' +
                                        '            </a>\n' +
                                        '        </div>\n' +
                                        '        <div class="pb-1 px-2">\n' +
                                        '            <div class="font-semibold text-base mb-1">\n' + event.item.address +
                                        '            </div>\n' +
                                        '            <div class="text-xs text-gray-700 leading-normal">\n' +
                                        '                Ponsonby Office / Agency / Post / Design\n' +
                                        '            </div>\n' +
                                        '            <div class="w-full py-1 text-gray-700">\n' +
                                    '                    <div class="flex justify-between items-center">\n' +
                                    '                        <div class="flex items-center">\n' +
                                    '                            <span class="inline-block text-lg mr-3"><i class="fa fa-bookmark-o"></i></span>\n' +
                                    '                            <span class="inline-block text-xs mr-3"><i class="fa fa-user"></i> 1-10</span>\n' +
                                    '                            <span class="inline-block text-xs"><i class="fa fa-square-o"></i> 150</span>\n' +
                                    '                        </div>\n' +
                                    '                        <div>\n' +
                                    '                            <span class="inline-block text-xs font-bold">$400</span>\n' +
                                    '                        </div>\n' +
                                    '                    </div>\n' +
                                    '                </div>\n' +
                                        '        </div>\n' +
                                        '    </div>'
                            });

                            infoWindow.open(event.map, event.marker);
                        }
                    },
                },
                templates: {
                    HTMLMarker: function(listing) {
                        return '<div class="relative flex justify-center cursor-pointer" style="width: 57px">' +
                            '<svg class="fill-current text-gray-700 inline-block" style="width: 57px; height: 26px" xmlns="http://www.w3.org/2000/svg">' +
                                '<path d="M56.5,1.5 L8.99367773,1.5 C4.86103529,1.5 1.5,4.85747137 1.5,8.99165249 L1.5,17.0083475 C1.5,21.1444957 4.85574804,24.5 8.99367773,24.5 L49.0063223,24.5 C53.1389647,24.5 56.5,21.1425286 56.5,17.0083475 L56.5,1.5 Z"/>' +
                            '</svg>' +
                            '<span class="absolute self-center text-xs text-white font-bold">' + listing.price_formatted + '</span> ' +
                        '</div>';
                    },
                        toggle: 'Search as I move the map',
                },
            }),
        ]);

        search.start();
    },
);
