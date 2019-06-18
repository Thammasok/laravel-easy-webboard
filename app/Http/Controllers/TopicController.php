<?php

namespace App\Http\Controllers;

use App\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index() {
    return view('topic');
  }

  public function newTopic () {
    return view('create');
  }

  /**
   * Display the specified resource.
   *
   * @param  $id
   * @return \Illuminate\Http\Response
   */
  public function detail($id) {
    $data['topic_id'] = $id;
    return view('detail')->with('data', $data);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create() {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request) {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Topic  $topic
   * @return \Illuminate\Http\Response
   */
  public function edit(Topic $topic)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Topic  $topic
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Topic $topic)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Topic  $topic
   * @return \Illuminate\Http\Response
   */
  public function destroy(Topic $topic)
  {
    //
  }
}
