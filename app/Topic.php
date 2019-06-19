<?php

namespace App;

use App\Replise;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model {
	protected $table = "wb_topics";
	protected $fillable = ["user_id", "subject", "content", "category"];
	public $timestamps = true;

	public function getAllTopicByCategoryId ($categoryId, $page) {
		$data = array();
		$perpage = 20;
		$skip    = ($page - 1) * $perpage;

		$topicLists = DB::table('wb_topics')
		            ->join('wb_category', 'wb_topics.category_id', '=', 'wb_category.id')
		            ->join('wb_users', 'wb_topics.user_id', '=', 'wb_users.id')
		            ->select('wb_topics.*', 'wb_users.id as user_id', 'wb_users.name as name', 'wb_users.email as email')
		            ->where("wb_topics.category_id", $categoryId)
		            ->orderBy("wb_topics.id", "desc")
								->skip($skip)
								->take($perpage)	
		            ->get();


		$topicCount = Topic::where("category_id", $categoryId)->count();

		$data["lists"] = array();
		if ($topicLists) {
			foreach($topicLists as $topic){
					$replyNumber = Replise::where("topic_id", $topic->id)->count();

					array_push($data["lists"], array(
							"id"          => $topic->id,
							"subject"     => $topic->subject,
							"user_id"			=> $topic->user_id,
							"name" 				=> $topic->name,
							"email" 			=> $topic->email,
							"category_id" => $topic->category_id,
							"content"     => $topic->content,
							"reply_number"=> $replyNumber,
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
					$user 	 = User::where('id', $topic->user_id)->get();
					$replise = Replise::where('topic_id', $topic->id)->get();

					array_push($data, array(
							"id"          => $topic->id,
							"user_id"     => $topic->user_id,
							"name"				=> $user[0]->name,
							"email"				=> $user[0]->email,
							"subject"     => $topic->subject,
							"content"     => $topic->content,
							"category_id" => $topic->category_id,
							"replise" 		=> $replise,
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
