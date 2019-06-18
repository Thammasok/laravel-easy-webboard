@extends('layout')

@section('content')
  <div class="container">
    <section class="section" style="padding: 2rem 1.5rem 0.5rem 1.5rem;">
      <nav class="breadcrumb">
        <ul>
          <li class="is-active">
            <a href="/topic">Webboard</a>
          </li>
        </ul>
      </nav>
    </section>

    <section class="section">
      <div>
        <a href="/topic/new" class="button is-primary"> ตั้งกระทู้ใหม่ </a>
      </div>
      <br>
      <hr>
      <!-- <article class="media">
        <div class="media-content">
          <div class="content">
            <p><strong>กระทู้ล่าสุด</strong></p>
          </div>
        </div>
        <div class="media-right"><strong>ตอบ</strong></div>
      </article> -->

      <div class="columns">
        <div class="column is-three-quarters">
          <strong class="title is-5">กระทู้ล่าสุด</strong>
        </div>
        <div class="column has-text-centered"><strong class="title is-5">เจ้าของกระทู้</strong>
        </div>
        <div class="column has-text-centered"><strong class="title is-5">ตอบ</strong></div>
      </div>
      <hr style="margin-top: 5px;">
      
      @for ($i = 0; $i < 10; $i++)
        <div class="columns">
          <div class="column is-three-quarters">
            <div>
              <i class="fa fa-comments fa-2x" aria-hidden="true"></i>&nbsp;&nbsp;
              <div style="display: inline; padding-left: 10px;">
                <a href="/topic/{{ $i }}" class="title is-5">โปรโมชั่น ที่น่าสนใจช่วงนี้ค่ะ</a>
                <br>
                <small class="text-muted" style="margin-top:10px;padding-left: 50px;">May 25, 2019 18:24</small>
              </div>
            </div>
          </div>
          <div class="column has-text-centered">
            Ggma
          </div>
          <div class="column has-text-centered">
            1
          </div>
        </div>

        <!-- <article class="media">
          <figure class="media-left">
            <i class="fa fa-comments fa-2x" aria-hidden="true"></i>
          </figure>
          <div class="media-content">
            <div class="content">
              <p>
                <a href="/topic/{{ $i }}" class="title is-5">โปรโมชั่น ที่น่าสนใจช่วงนี้ค่ะ</a>
                <br>
                <small class="text-muted" style="margin-top:10px;">May 25, 2019 18:24  โดย <b>Ggma</b></small>
              </p>
            </div>
          </div>
          <div class="media-right">1</div>
        </article> -->
        <hr>
      @endfor
      
      <nav class="pagination">
        <!-- <a class="pagination-previous is-disabled">Previous</a>
        <a class="pagination-next">Next page</a> -->
        <ul class="pagination-list">
          <li>
            <a class="pagination-link">1</a>
          </li>
          <li>
            <span class="pagination-ellipsis">…</span>
          </li>
          <li>
            <a class="pagination-link">45</a>
          </li>
          <li>
            <a class="pagination-link is-current">46</a>
          </li>
          <li>
            <a class="pagination-link">47</a>
          </li>
          <li>
            <span class="pagination-ellipsis">…</span>
          </li>
          <li>
            <a class="pagination-link">86</a>
          </li>
        </ul>
      </nav>
    </section>
  </div>
@endsection
