<?php
    Class Template
    {
        var $template_data=array();
        function set($nama,$value)
        {
            $this->template_data[$nama]=$value;
        }
        function load($template='',$view='',$view_data=array(), $return = FALSE)
        {
            $this->CI =& get_instance();
            $this->set('content',$this->CI->load->view($view,$view_data,true));
            return $this->CI->load->view($template,$this->template_data,$return);
        }
    }

?>
