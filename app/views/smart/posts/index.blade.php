@extends('smart/layouts.default')
@section('ribon')
    List posts
@stop

@section('content')

    <div id="content">
        <div class="row">
            <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                <h1 class="page-title txt-color-blueDark">

                    <!-- PAGE HEADER -->
                    <i class="fa-fw fa fa-pencil-square-o"></i>
                    Listing
                    <span>>
                         posts
                    </span>
                </h1>
            </div>

            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                <!-- Button trigger modal -->
                <a data-toggle="modal" href="#myModal" class="btn btn-success btn-lg pull-right header-btn hidden-mobile"><i class="fa fa-circle-arrow-up fa-lg"></i> Add post</a>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            &times;
                        </button>

                        <div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-4" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false">
                            <!-- widget options:
                            usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

                            data-widget-colorbutton="false"
                            data-widget-editbutton="false"
                            data-widget-togglebutton="false"
                            data-widget-deletebutton="false"
                            data-widget-fullscreenbutton="false"
                            data-widget-custombutton="false"
                            data-widget-collapsed="true"
                            data-widget-sortable="false"

                            -->
                            <header>
                                <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                                <h2>Add new post</h2>
                            </header>
                        </div>
                    </div>
                    <div class="modal-body no-padding">
                        <!-- widget grid -->
                        <section id="widget-grid" class="">
                            <!-- NEW ROW-->
                            <div class="row">
                                <!-- NEW COL START -->
                                <article class="col-sm-12 col-md-12">
                                    {{ Form::open(array('url'=>'posts','id' => 'post_form', 'class' => 'smart-form' )) }}
                                        <fieldset>
                                            <section>
                                                <div class="row">
                                                    <label class="label col col-2">Post title</label>
                                                    <div class="col col-10">
                                                        <label class="input">
                                                            <input type="text" name="title">
                                                        </label>
                                                    </div>
                                                </div>
                                            </section>
                                        </fieldset>

                                        <fieldset>
                                            <section>
                                                <?php
                                                $category_details = Category::all()->lists('name','id');
                                                ?>

                                                <div class="row">
                                                    <label class="label col col-2">Category</label>
                                                    <div class="col col-10">
                                                        <label class="select select-multiple">
                                                            {{ Form::select('category[]',$category_details,null,array('multiple'=>true,'class'=>'custom-scroll')); }}
                                                        </label>
                                                        <div class="note">
                                                            <strong>Note:</strong> hold down the ctrl/cmd button to select multiple options.
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                            <section>
                                                <div class="row">
                                                    <label class="label col col-2">Body Message</label>
                                                    <div class="col col-10">
                                                        <label class="textarea">
                                                            <textarea name="body" cols="50" rows="10"></textarea>
                                                        </label>
                                                    </div>
                                                </div>
                                            </section>
                                            <section>
                                                <div class="row">
                                                    <label class="label col col-2">User</label>
                                                    <div class="col col-10">
                                                        <label class="input">
                                                            <input type="text" name="user">
                                                        </label>
                                                    </div>
                                                </div>
                                            </section>
                                        </fieldset>

                                        <footer>
                                            <button type="submit" class="btn btn-primary">
                                                Post
                                            </button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                                Cancel
                                            </button>
                                        </footer>
                                    {{ Form::close() }}
                                </article>
                            </div>
                        </section>
                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


        <div class="row">

            <div class="col-sm-12">

                <div class="well">
                    <!-- pasing over each category -->
                    @foreach($posts as $post)
                        <table class="table table-striped table-forum" border="0" >
                            <thead>
                                <tr>
                                    <th colspan="2"><i class="fa fa-book"></i>
                                        {{ link_to("posts/{$post->id}", $post->title) }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- TR -->
                                <!-- passing over each category belonging to post -->
                                <tr>
                                    <td class="text-center" style="width: 40px;">Categories: </td>
                                    <td>@foreach($post->categories as $category)
                                            <a href="">{{ $category->name }}; </a>
                                    @endforeach
                                    <!-- end category -->
                                    </td>

                                </tr>
                                <!-- end TR -->
                                <tr>
                                    <td colspan="2">
                                        <small>
                                            Posted by {{ $post->user}}
                                            <br> on <i>{{ $post->created_at }}</i>
                                        </small>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    @endforeach
                    <!-- end posts -->

                    <!-- pagination -->
                    {{ $posts->links() }}


                </div>
                <!-- well -->
            </div>
            <!-- col-sm-12 -->
        </div>
        <!-- end row -->
    </div>

@stop

@section('script')

    {{ HTML::script('js/plugin/jquery-form/jquery-form.min.js') }}

    <script type="text/javascript">

        // DO NOT REMOVE : GLOBAL FUNCTIONS!

        $(document).ready(function() {
            $('textarea').autoResize();

            pageSetUp();

            var $postForm = $("#post_form").validate({
                // Rules for form validation
                rules : {
                    title : {
                        required : true,
                        minlength : 3,
                        maxlength : 20
                    },
                    category : {
                        required : true,
                        minlength : 3,
                        maxlength : 20
                    },
                    body : {
                        required : true,
                        minlength : 3,
                        maxlength : 30
                    },
                    useer:{
                        required:true
                    }
                },

                // Messages for form validation
                messages : {
                    title : {
                        required : 'Campul nu poate fii gol'
                    },
                    category : {
                        required : 'Campul nu poate fii gol'
                    },
                    body : {
                        required : 'Campul nu poate fii gol'
                    },
                    user : {
                        required : 'Campul nu poate fii gol'
                    }
                },

                // Do not change code below
                errorPlacement : function(error, element) {
                    error.insertAfter(element.parent());
                }
            });

        })

    </script>


@stop

