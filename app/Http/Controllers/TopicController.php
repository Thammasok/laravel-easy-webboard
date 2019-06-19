<?php

namespace App\Http\Controllers;

use App\Topic;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class TopicController extends Controller {
  public function index($page = 1) {
    $data         = array();
    $data["page"] = isset($_GET["page"]) ? $_GET["page"] : 1;

    $topicModel = new Topic;
    
    $data["topics"] = $topicModel->getAllTopicByCategoryId (1, $data["page"]);

    return view("topic")->with("data", $data);
  }

  public function newTopic () {
    return view("create");
  }

  public function detail ($id) {
    $data["topic_id"] = $id;

    $topicModel = new Topic;
    $data["detail"] = $topicModel->getTopicById($id);

    return view("detail")->with("data", $data);
  }

  public function create (Request $request) {
    $validator = Validator::make($request->all(), [
      "username" => "required",
      "email"    => "required | email",
      "subject"  => "required",
      "content"  => "required"
    ]);

    if ($validator->fails()) {
      return json_encode(["err" => true,  "detail" => $validator->errors()]);
    }

    $data["name"]   = $request->input("username");
    $data["email"]  = $request->input("email");
    $data["subject"]= $request->input("subject");
    $data["content"]= $request->input("content");
    $data["cid"]    = 1;

    $userModel = new User;
    $topicModel = new Topic;

    $userId = $userModel->saveUser($data);
    $topicId = $topicModel->saveTopic($userId, $data);

    if ($topicId === 0) {
      $data["err"] = true;
      $data["msg"] = "มีกระทู้นี้แล้ว";
    } else {
      $data["topic_id"] = $topicId;
    }

    return json_encode($data);
  }

  public function edit(Request $request) {
    $validator = Validator::make($request->all(), [
      "username" => "required",
      "content"  => "required"
    ]);

    if ($validator->fails()) {
      return json_encode(["err" => true,  "detail" => $validator->errors()]);
    }

    $data["msg"]      = "success";
    $data["username"] = $request->input("username");
    $data["content"]  = $request->input("content");

    return json_encode($data);
  }

  // public function destroy(Topic $topic)
  // {
  //   //
  // }
}
