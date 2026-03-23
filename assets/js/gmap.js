
var map = null;
var infowindow = new google.maps.InfoWindow();
var gmarkers = [];
var i = 0;

function initialize() {

//マップの中心座標
var myLatLng = new google.maps.LatLng(35.641928, 136.058518);

//マップの設定オプション
var myOptions = {
	zoom: 13,
	center: myLatLng,
	disableDefaultUI: true,
	disableDoubleClickZoom: false,
	mapTypeControl: true,
	scrollwheel: false,
	draggable: true,
	zoomControl: true,
	zoomControlOptions: {
		style: google.maps.ZoomControlStyle.DEFAULT,
		position: google.maps.ControlPosition.LEFT_BOTTOM
	},
	mapTypeId: google.maps.MapTypeId.ROADMAP,
	mapTypeControlOptions: {
		mapTypeIds: [
			google.maps.MapTypeId.ROADMAP
			]
		}
	};

//マップの表示ID
map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
google.maps.event.addListener(map, "click", function() {infowindow.close();});


	// ポイントの追加
	var point = new google.maps.LatLng(35.6356123,136.0687228);
	var marker = create_maker(point, "<div style='padding: 10px;text-align: center;font-size: 12px;'><p style='margin-bottom: .5em;'><strong style='display: block;font-weight: bold;font-size: 13px;'>ながそ教室</strong>福井県敦賀市長沢31-6</p><p><a href='https://goo.gl/maps/ezL3rty2a1H2' targt='_blank' style='text-decoration: none;font-size: 12px;color: #000;display: inline-block;padding: 0 1.5em .5em 1.5em;color: #C53727;border-bottom:1px dotted #C53727;'>GoogleMapで見る</a></p></div>");

	var point = new google.maps.LatLng(35.6464442,136.0494165);
	var marker = create_maker(point, "<div style='padding: 10px;text-align: center;font-size: 12px;'><p style='margin-bottom: .5em;'><strong style='display: block;font-weight: bold;font-size: 13px;'>へいわちょう教室</strong>福井県敦賀市平和町12-14</p><p><a href='https://goo.gl/maps/ezL3rty2a1H2' targt='_blank' style='text-decoration: none;font-size: 12px;color: #000;display: inline-block;padding: 0 1.5em .5em 1.5em;color: #C53727;border-bottom:1px dotted #C53727;'>GoogleMapで見る</a></p></div>");

	var point = new google.maps.LatLng(35.6343759,136.0483142);
	var marker = create_maker(point, "<div style='padding: 10px;text-align: center;font-size: 12px;'><p style='margin-bottom: .5em;'><strong style='display: block;font-weight: bold;font-size: 13px;'>ハーツ教室</strong>福井県敦賀市若葉町1-1610ハーツつるが内オアシス</p><p><a href='https://goo.gl/maps/ezL3rty2a1H2' targt='_blank' style='text-decoration: none;font-size: 12px;color: #000;display: inline-block;padding: 0 1.5em .5em 1.5em;color: #C53727;border-bottom:1px dotted #C53727;'>GoogleMapで見る</a></p></div>");

function create_maker(latlng, html) {
	// マーカーを生成
	var marker = new google.maps.Marker({position: latlng, map: map});
	// マーカーをクリックした時の処理
	google.maps.event.addListener(marker, "click", function() {
		infowindow.setContent(html);
		infowindow.open(map, marker);
	});
	gmarkers[i] = marker;
	i++;
	return marker;
}

function map_click(i) {
	google.maps.event.trigger(gmarkers[i], "click");
}

//教室ページ用

var latlng = new google.maps.LatLng(35.6464442, 136.0687228);
var myOptions = {
    zoom: 15,
    center: latlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
};
var map_01 = new google.maps.Map(
    document.getElementById("map_canvas_01"),
    myOptions
);
var sc_marker = new google.maps.Marker({
    position: latlng,
    map: map_01
});


var latlng = new google.maps.LatLng(35.6464442,136.0494165);
var myOptions = {
    zoom: 15,
    center: latlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
};
var map_02 = new google.maps.Map(
    document.getElementById("map_canvas_02"),
    myOptions
);
var sc_marker = new google.maps.Marker({
    position: latlng,
    map: map_02
});


var latlng = new google.maps.LatLng(35.6343759, 136.0483142);
var myOptions = {
    zoom: 12,
    center: latlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
};
var map_03 = new google.maps.Map(
    document.getElementById("map_canvas_03"),
    myOptions
);
var sc_marker = new google.maps.Marker({
    position: latlng,
    map: map_03
});

}
