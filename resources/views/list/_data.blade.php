@foreach($data as $d)
    @php
        $slice = explode('/', $d->path_file);
    @endphp
<tr>
    <td>{{$no++}}</td>
    <td>{{$d->year}} - {{getCureentMonth($d->month)}}</td>
    <td>{{$d->category->name ?? '-'}}</td>
    <td>{{$d->name_file}}</td>
    <td>{{getIconImage($d->path)}}</td>

    @if(\Illuminate\Support\Facades\Auth::user()->hasRole('superadmin'))
        <td>
            <a data-id="{{$d->id}}" target="_blank" href="{{url('storage/'.$slice[1].'/'.$slice[2])}}" class="btn btn-sm btn-info"> <i class="fa fa-info-circle"></i> </a>
            <button data-id="{{$d->id}}" onclick="show_edit(this)" class="btn btn-sm btn-success"> <i class="fa fa-edit"></i> </button>
            <button data-id="{{$d->id}}" onclick="show_delete(this)" class="btn btn-sm btn-danger"> <i class="fa fa-trash"></i> </button>
        </td>
    @else
        @if(\Illuminate\Support\Facades\Auth::user()->hasRole('admin'))
            @if($d->user_id==\Illuminate\Support\Facades\Auth::user()->id)
                <td>
                    <a data-id="{{$d->id}}" target="_blank" href="{{url('storage/'.$slice[1].'/'.$slice[2])}}" class="btn btn-sm btn-info"> <i class="fa fa-info-circle"></i> </a>
                    <button data-id="{{$d->id}}" onclick="show_edit(this)" class="btn btn-sm btn-success"> <i class="fa fa-edit"></i> </button>
                    <button data-id="{{$d->id}}" onclick="show_delete(this)" class="btn btn-sm btn-danger"> <i class="fa fa-trash"></i> </button>
                </td>
            @else
                <td>
                    -
                </td>
            @endif
        @else
            <td>-</td>
        @endif
    @endif


</tr>
@endforeach
