<?php

  include_once("functions.php");

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Panorámy! - [tekk]</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bbox.css" />
        <link rel="stylesheet" href="css/grid-gallery.css">
        <link rel="stylesheet" href="css/tekk.css">
        <link rel="stylesheet" href="css/text.css">
        <script src="js/jquery.min.js"></script>
    </head>
    <body>        
        <section class="gallery-block grid-gallery">
            <div class="container">
                <h1>PANORÁMY</h1>
                <!-- <div class="row text-center mx-auto d-block">
                        <small>🠜🠟🠝🠞</small>
                </div> -->
				<div class="row">
				   <?php
                        $files = glob('uploads/*.{JPG,jpg}', GLOB_BRACE);
                        
						foreach($files as $file) {

                            if (!is_file(str_replace("uploads/", "uploads/thumb/", $file)))
                            {
                                try {
                                    generateThumbnail($file, 350, 180, 78);
                                }
                                catch (ImagickException $e) {
                                    echo $e->getMessage();
                                }
                                catch (Exception $e) {
                                    echo $e->getMessage();
                                }
                            }
					?>

                    <div class="col-md-6 col-lg-4 item">
                        <a target="_blank" class="lightbox img-rounded" href="view.php?i=<?= base64_encode($file) ?>">
                            <img class="img-fluid img-rounded img-thumbnail image scale-on-hover" src="<?= str_replace("uploads/", "uploads/thumb/", $file) ?>">
                        </a>
                    </div>

				   <?php
						}
					?>

				</div>
            </div>
        </section>
        <script src="js/text.js"></script>
        <script src="js/bbox.js"></script>
        <script>
            baguetteBox.run('.grid-gallery', { animation: 'slideIn'});
        </script>
    </body>
</html>
