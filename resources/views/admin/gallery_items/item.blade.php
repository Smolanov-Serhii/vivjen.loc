<tr class="ui-state-default">
    <input type="hidden" name="id" value="{{$item->id}}">
    <td style="width:150px">
        <img src="/uploads/galleries/{{ $item->image }}" style="width:100px">
    </td>
    <td>
        {{ $item->translate->name }}
    </td>
    <td>
        {{ $item->translate->alt }}
    </td>
    <td>
        {{ $item->translate->description }}
    </td>
    <td>
        <div class="btn-group">
            <a style="margin-right: 3px" class="btn btn-success edit" data-url="{{ route('admin.galleries.items.update', ['gallery_item' => $item]) }}"> <i class="fas fa-pen"></i> </a>
            <form method="POST"
                  action="{{ route('admin.galleries.items.delete', [ 'gallery_item'=> $item ]) }}">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-danger btn-icon"
                        onclick="return confirm('Вы уверены?')">
                    <i class="fa fa-trash" aria-hidden="true"></i>
                </button>
            </form>
        </div>
    </td>
</tr>