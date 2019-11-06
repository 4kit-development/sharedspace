import searchRouting from './search-routing.js';

$script(
    'https://maps.googleapis.com/maps/api/js?v=weekly&key=AIzaSyCGF5uXihz50ftS7EF63uKPoznLBhP5PQo',
    function() {

        var search = instantsearch({
            searchClient: algoliasearch(
                'latency',
                '6be0576ff61c053d5f9a3225e2a90f76'
            ),
            indexName: 'airbnb',
            routing: searchRouting
        });

        var infoWindow = null;
        var mapListener = null;
        var isMarkerEvent = false;

        search.addWidgets([
            instantsearch.widgets.configure({
                aroundLatLngViaIP: true,
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
                cssClasses: {
                    root: 'px-2',
                    list: ['flex', 'flex-wrap', '-mx-2'],
                },
                templates: {
                    item:
                        '<div class="px-2 py-4">'+
                        '    <div class="relative pb-5/6">'+
                        '      <img class="absolute h-full w-full object-cover rounded-lg shadow-md" src="{{picture_url}}">'+
                        '    </div>'+
                        '    <div class="relative px-4 -mt-16">'+
                        '      <div class="bg-white p-6 rounded-lg shadow-lg">'+
                        '        <div class="flex items-baseline">'+
                        '          <span class="inline-block bg-teal-200 text-teal-800 text-xs px-2 rounded-full uppercase font-semibold tracking-wide">New</span>'+
                        '          <div class="ml-2 text-gray-600 text-xs uppercase font-semibold tracking-wide">'+
                        '            {{ property.beds }} beds • {{ property.baths }} baths'+
                        '          </div>'+
                        '        </div>'+
                        '        <h4 class="mt-1 font-semibold text-lg leading-tight truncate">{{#helpers.highlight}}{ "attribute": "name" }{{/helpers.highlight}}</h4>'+
                        '        <div class="mt-1">'+
                        '          {{price_formatted}}'+
                        '          <span class="text-gray-600 text-sm"> / wk</span>'+
                        '        </div>'+
                        '        <div class="mt-2 flex items-center">'+
                        '          <span class="ml-2 text-gray-600 text-sm">2 reviews</span>'+
                        '        </div>'+
                        '      </div>'+
                        '    </div>'+
                        '  </div>',
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
                            '<svg class="fill-current text-grey-800 inline-block" style="width: 57px; height: 26px" xmlns="http://www.w3.org/2000/svg">' +
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
