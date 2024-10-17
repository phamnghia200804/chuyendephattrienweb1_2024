<?php
$url_host = 'http://' . $_SERVER['HTTP_HOST'];
$pattern_document_root = addcslashes(realpath($_SERVER['DOCUMENT_ROOT']), '\\');
$pattern_uri = '/' . $pattern_document_root . '(.*)$/';

preg_match_all($pattern_uri, __DIR__, $matches);
$url_path = $url_host . $matches[1][0];
$url_path = str_replace('\\', '/', $url_path);

if (!class_exists('lessc')) {
    $dir_block = dirname($_SERVER['SCRIPT_FILENAME']);
    require_once($dir_block . '/libs/lessc.inc.php');
}
$less = new lessc;
$less->compileFile('less/3027.less', 'css/3027.css');
?>
<html>
<head>
    <title>Make An Appointment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="<?php echo $url_path ?>/css/3027.css" rel="stylesheet" type="text/css"/>
</head>

<body>
    <div class="container">
        <div class="appointment-form">
            <h2>Make An Appointment</h2>
            <form>
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="Name*" required>
                    </div>
                    <div class="col-md-6">
                        <input type="email" class="form-control" placeholder="Email*" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="Phone*" required>
                    </div>
                    <div class="col-md-6">
                        <input type="date" class="form-control" placeholder="Date" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Time" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <select class="form-control custom-select" required>
                            <option value="" disabled selected>Select Service</option>
                            <option value="service1">Select Service One</option>
                            <option value="service2">Select Service Two</option>
                            <option value="service3">Select Service Three</option>
                        </select>
                    </div>                    
                </div>
                <div class="row">
                    <div class="col-12">
                        <textarea class="form-control message-textarea" rows="4" placeholder="Message..."></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-right">
                        <button type="submit" class="btn btn-primary mt-3">SEND NOW</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>