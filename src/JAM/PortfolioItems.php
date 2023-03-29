<?php
/**
 * @author jambonbill
 * One class portfolio
 */

namespace JAM;

use PDO;
use Exception;

class PortfolioItems
{
	
	private $url='https://api.jambonbill.org/portfolio/';
    private $items=[];

    public function __construct ()
    {
        //$this->_Base=$Base;
    }



    public function fetch()
    {
    	//https://api.jambonbill.org/portfolio/
    	//$json=$this->fromFile($this->url);
    	
    	$json=file_get_contents($this->url);
		$o=json_decode($json);
		
		$err=json_last_error();
		
		if ($err) {
			throw new Exception(json_last_error_msg(), 1);			
		}

		$this->items=$o->data;
		
		// Save to cache
    	// todo
    }

    


    public function fromFile(string $filename)
    {
    	$json=file_get_contents($filename);
		$o=json_decode($json);
		
		$err=json_last_error();
		
		if ($err) {
			throw new Exception(json_last_error_msg(), 1);			
		}
		
		$this->items=$o->data;

		return $this->items;
    }


	/**
	 * Return the item
	 *
	 * @param integer $key
	 * @return void
	 */
	public function get(int $key)
	{
		if (isset($this->items[$key])) {			
			//$this->items[$key]->
			return $this->items[$key];
		}
		return false;		
	}
	
	public function getRelations(int $key)
	{	
		$next=$key+1;
		$prev=$key-1;
		return ['next'=>$next,'prev'=>$prev];
	}

	public function sort()
	{
		//sort items	
	}

	public function list(int $limit=0)
	{
		return $this->items;
	}


	/**
	 * Return 4 random items
	 *
	 * @return void
	 */
	public function random()
	{
		//shuffle($this->items);
		$copy=$this->items;
		shuffle($copy);
		return array_slice($copy, 0,4);
	}

	
	/**
	 * Find portfolio record `number` by id or permalink
	 *
	 * @param string $id
	 * @return mixed
	 */
	public function find(string $id)
	{
		if (preg_match("/^[0-9]{1,3}/",$id)) {
			//plain id
			foreach ($this->items as $k=>$item) {
				if ($item->id==$id) {
					return $k;
				}
			}
		}

		if (preg_match("/^[a-z0-9-]{3,}/", $id)) {
			//permalink
			foreach ($this->items as $k=>$item) {
				if ($item->permalink==$id) {
					return $k;
				}
			}
		}
		
		return false;
	}


		
	/**
	 * Return related items
	 *
	 * @return void
	 */
	public function related()
	{
		//
	}

}