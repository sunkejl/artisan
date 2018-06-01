<?php
	/* configuration settings */
	$max_photo_size = 50000;
	$upload_required = true;
	$upload_page = 'index.php';
	$upload_dir = '/home/httpd/html/crap/0x-examples/fileupl/';

	$err_msg = false;
	do {
		/* Does the file field even exist? */
		if (!isset ($_FILES['book_image'])) {
			$err_msg = 'The form was not send in completely.';
			break;
		} else {
			$book_image = $_FILES['book_image'];
		}

		/* We check for all possible error codes wemight get */
		switch ($book_image['error']) {
			case UPLOAD_ERR_INI_SIZE:
				$err_msg = "The size of the image is too large, it can not be more than $max_photo_size bytes.";
				break 2;
			case UPLOAD_ERR_PARTIAL:
				$err_msg = "An error ocurred while uploading the file, please <a href='{$upload_page}'>try again</a>.";
				break 2;
			case UPLOAD_ERR_NO_FILE:
				if ($upload_required) {
					$err_msg = "You did not select a file to be uploaded, please do so <a href='{$upload_page}'>here</a>.";
					break 2;
				}
				break 2;
			case UPLOAD_ERR_OK:
			case UPLOAD_ERR_FORM_SIZE:
				if ($book_image['size'] > $max_photo_size) {
					$err_msg = "The size of the image is too large, it can not be more than $max_photo_size bytes.";
				}
				break 2;
			default:
				$err_msg = "An unknown error occurred, please try again <a href='{$upload_page}'>here</a>.";
		}

		/* Know we check for the mime type to be correct, we allow JPEG and PNG images */
		if (!in_array($book_image['type'], array ('image/jpeg', 'image/pjpeg', 'image/png'))) {
			$err_msg = "You need to upload a PNG or JPEG image, please do so <a href='{$upload_page}'>here</a>.";
			break;
		}
		
	} while (0);

	/* If no error occurred we move the file to our upload directory */
	if (!$err_msg) {
		if (!@move_uploaded_file($book_image['tmp_name'], $upload_dir . $book_image['name'])) {
			$err_msg = "Error moving the file to it's destination, please try again <a href='{$upload_page}'>here</a>.";
		}
	}
?>
<html>
<head><title>Upload handler</title>
<body>
<?php
	if ($err_msg) {
		var_dump($_FILES);
		echo $err_msg;
	} else {
?>
<img src='<?php echo $book_image['name']; ?>'/>
<?php
	}
?>
</body>
</html>
