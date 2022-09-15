<?php
class TagLibLists extends TagLib{
	protected  $tags = array(
			'lanmulist' => array('attr' => 'toplanmu_id,limit,order','close' =>1),
			'lanmu' => array('attr'=>'lanmu_id'),
			'arclist' => array('attr'=>'lanmu_id,order,limit,zhuangtai'),
			'prclist'=>array('attr'=>'lanmu_id,order,limit,zhuangtai'),
			'ad'=>array('attr'=>'ad_id'),
			'danye'=>array('attr'=>'lanmu_id')
			// attr 属性列表close 是否闭合（0 或者1 默认为1，表示闭合）
	);
	public function _danye($attr,$content){
		$attr= $this->parseXmlAttr($attr);
		$lanmu_id = $attr['lanmu_id'];
		$danye = M('danye')->where("lanmu_id = ".$lanmu_id)->select();
		$model = array(
			'/\[field.title\]/',
			'/\[field.keywords\]/',
			'/\[field.description\]/',
			'/\[field.image\]/',
			'/\[field.content\]/'
		);
		$replace = array(
			$danye[0]['title'],
			$danye[0]['keywords'],
			$danye[0]['description'],
			$danye[0]['image'],
			$danye[0]['content']
		);
		$str .= preg_replace($model, $replace, $content);
		return $str;
	}
	public function _ad($attr,$content){
		$attr = $this->parseXmlAttr($attr);
		$ad_id = $attr['ad_id'];
		$ad = M('ads')->where("ad_id = ".$ad_id)->select();
		$model = array(
				'/\[field.ad_id\]/',
				'/\[field.width\]/',
				'/\[field.height\]/',
				'/\[field.image\]/',
				'/\[field.link\]/',
				'/\[field.title\]/'
		);
		$replace = array(
			$ad[0]['ad_id'],
			$ad[0]['width'],
			$ad[0]['height'],
			$ad[0]['image'],
			$ad[0]['link'],
			$ad[0]['title'],
		);
		$str = preg_replace($model, $replace, $content);
		return $str;
	}
	public function _prclist($attr,$content){
		$attr = $this->parseXmlAttr($attr);
		$lanmu_id = $attr['lanmu_id'];
		$order = $attr['order'];
		$limit = $attr['limit'];
		$zhuangtai = $attr['zhuangtai'];
		$where = '';
		if ($lanmu_id){
			$where.="lanmu_id in (".$lanmu_id.")";
		}else{
			$where.="1";
		}
		if ($zhuangtai){
			$where.=' and zhuangtai in('.$zhuangtai.")";
		}
		$arclist = M('product')->where($where)->limit($limit)->order($order)->select();
		$str ='';
		for ($i=0;$i<count($arclist);$i++){
			$model = array(
					'/\[field.product_id\]/',
					'/\[field.lanmu_id\]/',
					'/\[field.title\]/',
					'/\[field.image\]/',
					'/\[field.image2\]/',
					'/\[field.image3\]/',
					'/\[field.price\]/',
					'/\[field.description\]/',
					'/\[field.keywords\]/',
					'/\[field.liulan\]/',
					'/\[field.uptime\]/',
					'/\[field.class_id\]/',
					'/\[field.zhuangtai\]/',
					'/\[field.content\]/'
			);
			$replace = array(
					$arclist[$i]['product_id'],
					$arclist[$i]['lanmu_id'],
					$arclist[$i]['title'],
					$arclist[$i]['image'],
					$arclist[$i]['image2'],
					$arclist[$i]['image3'],
					$arclist[$i]['price'],
					$arclist[$i]['description'],
					$arclist[$i]['keywords'],
					$arclist[$i]['liulan'],
					$arclist[$i]['uptime'],
					$arclist[$i]['class_id'],
					$arclist[$i]['zhuangtai'],
					$arclist[$i]['content']
			);
			$str.=preg_replace($model, $replace, $content);
		}
		return $str;
	}
	public function _arclist($attr,$content){
		$attr = $this->parseXmlAttr($attr);
		$lanmu_id = $attr['lanmu_id'];
		$order = $attr['order'];
		$limit = $attr['limit'];
		$zhuangtai = $attr['zhuangtai'];
		$where = '';
		if ($lanmu_id){
			$where.="lanmu_id in (".$lanmu_id.")";
		}else{
			$where.="1";
		}
		if ($zhuangtai){
			$where.=' and zhuangtai in('.$zhuangtai.")";
		}
		$arclist = M('article')->where($where)->limit($limit)->order($order)->select();
		$str ='';
		for ($i=0;$i<count($arclist);$i++){
			$model = array(
				'/\[field.article_id\]/',
				'/\[field.lanmu_id\]/',
				'/\[field.title\]/',
				'/\[field.image\]/',
				'/\[field.description\]/',
				'/\[field.keywords\]/',
				'/\[field.liulan\]/',
				'/\[field.uptime\]/',
				'/\[field.class_id\]/',
				'/\[field.zhuangtai\]/',
				'/\[field.content\]/'
			);
			$replace = array(
					$arclist[$i]['article_id'],
					$arclist[$i]['lanmu_id'],
					$arclist[$i]['title'],
					$arclist[$i]['image'],
					$arclist[$i]['description'],
					$arclist[$i]['keywords'],
					$arclist[$i]['liulan'],
					$arclist[$i]['uptime'],
					$arclist[$i]['class_id'],
					$arclist[$i]['zhuangtai'],
					$arclist[$i]['content']
			);
			$str.=preg_replace($model, $replace, $content);
		}
		return $str;
	}
	public function _lanmu($attr,$content){
		$attr = $this->parseXmlAttr($attr);
		$lanmu_id = $attr['lanmu_id'];
		$lanmu = M('lanmu')->where("lanmu_id in(".$lanmu_id.")")->select();
		$model = array('/\[field.lanmu_id\]/','/\[field.lanmu_name\]/');
		$str='';
		for($i=0;$i<count($lanmu);$i++){
			$model=array(
					'/\[field.lanmu_id\]/',
					'/\[field.lanmu_name\]/',
					'/\[field.model\]/'
			);
			$replace=array(
					$lanmu[$i]['lanmu_id'],
					$lanmu[$i]['lanmu_name'],
					$lanmu[$i]['model']
			);
			$str.=preg_replace($model,$replace,$content);
		}
		return $str;		
	}
	public function _lanmulist($attr,$content){
		$attr=$this->parseXmlAttr($attr);
		$limit = $attr['limit'];
		$order=$attr['order'];
		$toplanmu_id = $attr['toplanmu_id'];
		
		$lanmu = M('lanmu')->where("toplanmu_id in(".$toplanmu_id.")")->limit($limit)->order($order)->select();
	
		$str='';
		for($i=0;$i<count($lanmu);$i++){
			$model=array(
					'/\[field.lanmu_id\]/',
					'/\[field.lanmu_name\]/'
			);
			$replace=array(
					$lanmu[$i]['lanmu_id'],
					$lanmu[$i]['lanmu_name']
			);
			$str.=preg_replace($model,$replace,$content);
		}
		return $str;
	}
}