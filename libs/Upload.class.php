<?php 
namespace libs;
	/**
	 * 文件上传类 upload
	 */
	class Upload
	{
		public function __construct(){
		}
		public function uploads($filename,$filedir='/upload'){
			//foreach ($filename['file']['error'] as $key => $error) {
				if ($filename['file']['error']==0) {
					$tmp_name=$filename['file']['tmp_name'];
					$name=$_FILES['file']['name'];
					if(move_uploaded_file($tmp_name,APP_PATH.DS.'upload'.DS.$name)){
						return APP_PATH.DS.'upload'.DS.$name;
					}else{
						return "上传失败";
					}
					
				}
			//}
			
		}	
	}







 ?>