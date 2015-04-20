<?php
	
	function imageUpload($controlname,$filetypes=array("image/jpeg"=>".jpg","image/pjpeg"=>".jpg","image/png"=>".png"),$size=200000){		
		if($_FILES[$controlname]['error']>0){
			$msg="File Upload Error";
			$_SESSION['msg']=$msg;
			header("Location:../product-man.php?do=addNewProduct");die;
		}else{
			if($_FILES[$controlname]['size']>=$size){
				$msg="File size must be less than 200kb";
				$_SESSION['msg']=$msg;
				header("Location:../product-man.php?do=addNewProduct");die;
			}else{
				if(array_key_exists($_FILES[$controlname]['type'],$filetypes)){
					if(move_uploaded_file($_FILES[$controlname]['tmp_name'],$address="../uploads/".sha1(time()).
					$controlname.$filetypes[$_FILES[$controlname]['type']])){
						return $address;
					}
					else{
						$msg="File can't be uploaded";
						$_SESSION['msg']=$msg;
						header("Location:../product-man.php?do=addNewProduct");die;
					}
				}
			}
		}
	}
?>