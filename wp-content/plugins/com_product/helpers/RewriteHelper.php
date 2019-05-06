<?php
class RewriteHelper{
	
	public function __construct($options = array()){
		add_action('init', array($this,'add_tags_rule'));
		register_deactivation_hook($options['file'], array($this,'plugin_deactivation'));
	}	
	public function plugin_deactivation(){
		flush_rewrite_rules(false);
	}		
	public function add_tags_rule(){


		add_rewrite_tag('%za_manufacturer%', '([^/]+)');
		add_permastruct('za_manufacturer', 'hang-san-xuat/%za_manufacturer%');		

		add_rewrite_tag('%za_product_trade%', '([^/]+)');
		add_permastruct('za_product_trade', 'thuong-hieu/%za_product_trade%');	

		add_rewrite_tag('%za_category%', '([^/]+)');
		add_permastruct('za_category', 'loai-san-pham/%za_category%');

		add_rewrite_tag('%za_video%', '([^/]+)');
		add_permastruct('za_video', 'chuyen-muc-video/%za_video%');

		add_rewrite_tag('%za_faq%', '([^/]+)');
		add_permastruct('za_faq', 'chuyen-muc-hoi-dap/%za_faq%');

		add_rewrite_tag('%za_project%', '([^/]+)');
		add_permastruct('za_project', 'chuyen-muc-du-an/%za_project%');

		add_rewrite_tag('%za_position%', '([^/]+)');
		add_permastruct('za_position', 'vi-tri/%za_position%');

		flush_rewrite_rules(false);
	}
	
	
}