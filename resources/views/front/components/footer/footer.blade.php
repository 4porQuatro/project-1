<footer class="bg-gray-800" aria-labelledby="footer-heading">

    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8">
            <div class="grid grid-cols-2 gap-8 xl-col-span2">
                <div class="mt-8 xl:mt-0">
                    <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">{{$data->title_top_left->default}}</h3>
                    <p class="mt-4 text-base text-gray-300">{{$data->description_top_left->default}}</p>
                    <div class="flex space-x-6 md:order-2">
                        @foreach($data->social_network->default as $item)
                        <a href="{{$item['text']}}" target="_blank" class="text-gray-400 hover:text-gray-300">

                            <span class="sr-only">{{$item['title']}}</span>
                            @include('front.components.footer.social_icons', ['icon'=>$item['title']])
                        </a>
                        @endforeach
                    </div>

                </div>
                <div class="mt-8 xl:mt-0">
                    <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">{{$data->title_top_right->default}}</h3>
                    <p class="mt-4 text-base text-gray-300">{{$data->description_top_right->default}}</p>

                    <form class="mt-4 sm:flex sm:max-w-md" method="post" action="{{$data->newsletter->default->end_point}}">
                        @csrf
                        <input type="hidden" name="cms_form_id" value="{{$data->newsletter->default->id}}">
                        @foreach($data->newsletter->default->fields as $field)
                        <label for="email-address" class="sr-only">{{$field->label}}</label>
                        <input type="text" name="{{$field->name}}" id="email-address" autocomplete="email" required class="appearance-none min-w-0 w-full bg-white border border-transparent rounded-md py-2 px-4 text-base text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white focus:border-white focus:placeholder-gray-400" placeholder="Enter your email">
                        @endforeach
                            <div class="mt-3 rounded-md sm:mt-0 sm:ml-3 sm:flex-shrink-0">
                            <button type="submit" class="w-full bg-indigo-500 border border-transparent rounded-md py-2 px-4 flex items-center justify-center text-base font-medium text-white hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-indigo-500">
                                {{$data->submit->default}}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="grid grid-cols-3 gap-8 xl:col-span-2 mt-10">
                <div class="md:grid md:grid-cols-2 md:gap-8">
                    <div>
                        <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">{{$data->title_first_menu->default}}</h3>
                        <ul role="list" class="mt-4 space-y-4">
                            @foreach($data->menu_1->default->items as $item)
                            <li>
                                <a href="{{$item->path}}" class="text-base text-gray-300 hover:text-white">{{$item->name}} </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="mt-12 md:mt-0">
                        <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">{{$data->title_second_menu->default}}</h3>
                        <ul role="list" class="mt-4 space-y-4">
                            @foreach($data->menu_2->default->items as $item)
                                <li>
                                    <a href="{{$item->path}}" class="text-base text-gray-300 hover:text-white">{{$item->name}} </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="md:grid md:grid-cols-1 md:gap-8">
                    <div>
                        <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">  </h3>
                        <ul role="list" class="mt-4 space-y-4">
                            @foreach($data->central_menu->default->items as $item)
                            <li>
                                <a href="{{$item->path}}" class="text-sm font-semibold text-gray-400 tracking-wider uppercase"> {{$item->name}}</a>
                            </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
                <div class="md:grid md:grid-cols-2 md:gap-8">
                    <div>
                        <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase"> {{$data->title_four_menu->default}} </h3>
                        <ul role="list" class="mt-4 space-y-4">
                            @foreach($data->menu_4->default->items as $item)
                                <li>
                                    <a href="{{$item->path}}" class="textext-base text-gray-300 hover:text-white"> {{$item->name}}</a>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                    <div class="mt-12 md:mt-0">
                        <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">{{$data->title_five_bar->default}}</h3>
                        <div class="text-base text-white">
                            {!! $data->contact->default !!}
                        <div>
                        <ul role="list" class="mt-4 space-y-4">

                            @foreach($data->menu_5->default->items as $item)
                                <li>
                                    <a href="{{$item->path}}" class="text-sm font-semibold text-gray-400 tracking-wider uppercase"> {{$item->name}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>
        <div class="mt-8 border-t border-gray-700 pt-8 md:flex md:items-center md:justify-between">
            <p class="mt-8 text-base text-gray-400 md:mt-0 md:order-1">{!! $data->text_bottom_left->default !!}</p>
            <p class="mt-8 text-base text-gray-400 md:mt-0 md:order-1">Desenvolvido por 4por4</p>
        </div>
    </div>
</footer>
