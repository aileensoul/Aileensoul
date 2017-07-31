<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class profile {

    function thumb($fullname, $width, $height)
    {
       // echo $fullname;
        // Path to image thumbnail in your root
        $dir = './uploads/blog/main/';
        $url = base_url() . 'uploads/blog/main/';
        // $dir = './uploads/blog/main/dhaval.jpg';
        // $url = "http://localhost/aileensoul/uploads/blog/main/dhaval.jpg";
        // Get the CodeIgniter super object
        $CI = &get_instance();
        // get src file's extension and file name
        $extension = pathinfo($fullname, PATHINFO_EXTENSION);
        $filename = pathinfo($fullname, PATHINFO_FILENAME);
        $image_org = $dir . $fullname . "." . 'jpg';
        $image_thumb = $dir . $fullname . "-" . $height . '_' . $width . "." . 'jpg';
        $image_returned = $url . $fullname . "-" . $height . '_' . $width . "." .'jpg';

        if (!file_exists($image_thumb)) {
            // LOAD LIBRARY
            $CI->load->library('image_lib');
            // CONFIGURE IMAGE LIBRARY
            $config['source_image'] = $image_org;
            $config['new_image'] = $image_thumb;
            $config['width'] = $width;
            $config['height'] = $height;
            $CI->image_lib->initialize($config);
            $CI->image_lib->resize();
            $CI->image_lib->clear();
        }
        return $image_returned;
    }
}