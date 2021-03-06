<?php
  require __DIR__ . '/vendor/autoload.php';
  require __DIR__ . '/app.php';
?>
<html>
<head>
  <link href="/css/style.css" rel="stylesheet" >
  <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  <header>
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">DocView, a Document Viewer</a>
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="/" target="_blank">what is DocView?</a></li>
            <li><a href="https://github.com/ymeiner/docview" target="_blank">Github Repo</a></li>
          </ul>
        </div>
      </div>
    </nav>

  </header>
  <section class="container">
    <article class="row">
      <div class="col-xs-12">
        <?php echo $app -> parser -> parse($app -> markdown); ?>
      </div>
    </article>
  </section>
<footer class="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <p>This tools was created by Yaron Meiner to simply present an MD file without the need to convert.</p>
      </div>
      <div class="col-md-4 center-block">
        <?php if (isset($app -> filename)): ?>
          <p><a href="<?php echo $app -> filename;?>" Title="Click to see the file" target="_blank">The original MD file</a></p>
        <?php endif; ?>
      </div>
    </div>
  </div>
</footer>
</body>
</html>
