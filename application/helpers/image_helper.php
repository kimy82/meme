<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

function image($image_path, $image_name, $width = 0, $height = 0) {
    //Get the Codeigniter object by reference
    $CI = & get_instance();
     
	//The new generated filename
    $source_image = $image_path . $image_name;
	$dir_name = $image_path . $width . '_' . $height . '/';
	
	// Create dir for each mew dimension
	if (!file_exists($dir_name)) {mkdir($dir_name, 0755);}
	
    $new_image_path = $dir_name  . $width . '_' . $height . '_' . $image_name;
     
    //The first time the image is requested
    //Or the original image is newer than our cache image
    if ((! file_exists($new_image_path))) {
        $CI->load->library('image_lib');
        
        //The original sizes
        $original_size = getimagesize($source_image);
        $original_width = $original_size[0];
        $original_height = $original_size[1];
        $ratio = $original_width / $original_height;
        
        //The requested sizes
        $requested_width = $width;
        $requested_height = $height;
        
        //Initialising
        $new_width = 0;
        $new_height = 0;
        
        //Calculations
        if ($requested_width > $requested_height) {
            $new_width = $requested_width;
            $new_height = $new_width / $ratio;
            if ($requested_height == 0)
                $requested_height = $new_height;
            
            if ($new_height < $requested_height) {
                $new_height = $requested_height;
                $new_width = $new_height * $ratio;
            }
        
        }
        else {
            $new_height = $requested_height;
            $new_width = $new_height * $ratio;
            if ($requested_width == 0)
                $requested_width = $new_width;
            
            if ($new_width < $requested_width) {
                $new_width = $requested_width;
                $new_height = $new_width / $ratio;
            }
        }
        
        $new_width = ceil($new_width);
        $new_height = ceil($new_height);
        
        //Resizing
        $config = array();
        $config['image_library'] = 'gd2';
        $config['source_image'] = $source_image;
        $config['new_image'] = $new_image_path;
    $config['maintain_ratio'] = TRUE;
    $config['master_dim'] = 'height';
        $config['height'] = $new_height;
        $config['width'] = $new_width;
        $CI->image_lib->initialize($config);
        $CI->image_lib->resize();
        $CI->image_lib->clear();
        
        //Crop if both width and height are not zero
        if (($width != 0) && ($height != 0)) {
            $x_axis = floor(($new_width - $width) / 2);
            $y_axis = floor(($new_height - $height) / 2);
            
            //Cropping
            $config = array();
            $config['source_image'] = $new_image_path;
        $config['maintain_ratio'] = TRUE;
        $config['master_dim'] = 'height';            
            $config['new_image'] = $new_image_path;
            $config['width'] = $width;
            $config['height'] = $height;
            $config['x_axis'] = $x_axis;
            $config['y_axis'] = $y_axis;
            $CI->image_lib->initialize($config);
            $CI->image_lib->crop();
            $CI->image_lib->clear();
        }
    }
     
    return base_url() . $new_image_path;
}
/* End of file image_helper.php */