@extends('backend.layout.app')
@section('title')
@endsection
@section('content')
    <!-- Static mode -->
    <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Custom CSV</h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body">
                <div class="form-group">
                    <label class="text-semibold">Your avatar:</label>
                    <div class="media no-margin-top">
                        <div class="media-left">
                            <a href="#"><img src="https://cdn-icons-png.flaticon.com/512/180/180855.png?w=360"
                                    style="width: 58px; height: 58px; border-radius: 2px;" alt=""></a>
                        </div>

                        <div class="media-body">
                            <input type="file" name="csvFile" class="file-styled">
                            <span class="help-block">Accepted formats: csv, xcel. Max file size 2Mb</span>
                        </div>
                    </div>
                </div>

                <div class="text-right">
                    <button type="submit" class="btn btn-success">Import <i
                            class="icon-arrow-right14 position-right"></i></button>
                </div>
            </div>
        </div>
    </form>
    <!-- /static mode -->
@endsection
