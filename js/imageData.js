// THIS FILE DEALS WITH PULLING IN THE JSON IMAGE DATA AND ADDING THE IMAGES AND ASSOCIATED INFO TO THE GALLERY SECTION  OF THE HTML PAGE
//*******************************************************************************************************************************************


// detect the device dimensions for handling the modal activation later
var $height = $(window).height();
var $width = $(window).width();

// message to add later to image overlays on larger screens, to instruct user - this is where modal window is enabled
var $clickMessage = '<p class="clickMore" style="color: #fec503; font-weight: 700">Click for more!</p>';


// variable to hold images array
var imagesData = [];


// *****pull in the images data from the JSON file and add to the html body*****
    
    // 1. the $.getJSON method brings in the data from images.json
    // 2. the loop will iterate through the imagesData array and add the html to the page
    // 3. note that the loop is INSIDE the getJSON function so that imagesData contains the JSON array BEFORE the loop executes

$.getJSON("https://d2az2bru0fnvca.cloudfront.net/images.json", function(data){
    imagesData = data;
    for(var i=0; i < imagesData.length; i++) {

// HTML template for image and info overlay,  to be added to the page with data returned from loop
        var $imageOverlay =
            '<div class="col-md-4 col-0-gutter">\n' +
            '<div class="ot-portfolio-item">\n' +
            '<figure class="effect-border">\n' +
            '<img src="' + imagesData[i].paintingURL + '" class="img-responsive" />\n' +
            '<figcaption>\n' +
            '<h2 class="paintingTitle">' + imagesData[i].paintingTitle + '</h2>\n' +
            '<p class="paintingDetail">' + imagesData[i].paintingMedia + ', ' +
            imagesData[i].paintingType + ', ' +
            imagesData[i].paintingSize + '</p>\n' +
            '<a href="#" data-toggle="modal" data-target="#Modal-' + i + '"></a>\n' +
            '</figcaption>\n' +
            '</figure>\n' +
            '</div>\n' +
            '</div>\n';



// HTML Template for main image content and modal pop-up for each painting

        var $content = '<div class="modal fade" id="Modal-' + i + '" tabindex="-1" role="dialog" aria-labelledby="Modal-label-' + i + '">\n' +
            '<div class="modal-dialog" role="document">\n' +
            '<div class="modal-content">\n' +
            '<div class="modal-header">\n' +
            '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>\n' +
            '<h4 class="modal-title" id="Modal-label-' + i + '">' + imagesData[i].paintingTitle + '</h4>\n' +
            '</div>\n' +
            '<div class="modal-body">\n' +
            '<img src="' + imagesData[i].lg_paintingURL + '" alt="' + imagesData[i].paintingTitle + '" class="img-responsive" />\n' +
            '<div class="modal-works"><span>' + imagesData[i].paintingMedia + '</span><span>' + imagesData[i].paintingType +
            '</span><span>' + imagesData[i].paintingSize + '</span></div>\n' +
            '<p>' + imagesData[i].paintingComments+ '</p>\n' +
            '</div>\n' +
            '<div class="modal-footer">\n' +
            '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>\n' +
            '</div>\n' +
            '</div>\n' +
            '</div>\n' +
            '</div>';


//Append the generated HTML to the page



        $('.img-place').append($imageOverlay);

        // modal window enabled if screen sizes above 800
        if($height > 700 && $width > 760) {
            $('body').append($content);
        }
    }

    if($height > 700 && $width > 760) {
        $('.paintingDetail').append($clickMessage);
    }


});





