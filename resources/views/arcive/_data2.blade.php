@foreach($data as $d => $value)
    <h2 class="section-title">{{$d}}</h2>
    <p class="section-lead">{{ $value->first()->category->description ?? '-' }}</p>
    <div class="row">
        @foreach($value as $v)
            @php
                $slice = explode('/', $v->path_file);
            @endphp
            <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <article class="article">
                    <div class="article-header">
                        <div class="article-image" >
                            @php
                            $getex = explode('.', $slice[2]);
                            @endphp
                            <img class="article-image" sizes="30%" src="{{asset('img/'.$getex[count($getex)-1].'.png')}}" alt="">
                        </div>

                        <div class="article-title">
                            <h2><a href="{{url('storage/'.$slice[1].'/'.$slice[2])}}">{{$v->nama_file}}</a></h2>
                        </div>
                    </div>
                    <div class="article-details">
                        <p>
                            Nama File :  {{$v->name_file}} <br>
                            Author : {{$v->user->employess->name}} <br>
                            Uploaded : {{$v->uploaded_at}} <br>
                            Keterangan : {{$v->keterangan}}
                        </p>
                        <div class="article-cta">
                            @if($v->edited)
                                <button data-id="{{$v->id}}" onclick="show_edit(this)" class="btn btn-success"> <i class="fa fa-edit"></i> Edit</button>
                                <button data-id="{{$v->id}}" onclick="show_delete(this)" class="btn btn-danger"> <i class="fa fa-trash"></i> Hapus</button>
                            @endif
                            <a href="{{url('storage/'.$slice[1].'/'.$slice[2])}}" target="_blank" class="btn btn-primary"> <i class="fa fa-download"></i> Download</a>
                        </div>
                    </div>
                </article>
            </div>
        @endforeach
    </div>
@endforeach

