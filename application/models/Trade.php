<?php 
class Trade extends CI_Model
{
	public function getTrade($email) 
	{
		return $this->db->where('email',$email)->where('status','PENDING')->order_by('id','DESC')->get('trades')->result();
	}
	public function getProfile($email) 
	{
		$query=$this->db->where('email',$email)->get("users");
    	return $query->row();
	}

	public function getTradeBitcoin($email) 
	{
		return $this->db->where('email',$email)->where('status','PENDING')->order_by('id','DESC')->get('trade_bitcoin')->result();
	}

	public function getHistory($email)
	{
		$this->db->where('email',$email)->where('status <> ','PENDING')->limit(10)->order_by('id','DESC');
		return $this->db->get('trades')->result();
	}

	public function getHistoryBitcoin($email)
	{
		$this->db->where('email',$email)->where('status <> ','PENDING')->limit(10)->order_by('id','DESC');
		return $this->db->get('trade_bitcoin')->result();
	}

	public function getRates($type)
	{
		return $this->db->where('cardtype',$type)->get('rates')->result();
	}

	public function getBanks($user)
	{
		return $this->db->where('email',$user)->get('users')->row();;
	}

	public function getLastBitcoinTrade()
	{	
		return $this->db->order_by('id','desc')->get_where('trade_bitcoin')->row();
	}

	public function getLastTrade($ref)
	{	
		$query=$this->db->where('ref_code',$ref)->get("trades");
    	return $query->row();
		// return $this->db->order_by('id','desc')->get_where('trades')->row();
	}
	
	public function getRef()
	{
		$chars = array_merge(range('A','Z'), range(0,9));
		$string = "REF-";
		for($a = 0; $a < 10; $a++) {
			$string .= $chars[rand(0, count($chars) - 1)];
		}

		return $string;
	}

	public function getRate($type) {
		return $this->db->where('cardtype',$type)->where('naira <> ','0')->order_by('id','desc')->get('rates')->result();
	}

	public function testimony($count = 0) {
		if($count > 0) {
			$this->db->limit($count);
		}
		$this->db->order_by('id','desc');
		return $this->db->where('status','approved')->get('testimonies')->result();
	}
	
	
	//API UPDATES
		public function getAllUsersTrade($email) 
	{
		return $this->db->where('email',$email)->join('available_cards','trades.type = available_cards.cardname')->join('trade_details','trades.ref_code = trade_details.ref')->order_by('trades.id','DESC')->get('trades')->result();
	}
}
