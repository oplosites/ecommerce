<table class="table table-bordered table-hovered responsive-utilities jambo_table">
    <thead>
    	@foreach ($heads as $item)
        <th>{{ $item }}</th>
        @endforeach
        <th>Action</th>
    </thead>
    <tbody>
        @if (sizeof($rows) > 0)
        @foreach ($rows as $row)
        <tr>
            @foreach ($heads as $key => $value)
                <td>{{ $row[$key] }}</td>
            @endforeach
            <td style="width: 130px;">
                <div class="btn-group">
                    <a href="{{ action($detailMethod, ['id' => $row['id']]) }}" class="btn btn-sm btn-default">
                        <i class="fa fa-list"></i>
                    </a>
                    <a href="{{ action($editMethod, $row['id']) }}" class="btn btn-sm btn-warning">
                        <i class="fa fa-pencil"></i>
                    </a>
                    <button name="delete-button" class="btn btn-sm btn-danger delete-button" data-toggle="modal" data-target="#deletion-modal" data-id="{{ $row['id'] }}"><i class="fa fa-trash"></i></button>
                </div>
            </td>
        </tr>
        @endforeach
        @else
        <tr>
            <td colspan="{{ sizeOf($heads) + 1 }}">No data available to display</td>
        </tr>
        @endif
    </tbody>
</table>

@if (!is_array($rows))
    {!! $rows->render() !!}
@endif

<!-- Modal -->
<div id="deletion-modal" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel2">Deletion Confirmation</h4>
            </div>
            <div class="modal-body">
                <h4>Are you sure to delete this item?</h4>
            </div>
            <div class="modal-footer">
                <div class="btn-group">
                    {!! Form::open(['action' => $mainController . '@destroy', 'method' => 'POST', 'class' => 'form form-horizontal']) !!}
                    <input type="hidden" name="item-id" />
                    <button type="submit" class="btn btn-primary">Yes</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Modal -->

<script type="text/javascript">
    $(document).ready(function() {
        $('.delete-button').click(function(e) {
            $('[name="item-id"]').val(
                $(this).attr('data-id')
            );
        });
    });
</script>
