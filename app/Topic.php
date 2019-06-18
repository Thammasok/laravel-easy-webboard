<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model {
	protected $table = 'wb_topics';
	protected $fillable = ['user_id', 'subject', 'content', 'category'];
	public $timestamps = true;
	
	public function getAllTopicById ($categoryId, $page) {
		$data = array();
		$perpage = 20;
		$skip    = ($page - 1) * $perpage;

		$topLists = Topic::where('category_id', $categoryId)
													->orderBy('id', 'desc')
													->skip($skip)
													->take($perpage)
													->get();

		$topicCount = Topic::where('category_id', $categoryId)->count();

		if($topLists){
			foreach($topLists as $topic){
					array_push($data['lists'], array(
							'id'          => $topic->id,
							'subject'     => $topic->user_id,
							'content'     => $topic->content,
							'category'    => $topic->category,
							'created_at'  => $reply->created_at
					));
			}
		}

		$data['page_all'] = max(ceil($topicCount / $perpage), 1);

		return $data;
	}

	public function getTopicById ($id) {
		$data = array();

		$topicDetail = Topic::where('id', $id)->get();

		if($topicDetail){
			foreach($topicDetail as $topic){
					array_push($data, array(
							'id'          => $topic->id,
							'user_id'     => $topic->user_id,
							'subject'     => $topic->subject,
							'content'     => $topic->content,
							'category'    => $topic->category,
							'created_at'  => $topic->created_at
					));
			}
		}

		return $data;
	}

	public function saveTopic ($data) {
		$input = [
			'user_id' => $data['user_id'],
			'subject' => $data['topic_id'],
			'content' => $data['content'],
			'category'=> $data['category']
		];

		$topic = Topic::create($input);

    return $topic->id;
	}
}
