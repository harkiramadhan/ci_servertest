<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div style="background-color: #2E3436; color : white; border-radius: 15px;border:2px solid #2E3436;padding-left:20px;margin:0 0 10px 0;">

<h4 style="color: #D15C61">A PHP Error was encountered</h4>

<p style="color: white;">Severity: <?php echo $severity; ?></p>
<p style="color: white;">Message:  <?php echo $message; ?></p>
<p style="color: white;">Filename: <?php echo $filepath; ?></p>
<p style="color: white;">Line Number: <?php echo $line; ?></p>

<?php if (defined('SHOW_DEBUG_BACKTRACE') && SHOW_DEBUG_BACKTRACE === TRUE): ?>

	<b><p>Backtrace:</p></b>
	<?php foreach (debug_backtrace() as $error): ?>

		<?php if (isset($error['file']) && strpos($error['file'], realpath(BASEPATH)) !== 0): ?>

			<p style="color: white; margin-left:10px">
			File: <?php echo $error['file'] ?><br />
			Line: <?php echo $error['line'] ?><br />
			Function: <?php echo $error['function'] ?>
			</p>

		<?php endif ?>

	<?php endforeach ?>

<?php endif ?>

</div>