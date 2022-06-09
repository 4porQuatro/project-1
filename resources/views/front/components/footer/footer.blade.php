<footer class="secondary-bg px-app">
    <div class="container-fluid py-5">
        <div class="row pb-5">
            <div class="col-lg-6 border-end mb-5 mb-lg-2">
                <div class="d-flex justify-content-lg-center">
                    <div class="text-white">
                        <h4 class="h4 yellow-text mb-4">{{$data->title_top_left->default}}</h4>
                        <h5 class="mb-4">
                            {{$data->description_top_left->default}}
                        </h5>
                        <div class="d-flex">
                            @foreach($data->social_network->default as $item)
                            <a class="me-2" href="{{$item['text']}}">
                                <div>
                                    @include('front.components.footer.social_icons', ['icon'=>$item['title']])
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="d-flex justify-content-lg-center">
                    <div class="text-white">
                        <h4 class="h4 yellow-text mb-4">{{$data->title_top_right->default}}</h4>
                        <h5 class="mb-4">
                            {{$data->description_top_right->default}}
                        </h5>
                        <div class="d-flex">
                            <form class="input-group mb-3 rounded-2 overflow-hidden" style="border-color: #ffb100" method="post" action="{{$data->newsletter->default->end_point}}">
                                <div>
                                    @csrf
                                    <input type="hidden" name="cms_form_id" value="{{$data->newsletter->default->id}}">
                                    @foreach($data->newsletter->default->fields as $field)
                                    <label for="email-address" class="sr-only">hlw{{$field->label}}</label>
                                    <input type="text" name="{{$field->name}}" id="email-address" autocomplete="email" required class="form-control secondary-bg" style="border-color: #ffb100" placeholder="Enter your email">
                                    @endforeach
                                </div>
                                <!-- <input type="text" class="form-control bg-transparent" placeholder="E-mail" aria-label="Recipient's username" aria-describedby="basic-addon2" style="border-color: #ffb100" /> -->
                                <button class="input-group-text bg-transparent text-white" id="basic-addon2" type='submit' style="border-color: #ffb100">{{$data->submit->default}}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top p-0 pt-5 p-lg-5">
            <div class="col"></div>
            <div class="col-lg-2 footer-links">
                <a class="heading">
                    <h4 class="mb-5">{{$data->title_first_menu->default}}</h4>
                </a>
                @foreach($data->menu_1->default->items as $item)
                <a href="{{$item->path}}">
                    <p class="ms-3 mb-3">{{$item->name}}</p>
                </a>
                @endforeach
            </div>
            <div class="col-lg-2 footer-links">
                <a class="heading">
                    <h4 class="mb-5">{{$data->title_second_menu->default}}</h4>
                </a>
                @foreach($data->menu_2->default->items as $item)
                <a href="{{$item->path}}">
                    <p class="ms-3 mb-3">{{$item->name}}</p>
                </a>
                @endforeach
            </div>
            <div class="col-lg-2 pt-7 footer-links">

                @foreach($data->central_menu->default->items as $item)
                <a class='heading' href="{{$item->path}}">
                    <p class="ms-3 mb-3">{{$item->name}}</p>
                </a>
                @endforeach
            </div>
            
            <div class="col-lg-2 footer-links">
                <a class="heading">
                    <h4 class="mb-5">{{$data->title_four_menu->default}}</h4>
                </a>
                @foreach($data->menu_4->default->items as $item)
                <a href="{{$item->path}}">
                    <p class="ms-3 mb-3">{{$item->name}}</p>
                </a>
                @endforeach
            </div>
            
            <div class="col-lg-2 footer-links">
                <a class="heading">
                    <h4 class="mb-5">{{$data->title_five_bar->default}}</h4>
                </a>
                <div class="ms-3 mb-3 text-white">
                        {!! $data->contact->default !!}
                </div>
                @foreach($data->menu_5->default->items as $item)
                <a href="{{$item->path}}">
                    <p class="ms-3 mb-3">{{$item->name}}</p>
                </a>
                @endforeach
            </div>
            <div class="col"></div>
        </div>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>