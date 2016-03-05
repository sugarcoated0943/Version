<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>iRecord</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/freelancer.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <script src="js/myjs.js"></script>
</head>
<body id="page-top">

<nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="indexlogin.html">iRecord</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="page-scroll">
                        <a href="indexlogin.html">Home</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#upload">Upload</a>
                    </li>
                    <li class="">
                        <a href="#download">Download</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>


<br><br><br><br><br><br><br>
	<div class="container" id="uploadpart">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2>Upload a File</h2>
			</div>
			 </p>
            <?php
			include('config.php');
			if($_POST['upload']){
				$allowed_ext	= array('doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'pdf', 'rar', 'zip');
				$file_name		= $_FILES['file']['name'];
				$file_name_exp 	= explode(".", $file_name);
				$file_ext		= strtolower(array_pop($file_name_exp));
				// $file_ext		= strtolower(end(explode('.', $file_name)));
				$file_size		= $_FILES['file']['size'];
				$file_tmp		= $_FILES['file']['tmp_name'];
				
				$name			= $_POST['name'];
				$tgl			= date("Y-m-d");
				
				if(in_array($file_ext, $allowed_ext) === true){
					if($file_size < 1044070){
						$location = 'files/'.$name.'.'.$file_ext;
						move_uploaded_file($file_tmp, $location);
						$in = mysql_query("INSERT INTO download VALUES(NULL, '$tgl', '$name', '$file_ext', '$file_size', '$location')");
						if($in){
							echo '<div class="ok">SUCCESS: File has been uploaded!</div>';
						}else{
							echo '<div class="error">ERROR: Error in upload!</div>';
						}
					}else{
						echo '<div class="error">ERROR: File size exceeds to 1 Mb!</div>';
					}
				}else{
					echo '<div class="error">ERROR: Not supported file extension!</div>';
				}
			}
			?>
				</p>
			<div class="panel-body">
				<p>Supported files: <b>.doc, .docx, .xls, .xlsx, .ppt, .pptx, .pdf, .rar, .zip</b> <br>File size must no exceed to 1 MB.</p>
				<p>
					<form action="" method="post" enctype="multipart/form-data">
            <table width="100%" align="center" border="0" bgcolor="#eee" cellpadding="2" cellspacing="0">
            	<tr>
                	<td width="40%" align="right"><b>File name: </b></td><td><b>:</b></td><td><input type="text" id="name" name="name" size="40" required /></td>
                </tr>
                <tr>
                	<td width="40%" align="right"><b>Choose a file: </b></td><td><b>:</b></td><td><input id="file" type="file" name="file" required /></td>
                </tr>
                <tr>
                	<td>&nbsp;</td><td>&nbsp;</td><td><input type="submit" id="upload" name="upload" value="Upload" /></td>
                </tr>
            </table>
            </form>
           
			</div>
		</div>
		</div>

		<br><br><br>

		<div class="container" id="download">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h2>Download a File</h2>
				</div>
				<div class="panel-body">
					<p>Files that has been uploaded.</p>
					<p>
            <table class="table" width="100%" cellpadding="3" cellspacing="0">
            	<tr>
                	<th width="30">No.</th>
                    <th width="80">Date Upload</th>
                    <th>Filename</th>
                    <th width="70">Type</th>
                    <th width="70">Size</th>
                </tr>
                <?php
				$sql = mysql_query("SELECT * FROM download ORDER BY id DESC");
				if(mysql_num_rows($sql) > 0){
					$no = 1;
					while($data = mysql_fetch_assoc($sql)){
						echo '
						<tr bgcolor="#fff">
							<td align="center">'.$no.'</td>
							<td align="center">'.$data['fld_date_upload'].'</td>
							<td><a href="'.$data['file'].'">'.$data['fld_name'].'</a></td>
							<td align="center">'.$data['fld_type'].'</td>
							<td align="center">'.formatBytes($data['fld_size']).'</td>
						</tr>
						';
						$no++;
					}
				}else{
					echo '
					<tr bgcolor="#fff">
						<td align="center" colspan="4" align="center">No data in database!</td>
					</tr>
					';
				}
				?>
            </table>
            </p>
				</div>
			</div>
		</div>
        	
            
         
            
            
            
        </div>
    </div>
<script>

</script>
<script src="js/myjs.js"></script>

</body>
</html>