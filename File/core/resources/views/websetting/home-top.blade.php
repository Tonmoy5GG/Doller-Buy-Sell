@extends('layouts.dashboard')
@section('title', 'Home Top')
@section('content')


    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">

                <div class="portlet-body form">
                    {!! Form::open(['method'=>'post','class'=>'form-horizontal']) !!}

                    <div class="form-body">

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Title : </label>

                            <div class="col-sm-6">
                                <input name="title" value="" class="form-control input-lg" type="text" required placeholder="Item Title">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Top Description : </label>

                            <div class="col-sm-6">
                                <textarea name="description" id="" cols="30" rows="2"
                                          class="form-control input-lg" placeholder="Short Top Description (100 word)" required></textarea>
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="row">
                                <div class="col-md-offset-3 col-md-6">
                                    <button type="submit" class="btn blue btn-block margin-top-10"><i class="fa fa-paper-plane"></i> Create Item</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div><!---ROW-->
    <hr>
    <div class="row">
        @foreach($top as $t)
        <div class="col-md-4">
            <div class="single-top" style="padding: 10px;border: 1px solid #ddd;border-radius: 5px;overflow: hidden;margin-top: 10px">
                <h4 class="text-center">{{ $t->title }}</h4>
                <p>{{ $t->description }}</p>
                <div class="col-sm-6">
                    <a href="{{ route('home-top-edit',$t->id) }}" class="btn btn-primary btn-block"><i class="fa fa-edit"></i> Edit</a>
                </div>
                <div class="col-sm-6">
                    <button type="button" class="btn btn-danger btn-block delete_button"
                            data-toggle="modal" data-target="#DelModal"
                            data-id="{{ $t->id }}">
                        <i class='fa fa-times'></i> DELETE
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Modal for DELETE -->
    <div class="modal fade" id="DelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"> <i class='fa fa-trash'></i> Delete !</h4>
                </div>

                <div class="modal-body">
                    <strong>Are you sure you want to Delete ?</strong>
                </div>

                <div class="modal-footer">
                    <form method="post" action="{{ route('home-top-delete') }}" class="form-inline">
                        {!! csrf_field() !!}
                        {{ method_field('DELETE') }}
                        <input type="hidden" name="id" class="abir_id" value="0">

                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">DELETE</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection
@section('scripts')

    <script>
        $(document).ready(function () {

            $(document).on("click", '.delete_button', function (e) {
                var id = $(this).data('id');
                $(".abir_id").val(id);

            });

        });
    </script>

@endsection

