<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model {
	protected $table = "wb_topics";
	protected $fillable = ["user_id", "subject", "content", "category"];
	public $timestamps = true;
	
	public function getAllTopicByCategoryId ($categoryId, $page) {
		$data = array();
		$perpage = 20;
		$skip    = ($page - 1) * $perpage;

		$topLists = Topic::where("category_id", $categoryId)
													->orderBy("id", "desc")
													->skip($skip)
													->take($perpage)
													->get();

		$topicCount = Topic::where("category_id", $categoryId)->count();

		$data["lists"] = array();
		if ($topLists) {
			foreach($topLists as $topic){
					array_push($data["lists"], array(
							"id"          => $topic->id,
							"subject"     => $topic->subject,
							"user_id"			=> $topic->user_id,
							"content"     => $topic->content,
							"category_id" => $topic->category_id,
							"created_at"  => $topic->created_at
					));
			}
		}

		$data["page_all"] = max(ceil($topicCount / $perpage), 1);

		return $data;
	}

	public function getTopicById ($id) {
		$data = array();

		$topicDetail = Topic::where("id", $id)->get();

		if($topicDetail){
			foreach($topicDetail as $topic){
					array_push($data, array(
							"id"          => $topic->id,
							"user_id"     => $topic->user_id,
							"subject"     => $topic->subject,
							"content"     => $topic->content,
							"category"    => $topic->category,
							"created_at"  => $topic->created_at
					));
			}
		}

		return $data;
	}

	public function saveTopic ($usesId, $data) {
		$result =  Topic::where("subject", $data["subject"])
										->where("content", $data["content"])
										->where("user_id", $usesId)
										->get();

		if(count($result) > 0) {
			return 0;
		} else {
			$input = [
				"user_id" 		=> $usesId,
				"subject" 		=> $data["subject"],
				"content" 		=> $data["content"],
				"category_id"	=> $data["cid"]
			];
	
			$topic = Topic::create($input);
	
			return $topic->id;
		}
	}
}
