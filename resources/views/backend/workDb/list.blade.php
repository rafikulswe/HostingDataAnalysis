@extends('backend.layout.app')
@section('title')
@endsection
@section('content')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Batch Class List</h5>
        </div>
        <div id="spreadsheet"></div>
        {{-- <div id="log"></div> --}}
    </div>
    
@endsection

@push('script')
    <script>
        var changed = function(instance, cell, x, y, value) {
            let thisRowData = myTable.getRowData(y);
            console.log(thisRowData);
            ajaxSubmit(thisRowData);
            // var cellName = jexcel.getColumnNameFromId([x,y]);
            // $('#log').append('New change on cell ' + cellName + ' to: ' + value + '');
        }
        
        let data = 
        [
            @php
                $myData = array();
                foreach ($workingDbs as $key => $workingDb) {
            @endphp
            ['2019-01-01', "{{$workingDb->name}}", "{{$workingDb->email}}", "{{$workingDb->phone}}", "{{$workingDb->ip}}", "{{$workingDb->card_name}}", "{{$workingDb->card_details}}", "{{$workingDb->status}}", "{{$workingDb->id}}"],
            @php
                }
            @endphp
            
            ['', '', '', '', '', '', '', false, 0],
        ];

        myTable = jspreadsheet(document.getElementById('spreadsheet'), {
            data:data,
            search:true,
            pagination:10,
            columns: [
                { type: 'calendar', title:'Date', options: { format:'DD/MM/YYYY' }, width:120, },
                { type: 'text', title:'Name', width:120 },
                { type: 'text', title:'Email', width:120 },
                { type: 'numeric', title:'Phone', width:120 },
                { type: 'text', title:'IP', width:120 },
                { type: 'text', title:'Card', width:120 },
                { type: 'text', title:'Card Details', width:120 },
                { type: 'dropdown', title:'Purchase Status', width:120, source:[ "Working", "Done", "Card Problem", "Data Match" ] },
                // { type: 'checkbox', title:'Stock', width:80 },
                { type: 'hidden', title:'DB', width:10, readOnly:true },
            ],
            // updateTable: function(el, cell, x, y, source, value, id) {
            //     if (x == 2 && y == 2) {
            //         cell.classList.add('readonly');
            //     }
            // },
            onchange: changed,
            // onbeforechange: beforeChange,
            // oninsertrow: insertedRow,
            // oninsertcolumn: insertedColumn,
            // ondeleterow: deletedRow,
            // ondeletecolumn: deletedColumn,
            // onselection: selectionActive,
            // onsort: sort,
            // onresizerow: resizeRow,
            // onresizecolumn: resizeColumn,
            // onmoverow: moveRow,
            // onmovecolumn: moveColumn,
            // onload: loaded,
            // onblur: blur,
            // onfocus: focus,
            // onpaste: paste,
            
        });

        
        function ajaxSubmit(rowData = []) {
            $.ajax({
                url: "/workDb",
                method: 'POST',
                data: {
                    date        : rowData[0],
                    name        : rowData[1],
                    email       : rowData[2],
                    phone       : rowData[3],
                    ip          : rowData[4],
                    card_name   : rowData[5],
                    card_details: rowData[6],
                    status      : rowData[7],
                    db_id       : rowData[8],
                    _token      : '{{ csrf_token() }}'
                },
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    // if (response.success) {
                    //     alert(response.message) //Message come from controller
                    // } else {
                    //     alert("Error")
                    // }
                },
                error: function(error) {
                    console.log(error)
                }
            });
        }



        // var beforeChange = function(instance, cell, x, y, value) {
        //     var cellName = jexcel.getColumnNameFromId([x,y]);
        //     $('#log').append('The cell ' + cellName + ' will be changed');
        // }
        
        // var insertedRow = function(instance) {
        //     $('#log').append('Row added');
        // }
        
        // var insertedColumn = function(instance) {
        //     $('#log').append('Column added');
        // }
        
        // var deletedRow = function(instance) {
        //     $('#log').append('Row deleted');
        // }
        
        // var deletedColumn = function(instance) {
        //     $('#log').append('Column deleted');
        // }
        
        // var sort = function(instance, cellNum, order) {
        //     var order = (order) ? 'desc' : 'asc';
        //     $('#log').append('The column  ' + cellNum + ' sorted by ' + order + '');
        // }
        
        // var resizeColumn = function(instance, cell, width) {
        //     $('#log').append('The column  ' + cell + ' resized to width ' + width + ' px');
        // }
        
        // var resizeRow = function(instance, cell, height) {
        //     $('#log').append('The row  ' + cell + ' resized to height ' + height + ' px');
        // }
        
        // var selectionActive = function(instance, x1, y1, x2, y2, origin) {
        //     var cellName1 = jexcel.getColumnNameFromId([x1, y1]);
        //     var cellName2 = jexcel.getColumnNameFromId([x2, y2]);
        //     $('#log').append('The selection from ' + cellName1 + ' to ' + cellName2 + '');
        // }
        
        // var loaded = function(instance) {
        //     $('#log').append('New data is loaded');
        // }
        
        // var moveRow = function(instance, from, to) {
        //     $('#log').append('The row ' + from + ' was move to the position of ' + to + ' ');
        // }
        
        // var moveColumn = function(instance, from, to) {
        //     $('#log').append('The col ' + from + ' was move to the position of ' + to + ' ');
        // }
        
        // var blur = function(instance) {
        //     $('#log').append('The table ' + $(instance).prop('id') + ' is blur');
        // }
        
        // var focus = function(instance) {
        //     $('#log').append('The table ' + $(instance).prop('id') + ' is focus');
        // }
        
        // var paste = function(data) {
        //     $('#log').append('Paste on the table ' + $(instance).prop('id') + '');
        // }


    </script>

    {{-- <script type="text/javascript">

        $(document).ready(function() {
            
        });
    </script> --}}
@endpush
