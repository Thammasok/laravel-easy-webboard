@extends('layout')

@section('content')
  <div class="container">
    <section class="section">
      <nav class="breadcrumb">
        <ul>
          <li>
            <a href="{{ url('/') }}">Webboard</a>
          </li>
          <li class="is-active">
            @if (count($data['detail']) > 0)
              <a>{{ $data['detail'][0]['subject'] }}</a>
            @else
              <a>ไม่พบกระทู้</a>
            @endif
          </li>
        </ul>
      </nav>
    </section>

    @if (count($data['detail']) <= 0)
      <section class="section">
        <div class="columns notification is-variable bd-klmn-columns is-1">
          <div class="column has-text-centered">
            ไม่พบกระทู้
          </div>
        </div>
      </section>
    @else
      <section class="section">
        <div class="columns notification is-variable bd-klmn-columns is-1">
          <div class="column is-2">
            <div class="is-primary has-text-centered">
              <figure class="image is-64x64" style="margin-left: auto; margin-right: auto;"> 
                <img alt="Image" src="{{ URL::asset('public/user.png') }}">
              </figure>
              <h2 class="title is-5" style="margin-top:10px;">{{ $data['detail'][0]['name'] }}<h2>
            </div>
          </div>
          <div class="column is-10">
            <div>
              <h4 id="subject" class="title is-4">{{ $data['detail'][0]['subject'] }}</h4>
              <small class="text-muted">{{ date("d M Y h:m", strtotime($data['detail'][0]['created_at'])) }}</small>
              <p style="margin-top: 25px;">
                {!! $data['detail'][0]['content'] !!}
              </p>
            </div>
          </div>
        </div>
        
        <hr >
        <div id="reply-msg">
          @if (count($data['detail'][0]['replise']) > 0)
            @foreach($data['detail'][0]['replise'] as $reply)
              <div class="columns notification is-variable bd-klmn-columns is-1 bg-gray" style="margin-top: 10px;">
                <div class="column is-2">
                  <div class="is-primary has-text-centered">
                    <figure class="image is-64x64" style="margin-left: auto; margin-right: auto;"> 
                      <img alt="Image" src="{{ URL::asset('public/user.png') }}">
                    </figure>
                    <h2 style="margin-top:10px;">{{ $reply['username'] }}<h2>
                  </div>
                </div>
                <div class="column is-10">
                  <div>
                    <h4 class="title is-5">[ตอบกลับ] {{ $data['detail'][0]['subject'] }}</h4>
                    <small class="text-muted">{{ date("d M Y h:m", strtotime($reply['created_at'])) }}</small>
                    <p style="margin-top: 25px;">
                      {!! $reply['content'] !!}
                    </p>
                  </div>
                </div>
              </div>
            @endforeach
          @else
            <div id="no-reply-block" class="columns">
              <div class="column has-text-centered">
                <div style="display: inline; padding-left: 10px;">
                  <p class="text-muted">ยังไม่มีการตอบกลับ</p>
                </div>
              </div>
            </div>
          @endif
        </div>
        
        <hr>
        
      <section id="reply-block">
        <div class="columns" style="margin-top: 10px;">
          <div class="column is-three-fifths is-offset-one-fifth">
            <div class="field">
              <label class="label">ชื่อผู้โพส *</label>
              <p class="control has-icons-left has-icons-right">
                <input id="username" name="username" class="input" type="text" placeholder="ใส่ชื่อของคุณ">
                <span class="icon is-small is-left">
                  <i class="fa fa-user"></i>
                </span>
              </p>
              <p id="username-error" class="is-hidden help is-danger">ใส่ชื่อของคุณ</p>
            </div>
          </div>
        </div>

        <div class="columns" style="margin-top: 10px;">
          <div class="column is-three-fifths is-offset-one-fifth">
            <label class="label">ข้อความ *</label>
            <div id="editor"></div>
            <p id="content-error" class="is-hidden help is-danger">ใส่ข้อความของคุณ</p>
          </div>
        </div>

        <div id="msg-success" class="columns is-hidden">
          <div class="column is-three-fifths is-offset-one-fifth">
            <div class="notification is-success">
              บันทึกกระทู้ของคุณแล้ว
            </div>
          </div>
        </div>

        <div id="msg-fail" class="columns is-hidden">
          <div class="column is-three-fifths is-offset-one-fifth">
            <div class="notification is-danger">
              มีกระทู้นี้ของคุณแล้ว
            </div>
          </div>
        </div>

        @if (count($data['detail']) > 0)
          <input type="hidden" id="topic_id" name="topic_id" value="{{ $data['detail'][0]['id'] }}">
        @endif

        <div class="columns">
          <div class="column is-three-fifths is-offset-one-fifth">
            <button id="reply-btn" class="button is-primary"> ตั้งกระทู้ </button>
          </div>
        </div>
      </section>
    @endif
  </div>
@endsection
