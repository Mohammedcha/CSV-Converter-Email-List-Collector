<!DOCTYPE html>
<html lang="en">
<?php require_once ('inc/header.php')?>
	<div class="container py-5">
		<div class="row">
		  <div class="col-md-12 mx-auto">
			<div class="card card-body">
			<div class="text-center">
				<h1 alt="<?php echo $one_seo_keyword; ?>" title="<?php echo $one_seo_keyword; ?>" ><?php echo $site_name ;?></h1>
				<p><?php echo $site_descr ;?></p>			
			</div>
				<?php 
					include "functions.php"; 
					$message = "";
					if (isset($_POST["get-button"])) {
						$fileName = $_FILES['file-name']['name'];
						$countFiles = count($fileName);
						if ( ! empty( $fileName[0] ) ) {
							if ( validateFileName($fileName) ) {
								$message = uploadFiles($fileName);
							} else {
								$message = '<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Only files <strong> txt, csv, xls, xlt, xml, pdf, json, doc and docx </strong> are supported.</div>';
							}
						} else {
							$message = '<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Choose file</strong> to Convert first !</div>';
						}
					}
				?>				
				<script>
					document.addEventListener('DOMContentLoaded', function() {
						function showMessage() {
							const fileInput = document.getElementById("upload-file");
							fileInput.onchange = function() {
								const showUploadedFiles = document.getElementById("uploaded-files-text");
								const filesNum = document.getElementById("upload-file").files;
								let fileText = "Selected " + filesNum.length + " files";
								if (filesNum.length === 1) {
									fileText = "Selected " + filesNum.length + " file";
								}
								showUploadedFiles.innerText = fileText;
							}
						}
						showMessage();
						function validateFileName(files) {
							const regName = /^[a-z0-9-ąćęłńóśżź_\s]{1,}[.]{1}(txt|csv|xls|xlt|json|xml|doc|docx|pdf)$/i;
							let result = false;
							for (let i=0; i < files.length; i++) {
								const fileName = files[i].name;
								if ( regName.test(fileName) ) {
									result = true;
								} else {
									return false;
								}
							}
							return result;
						}
						function showProgressBar() {
							document.getElementById("form").addEventListener("submit", function(e) {
								const filesNum = document.getElementById("upload-file").files;
								if ( filesNum.length > 0 ) {
									if ( validateFileName(filesNum) ) {
										showProgress();
									}
								}
							});
						}
						function showProgress() {
							const form = document.getElementById("form");
							const progressValue = document.getElementById("progress-value");
							const progressText= document.getElementById("progress-text");
							const progressBar = document.getElementById("progress-bar");
							progressBar.classList.remove("hidden");
							const xhr = new XMLHttpRequest;
							xhr.open("POST", "functions.php");
							xhr.upload.addEventListener("progress", function(e) {
								const percent = e.lengthComputable ? (e.loaded / e.total) * 100 : 0;
								progressValue.style.width = percent.toFixed(2) + "%";
								progressText.textContent = parseInt(percent) + "%";
							});
							xhr.setRequestHeader("Content-Type", "multipart/form-data");
							xhr.send(new FormData(form));
						}
						showProgressBar();
					});
				</script>	
				<form action="index.php" method="post" enctype="multipart/form-data" id="form">
				<fieldset>
					<center>
						<div id="uploaded-files-text" class="badge badge-primary p-3 m-3">No File Selected</div>
					</center>
					<div class="alert alert-primary col-md-12 mx-auto">	
						<div class="container ">	
						  <div class="row">
							<div class="col-sm-4 p-3"> 
								<div class="custom-file">
									<label class="custom-file-label" for="upload-file"><i class="fa fa-cloud-upload"></i>Choose your files</label>
									<input type="file" multiple name="file-name[]" id="upload-file" class="custom-file-input" />
								</div>
							</div>
							<div class="col-sm-4 p-3">
								<select class="custom-select">
								  <option value="1">Csv Format</option>
								  <option value="2">Txt Format</option>
								  <option value="3">Xls Format</option>
								  <option value="4">Xlt Format</option>
								  <option value="5">Xml Format</option>
								  <option value="6">Pdf Format</option>
								  <option value="7">Doc Format</option>
								  <option value="8">Docx Format</option>
								</select>
							</div>
							<div class="col-sm-4 p-3">   
								<input  type="submit" name="get-button" value="Convert Files" class="btn btn-primary btn-md btn-block" id="submit">
							</div>
						  </div>
						</div>
					</div>	
					<div class="text-center">
						<?php echo $message; ?>
						<div id="progress-bar" class="hidden">
							<div class="progress-bar progress-bar-striped progress-bar-animated" id="progress" value="10" max="100" >
								<div id="progress-value"></div>
								<p id="progress-text">0%</p>
							</div>
						</div>
						<h3 id="status"></h3>
						<p id="loaded_n_total"></p>			
					</div>					
				</fieldset>
			</form>	
			<div class="pt-2 text-center">
				<img src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" />
			</div>
			</div>
		  </div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-6 mb-5">
				<div class="card card-body">
				<h3  alt="<?php echo $one_seo_keyword; ?>" title="<?php echo $one_seo_keyword; ?>" >Supported Services</h3>
					<img  alt="<?php echo $one_seo_keyword; ?>" title="<?php echo $one_seo_keyword; ?>"  src="img/serv.png" />
				</div>
			</div>
			<div class="col-md-6 mb-5">	
				<div class="card card-body">
				<h3  alt="<?php echo $one_seo_keyword; ?>" title="<?php echo $one_seo_keyword; ?>" >Supported Platforms </h3>
					<img  alt="<?php echo $one_seo_keyword; ?>" title="<?php echo $one_seo_keyword; ?>" src="img/plats.png" />
				</div>
			</div>	
		</div>
	</div>		
	<div class="container">
		<div class="row">
			<div class="col-md-12 mb-5">	
				<div class="card card-body">
					<img alt="<?php echo $one_seo_keyword; ?>" title="<?php echo $one_seo_keyword; ?>" src="img/mail.png" />
				</div>
			</div>	
		</div>
	</div>			
	<div class="container">
		<div class="row">
			<div class="col-md-6 mb-5">
				<div class="card card-body">
				<h2  alt="<?php echo $one_seo_keyword; ?>" title="<?php echo $one_seo_keyword; ?>" >Comma-separated values</h2>
					<p>The comma-separated values file format or CSV for short is a common cross platform file format used for information exchange between disparate devices, systems, and software. Mainstream usage of the format begun in 2005, with RFC 4180 forming the basis of its specification. The format's strongest feature is the ability to store relational tabular data in a plain text format which can be imported and/or exported to any compatible application.</p>
				</div>
			</div>
			<div class="col-md-6 mb-5">	
				<div class="card card-body">
				<h2  alt="<?php echo $one_seo_keyword; ?>" title="<?php echo $one_seo_keyword; ?>" >Microsoft Excel Spreadsheet</h2>
					<p>The .xls filename extension is a native binary file format associated with the closed source spreadsheet application Microsoft Office Excel. First introduced in 1987 with the release of Excel 2.x, the file format acts as the container for storing spreadsheet data such as work sheets, charts, and macros. Prior to Microsoft Office Excel 2007, the xls binary format was the default standard for the Microsoft Office Excel until the later adoption of the Open Document standard .xlsx. Documents.</p>
				</div>
			</div>	
		</div>
	</div>	
	<div class="text-center">
	<a src="index.php"><img alt="<?php echo $one_seo_keyword; ?>" title="<?php echo $one_seo_keyword; ?>" width="40px" height="50px" src="img/logo.png" /></a>
		<h1  alt="<?php echo $one_seo_keyword; ?>" title="<?php echo $one_seo_keyword; ?>" ><?php echo $site_name ;?></h1>
		<p><?php echo $site_descr ;?></p>			
	</div>
<?php require_once ('inc/footer.php')?>
</body>
</html>