<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Replise extends Model {
	protected $table = "wb_replies";
	protected $fillable = ["topic_id", "username", "content"];
	public $timestamps = true;
	
	public function getAllRepliseByTopicId ($id, $page) {
		$data = array();
		$perpage = 20;
		$skip    = ($page - 1) * $perpage;

		$repliseLists = Replise::where("topic_id", $id)
														->orderBy("id", "desc")
														->skip($skip)
														->take($perpage)
														->get();

		$repliseCount = Replise::where("topic_id", $id)->count();

		if($repliseLists){
			foreach($repliseLists as $reply){
					array_push($data["lists"], array(
							"id"          => $reply->id,
							"user_id"     => $reply->user_id,
							"topic_id"    => $reply->topic_id,
							"content"     => $reply->content,
							"created_at"  => $reply->created_at
					));
			}
		}

		$data["page_all"] = max(ceil($repliseCount / $perpage), 1);

		return $data;
	}

	public function saveReply ($data) {
		$result =  Replise::where("topic_id", $data["topic_id"])
										->where("username", $data["username"])
										->where("content", $data["content"])
										->get();

		if(count($result) > 0) {
			return 0;
		} else {
			$input = [
				"topic_id" => $data["topic_id"],
				"username" => $data["username"],
				"content"  => $data["content"]
			];

			$reply = Replise::create($input);
			return $reply->id;
		}
	}
}
