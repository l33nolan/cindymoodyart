# cindymoodyart

Thanks for checking out my code! This readme explains some of the approaches I have used in this site if you are interested.

This is a simple but effective, fully responsive website built for an artist. It uses Bootstrap's grid system for the basic 
layout, an approach that I like to take due to it's flexibility for responsive design (which may change now that we have 
CSS Grid!). 

The CSS is all written from scratch, as I prefer to use Bootstrap just for layout. I have used SASS as a preprocessor, using
features like nesting, variables and partials to make the code more modular and organised. My favourite CSS feature on this 
site is the detail overlays on each painting with the animated borders, which was done using CSS transitions/transforms and 
JavaScript to handle different events on different devices (due to the problems the CSS :hover pseudoclass has on mobile). 

The 'imageData.js' file handles the image gallery - instead of hard coding the images as divs in the HTML, I opted to set up a 
JSON file with an object representing each painting and it's properties (URL, title, canvas size etc.). I then parse the JSON
with some jQuery AJAX methods and loop through each object, building the HTML to output to the page. This means that when the 
artist sends me a new painting to add, I simply add it to the JSON file. This file also handles the launch of a 'more details'
modal window on larger screens, and modifies the overlay details dependent on wether the modal window is available.

The site also features a floating 'back to top' button when the site is scrolled, this is handled by the 'theme-scripts.js' 
file. The smooth scrolling effect is handled by a jQuery plugin by Balazs Galambosi and Michael Herf called 'SmoothScroll.js'
which adds really nice effect.

Back-end-wise, there is just a simple PHP form, processed by the SendGrid API, a free plugin available to use which manages
form collection data and email marketing campaigns etc. if you're into that sort of stuff.

This site was built in JetBrains PHPStorm, deployed on Heroku, and uses Amazon S3 for asset storage, and Amazon Cloudfront for
CDN distribution. I have also used Composer to manage PHP dependencies. 

