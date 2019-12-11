/*
 * resizable tests
 */
(function($) {
//
// Resizable Test Helper Functions
//

var defaults = {
	animate: false,
	animateDuration: 'slow',
	animateEasing: 'swing',
	alsoResize: false,
	aspectRatio: false,
	autoHide: false,
	cancel: ':input',
	containment: false,
	delay: 0,
	disabled: false,
	disableSelection: true,
	distance: 1,
	ghost: false,
	grid: false,
	handles: '???',
	helper: null,
	knobHandles: false,
	maxHeight: null,
	maxWidth: null,
	minHeight: 10,
	minWidth: 10,
	preserveCursor: true,
	preventDefault: true,
	proportionallyResize: false,
	transparent: false
};

var drag = function(el, dx, dy, complete) {

	// speed = sync -> Drag syncrhonously.
	// speed = fast|slow -> Drag asyncrhonously - animated.

	//this mouseover is to work around a limitation in resizable
	//TODO: fix resizable so handle doesn't require mouseover in order to be used
	$(el).simulate("mouseover");

	return $(el).simulate("drag", {
		dx: dx||0, dy: dy||0, speed: 'sync', complete: complete 
	});
};

// Resizable Tests
module("resizable");

test("init", function() {
	expect(6);

	$("<div></div>").appendTo('body').resizable().remove();
	ok(true, '.resizable() called on element');

	$([]).resizable().remove();
	ok(true, '.resizable() called on empty collection');

	$('<div></div>').resizable().remove();
	ok(true, '.resizable() called on disconnected DOMElement');

	$('<div></div>').resizable().resizable("foo").remove();
	ok(true, 'arbitrary method called after init');

	el = $('<div></div>').resizable()
	var foo = el.data("foo.resizable");
	el.remove();
	ok(true, 'arbitrary option getter after init');

	$('<div></div>').resizable().data("foo.resizable", "bar").remove();
	ok(true, 'arbitrary option setter after init');
});

test("destroy", function() {
	expect(6);

	$("<div></div>").appendTo('body').resizable().resizable("destroy").remove();
	ok(true, '.resizable("destroy") called on element');

	$([]).resizable().resizable("destroy").remove();
	ok(true, '.resizable("destroy") called on empty collection');

	$('<div></div>').resizable().resizable("destroy").remove();
	ok(true, '.resizable("destroy") called on disconnected DOMElement');

	$('<div></div>').resizable().resizable("destroy").resizable("foo").remove();
	ok(true, 'arbitrary method called after destroy');

	el = $('<div></div>').resizable();
	var foo = el.resizable("destroy").data("foo.resizable");
	el.remove();
	ok(true, 'arbitrary option getter after destroy');

	$('<div></div>').resizable().resizable("destroy").data("foo.resizable", "bar").remove();
	ok(true, 'arbitrary option setter after destroy');
});

test("element types", function() {
	var typeNames = ('p,h1,h2,h3,h4,h5,h6,blockquote,ol,ul,dl,div,form'
		+ ',table,fieldset,address,ins,del,em,strong,q,cite,dfn,abbr'
		+ ',acronym,code,samp,kbd,var,img,object,hr'
		+ ',input,button,label,select,iframe').split(',');

	$.each(typeNames, function(i) {
		var typeName = typeNames[i];
		el = $(document.createElement(typeName)).appendTo('body');
		(typeName == 'table' && el.append("<tr><td>content</td></tr>"));
		el.resizable();
		ok(true, '$("&lt;' + typeName + '/&gt").resizable()');
		el.resizable("destroy");
		el.remove();
	});
});

test("defaults", function() {
	el = $('<div></div>').resizable();
	$.each(defaults, function(key, val) {
		var actual = el.data(key + ".resizable"), expected = val;
		same(actual, expected, key);
	});
	el.remove();
});

test("n", function() {
	expect(2);

	var handle = '.ui-resizable-n', target = $('#resizable1').resizable({ handles: 'all' });

	drag(handle, 0, -50);
	equals( target.height(), 150, "compare height" );

	drag(handle, 0, 50);
	equals( target.height(), 100, "compare height" );
});

test("s", function() {
	expect(2);

	var handle = '.ui-resizable-s', target = $('#resizable1').resizable({ handles: 'all' });

	drag(handle, 0, 50);
	equals( target.height(), 150, "compare height" );

	drag(handle, 0, -50);
	equals( target.height(), 100, "compare he