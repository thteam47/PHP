@extends('manage.layouts.main')
@section('content')
    <div class="container">
        @if(empty($user_dep_models->first()))
            <h1>Bạn chưa tham gia CLB nào</h1>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createClub">
                Tạo Câu lạc bộ mới
            </button>
        @else
            @foreach($user_dep_models as $user_dep_model)
                <pre>
                    <?php print_r($user_dep_model) ?>
                </pre>
            @endforeach
        @endif
    </div>
    <!-- Modal -->
    <div class="modal fade" id="createClub" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tạo câu lạc bộ mới</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post">
                    @csrf
                    <div class="modal-body">
                        tên clb
                        <input type="text" name="name" placeholder="tên câu lạc bộ">
                        <p class="error-form"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary" onclick="event.preventDefault();createClub()">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
<script>
    function createClub(){
        $.ajax({
            url: "{{ route('postCreateClub') }}",
            data: new FormData($("#createClub form")[0]),
            contentType: false,
            processData: false,
            method: "POST",
        }).done(function (data) {
            $("#createClub").modal('hide');
            $("#createClub form")[0].reset();
            toastr.success('', 'thêm mới thành công');
            location.reload();
        }).fail(function (data) {
            var errors = data.responseJSON;
            $.each(errors.errors, function (i, val) {
                $("#createClub form").find("input[name=" + i + "]").siblings('.error-form').text(val[0]);
            });
        });
    }
</script>
