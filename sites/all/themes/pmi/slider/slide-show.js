// JavaScript Document
$(document).ready(function() {
    var currentPosition = 0;
    var slideWidth = 980;
    var slideHeight = 341;
    var slides = $('.slide');
    var numberOfSlides = slides.length;

    // Remove scrollbar in JS
    $('#slidesContainer').css('overflow', 'hidden');

    // Wrap all .slides with #slideInner div
    slides
    .wrapAll('<div id="slideInner"></div>')
    // Float left to display horizontally, readjust .slides width
    .css({
        'float': 'left',
        'width': slideWidth
    });

    // Set #slideInner width equal to total width of all slides
    $('#slideInner').css('height', slideHeight * numberOfSlides);
    // Insert controls in the DOM
    $('#slideshow')
    //.prepend('<span class="control" id="leftControl">Clicking moves left</span>')
    .append('<span class="control" id="leftControl">Clicking moves left</span>')
    .append('<span class="control" id="rightControl">Clicking moves right</span>');
    //	.slideUp('<span class="control" id="leftControl">Clicking moves left</span>')
    //  .slideDown('<span class="control" id="rightControl">Clicking moves right</span>');
    //	Hide left arrow control on first load
    manageControls(currentPosition);

    // Create event listeners for .controls clicks
    $('.control')
    .bind('click',
    function() {

        //alert("dsdsad");
        // $('#slideshow').slideUp('<span class="control" id="leftControl">Clicking moves left</span>');
        // Determine new position
        currentPosition = ($(this).attr('id') == 'rightControl') ? currentPosition + 1: currentPosition - 1;

        // Hide / show controls
        manageControls(currentPosition);
        // Move slideInner using margin-left
        $('#slideInner').animate({
            'marginTop': slideHeight * ( - currentPosition)
        }, 1600);
    });

    //starts automatically
    var loop = 0;
    function rotate()
    {
        setTimeout(function() {
            $('#rightControl').click();
            loop++;
            if (loop < numberOfSlides - 1) rotate();
        }
        ,
        5000);
    }
    rotate();



    // manageControls: Hides and Shows controls depending on currentPosition
    function manageControls(position) {
        // Hide left arrow if position is first slide
        //if(position==0){ $('#leftControl').hide() } else{ $('#leftControl').show() }
        if (position == 0) {
            $('#leftControl').hide()
        } else {
            $('#leftControl').show()
        }

        // Hide right arrow if position is last slide.
        //if(position==numberOfSlides-1){ $('#rightControl').hide() } else{ $('#rightControl').show() }
        if (position == numberOfSlides - 1) {
            $('#rightControl').hide()
        } else {
            $('#rightControl').show()
        }

    }


});
