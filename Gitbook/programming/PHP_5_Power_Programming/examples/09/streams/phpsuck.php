#!/usr/local/bin/php
<?php

/* Check for arguments */
if ($argc < 2) {
    echo "Usage:\nphpsuck.php url [max kb/sec]\n\n";
    exit(-1);
}

/* Url to fetch */
$url = $argv[1];

/* Bandwidth limiting */
if ($argc == 3) {
    $max_kb_sec = $argv[2];
} else {
    $max_kb_sec = 1000;
}


/* Cursor to column 1 for xterms */
$term_sol = "\x1b[1G";
$severity_map = array (
    0 => 'info   ',
    1 => 'warning',
    2 => 'error  '
);

/* Callback function for stream events */
function notifier($code, $severity, $msg, $xcode, $sofar, $max)
{
    global $term_sol, $severity_map, $max_kb_sec, $size;

    /* Do not print status message prefix when the PROGRESS
     * event is received. */
    if ($code != STREAM_NOTIFY_PROGRESS) {
        echo $severity_map[$severity]. ": ";
    }

    switch ($code) {
        case STREAM_NOTIFY_CONNECT:
            printf("Connected\n");
            /* Set begin time for kb/sec calculation */
            $GLOBALS['begin_time'] = time() - 0.001;
            break;

        case STREAM_NOTIFY_AUTH_REQUIRED:
            printf("Authentication required: %s\n", trim($msg));
            break;

        case STREAM_NOTIFY_AUTH_RESULT:
            printf("Logged in: %s\n", trim($msg));
            break;

        case STREAM_NOTIFY_MIME_TYPE_IS:
            printf("Mime type: %s\n", $msg);
            break;

        case STREAM_NOTIFY_FILE_SIZE_IS:
            printf("Downloading %d kb\n", $max / 1024);
            /* Set the global size variable */
            $size = $max;
            break;

        case STREAM_NOTIFY_REDIRECTED:
            printf("Redirecting to %s...\n", $msg);
            break;

        case STREAM_NOTIFY_PROGRESS:
            /* Calculate the number of stars and stripes */
            if ($size) {
                $stars = str_repeat ('*', $c = $sofar * 50 / $size);
            } else {
                $stars = '';
            }
            $stripe = str_repeat ('-', 50 - strlen($stars));

            /* Calculate download speed in kb/sec */
            $kb_sec = ($sofar / (time() - $GLOBALS['begin_time'])) / 1024;

            /* Pause the script if we are above the maximum suck speed */
            while ($kb_sec > $max_kb_sec) {
                usleep(1);
                $kb_sec = ($sofar / (time() - $GLOBALS['begin_time'])) / 1024;
            }

            /* Display the progress bar */
            printf("{$term_sol}[%s] %d kb %.1f kb/sec",
                $stars.$stripe, $sofar / 1024, $kb_sec);
            break;

        case STREAM_NOTIFY_FAILURE:
            printf("Failure: %s\n", $msg);
            break;
    }
}

/* Determine filename to save too */
$url_data = parse_url($argv[1]);
$file = basename($url_data['path']);
if (empty($file)) {
    $file = "index.html";
}
printf ("Saving to $file.gz\n");
$fil = "compress.zlib://$file.gz";

/* Create context and set the notifier callback */
$context = stream_context_create();
stream_context_set_params($context, array ("notification" => "notifier"));

/* Open the target URL */
$fp = fopen($url, "rb", false, $context);
if (is_resource($fp)) {
    /* Open the local file */
    $fs = fopen($fil, "wb9", false, $context);
    if (is_resource($fs)) {
        /* Read data from URL in blocks of 1024 bytes */
        while (!feof($fp)) {
            $data = fgets($fp, 1024);
            fwrite($fs, $data);
        }
        /* Close local file */
        fclose($fs);
    }
    /* Close remote file */
    fclose($fp);

    /* Display download information */
    printf("{$term_sol}[%s] Download time: %ds\n",
        str_repeat('*', 50), time() - $GLOBALS['begin_time']);
}
?>
