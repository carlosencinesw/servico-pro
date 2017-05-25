@extends('main.main')

@section('content')
    <div class="row">
        <h1><i class="fa fa-comment-o"></i> <span>Feedback</span></h1>
    </div>
    <div class="row">
        <div class="col-sm-8">
            <div class="alert alert-success message"></div>
            <div class="alert alert-danger messageError"></div>
            <form action="{{route('send.feedback')}}" method="post" class="form-horizontal ajax">
                {{csrf_field()}}
                <div class="form-group">
                    <label>Nome:</label>
                    <input type="text" name="user" class="form-control disabled">
                </div>
                <div class="form-group">
                    <label>Mensagem:</label>
                    <textarea name="msg" class="form-control" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-success btn-block" type="submit"><i class="fa fa-check"></i> <span>Enviar Feedback</span></button>
                </div>
            </form>
        </div>

    </div>
@stop