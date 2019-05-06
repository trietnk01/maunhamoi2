<?php
class PostMetabox{
	public function __construct(){
		global $zController;				
		preg_match('#(?:.+\/)(.+)#', $_SERVER['SCRIPT_NAME'],$matches);
		$phpFile = $matches[1];		
		if($phpFile == 'edit.php'){			
			add_filter('manage_posts_columns', array($this,'add_column'));
			add_action('manage_post_posts_custom_column', array($this,'display_value_column'),10,2);				
			add_action('pre_get_posts', array($this,'modify_query'));
			add_action('restrict_manage_posts', array($this,'za_kind_article_list'));
		}					
	}
	public function add_column($columns){					
		$newArr = array();
		foreach ($columns as $key => $title){
			$newArr[$key] = $title;
			if($key == 'categories'){
				$newArr['category_kind'] = __('Thể loại');
			}
		}				
		return $newArr;
	}	
	public function display_value_column($column,$post_id){				
		if($column == 'category_kind'){
			echo get_the_term_list($post_id, 'za_kind_article','', ', ');
		}
	}
	public function modify_query($query){
		global $zController;
		if($zController->getParams('orderby') == ''){
			$query->set('orderby','ID');
			$query->set('order','DESC');
		}
		
		$orderby = $query->get('orderby');
		
		if($orderby == 'view'){
			$query->set('meta_key',$this->create_key('view'));
			$query->set('orderby','meta_value_num');
		}
		
		
		if($zController->getParams('za_kind_article') > 0){
			
			$tax_query = array(
				'relation' => 'OR',
				array(
					'taxonomy' => 'za_kind_article',
					'field'		=> 'term_id',
					'terms'		=> $zController->getParams('za_kind_article'),
				));
			$query->set('tax_query',$tax_query);
		}
		
	}
	public function za_kind_article_list(){
		global $zController;
		wp_dropdown_categories(array(
			'show_option_all' => __("Tất cả thể loại"),
			'taxonomy'			=> 'za_kind_article',
			'name'				=> 'za_kind_article',
			'orderby'			=> 'name',
			'selected'			=> $zController->getParams('za_kind_article'),
			'hierarchical'		=> true,
			'depth'				=> 3,
			'show_count'		=> true,
			'hide_empty'		=> true,

		));
	}
}