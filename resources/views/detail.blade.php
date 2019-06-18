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
            <a>{{ $data['topic_id'] }}</a>
          </li>
        </ul>
      </nav>
    </section>

    <section class="section">
      <div class="columns notification is-variable bd-klmn-columns is-1">
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

      <div class="columns notification is-variable bd-klmn-columns is-1" style="margin-top: 10px;">
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
      
      <hr>
      <form>
        <div class="columns is-variable bd-klmn-columns is-1" style="margin-top: 10px;">
          <div class="column is-9 is-offset-3">
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

        <div class="columns is-variable bd-klmn-columns is-1" style="margin-top: 10px;">
          <div class="column is-9 is-offset-3">
            <div id="editor"></div>
          </div>
        </div>

        <div class="columns is-variable bd-klmn-columns is-1" style="margin-top: 50px;">
          <div class="column is-9 is-offset-3"><button class="button is-primary"> ตอบกลับ </button></div>
        </div>
      </section>
      <hr>
    </form>
  </div>
@endsection
