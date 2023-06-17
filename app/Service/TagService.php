<?php

namespace App\Service;


class TagService
{
    public static function add($data){
		try{
			$data['time'] = strtotime($data['time']);
			$data['stop_time'] = strtotime($data['stop_time']);

			$StockModel= Stock::create($data);
			$res=$StockModel->id;
		}catch(\Exception $e){
			throw new \Exception($e->getMessage());
		}
		return $res;
	}
}
