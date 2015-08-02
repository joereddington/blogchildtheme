<?php
/*
Template Name: Excel
*/
?>
<?php get_header(); ?>

	<div id="wrap" class="container clearfix">
		
		<section id="content" class="primary" role="main">
<h2 class="page-title">Copy & Paste Excel to LaTeX Converter</h2>
<div class="entry clearfix">
		
<form action='http://joereddington.com/projects/excel2latex/' method='post'><textarea name='data' rows='10' cols='50'></textarea><br><input type='submit' /></form>
<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
echo "<small><b>Instructions:</b><br><br>
Copy & paste cells from Excel and click Submit Query. Paste results into your LaTeX document.<br><br>

This is a hastly retargeted version of the very excellent Excel2Wiki tool at     <a href=\"http://excel2wiki.net/\">http://excel2wiki.net/</a>, the very awesome Shawn Douglas released the source code under the MIT licence and this modification is under the same one. However any latex related bugs are my fault and you should email me at joe@joereddington.com (the code repo is <a href=https://github.com/joereddington/excel2latex>on github</a>)";
} else {
echo "<h2>result</h2>\n<pre>\n\begin{tabular}{|";
$in=$_POST['data'];
function latexSpecialChars( $string )
{/* with thanks to http://stackoverflow.com/a/5422751/170243*/
    $map = array( 
            "#"=>"\\#",
            "$"=>"\\$",
            "%"=>"\\%",
            "&"=>"\\&",
            "~"=>"\\~{}",
            "_"=>"\\_",
            "^"=>"\\^{}",
            "\\"=>"\\textbackslash",
            "{"=>"\\{",
            "}"=>"\\}",
    );
    return preg_replace( "/([\^\%~\\\\#\$%&_\{\}])/e", "\$map['$1']", $string );
}
$normalised=latexSpecialChars($in);

$lines = preg_split("/\n/", $normalised);
$n = sizeof($lines);
 $line = preg_split("/\t/", $lines[0]);
  foreach ($line as $val) {
   $val2 = rtrim($val);
   echo 'r|';
  }
   echo "}\n".'\hline' ;
foreach ($lines as $index => $value) {
 $line = preg_split("/\t/", $value);
  $data = implode("   &   ", $line);
  echo ' ' . $data . '\\\\';
  if ($index < $n - 1) {
   echo "\n";
  } else {
echo "\n".'\hline';
}
 
}
echo "\n".'\end{tabular}'. "</pre>";
}

echo "</body></html>";

?>
		<?php comments_template(); ?>
		
		</section>
		
		<?php get_sidebar(); ?>
		
	</div>
	
<?php get_footer(); ?>	
