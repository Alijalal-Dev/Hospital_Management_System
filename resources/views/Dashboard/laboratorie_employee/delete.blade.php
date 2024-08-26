<!-- Modal -->
<div class="modal fade" id="delete{{ $laboratorie_employee->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ trans('Laboratorie.delete_employee') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('laboratorie_employee.destroy', $laboratorie_employee->id) }}" method="post">
                {{ method_field('delete') }}
                {{ csrf_field() }}
                <div class="modal-body">
                    <p>{{ trans('Laboratorie.warning') }}: <strong class="text-danger">{{ $laboratorie_employee->name }}</strong>?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('Laboratorie.close') }}</button>
                    <button type="submit" class="btn btn-success">{{ trans('Laboratorie.submit') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

