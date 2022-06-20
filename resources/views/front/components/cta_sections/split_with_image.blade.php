
<div class="main splitImage">
  <section class="slider">
    <div class="container-fluid position-relative">
      <div class="row mx-0 background-box">
        <div class="col secondary-bg py-5"></div>
        <div class="col-lg-2 col-1 bg-white py-5"></div>
      </div>
      <div class="row flex-lg-row flex-column-reverse">
        <div class="col-lg py-0 text-box">
          <div class="wrap">
            <div>
              <div>
                <div>
                  @if(!empty($data->subtitle->default))
                  <div class="label">
                    {{$data->subtitle->default}}
                  </div>
                  @endif
                  <h2 class="h2">{{$data->title->default}}</h2>
                  @if(!empty($data->text->default))
                  <p>
                    {{$data->text->default}}
                  </p>
                  @endif

                  @if(!empty($data->button_link->default))
                  <a href="{{$data->button_link->default}}">
                    <span class="saber-btn" style="color: #fff">
                      {{$data->button_title->default}}
                    </span>
                  </a>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-9 pe-0 py-0 overflow-hidden image-box">
          <div>
            <div class="ps-5">
              @if(!empty($data->image->default) && isset($data->image->default[0]))
              <img src="{{$data->image->default[0]['path']}}" alt="{{$data->image->default[0]['alt_text']}}" class="w-100" />
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row mx-0 d-none d-lg-flex">
      <div class="col secondary-bg py-5"></div>
      <div class="col-lg-2 col-1 bg-white py-5"></div>
    </div>
  </section>
</div>