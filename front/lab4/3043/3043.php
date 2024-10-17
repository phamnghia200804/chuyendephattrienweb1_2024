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
$less->compileFile('less/3043.less', 'css/3043.css');
?>
<html>
 <head>
  <title>
   Repair World News
  </title>
  <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" rel="stylesheet"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="<?php echo $url_path ?>/css/3043.css" rel="stylesheet" type="text/css"/>

 </head>
 <body>
  <div class="container">
   <div class="news-title">
    <i class="fas fa-wrench">
    </i>
    <h1>
     Repair World News
    </h1>
    <p>
     Dolor amet consectetur elit sed eiusmod tempor incididunt labore dolore
    </p>
   </div>
   <div class="row">
    <div class="col-md-4">
     <div class="card">
      <img alt="Person repairing a smartphone with tools" class="card-img-top" height="200" src="https://storage.googleapis.com/a1aa/image/NkhZORbV7ZZPBViPdisPvajlfwIlHZkp4lsk0KpXYa666dzJA.jpg" width="600"/>
      <div class="card-body">
       <h5 class="card-title">
        Finding a used Smartphone: Checking the Original
       </h5>
       <p class="card-text">
        We are surrounded possession frequently them. Empliat acable heureuse capitale havresac nul etroites. Tours him route accable ecarter grand.
       </p>
      </div>
     </div>
    </div>
    <div class="col-md-4">
     <div class="card">
      <img alt="Person repairing an iPhone with tools" class="card-img-top" height="200" src="https://storage.googleapis.com/a1aa/image/A99QMC1eOnw6WiREFuGXFeL1FrqK7OWCfs18wnVUPLslr3NnA.jpg" width="600"/>
      <div class="card-body">
       <h5 class="card-title">
        How to Repair iPhone: 6 Ways Best Online Guides
       </h5>
       <p class="card-text">
        Admiration we are surrounded possession frequently them. Empliat acable heureuse capitale havresac nul etroites. Tours him route accable ecarter gran.
       </p>
      </div>
     </div>
    </div>
    <div class="col-md-4">
     <div class="card">
      <img alt="Person handling a computer component" class="card-img-top" height="200" src="https://storage.googleapis.com/a1aa/image/6sq5lw3htqrOAdhXeCstxgixlyuAhDHhaxbAEXHEU3Y66dzJA.jpg" width="600"/>
      <div class="card-body">
       <h5 class="card-title">
        10 Tips: Avoid Breaking Glass of your Smartphone
       </h5>
       <p class="card-text">
        Femiration we are surrounded possession frequently them. Empliat acable heureuse capitale havresac nul etroites. Tours him route accable ecarter gran.
       </p>
      </div>
     </div>
    </div>
   </div>
  </div>
 </body>
</html>