@foreach($data as $d)
<tr>
    <td>{{$no++}}</td>
    <td>{{$d->year}} - {{getCureentMonth($d->month)}}</td>
    <td>{{$d->category->name ?? '-'}}</td>
    <td>{{$d->name_file}}</td>
    <td>{{getIconImage($d->path)}}</td>
    <td>
        <button data-id="{{$d->id}}" onclick="show_edit(this)" class="btn btn-sm btn-success"> <i class="fa fa-edit"></i> </button>
        <button data-id="{{$d->id}}" onclick="show_delete(this)" class="btn btn-sm btn-danger"> <i class="fa fa-trash"></i> </button>
    </td>
</tr>
@endforeach
