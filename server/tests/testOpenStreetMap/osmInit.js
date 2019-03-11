
var zoom = 4;
var lon = 11.08;
var lat = 49.45;
var map;
OpenLayers.Protocol.HTTPex = new OpenLayers.Class(OpenLayers.Protocol.HTTP, {
    read: function (options) {
        OpenLayers.Protocol.prototype.read.apply(this, arguments);
        options = OpenLayers.Util.applyDefaults(options, this.options);
        options.params = OpenLayers.Util.applyDefaults(
                options.params, this.options.params);
        options.params.resolution = map.getResolution();
        options.params.zoom = map.getZoom();
        if (options.filter) {
            options.params = this.filterToParams(
                    options.filter, options.params);
        }
        var readWithPOST = (options.readWithPOST !== undefined) ?
                options.readWithPOST : this.readWithPOST;
        var resp = new OpenLayers.Protocol.Response({requestType: "read"});
        if (readWithPOST) {
            resp.priv = OpenLayers.Request.POST({
                url: options.url,
                callback: this.createCallback(this.handleRead, resp, options),
                data: OpenLayers.Util.getParameterString(options.params),
                headers: {"Content-Type": "application/x-www-form-urlencoded"}
            });
        } else {
            resp.priv = OpenLayers.Request.GET({
                url: options.url,
                callback: this.createCallback(this.handleRead, resp, options),
                params: options.params,
                headers: options.headers
            });
        }
        return resp;
    },
    CLASS_NAME: "OpenLayers.Protocol.HTTPex"
});
function init() {
    var args = OpenLayers.Util.getParameters();
    map = new OpenLayers.Map("map", {
        controls: [
            new OpenLayers.Control.Navigation(),
            new OpenLayers.Control.PanZoomBar(),
            new OpenLayers.Control.LayerSwitcher(),
            new OpenLayers.Control.Permalink(),
            new OpenLayers.Control.ScaleLine(),
            new OpenLayers.Control.Permalink('permalink'),
            new OpenLayers.Control.MousePosition(),
                    /*new OpenLayers.Control.Attribution()*/],
        maxExtent: new OpenLayers.Bounds(-20037508.34, -20037508.34, 20037508.34, 20037508.34),
        maxResolution: 156543.0399,
        numZoomLevels: 17,
        units: 'm',
        projection: new OpenLayers.Projection("EPSG:900913"),
        displayProjection: new OpenLayers.Projection("EPSG:4326")
    });
    map.addLayer(new OpenLayers.Layer.OSM.Mapnik("Map",
            {maxZoomLevel: 17, numZoomLevels: 18}));
    map.addLayer(new OpenLayers.Layer.OSM.Mapnik("Map, pale",
            {maxZoomLevel: 17, numZoomLevels: 18, opacity: 0.5}));
    map.addLayer(new OpenLayers.Layer.OSM.CycleMap("Cycle map",
            {maxZoomLevel: 17, numZoomLevels: 18}));
    map.addLayer(new OpenLayers.Layer.OSM.CycleMap("Cycle map, pale",
            {maxZoomLevel: 17, numZoomLevels: 18, opacity: 0.5}));
    map.addLayer(new OpenLayers.Layer.OSM("No Background", "blank.gif",
            {maxZoomLevel: 17, numZoomLevels: 18}));
    map.addLayer(new OpenLayers.Layer.OSM("Public transport lines", "tiles/${z}/${x}/${y}.png",
            {maxZoomLevel: 17, numZoomLevels: 18, alpha: true, isBaseLayer: false}));
    if (!map.getCenter()) {
        var lonLat = new OpenLayers.LonLat(lon, lat).transform(new OpenLayers.Projection("EPSG:4326"),
                map.getProjectionObject());
        map.setCenter(lonLat, zoom);
    }
}