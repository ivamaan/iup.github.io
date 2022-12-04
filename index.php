<?php

	// TITLE
	$title = "File Center";
	$title2 = "";
	$title3 = "2022";

	// STYLING (light or dark)
	$color	= "dark";

	// ADD SPECIFIC FILES YOU WANT TO IGNORE HERE
	$ignore_file_list = array( ".htaccess", "Thumbs.db", ".DS_Store", "index.php", "flat.png" , "counterlog.txt","data");

	// ADD SPECIFIC FILE EXTENSIONS YOU WANT TO IGNORE HERE, EXAMPLE: array('psd','jpg','jpeg')
	$ignore_ext_list = array('ai');
	
	// SORT BY
	$sort_by = "date_desc"; // options: name_asc, name_desc, date_asc, date_desc
	
	// ICON URL
	$icon_url = "./data/flat.png"; // DIRECT LINK
	
	// TOGGLE SUB FOLDERS, SET TO false IF YOU WANT OFF
	$toggle_sub_folders = true;
	
	// FORCE DOWNLOAD ATTRIBUTE
	$force_download = false;
	
	// IGNORE EMPTY FOLDERS
	$ignore_empty_folders = true;

	
// SET TITLE BASED ON FOLDER NAME, IF NOT SET ABOVE
if( !$title ) { $title = clean_title(basename(dirname(__FILE__))); }
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?></title>
	<meta name="theme-color" content="#000" />
	<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
	<style>
		@import url('https://fonts.googleapis.com/css?family=Englebert');
		html {
		background: url(./data/blur.jpg) no-repeat center center fixed; 
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
		}
		*, *:before, *:after { 
		-moz-box-sizing: border-box; 
		-webkit-box-sizing: border-box; 
		box-sizing: border-box;
		}
		body { 
		font-family: 'Englebert', sans-serif;
		font-weight: 300;
		font-size: 13px; 
		line-height: 16px; 
		padding: 0; 
		margin: 0; 
		text-align: center;
		letter-spacing: 1px;
		}
		.wrap { 
		max-width: 100%; 
		width: 600px;
		margin: 0px auto; 
		background: #000;
		padding: 30px; 
		border-radius: 25px;
		text-align: left;
		box-shadow: 0px 0px 15px 5px rgba(0,0,0,0.65);
		}
		
		.logo{
			position:relative;
			top:110px;
			right:-240px;
			margin-top:-100px;
			width: 70px;
			z-index:1;
		}
		
		@media only screen and (max-width: 640px)
		{ 
		.logo{
			position:relative;
			top:85px;
			right:-35%;
			margin-top:-100px;
			width:75px;
		}
		
		.wrap { 
		padding: 10px;
		max-width:95%;
		filter: none;
		} 
		body { 
		font-size: 10px; }
		}
		
		h1 
		{ text-align: center; 
		margin: 10px auto;
		font-size: 22px; 
		font-weight: bold; 
		color: #666;	
		cursor:default;
		
		}
		a { color: #fff; text-decoration: none; } 
		a:hover { color: #66ffff; text-decoration: none; }
		.note { padding:  0 5px 25px 0; font-size:80%; color: #666; line-height: 18px; }
		.block { clear: both; min-height: 50px; border-top: solid 1px #ECE9E9; }
		.block:first-child { border: none; }
		.block .img { width: 50px; height: 50px; display: block; float: left; margin-right: 10px; background: transparent url(<?php echo $icon_url; ?>) no-repeat 0 0; }
		.block .file { padding-bottom: 5px; }
		.block .data { line-height: 1.3em; color: #666; }
		.block a { display: block; padding: 20px; transition: all 0.35s; }
		.block a:hover, .block a.open { text-decoration: none; background: #efefef; }
		
		.bold { font-weight: 400; }
		.upper { text-transform: uppercase; }
		.fs-1 { font-size: 1em; } .fs-1-1 { font-size: 1.1em; } .fs-1-2 { font-size: 1.2em; } .fs-1-3 { font-size: 1.3em; } .fs-0-9 { font-size: 0.9em; } .fs-0-8 { font-size: 0.8em; } .fs-0-7 { font-size: 0.7em; }
		
		.jpg, .jpeg, .gif, .png { background-position: -50px 0 !important; } 
		.pdf { background-position: -100px 0 !important; }  
		.txt, .rtf { background-position: -150px 0 !important; }
		.xls, .xlsx { background-position: -200px 0 !important; } 
		.ppt, .pptx { background-position: -250px 0 !important; } 
		.doc, .docx { background-position: -300px 0 !important; }
		.zip, .rar, .tar, .gzip { background-position: -350px 0 !important; }
		.swf { background-position: -400px 0 !important; } 
		.fla { background-position: -450px 0 !important; }
		.mp3 { background-position: -500px 0 !important; }
		.wav { background-position: -550px 0 !important; }
		.mp4 { background-position: -600px 0 !important; }
		.mov, .aiff, .m2v, .avi, .pict, .qif { background-position: -650px 0 !important; }
		.wmv, .avi, .mpg { background-position: -700px 0 !important; }
		.flv, .f2v { background-position: -750px 0 !important; }
		.psd { background-position: -800px 0 !important; }
		.ai { background-position: -850px 0 !important; }
		.html, .xhtml, .dhtml, .php, .asp, .css, .js, .inc { background-position: -900px 0 !important; }
		.svg { background-position: -1000px 0 !important; }
		.dir { background-position: -950px 0 !important; }
		
		.sub { margin-left: 20px; border-left: solid 5px #ECE9E9; display: none; }
		
		body.dark {color: #fff; }
		body.dark h1 { color: #fff; }
		body.dark .wrap { background: rgba(0,0,0,0.6); }
		body.dark .block { border-top: solid 1px #666; }
		body.dark .block a:hover, body.dark .block a.open { background: rgba(0,0,0,0.3);}
		body.dark .note { color: #fff; }
		body.dark .block .data { color: #fff; }
		body.dark .sub { border-left: solid 5px #0e0e0e; }
	</style>
</head>
<body class="<?php echo $color; ?>">
<h1><?php echo $title2?></h1>
<img src="./data/logo.png" alt="logo" class="logo" width="100px" />
<h2 style="opacity:0.2; cursor:default;" ><?php echo $title3?></h2>
<div class="wrap">
<?php

// FUNCTIONS TO MAKE THE MAGIC HAPPEN, BEST TO LEAVE THESE ALONE
function clean_title($title)
{
	return ucwords( str_replace( array("-", "_"), " ", $title) );
}

function ext($filename) 
{
	return substr( strrchr( $filename,'.' ),1 );
}

function display_size($bytes, $precision = 2) 
{
	$units = array('B', 'KB', 'MB', 'GB', 'TB');
    $bytes = max($bytes, 0); 
    $pow = floor(($bytes ? log($bytes) : 0) / log(1024)); 
    $pow = min($pow, count($units) - 1); 
    $bytes /= (1 << (10 * $pow)); 
	return round($bytes, $precision) . '<span class="fs-0-8 bold">' . $units[$pow] . "</span>";
}

function count_dir_files( $dir)
{
	$fi = new FilesystemIterator(__DIR__ . "/" . $dir, FilesystemIterator::SKIP_DOTS);
	return iterator_count($fi);
}

function get_directory_size($path)
{
    $bytestotal = 0;
    $path = realpath($path);
    if($path!==false && $path!='' && file_exists($path))
    {
        foreach(new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path, FilesystemIterator::SKIP_DOTS)) as $object)
        {
            $bytestotal += $object->getSize();
        }
    }
    
    return display_size($bytestotal);
}


// SHOW THE MEDIA BLOCK
function display_block( $file )
{
	global $ignore_file_list, $ignore_ext_list, $force_download;
	
	$file_ext = ext($file);
	if( !$file_ext AND is_dir($file)) $file_ext = "dir";
	if(in_array($file, $ignore_file_list)) return;
	if(in_array($file_ext, $ignore_ext_list)) return;
	
	$download_att = ($force_download AND $file_ext != "dir" ) ? " download='" . basename($file) . "'" : "";
	
	$rtn = "<div class=\"block\">";
	$rtn .= "<a href=\"$file\" class=\"$file_ext\"{$download_att}>";
	$rtn .= "	<div class=\"img $file_ext\"></div>";
	$rtn .= "	<div class=\"name\">";
	
	if ($file_ext === "dir") 
	{
		$rtn .= "		<div class=\"file fs-1-2 bold\">" . basename($file) . "</div>";
		$rtn .= "		<div class=\"data upper size fs-0-8\"><span class=\"bold\">Anzahl:</span> " . count_dir_files($file) . "</div> ";
		$rtn .= "		<div class=\"data upper size fs-0-8\"><span class=\"bold\">Größe:</span> " . get_directory_size($file) . "</div> ";
		
	}
	else
	{
		$rtn .= "		<div class=\"file fs-1-2 bold\">" . basename($file) . "</div>";
		$rtn .= "		<div class=\"data upper size fs-0-8\"><span class=\"bold\">Dateigröße:</span> " . display_size(filesize($file)) . "</div>";
		$rtn .= "		<div class=\"data upper modified fs-0-8\"><span class=\"bold\"> Hochgeladen :</span> " .date("d.m.Y H:i",filemtime($file)) . "</div>";	
	}

	$rtn .= "	</div>";
	$rtn .= "	</a>";
	$rtn .= "</div>";
	return $rtn;
}


// RECURSIVE FUNCTION TO BUILD THE BLOCKS
function build_blocks( $items, $folder )
{
	global $ignore_file_list, $ignore_ext_list, $sort_by, $toggle_sub_folders, $ignore_empty_folders;
	
	$objects = array();
	$objects['directories'] = array();
	$objects['files'] = array();
	
	foreach($items as $c => $item)
	{
		if( $item == ".." OR $item == ".") continue;
	
		// IGNORE FILE
		if(in_array($item, $ignore_file_list)) { continue; }
	
		if( $folder && $item )
		{
			$item = "$folder/$item";
		}

		$file_ext = ext($item);
		
		// IGNORE EXT
		if(in_array($file_ext, $ignore_ext_list)) { continue; }
		
		// DIRECTORIES
		if( is_dir($item) ) 
		{
			$objects['directories'][] = $item; 
			continue;
		}
		
		// FILE DATE
		$file_time = date("U", filemtime($item));
		
		// FILES
		if( $item )
		{
			$objects['files'][$file_time . "-" . $item] = $item;
		}
	}
	
	foreach($objects['directories'] as $c => $file)
	{
		$sub_items = (array) scandir( $file );
		
		if( $ignore_empty_folders )
		{
			$has_sub_items = false;
			foreach( $sub_items as $sub_item )
			{
				$sub_fileExt = ext( $sub_item );
				if( $sub_item == ".." OR $sub_item == ".") continue;
				if(in_array($sub_item, $ignore_file_list)) continue;
				if(in_array($sub_fileExt, $ignore_ext_list)) continue;
			
				$has_sub_items = true;
				break;	
			}
			
			if( $has_sub_items ) echo display_block( $file );
		}
		else
		{
			echo display_block( $file );
		}
		
		if( $toggle_sub_folders )
		{
			if( $sub_items )
			{
				echo "<div class='sub' data-folder=\"$file\">";
				build_blocks( $sub_items, $file );
				echo "</div>";
			}
		}
	}
	
	// SORT BEFORE LOOP
	if( $sort_by == "date_asc" ) { ksort($objects['files']); }
	elseif( $sort_by == "date_desc" ) { krsort($objects['files']); }
	elseif( $sort_by == "name_asc" ) { natsort($objects['files']); }
	elseif( $sort_by == "name_desc" ) { arsort($objects['files']); }
	
	foreach($objects['files'] as $t => $file)
	{
		$fileExt = ext($file);
		if(in_array($file, $ignore_file_list)) { continue; }
		if(in_array($fileExt, $ignore_ext_list)) { continue; }
		echo display_block( $file );
	}
}

// GET THE BLOCKS STARTED, FALSE TO INDICATE MAIN FOLDER
$items = scandir( dirname(__FILE__) );
build_blocks( $items, false );
?>

<?php if($toggle_sub_folders) { ?>
<script type="text/javascript">
	$(document).ready(function() 
	{
		$("a.dir").click(function(e)
		{
			$(this).toggleClass('open');
		 	$('.sub[data-folder="' + $(this).attr('href') + '"]').slideToggle();
			e.preventDefault();
		});
	});
</script>
<?php } ?>
</div>






  <form enctype="multipart/form-data" action="index.php" method="xpost">
    <p>Upload your file</p>
    <input type="file" name="uploaded_file"></input><br />
    <input type="submit" value="Upload"></input>
  </form>
<?PHP
  if(!empty($_FILES['uploaded_file']))
  {
    $path = "files/";
    $path = $path . basename( $_FILES['uploaded_file']['name']);

    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {
      echo "The file ".  basename( $_FILES['uploaded_file']['name']). 
      " has been uploaded";
    } else{
        echo "There was an error uploading the file, please try again!";
    }
  }
?>







<br>
<img src="https://upload.wikimedia.org/wikipedia/commons/a/ab/Apple-logo.png" alt="sign" width="40px" style="opacity:0.3;margin-bottom:10px;"/>

<p style="padding-top: 20px; opacity:0.1; cursor:default;">&copy; <?php
$t=time();
echo(date("Y",$t));
?> Created with 🤍</p>

 <?php include "text_file_hit_counter.php"; ?> 

<?php 

   /** 
   * Create an empty text file called counterlog.txt and  
   * upload to the same directory as the page you want to  
   * count hits for. 
    *  
       * Add this line of code on your page: 
   * <?php include "text_file_hit_counter.php"; ?> 
       */ 

  // Open the file for reading 
    $fp = fopen("counterlog.txt", "r"); 

     // Get the existing count 
       $count = fread($fp, 1024); 

     // Close the file 
   fclose($fp); 

    // Add 1 to the existing count 
       $count = $count + 1; 

      // Display the number of hits 
     // If you don't want to display it, comment out this line 
    // echo "<p>Seitenaufrufe: " . $count . "</p>"; 

      // Reopen the file and erase the contents 
       $fp = fopen("counterlog.txt", "w"); 

                 fwrite($fp, $count); 

     // Close the file 
     fclose($fp); 

 ?> 



</body>
</html>

