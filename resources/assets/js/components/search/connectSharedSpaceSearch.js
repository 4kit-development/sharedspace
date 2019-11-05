function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; var ownKeys = Object.keys(source); if (typeof Object.getOwnPropertySymbols === 'function') { ownKeys = ownKeys.concat(Object.getOwnPropertySymbols(source).filter(function (sym) { return Object.getOwnPropertyDescriptor(source, sym).enumerable; })); } ownKeys.forEach(function (key) { _defineProperty(target, key, source[key]); }); } return target; }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

import noop from 'lodash/noop';
import { checkRendering, warning, aroundLatLngToPosition, insideBoundingBoxToBoundingBox, createDocumentationMessageGenerator } from 'instantsearch.js/es/lib/utils';
var withUsage = createDocumentationMessageGenerator({
    name: 'geo-search',
    connector: true
});

var connectSharedSpaceSearch = function connectSharedSpaceSearch(renderFn, unmountFn) {
    checkRendering(renderFn, withUsage());
    return function () {
        var widgetParams = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : {};
        var _widgetParams$enableR = widgetParams.enableRefineOnMapMove,
            enableRefineOnMapMove = _widgetParams$enableR === void 0 ? true : _widgetParams$enableR,
            _widgetParams$transfo = widgetParams.transformItems,
            transformItems = _widgetParams$transfo === void 0 ? function (items) {
                return items;
            } : _widgetParams$transfo; // Always trigger this message because the default value was `true`. We can't
        // display the message only when the parameter is defined otherwise a user that was
        // relying on the default value won't have any information about the changes.

        warning(false, "\nThe option `enableGeolocationWithIP` has been removed from the GeoSearch widget.\nPlease consider using the `Configure` widget instead:\n\nsearch.addWidget(\n  configure({\n    aroundLatLngViaIP: ".concat(widgetParams.enableGeolocationWithIP || 'true', ",\n  })\n);\n\nYou can find more information inside the migration guide:\nhttp://community.algolia.com/instantsearch.js/migration-guide\n        "));
        warning(typeof widgetParams.position === 'undefined', "\nThe option `position` has been removed from the GeoSearch widget.\nPlease consider using the `Configure` widget instead:\n\nsearch.addWidget(\n  configure({\n    aroundLatLng: '".concat(widgetParams.position && widgetParams.position.lat, ", ").concat(widgetParams.position && widgetParams.position.lng, "',\n  })\n);\n\nYou can find more information inside the migration guide:\nhttp://community.algolia.com/instantsearch.js/migration-guide\n      "));
        warning(typeof widgetParams.radius === 'undefined', "\nThe option `radius` has been removed from the GeoSearch widget.\nPlease consider using the `Configure` widget instead:\n\nsearch.addWidget(\n  configure({\n    aroundRadius: ".concat(widgetParams.radius, ",\n  })\n);\n\nYou can find more information inside the migration guide:\n\nhttp://community.algolia.com/instantsearch.js/migration-guide\n      "));
        warning(typeof widgetParams.precision === 'undefined', "\nThe option `precision` has been removed from the GeoSearch widget.\nPlease consider using the `Configure` widget instead:\n\nsearch.addWidget(\n  configure({\n    aroundPrecision: ".concat(widgetParams.precision, ",\n  })\n);\n\nYou can find more information inside the migration guide:\n\nhttp://community.algolia.com/instantsearch.js/migration-guide\n      "));
        var widgetState = {
            isRefineOnMapMove: enableRefineOnMapMove,
            hasMapMoveSinceLastRefine: false,
            lastRefinePosition: '',
            lastRefineBoundingBox: '',
            internalToggleRefineOnMapMove: noop,
            internalSetMapMoveSinceLastRefine: noop
        };

        var getPositionFromState = function getPositionFromState(state) {
            return state.aroundLatLng && aroundLatLngToPosition(state.aroundLatLng);
        };

        var getCurrentRefinementFromState = function getCurrentRefinementFromState(state) {
            return state.insideBoundingBox && insideBoundingBoxToBoundingBox(state.insideBoundingBox);
        };

        var refine = function refine(helper) {
            return function (_ref) {
                //   var boundingBox
                // _.each(_ref, () => {
                //   var ne = _ref.northEast,
                //       sw = _ref.southWest;
                //   var boundingBox = [ne.lat, ne.lng, sw.lat, sw.lng].join();
                // })

                helper.setQueryParameter('insideBoundingBox', _ref.join()).search();
                widgetState.hasMapMoveSinceLastRefine = false;
                //widgetState.lastRefineBoundingBox = boundingBox;
            };
        };

        var clearMapRefinement = function clearMapRefinement(helper) {
            return function () {
                helper.setQueryParameter('insideBoundingBox').search();
            };
        };

        var isRefinedWithMap = function isRefinedWithMap(state) {
            return function () {
                return Boolean(state.insideBoundingBox);
            };
        };

        var toggleRefineOnMapMove = function toggleRefineOnMapMove() {
            return widgetState.internalToggleRefineOnMapMove();
        };

        var createInternalToggleRefinementOnMapMove = function createInternalToggleRefinementOnMapMove(render, args) {
            return function () {
                widgetState.isRefineOnMapMove = !widgetState.isRefineOnMapMove;
                render(args);
            };
        };

        var isRefineOnMapMove = function isRefineOnMapMove() {
            return widgetState.isRefineOnMapMove;
        };

        var setMapMoveSinceLastRefine = function setMapMoveSinceLastRefine() {
            return widgetState.internalSetMapMoveSinceLastRefine();
        };

        var createInternalSetMapMoveSinceLastRefine = function createInternalSetMapMoveSinceLastRefine(render, args) {
            return function () {
                var shouldTriggerRender = widgetState.hasMapMoveSinceLastRefine !== true;
                widgetState.hasMapMoveSinceLastRefine = true;

                if (shouldTriggerRender) {
                    render(args);
                }
            };
        };

        var hasMapMoveSinceLastRefine = function hasMapMoveSinceLastRefine() {
            return widgetState.hasMapMoveSinceLastRefine;
        };

        var init = function init(initArgs) {
            var state = initArgs.state,
                helper = initArgs.helper,
                instantSearchInstance = initArgs.instantSearchInstance;
            var isFirstRendering = true;
            widgetState.internalToggleRefineOnMapMove = createInternalToggleRefinementOnMapMove(noop, initArgs);
            widgetState.internalSetMapMoveSinceLastRefine = createInternalSetMapMoveSinceLastRefine(noop, initArgs);
            renderFn({
                items: [],
                position: getPositionFromState(state),
                currentRefinement: getCurrentRefinementFromState(state),
                refine: refine(helper),
                clearMapRefinement: clearMapRefinement(helper),
                isRefinedWithMap: isRefinedWithMap(state),
                toggleRefineOnMapMove: toggleRefineOnMapMove,
                isRefineOnMapMove: isRefineOnMapMove,
                setMapMoveSinceLastRefine: setMapMoveSinceLastRefine,
                hasMapMoveSinceLastRefine: hasMapMoveSinceLastRefine,
                widgetParams: widgetParams,
                instantSearchInstance: instantSearchInstance
            }, isFirstRendering);
        };

        var render = function render(renderArgs) {
            var results = renderArgs.results,
                helper = renderArgs.helper,
                instantSearchInstance = renderArgs.instantSearchInstance;
            var isFirstRendering = false; // We don't use the state provided by the render function because we need
            // to be sure that the state is the latest one for the following condition

            var state = helper.getState();
            var positionChangedSinceLastRefine = Boolean(state.aroundLatLng) && Boolean(widgetState.lastRefinePosition) && state.aroundLatLng !== widgetState.lastRefinePosition;
            var boundingBoxChangedSinceLastRefine = !state.insideBoundingBox && Boolean(widgetState.lastRefineBoundingBox) && state.insideBoundingBox !== widgetState.lastRefineBoundingBox;

            if (positionChangedSinceLastRefine || boundingBoxChangedSinceLastRefine) {
                widgetState.hasMapMoveSinceLastRefine = false;
            }

            widgetState.lastRefinePosition = state.aroundLatLng || '';
            widgetState.lastRefineBoundingBox = state.insideBoundingBox || '';
            widgetState.internalToggleRefineOnMapMove = createInternalToggleRefinementOnMapMove(render, renderArgs);
            widgetState.internalSetMapMoveSinceLastRefine = createInternalSetMapMoveSinceLastRefine(render, renderArgs);
            var items = transformItems(results.hits.filter(function (hit) {
                return hit._geoloc;
            }));
            renderFn({
                items: items,
                position: getPositionFromState(state),
                currentRefinement: getCurrentRefinementFromState(state),
                refine: refine(helper),
                clearMapRefinement: clearMapRefinement(helper),
                isRefinedWithMap: isRefinedWithMap(state),
                toggleRefineOnMapMove: toggleRefineOnMapMove,
                isRefineOnMapMove: isRefineOnMapMove,
                setMapMoveSinceLastRefine: setMapMoveSinceLastRefine,
                hasMapMoveSinceLastRefine: hasMapMoveSinceLastRefine,
                widgetParams: widgetParams,
                instantSearchInstance: instantSearchInstance
            }, isFirstRendering);
        };

        return {
            init: init,
            render: render,
            dispose: function dispose(_ref2) {
                var state = _ref2.state;
                unmountFn();
                return state.setQueryParameter('insideBoundingBox');
            },
            getWidgetState: function getWidgetState(uiState, _ref3) {
                var searchParameters = _ref3.searchParameters;
                var boundingBox = searchParameters.insideBoundingBox;

                if (!boundingBox || uiState && uiState.geoSearch && uiState.geoSearch.boundingBox === boundingBox) {
                    return uiState;
                }

                return _objectSpread({}, uiState, {
                    geoSearch: {
                        boundingBox: boundingBox
                    }
                });
            },
            getWidgetSearchParameters: function getWidgetSearchParameters(searchParameters, _ref4) {
                var uiState = _ref4.uiState;

                if (!uiState || !uiState.geoSearch) {
                    return searchParameters.setQueryParameter('insideBoundingBox');
                }

                return searchParameters.setQueryParameter('insideBoundingBox', uiState.geoSearch.boundingBox);
            }
        };
    };
};

export default connectSharedSpaceSearch;
