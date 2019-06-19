@extends('layout')

@section('content')
  <div class="container">
    <section class="section">
      <nav class="breadcrumb">
        <ul>
          <li>
            <a href="/topic">Webboard</a>
          </li>
          <li class="is-active"><a>สร้างกระทู้ใหม่</a></li>
        </ul>
      </nav>
    </section>

    <section id="create-block">
      <div class="columns" style="margin-top: 10px;">
        <div class="column is-half is-offset-one-quarter">
          <div class="field">
            <label class="label">อีเมล์ *</label>
            <p class="control has-icons-left has-icons-right">
              <input id="email" name="email" class="input" type="text" placeholder="ใส่อีเมล์ของคุณ">
              <span class="icon is-small is-left">
                <i class="fa fa-envelope"></i>
              </span>
            </p>
            <p id="email-error" class="is-hidden help is-danger">ใส่อีเมล์ของคุณให้ถูกต้อง</p>
          </div>
          
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

          <div class="field">
            <label class="label">หัวข้อเรื่อง *</label>
            <p class="control has-icons-left has-icons-right">
              <input id="subject" name="subject" class="input" type="text" placeholder="ใส่หัวข้อเรื่องของคุณ">
              <span class="icon is-small is-left">
                <i class="fa fa-pencil-square"></i>
              </span>
            </p>
            <p id="subject-error" class="is-hidden help is-danger">ใส่หัวข้อเรื่องของคุณ</p>
          </div>
        </div>
      </div>

      <div class="columns" style="margin-top: 10px;">
        <div class="column is-half is-offset-one-quarter">
          <label class="label">ข้อความ *</label>
          <div id="editor"></div>
          <p id="content-error" class="is-hidden help is-danger">ใส่ข้อความของคุณ</p>
        </div>
      </div>
      
      <div id="msg-success" class="columns is-hidden">
        <div class="column is-half is-offset-one-quarter">
          <div class="notification is-success">
            บันทึกกระทู้ของคุณแล้ว
          </div>
        </div>
      </div>

      <div id="msg-fail" class="columns is-hidden">
        <div class="column is-half is-offset-one-quarter">
          <div class="notification is-danger">
            มีกระทู้นี้ของคุณแล้ว
          </div>
        </div>
      </div>

      <div class="columns">
        <div class="column is-half is-offset-one-quarter">
          <button id="create-btn" class="button is-primary"> ตั้งกระทู้ </button>
          <a href="/topic" class="button is-danger is-outlined"> ยกเลิก </a>
        </div>
      </div>
    </section>
    <hr>
  </div>
@endsection
