<template>
    <div v-if="state" class="ais-GeoSearch min-h-screen" >
        <googlemaps-map
            :center.sync="center"
            :zoom.sync="zoom"
            @idle="onIdle"
            ref="map"
            @update:bounds="onBoundChanged"
            class="ais-GeoSearch-map min-h-screen"
        >
            <googlemaps-marker
                v-for="item of state.items"
                :key="item.objectID"
                :title="item.name"
                :position="item._geoloc"
                :ref="item.id"
                :icon="rectangle"
                :label="{
                  color: 'white',
                  fontFamily: 'Lato',
                  fontSize: '12px',
                  fontWeight: '900',
                  text: '$' + item.max_cost,
                }"
                @click="selectListing(item)"
            />
        </googlemaps-map>
    </div>
</template>

<script>
    import { createWidgetMixin } from 'vue-instantsearch';
    import connectSharedSpaceSearch from './connectSharedSpaceSearch';

    export default {
        mixins: [createWidgetMixin({ connector: connectSharedSpaceSearch })],
        props: ['mapView'],
        data() {
            return {
                bounds: null,
                count: 0,
                center: {lat: -35, lng: 174},
                infoWindow: null,
                loaded: false,
                rectangle: {
                    path: 'M56.5,1.5 L8.99367773,1.5 C4.86103529,1.5 1.5,4.85747137 1.5,8.99165249 L1.5,17.0083475 C1.5,21.1444957 4.85574804,24.5 8.99367773,24.5 L49.0063223,24.5 C53.1389647,24.5 56.5,21.1425286 56.5,17.0083475 L56.5,1.5 Z',
                    fillColor: '#4A4A4A',
                    fillOpacity: 1,
                    borderColor: '#4A4A4A',
                    scale: 1,
                    anchor: { x: 14, y: 7 },
                    labelOrigin: { x: 28, y: 13 }
                },
                selectedListing: null,
                zoom: 12,
            };
        },
        methods: {
            onIdle (map) {
                if (!this.loaded && this.mapView) {
                    this.bounds = new google.maps.LatLngBounds();
                    _.each(this.state.items, (item) => {
                        this.bounds.extend(new google.maps.LatLng(item._geoloc.lat, item._geoloc.lng));
                    });
                    map.fitBounds(this.bounds);
                    this.loaded = true;
                };
            },
            onBoundChanged (bounds) {
                if (this.loaded && this.mapView) {
                    let boundingBox = null;
                    if(bounds.getNorthEast().lng() < bounds.getSouthWest().lng() > 0) {
                        boundingBox = [
                            bounds.getNorthEast().lat(),
                            180,
                            bounds.getSouthWest().lat(),
                            bounds.getSouthWest().lng(),
                            bounds.getNorthEast().lat(),
                            -180,
                            bounds.getSouthWest().lat(),
                            bounds.getNorthEast().lng()
                        ];
                    } else {
                        boundingBox = [
                            bounds.getNorthEast().lat(),
                            bounds.getNorthEast().lng(),
                            bounds.getSouthWest().lat(),
                            bounds.getSouthWest().lng()
                        ];
                    }

                    this.state.refine(boundingBox);
                }
            },
            closeInfoWindow() {
                if(this.infoWindow) {
                    console.log(this.$refs[this.selectedListing]);
                    this.infoWindow.close(this.$refs.map.$_map, this.$refs[this.selectedListing][0].$_marker);
                    this.selectedListing = null;
                    this.infoWindow = null;
                }
            },
            selectListing(listing) {
                if(this.selectedListing || this.infoWindow) {
                    this.closeInfoWindow();
                    return;
                }

                google.maps.event.addListener(this.$refs.map.$_map, "click", function(event) {
                    self.closeInfoWindow();
                    return;
                });

                let self = this,
                    map = this.$refs.map.$_map,
                    marker = this.$refs[listing.id][0].$_marker;

                this.selectedListing = listing.id;
                this.infoWindow = new google.maps.InfoWindow({
                    content: '<div class="max-w-sm overflow-hidden w-64 h-full mx-auto">\n' +
                        '        <div class="relative">\n' +
                        '            <a href="\'/listing/\ ' + listing.id + '">\n' +
                        '                <img class="w-64 h-48" src="' + listing.images[0].url + '">\n' +
                        '            </a>\n' +
                        '        </div>\n' +
                        '        <div class="pb-1 px-2">\n' +
                        '            <div class="font-semibold text-base mb-1">\n' + listing.address +
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
                this.infoWindow.open(map, marker);
            }
        },
    }
</script>

<style scoped>
    #geo-search {
        height: 300px;
    }
</style>
