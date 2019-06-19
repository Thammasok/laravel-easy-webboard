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
      
      @if (!empty($data['topics']['lists'] && count($data['topics']['lists']) > 0))
        @for ($i = 0; $i < 10; $i++)
          <div class="columns">
            <div class="column is-three-quarters">
              <div>
                <i class="fa fa-comments fa-2x" aria-hidden="true"></i>&nbsp;&nbsp;
                <div style="display: inline; padding-left: 10px;">
                  <a href="/detail/{{ $i }}" class="title is-5">โปรโมชั่น ที่น่าสนใจช่วงนี้ค่ะ</a>
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
          <hr>
          @endfor
      @else
        <div class="columns">
          <div class="column has-text-centered">
            <div style="display: inline; padding-left: 10px;">
              <p class="text-muted">ยังไม่มีกระทู้</p>
            </div>
          </div>
        </div>
        <hr>
      @endif
      
      <nav class="pagination">
        <ul class="pagination-list">
          @if (!empty($data['topics']['page_all'] && $data['topics']['page_all'] > 1))
            @for ($i = 1; $i <= $data['topics']['page_all']; $i++)
              <li>
                @if ($i == $data['page'])
                  <a href="/topic?page={{ $i }}" class="pagination-link is-current">{{ $i }}</a>
                @else
                  <a href="/topic?page={{ $i }}" class="pagination-link">{{ $i }}</a>
                @endif
              </li>
            @endfor
          @endif
        </ul>
      </nav>
    </section>
  </div>
@endsection
