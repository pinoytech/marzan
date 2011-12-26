<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Admin_Controller extends MY_Controller {

	function Admin_Controller()
	{
		parent::MY_Controller();
		$this->load->library('auth');
	}

	function image_render($theme, $path)
	{
		header('Content-Type: image/jpeg');
		header('Content-Disposition: attachment; filename=' . APPPATH . "views/theme/" . $theme . '/' . $path);
		header('Content-Transfer-Encoding: binary');
		header('Expires: 0');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Pragma: public');
		header('Content-Length: '.(filesize(APPPATH . "views/theme/" . $theme . '/' . $path)));

		readfile(APPPATH . "views/theme/" . $theme . '/' . $path);
		exit;
	}
}
// $paths = array('C:\xampp\php\PEAR','C:\wamp\bin\php\php5.3.0\PEAR', get_include_path());
// set_include_path(implode(PATH_SEPARATOR,$paths));
/* End of file Admin_Controller.php */
/* Location: ./application/libraries/Admin_Controller.php */
