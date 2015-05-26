# carre-image-php
resize image square php

Here is a small function in php to convert an image of any size in square format.
I use this function for my site recettesoriginales.fr. 
Users can attach an image to their recipe.
My example is valid for files .jepg but obviously it can be adapted 
to other formats (gif, png and all forms of JPEG).
the function function images_resize_carre ($ src, $ dest, $ square) {};
indicates good are role.
The picture when charged, is transformed into the square by square $ parameter set.
I chose to focus the default image. This implies that when the image is loaded, 
it will crop by centering the image. 
This is obviously a principle but it would be easy to create 
if needed another way to crop the image.

