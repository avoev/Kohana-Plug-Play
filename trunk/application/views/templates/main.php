<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">
    <head profile="http://gmpg.org/xfn/11">
        <title><?php echo $title ?><?php echo isset($subtitle) ? ' | '.$subtitle: ''?></title>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta name="rating" content="General"/>
        <meta name="robots" content="index,follow"/>
        <?php foreach ($styles as $file => $type) echo HTML::style($file, array('media' => $type)), "\n" ?>
        <?php foreach ($scripts as $file) echo HTML::script($file), "\n" ?>
    </head>

    <!--// Flush the buffer early //-->
    <?php flush(); ?>

    <body>
        <!--// Add the flash errors bar //-->
        <?php include Kohana::find_file('views','partials/message_bar'); ?>

        <div id="wrapper">
            <div class="wrapper_960 rounded">
                <div id="header" class="shadow big_white">
                    <!--// Add the header //-->
                    <?php include Kohana::find_file('views','partials/header'); ?>
                </div>
                <div id="content">
                    <!--// Add the content //-->
                    <?php echo $content;?>
                </div>
                <div id="footer" class="shadow big_white">
                    <!--// Add the footer //-->
                    <?php include Kohana::find_file('views','partials/footer'); ?>
              </div>

              <div class="x-small center">
                  <?php
                      // This shows only on localhost
                      if(Kohana::$environment == 'development')
                      {
                          echo "Kohana: v.".Kohana::VERSION." Codename: ".Kohana::CODENAME;
                          echo View::factory('profiler/stats');
                      }
                  ?>

                  <div style="padding: 6px;">
                  <h1>Environment Tests</h1>

                	<p>
                		The following tests have been run to determine if <a href="http://kohanaframework.org/">Kohana</a> will work in your environment.
                		If any of the tests have failed, consult the <a href="http://kohanaframework.org/guide/about.install">documentation</a>
                		for more information on how to correct the problem.
                	</p>

                	<?php $failed = FALSE ?>

                	<table cellspacing="0">
                		<tr>
                			<th>PHP Version</th>
                			<?php if (version_compare(PHP_VERSION, '5.2.3', '>=')): ?>
                				<td class="pass"><?php echo PHP_VERSION ?></td>
                			<?php else: $failed = TRUE ?>
                				<td class="fail">Kohana requires PHP 5.2.3 or newer, this version is <?php echo PHP_VERSION ?>.</td>
                			<?php endif ?>
                		</tr>
                		<tr>
                			<th>System Directory</th>
                			<?php if (is_dir(SYSPATH) AND is_file(SYSPATH.'classes/kohana'.EXT)): ?>
                				<td class="pass"><?php echo SYSPATH ?></td>
                			<?php else: $failed = TRUE ?>
                				<td class="fail">The configured <code>system</code> directory does not exist or does not contain required files.</td>
                			<?php endif ?>
                		</tr>
                		<tr>
                			<th>Application Directory</th>
                			<?php if (is_dir(APPPATH) AND is_file(APPPATH.'bootstrap'.EXT)): ?>
                				<td class="pass"><?php echo APPPATH ?></td>
                			<?php else: $failed = TRUE ?>
                				<td class="fail">The configured <code>application</code> directory does not exist or does not contain required files.</td>
                			<?php endif ?>
                		</tr>
                		<tr>
                			<th>Cache Directory</th>
                			<?php if (is_dir(APPPATH) AND is_dir(APPPATH.'cache') AND is_writable(APPPATH.'cache')): ?>
                				<td class="pass"><?php echo APPPATH.'cache/' ?></td>
                			<?php else: $failed = TRUE ?>
                				<td class="fail">The <code><?php echo APPPATH.'cache/' ?></code> directory is not writable.</td>
                			<?php endif ?>
                		</tr>
                		<tr>
                			<th>Logs Directory</th>
                			<?php if (is_dir(APPPATH) AND is_dir(APPPATH.'logs') AND is_writable(APPPATH.'logs')): ?>
                				<td class="pass"><?php echo APPPATH.'logs/' ?></td>
                			<?php else: $failed = TRUE ?>
                				<td class="fail">The <code><?php echo APPPATH.'logs/' ?></code> directory is not writable.</td>
                			<?php endif ?>
                		</tr>
                		<tr>
                			<th>PCRE UTF-8</th>
                			<?php if ( ! @preg_match('/^.$/u', 'ñ')): $failed = TRUE ?>
                				<td class="fail"><a href="http://php.net/pcre">PCRE</a> has not been compiled with UTF-8 support.</td>
                			<?php elseif ( ! @preg_match('/^\pL$/u', 'ñ')): $failed = TRUE ?>
                				<td class="fail"><a href="http://php.net/pcre">PCRE</a> has not been compiled with Unicode property support.</td>
                			<?php else: ?>
                				<td class="pass">Pass</td>
                			<?php endif ?>
                		</tr>
                		<tr>
                			<th>SPL Enabled</th>
                			<?php if (function_exists('spl_autoload_register')): ?>
                				<td class="pass">Pass</td>
                			<?php else: $failed = TRUE ?>
                				<td class="fail">PHP <a href="http://www.php.net/spl">SPL</a> is either not loaded or not compiled in.</td>
                			<?php endif ?>
                		</tr>
                		<tr>
                			<th>Reflection Enabled</th>
                			<?php if (class_exists('ReflectionClass')): ?>
                				<td class="pass">Pass</td>
                			<?php else: $failed = TRUE ?>
                				<td class="fail">PHP <a href="http://www.php.net/reflection">reflection</a> is either not loaded or not compiled in.</td>
                			<?php endif ?>
                		</tr>
                		<tr>
                			<th>Filters Enabled</th>
                			<?php if (function_exists('filter_list')): ?>
                				<td class="pass">Pass</td>
                			<?php else: $failed = TRUE ?>
                				<td class="fail">The <a href="http://www.php.net/filter">filter</a> extension is either not loaded or not compiled in.</td>
                			<?php endif ?>
                		</tr>
                		<tr>
                			<th>Iconv Extension Loaded</th>
                			<?php if (extension_loaded('iconv')): ?>
                				<td class="pass">Pass</td>
                			<?php else: $failed = TRUE ?>
                				<td class="fail">The <a href="http://php.net/iconv">iconv</a> extension is not loaded.</td>
                			<?php endif ?>
                		</tr>
                		<?php if (extension_loaded('mbstring')): ?>
                		<tr>
                			<th>Mbstring Not Overloaded</th>
                			<?php if (ini_get('mbstring.func_overload') & MB_OVERLOAD_STRING): $failed = TRUE ?>
                				<td class="fail">The <a href="http://php.net/mbstring">mbstring</a> extension is overloading PHP's native string functions.</td>
                			<?php else: ?>
                				<td class="pass">Pass</td>
                			<?php endif ?>
                		</tr>
                		<?php endif ?>
                		<tr>
                			<th>Character Type (CTYPE) Extension</th>
                			<?php if ( ! function_exists('ctype_digit')): $failed = TRUE ?>
                				<td class="fail">The <a href="http://php.net/ctype">ctype</a> extension is not enabled.</td>
                			<?php else: ?>
                				<td class="pass">Pass</td>
                			<?php endif ?>
                		</tr>
                		<tr>
                			<th>URI Determination</th>
                			<?php if (isset($_SERVER['REQUEST_URI']) OR isset($_SERVER['PHP_SELF']) OR isset($_SERVER['PATH_INFO'])): ?>
                				<td class="pass">Pass</td>
                			<?php else: $failed = TRUE ?>
                				<td class="fail">Neither <code>$_SERVER['REQUEST_URI']</code>, <code>$_SERVER['PHP_SELF']</code>, or <code>$_SERVER['PATH_INFO']</code> is available.</td>
                			<?php endif ?>
                		</tr>
                	</table>

                	<?php if ($failed === TRUE): ?>
                		<p id="results" class="fail">✘ Kohana may not work correctly with your environment.</p>
                	<?php else: ?>
                		<p id="results" class="pass">✔ Your environment passed all requirements.</p>
                	<?php endif ?>

                	<h1>Optional Tests</h1>

                	<p>
                		The following extensions are not required to run the Kohana core, but if enabled can provide access to additional classes.
                	</p>

                	<table cellspacing="0">
                		<tr>
                			<th>cURL Enabled</th>
                			<?php if (extension_loaded('curl')): ?>
                				<td class="pass">Pass</td>
                			<?php else: ?>
                				<td class="fail">Kohana requires <a href="http://php.net/curl">cURL</a> for the Remote class.</td>
                			<?php endif ?>
                		</tr>
                		<tr>
                			<th>mcrypt Enabled</th>
                			<?php if (extension_loaded('mcrypt')): ?>
                				<td class="pass">Pass</td>
                			<?php else: ?>
                				<td class="fail">Kohana requires <a href="http://php.net/mcrypt">mcrypt</a> for the Encrypt class.</td>
                			<?php endif ?>
                		</tr>
                		<tr>
                			<th>GD Enabled</th>
                			<?php if (function_exists('gd_info')): ?>
                				<td class="pass">Pass</td>
                			<?php else: ?>
                				<td class="fail">Kohana requires <a href="http://php.net/gd">GD</a> v2 for the Image class.</td>
                			<?php endif ?>
                		</tr>
                		<tr>
                			<th>PDO Enabled</th>
                			<?php if (class_exists('PDO')): ?>
                				<td class="pass">Pass</td>
                			<?php else: ?>
                				<td class="fail">Kohana can use <a href="http://php.net/pdo">PDO</a> to support additional databases.</td>
                			<?php endif ?>
                		</tr>
                	</table>
                    </div>
              </div>
            </div>
        </div>
    </body>
    <script>
      $(document).ready(function() {
        //Ready for JS
      });
    </script>
</html>