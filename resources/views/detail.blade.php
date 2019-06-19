@extends('layout')

@section('content')
  <div class="container">
    <section class="section">
      <nav class="breadcrumb">
        <ul>
          <li>
            <a href="/topic">Webboard</a>
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
                <img alt="Image" src="{{ URL::asset('user.png') }}">
              </figure>
              <h2 style="margin-top:10px;">{{ $data['detail'][0]['user_id'] }}<h2>
            </div>
          </div>
          <div class="column is-10">
            <div>
              <h4 class="title is-4">{{ $data['detail'][0]['subject'] }}</h4>
              <small class="text-muted">{{ date("d M Y h:m", strtotime($data['detail'][0]['created_at'])) }}</small>
              <p style="margin-top: 25px;">
                {!! $data['detail'][0]['content'] !!}
              </p>
            </div>
          </div>
        </div>
        
        <hr >
        
        <div id="reply-msg">
          <div class="columns notification is-variable bd-klmn-columns is-1 bg-gray" style="margin-top: 10px;">
            <div class="column is-2">
              <div class="is-primary has-text-centered">
                <figure class="image is-64x64" style="margin-left: auto; margin-right: auto;"> 
                  <img alt="Image" src="{{ URL::asset('user.png') }}">
                </figure>
                <h2 style="margin-top:10px;">Admin<h2>
              </div>
            </div>
            <div class="column is-10">
              <div>
                <h4 class="title is-4">โปรโมชั่น ที่น่าสนใจช่วงนี้ค่ะ (4070 อ่าน)</h4>
                <small class="text-muted">11:09 PM - 1 Jan 2016</small>
                <p style="margin-top: 25px;">
                  รังสรรค์เมนูช็อคโกแลตชั้นเลิศจากเดลี่ ณ โรงแรมอินเตอร์คอนติเนนตัล กรุงเทพฯ
                  <br>
                  กรุงเทพฯ ประเทศไทย วันที่ 7 กรกฎาคม 2559: เชฟไซฟุล ฮูดา เอ็กเซคคูทีฟพาสตรี้เชฟ ประจำโรงแรมอินเตอร์คอนติเนนตัล กรุงเทพฯ เอาใจผู้ชื่นชอบช็อคโกแลตทุกท่าน  สร้างสรรค์เมนูของหวานสุดพิเศษจากช็อคโกแลตคุณภาพเยี่ยม นำเข้าจากประเทศฝรั่งเศสในหลากหลายรูปแบบ ให้ทุกท่านลิ้มลองตลอดเดือนกรกฏาคมและสิงหาคมนี้ ณ เดลี่ (Deli) อาทิ เค้กดอลเช่ช็อคโกแลตคคาราเมลเนื้อนุ่มตัดกับรสหวานอมเปรี้ยวของครีมแอปริคอต (Chocolate dulce apricot cream) มูสเค้กไวท์ช็อคโกแลตรสหวานละมุนกับและราสเบอร์รี่กานาชเนื้อเนียน (White chocolate opalys raspberry ganache) และ  ช็อคโกแลตพราลีนครีมพัฟที่ผสมรสชาติเข้มข้นของช็อคโกแลตจิวาร่ากับครีมเฮเซลนัทรสกลมกล่อมอย่างลงตัวในครีมพัฟบางกรอบบนเค็กช็อคโกแลตรสเข้ม (Jivara chocolate praline cream puff)
                  <br>
                  <br>
                  เดลี่ (Deli)  ณ โรงแรมอินเตอร์คอนติเนนตัล กรุงเทพฯ เปิดบริการทุกวันตั้งแต่ 08:00 – 19:00 น.   เป็นอีกหนึ่งสถานที่นัดพบใหม่ที่คุณสามารถมานั่งพูดคุยกับเพื่อนสนิทหรือเพื่อนร่วมงานได้อย่างสะดวกสบายและรวดเร็ว พร้อมด้วยบริการขนมอบหลากเมนู ขนมเค้กและแซนวิชสดใหม่ นอกจากนี้ยังมีชาและกาแฟเสิร์ฟพร้อม พายและคุกกี้อบใหม่ทุกวัน  
                  <br>
                  เมนูช็อคโกแลตชั้นเลิศจากเดลี่ ราคาเริ่มต้น 110++ บาท
                  สอบถามข้อมูลเพิ่มเติม หรือ สำรองที่นั่ง โทร 02 656 0444 ต่อ 3456 หรือ www.bangkok.intercontinental.com 
                </p>
              </div>
            </div>
          </div>
        </div>
        
        <hr>
        
        <section id="reply-block">
        <div class="columns" style="margin-top: 10px;">
          <div class="column is-9 is-offset-3">
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
          <div class="column is-9 is-offset-3">
            <label class="label">ข้อความ *</label>
            <div id="editor"></div>
            <p id="content-error" class="is-hidden help is-danger">ใส่ข้อความของคุณ</p>
          </div>
        </div>
        
        <div id="msg-success" class="columns is-hidden">
          <div class="column is-9 is-offset-3">
            <div class="notification is-success">
              บันทึกตอบกลับของคุณแล้ว
            </div>
          </div>
        </div>

        <div class="columns">
          <div class="column is-half is-offset-one-quarter">
            <button id="reply-btn" class="button is-primary"> ตั้งกระทู้ </button>
          </div>
        </div>
      </section>
    @endif
  </div>
@endsection
