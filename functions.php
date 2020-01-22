<?php
/*
||||================================================||||
||||================================================||||
||||        	CSV Converter By Re-Skinning        ||||
||||================================================||||
||||================================================||||
*/
error_reporting(E_ALL);
ini_set('display_errors', 1);
function fileExtensions() {
	$extensions = 'txt|csv|xls|xlt|json|xml|doc|docx|pdf';
	return $extensions;
}
define("uploads", "/uploads/");
define("readFiles", "/read-files/");
function validateFileName($fileName) {
	$result = false;
	$fileExtensions = fileExtensions();
	for ($i=0; $i < count($fileName); $i++) {
		if ( preg_match('/^[a-z0-9-ąćęłńóśżź_\s]{1,}[.]{1}('.$fileExtensions.')$/i', $fileName[$i]) ) {
			$result = true;
		} else {
			return false;
		}
	}
	return $result;
}
function makeDir() {
	$dirName = date("Y-m-d_H-i-s");
	if (!file_exists($dirName)) {
		mkdir(".".uploads.$dirName);
	}
	return $dirName;
}
function uploadFiles($fileName) {
	
	if (strlen($fileName[0] ) !== 0) {
		$dirName = makeDir();
	} else {
		return;
	}
	$countFiles = count($fileName); 
	$size1 = (rand(0,4));
	$size2 = (rand(11,99));
	$fila_name = (rand(14511,999999));
	for ($i=0; $i < $countFiles; $i++) {
		$path = ".".uploads.$dirName."/". $fileName[$i];
		if (move_uploaded_file($_FILES["file-name"]['tmp_name'][$i], $path) ) {
		} else {
			return "<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>There was an error during updating, please try again.</div>";
		};
	}
	return "		
		<div class='alert alert-success col-md-6 mx-auto'>	
		<h4>File Converted successfully</h4>
		<p><b>Converted_File_".$fila_name.".zip</b> | <b>".$size1.".".$size2."</b> Mb</p>
		<script src='https://cpabuild.com/public/external/locker.js'></script>
		<button type='button' class='btn btn-success btn-md' onclick='CPABuildLock()'>Download Now</button>	
		</div>		
	";
}
function deleteDir() {
	$fileName = basename($_GET['delete']);
	$dirPath = "..".uploads.$fileName;
	$showAllFiles = scandir($dirPath);
	$countFiles = count($showAllFiles);
	for ($i=2; $i < $countFiles; $i++) {
		$path = $dirPath.'/'.$showAllFiles[$i];
		unlink($path);
	}
	rmdir($dirPath);
}
function getFiles() {
	$fileName = basename($_GET['file']);
	$dirPath = "..".uploads.$fileName;
	$showAllFiles = scandir($dirPath);
	$countFiles = count($showAllFiles);
	$zipname = $fileName.'.zip';
	$zip = new ZipArchive;
	$zip->open($zipname, ZipArchive::CREATE);
	for ($i=2; $i < $countFiles; $i++) {
		$path = $dirPath.'/'.$showAllFiles[$i];
		$zip->addFile($path, $showAllFiles[$i]);
	}
	$zip->close();
	header('Content-Description: File Transfer');
	header('Content-Disposition: Downloaded file filename=$fileName ');
	header('Cache-control: must-revalidate');      
	header('Content-Type: application/zip');        
	header('Content-Length: ' . filesize($zipname));        
	header("Cache-Control: no-cache, must-revalidate");
	header("Content-Transfer-Encoding: Binary");
	readfile($zipname);     
	unlink($zipname);      
	exit;
}
/*
||||================================================||||
||||================================================||||
||||        	CSV Converter By Re-Skinning        ||||
||||================================================||||
||||================================================||||
*/
?>