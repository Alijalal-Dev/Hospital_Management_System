<!-- Modal -->
<div class="modal fade" id="delete{{ $receipt->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ trans('Receipt.title_delete') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('Receipt.destroy', 'test') }}" method="post">
                {{ method_field('delete') }}
                {{ csrf_field() }}
                <div class="modal-body">
                    <input type="hidden" name="id" value="{{ $receipt->id }}">
                    <h5>{{ trans('Receipt.warning') }}<span style="color: red"> {{ $receipt->patients->name }}</span></h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('Receipt.close') }}</button>
                    <button type="submit" class="btn btn-success">{{ trans('Receipt.submit') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
