<?php

namespace App\Http\Controllers;
use Redirect;
use Illuminate\Http\Request;
use Image;
use DB;
use App\createpost;
use App\Imagelocation;
class postController extends Controller
{
    //

     public function create()
    {
    	return view('welcome');
    	
    }
    public function update(Request $Request)
    {
    	$a=$Request->post_id;
    	// Get all Images
    	$all_images=Imagelocation::where('id',$a)->get();
    	// Get all Images in Request

 		preg_match_all('/<img[^>]+>/i',$Request->info, $result);

 		$result=$result[0];
 		$matches=array();
 		 foreach ($result as $key) {
  		//echo $key;
  			# code...
  		  $regex = "~data:image/[a-zA-Z]*;base64,[a-zA-Z0-9+/\\=]*=~"; 
  		  if(preg_match($regex, $key))
  		  {
  		  $temp="";
			preg_match($regex, $key, $temp);
			array_push($matches, $temp);

 				 }

 				}
    	//Compare if any

 	$image_count=sizeof($all_images);
   $temp_replaced_array=array();
   $img_location=array();
   foreach($matches as $temp)
   {
   	$image = explode( ',', $temp[0]);
   	$file=base64_decode( $image[ 1 ] );
   	$image_name=(string)$image_count.'.png';
   	//mkdir("images\\testit");
   	$path = 'C:\Users\sn186056\myapp\public\images\\'. $image_name;
	$temp_path='http://localhost:8000\\'.'images\\'. $image_name;
//	$result[0][$image_count]=str_replace($temp[0],$temp_path,$result[0][$image_count]);
	$hera=str_replace($temp[0],$temp_path,$Request->info);
		//echo $final_image;
	//echo $result[0];
		//array_push($temp_replaced_array, $temp_replace);
	array_push($img_location, $temp_path);
	
	file_put_contents($path, $file);
	$image_count++;	
   	   }
    $help=array();
   	   array_push($help,$hera );
   	  //$cp =new createpost();
   	   //Insert into database
   	   $body=$hera;
   	 //  $a=array('body'=>$hera);
   	   //return $a;
   	   //createpost::create($a);
   	   //Insert image locations into db
   	   $a=createpost::where('id',$Request->post_id)->first();
   	   	$a->body=$body;
   	   	$a->save();
   	   	return createpost::where('id',$Request->post_id)->first();

   	foreach ($img_location as $key ) {
   			$temp=array('id'=>$a->id,'location'=>$key);
   			Imagelocation::create($temp);
   	
   	}

   	 /* 	return $help;*/

    }
    public function edit($data)
    {
    	$post=createpost::where('id',$data)->first();
    	return view('edit')->with('name',$post);
    }
    public function store(Request $Request)
    {
  	// Images are collected 
    preg_match_all('/<img[^>]+>/i',$Request->info, $result);
    // If post has only text not images
    if(sizeof($result[0])==0)
		    {
		   		
		   		$post_info=array('body'=>$Request->info);
		   	    createpost::create($post_info);
		   	    return "Success";
		 	}
 	else
 	{	    //
 			$image_tags=$result[0];
 			// Store Matched images in matches array
 			$matches = array();
 			// Find all images in base64 format
  			foreach ($image_tags as $key) 
  			{
  		  		$regex = "~data:image/[a-zA-Z]*;base64,[a-zA-Z0-9+/\\=]*=~"; 
    	  		if(preg_match($regex, $key))
  		  		{
		    	  		$temp="";
				  		preg_match($regex, $key, $temp);
				  		array_push($matches, $temp);
				 } 		
  			}
			   $image_count=0;
			   $temp_replaced_array=array();
			   $img_location=array();
			   foreach($matches as $temp)
			   {
			   	$image = explode( ',', $temp[0]);
			   	$file=base64_decode( $image[ 1 ] );
			   	$image_name=(string)$image_count.'.png';
			   	//mkdir("images\\testit");
			   	$path = 'C:\Users\sn186056\myapp\public\images\\'. $image_name;
				$temp_path='http://localhost:8000\\'.'images\\'. $image_name;
				$hera=str_replace($temp[0],$temp_path,$Request->info);
				array_push($img_location, $temp_path);
				file_put_contents($path, $file);
				$image_count++;	
			   	   }

			   	   $help=array();
			   	   array_push($help,$hera );
			   	  //$cp =new createpost();
			   	   //Insert into database
			   	   $body=$hera;
			   	   $a=array('body'=>$hera);
			   	   createpost::create($a);
			   	   //Insert image locations into db
			   	   $a=createpost::where('body',$hera)->first();

			   	foreach ($img_location as $key ) 
			   			{
				   			$temp=array('id'=>$a->id,'location'=>$key);
				   			Imagelocation::create($temp);
				   	
			   			}
				return $help;
			}

 
    }

   public function show()
   {
   	$a=createpost::all();
   //return $a; 
    return view('test')->with('name',($a));
   } 

    public function delete($id)
   {
   	
   	$post=createpost::where('id',$id)->delete();
   	$a=createpost::all();
   //return $a; 
    return view('test')->with('name',($a));
   } 
   

}
