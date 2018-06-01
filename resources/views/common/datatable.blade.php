<div class="ibox-body">
    <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
        <thead>
        <tr>
            @foreach($col_heads as $col_head)
            <th>{!! $col_head !!}</th>
            @endforeach
        </tr>
        </thead>
        <tfoot>
        <tr>
            @foreach($col_footers as $col_footer)
                <th>{!! $col_footer !!}</th>
            @endforeach
        </tr>
        </tfoot>
        <tbody>
        @foreach($col_data as $data)
        <tr>
            @foreach($data as $row)
                <td>{!! $row !!}</td>
            @endforeach
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
