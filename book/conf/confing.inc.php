<?php
        return array(
					
			//你可以在这里进行配置		
			'db' => array(
				'type' => 'mysql',
				'pcontent' => 1,
				'name' => 'li',
				'user' => 'root',
				'password' => '',
				'host' => 'localhost',
				'pre' => 'firezp_',
			),
			'tpl' => array(
				'type'=>'smarty',
				'left_delimiter' => '<{',
				'right_delimiter' => '}>',
				//'cache' => true,
				//'cachetime' => 3600,
			),
        	'page'=> 10,
			'cache' => array(
				'type'=>'file',
			),
			'autokey'=>'sdfsdfa15151sf',//这里可以随意填，但是不能删除		
		);
			
		
?>