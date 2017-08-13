@extends('layouts.postsLayOut')

@section('content')

    <style>

        img {
            border-radius: 50%;
        }

        .wall .personalInfo .imageInfo .cover .img_up {
            width: 80px;
            height: 80px;
            background: url("{{URL::to('public/UserPP/'.((session()->get('UserProfilePicture'))))}}");
            background-size: cover;
            position: relative;
            left: 50%;
            top: 40%;
            transform: translate(-40px, 0);
            border-radius: 50%;
            border: 2px solid #fff
        }


    </style>

    <br><br>
    <div class="wall">
        <div class="container">
            <div class="row">
                <div class="panel panel-default">
                    <div class="panel panel-heading">
                        <h3>Live User Search</h3>
                    </div>
                    <div class="panel panel-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="search" name="search"
                                   style="background-color:lavender;border:1px solid #c5c5c5;"
                                   placeholder="Search Here .....">

                        </div>
                        <div class="row" id="SearchResult2">

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">

            $('#search').on('keyup', function () {

                $value = $(this).val();
                $.ajax({
                    type: 'get',
                    url: '{{URL::to('search')}}',

                    data: {'search': $value},

                    success: function (data) {
                        $('#SearchResult2').html(data);
                        console.log(data);
                    }, error: function () {
                        alert("error!!!!");
                    }

                })
            })

        </script>
@endsection

