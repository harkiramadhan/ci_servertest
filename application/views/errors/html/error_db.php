<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Database Error</title>
	  <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
	  <style>
        body{
            text-align: center;
        }
</style>
</head>

<body style="background-color: #2E3436">
	<h1>Database Error</h1>
	<section class="error-container">
		<span><span>D</span></span>
		<span>.</span>
		<span><span>B</span></span>
	</section>
	<h2 style="color: white"><b><?php echo $heading; ?></b></h2>
	<h3 style="color: white"><b><?php echo $message; ?></b></h3>
<div class="link-container" style="padding-top: 50px">
  <b><a href="#" class="more-link">@harkiramadhan</a></b>
</div>
</body>

</html>
