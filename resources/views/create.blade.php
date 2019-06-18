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

    <section>
      <form>
        <div class="columns" style="margin-top: 10px;">
          <div class="column is-half is-offset-one-quarter">
            <div class="field">
              <label class="label">ชื่อผู้โพส *</label>
              <p class="control has-icons-left has-icons-right">
                <input class="input is-danger" type="text" placeholder="Text input" value="bulma">
                <span class="icon is-small is-left">
                  <i class="fa fa-user"></i>
                </span>
              </p>
              <p class="help is-danger">This username is available</p>
            </div>

            <div class="field">
              <label class="label">อีเมล์ *</label>
              <p class="control has-icons-left has-icons-right">
                <input class="input is-danger" type="text" placeholder="Email input" value="hello@">
                <span class="icon is-small is-left">
                  <i class="fa fa-envelope"></i>
                </span>
              </p>
              <p class="help is-danger">This email is invalid</p>
            </div>
          </div>
        </div>

        <div class="columns" style="margin-top: 10px;">
          <div class="column is-half is-offset-one-quarter">
            <div id="editor"></div>
          </div>
        </div>

        <div class="columns" style="margin-top: 50px;">
          <div class="column is-half is-offset-one-quarter">
            <button class="button is-primary"> ตั้งกระทู้ </button>
            <a href="/topic" class="button is-danger is-outlined"> ยกเลิก </a>
          </div>
        </div>
      </section>
      <hr>
    </form>
  </div>
@endsection
