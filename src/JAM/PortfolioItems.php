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



	public function list()
	{
		return $this->items;
	}

	
	/**
	 * Find portfolio record by id or permalink
	 *
	 * @param string $id
	 * @return mixed
	 */
	public function find(string $id)
	{
		if (preg_match("/^[0-9]{1,3}/",$id)) {
			//plain id
			foreach ($this->items as $item) {
				if ($item->id==$id) {
					return $item;
				}
			}
		}

		if (preg_match("/^[a-z0-9-]{3,}/", $id)) {
			//permalink
			foreach ($this->items as $item) {
				if ($item->permalink==$id) {
					return $item;
				}
			}
		}
		
		return false;
	}

}