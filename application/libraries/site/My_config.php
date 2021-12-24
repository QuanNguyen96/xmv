<?php

defined('BASEPATH') or exit('No direct script access allowed');
class My_config extends CI_Controller
{
	public $message = '';
	public function __construct()
	{
		$this->CI = &get_instance();
		$this->CI->load->model(array('site/myconfig_model'));
	}
	public function get_config($colum = null)
	{
		$config = $this->CI->db->select('*')->where('name', $colum)->get('config')->row('value');
		return $config;
		/*$config = json_decode($config,true);
		if( isset($config[$colum]) )
		return $config[$colum];
		else 
		return $config;*/
	}
	public function get_top_menu()
	{
		$data = $this->CI->myconfig_model->Db_get_position_menu('top');
		$html = '';
		if (!empty($data))
		{
			$html .= '<ul class="">';
			$html .= '<li class="home_button"><a href="' . base_url() . '">&nbsp;</a></li>';
			$liLast = false;
			foreach ($data as $key => $val)
			{
				$url = $val['module'] == 'hyperlink' ? $val['hyperlink'] : base_url($val['slug']) .
					'.html';
				$search = array(
					'$thanghientai',
					'$namhientai',
					'$nam');
				$replace = array(
					date('n'),
					date('Y'),
					'2019');

				if(strcasecmp($val['name'], 'tử vi 2021') == 0 && $val['level'] == 0)
                {
                    $val['name']='Tử vi 2022';
                    $url='xem-boi-tu-vi-2022-cua-12-con-giap.html';
                }
				$url = str_replace($search, $replace, $url);
				if ($val['level'] == 0)
				{
					if (isset($data[$key - 1]) && $data[$key - 1]['level'] > 0)
						$html .= '</ul></li>';
					if (isset($data[$key + 1]) && $data[$key + 1]['level'] > 0)
					{
						$show_class1 = '';
						$show_img = '';
						if ($val['slug'] == 'xem-lich-am-duong-$nam')
						{
							$show_class1 = 'class="position_menu"';
							$show_img = '<img src="' . public_url() . 'images/icon/new.gif">';
						}
						$html .= '<li ' . $show_class1 . ' ><a  href="' . $url . '">' . $val['name'] .
							'' . $show_img . '</a><ul>';
					} else
					{
						$show_img = $val['slug'] == 'xem-tu-vi-nam-2019-cua-12-con-giap' ? '<img src="' . public_url() .
							'images/icon/hot-icon.gif">' : '';
						$show_class = ($val['slug'] == 'xem-tu-vi-nam-2019-cua-12-con-giap') ? 'class="position_menu"' : '';
						$html .= '<li ' . $show_class . '><a href="' . $url . '">' . $val['name'] .
							'</a>' . $show_img . '</li>';
					}
                    if(strcasecmp($val['name'], 'tử vi')==0)
                    {
                        $html .= '<li><a href="'.base_url().'xem-tu-vi-nam-2021.html">Tử vi 2021</a></li>';
                    }
				} else
				{
					$html .= '<li><a href="' . $url . '">' . $val['name'] . '</a></li>';
				}
			}
			$html .= '</ul>';
		}
		return $html;
	}
	public function get_top_menu_mobile()
	{
		$data = $this->CI->myconfig_model->Db_get_position_menu('top');
		$html = '';
		if (!empty($data))
		{
                
			$html .= '<ul class="ul2"><li class="mnRight-closeBtn">&times;</li>';
			$html .= '<li style="padding-left:15px"><img src="'.base_url('templates/site/images').'/icon_home.png"/><a style="padding-left:5px" href="'.base_url().'">TRANG CHỦ</></li>';
            $html .= '<li class="lv2"><a href="'.base_url().'xem-boi-tu-vi-2022-cua-12-con-giap.html">Tử Vi 2022</a></li>';
			$liLast = false;
			foreach ($data as $key => $val)
			{
				$url = $val['module'] == 'hyperlink' ? $val['hyperlink'] : base_url($val['slug']) .
					'.html';
				$search = array(
					'$thanghientai',
					'$namhientai',
					'$nam');
				$replace = array(
					date('n'),
					date('Y'),
					'2018');
				$url = str_replace($search, $replace, $url);
				if ($val['level'] == 0)
				{
					if (isset($data[$key - 1]) && $data[$key - 1]['level'] > 0)
						$html .= '</ul></li>';
					if (isset($data[$key + 1]) && $data[$key + 1]['level'] > 0)
					{
						$html .= '<li class="lv2" ><a  href="' . $url . '">' . $val['name'].'</a><span class="icon_menu_viewmore"><i class="glyphicon glyphicon-menu-down"></i></span><ul class="ul3 hidden">';
					} else
					{
						$html .= '<li class="lv3"><a href="' . $url . '">' . $val['name'] .
							'</a></li>';
					}
				}
				else
				{
					$html .= '<li class="lv3"><a href="' . $url . '">' . $val['name'] . '</a></li>';
				}
			}
			$html .= '<li class="li_close_menu">X&nbsp;&nbsp;&nbsp;ĐÓNG DANH MỤC</li></ul>';
		}
		return $html;
	}
	public function get_top_menu_button_bottom_mobile()
	{
		$data = $this->CI->myconfig_model->Db_get_position_menu('top');
		$html = '';
		if (!empty($data))
		{
			$html .= '<ul>';
			$liLast = false;
			foreach ($data as $key => $val)
			{
				$url = $val['module'] == 'hyperlink' ? $val['hyperlink'] : base_url($val['slug']) .
					'.html';
				$search = array(
					'$thanghientai',
					'$namhientai',
					'$nam');
				$replace = array(
					date('n'),
					date('Y'),
					'2018');
				$url = str_replace($search, $replace, $url);
				if ($val['level'] == 0)
				{
					$html .= '<li><a  href="' . $url . '">' . $val['name'].'</a></li>';
				}
			}
			$html .= '</ul>';
		}
		return $html;
	}
	public function get_right_menu()
	{
		$data = $this->CI->myconfig_model->Db_get_position_menu('right');
		$newdata = array();
		$i = 0;
		if (!empty($data))
		{
			foreach ($data as $val)
			{
				if ($val['level'] == 0)
				{
					$newdata[$i] = $val;
					$i++;
				} else
					$newdata[$i - 1]['submenu'][] = $val;
			}
		}
		$this->CI->load->view('site/import/menu_right', array('data' => $newdata));
	}

	public function get_right_menu_mobile()
	{
		$data = $this->CI->myconfig_model->Db_get_position_menu('right');
		$newdata = array();
		$i = 0;
		if (!empty($data))
		{
			foreach ($data as $val)
			{
				if ($val['level'] == 0)
				{
					$newdata[$i] = $val;
					$i++;
				} else
					$newdata[$i - 1]['submenu'][] = $val;
			}
		}
		$this->CI->load->view('site/import/menu_right_mobile', array('data' => $newdata));
	}
}
