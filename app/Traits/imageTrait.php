<?php
 namespace App\Traits;

 trait imageTrait
 {
 	
 	public function insertimage($image)
 	{
 		if(isset($image)){
 			$file=$image;
 			$fileName=time().$file->getClientOriginalName();
 			$destinationpath='imageupload';
 			$file->move($destinationpath,$fileName);

 			return $fileName;
 		}
 	}
	
 	public function insertfile($pdf){
 		if(isset($pdf)){
 			$file=$pdf;
 			$fileName1=time().$file->getClientOriginalName();
 			$destinationpath='fileupload';
 			$file->move($destinationpath,$fileName1);

 			return $fileName1;
 		}
 	}
 }