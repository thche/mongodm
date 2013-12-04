<?php

namespace Purekid\Mongodm\Test\Model;

class User extends Base
{

	static $collection = "user";
	
	protected static $attrs = array(
			
		'book_fav' => array('model'=>'Purekid\Mongodm\Test\Model\Book','type'=>'reference'),
		'books' => array('model'=>'Purekid\Mongodm\Test\Model\Book','type'=>'references'),
		'age' => array('default'=>16,'type'=>'integer'),
		'money' => array('default'=>20.0,'type'=>'double'),
		'hobbies' => array('default'=>array('love'),'type'=>'array'),
		'family'=>array('type'=>'object'),
        'pet' => array( 'model'=>'Purekid\Mongodm\Test\Model\Pet' , 'type'=>'embed'),
        'pets_fav' => array( 'model'=>'Purekid\Mongodm\Test\Model\Pet' , 'type'=>'embeds')

	);

	protected function __init(){
		if(! $this->init_data) $this->init_data = "init";
	}
	
	protected function __preSave(){
		if(! $this->pre_save_data) $this->pre_save_data = "ohohoh";
	}

	public function setTestSetMethod($value) {
		$value = strtolower($value);
		$this->__setter('testSetMethod', $value);
	}

	public function getTestGetMethod() {
		$value = $this->__getter('testGetMethod');
		return strtoupper($value);
	}
	
}