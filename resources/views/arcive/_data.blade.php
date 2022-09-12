<div id="accordion">
    @foreach($data as $d => $value)
        <div class="accordion">
            <div class="accordion-header" role="button" data-toggle="collapse" data-target="#{{$d}}" aria-expanded="true">
                <h4>{{$d}}</h4>
            </div>
            <div class="accordion-body collapse show" id="" data-parent="#{{$d}}">

                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Cras justo odio

                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a href="">Dapibus ac facilisis in </a>
                        <br>
                        kambing <br>
                        <b>Buaya</b>
                        <br>
                        <a href="">
                            <span class="badge badge-primary badge-pill"> <i class="fa fa-download"></i></span>
                        </a>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Morbi leo risus
                        <a href="">
                            <span class="badge badge-primary badge-pill"> <i class="fa fa-download"></i></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    @endforeach

{{--    <div class="accordion">--}}
{{--        <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-2">--}}
{{--            <h4>Panel 2</h4>--}}
{{--        </div>--}}
{{--        <div class="accordion-body collapse" id="panel-body-2" data-parent="#accordion">--}}
{{--            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod--}}
{{--                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,--}}
{{--                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo--}}
{{--                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse--}}
{{--                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non--}}
{{--                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="accordion">--}}
{{--        <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-3">--}}
{{--            <h4>Panel 3</h4>--}}
{{--        </div>--}}
{{--        <div class="accordion-body collapse" id="panel-body-3" data-parent="#accordion">--}}
{{--            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod--}}
{{--                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,--}}
{{--                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo--}}
{{--                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse--}}
{{--                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non--}}
{{--                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>--}}
{{--        </div>--}}
{{--    </div>--}}
</div>
