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
    </div>

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
                    <h2>Display Post</h2>
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
                        {{ Form::model($post,array('url'=>"posts/{$post->id}",'id' => 'post_form', 'class' => 'smart-form' )) }}
                        <fieldset>
                            <section>
                                <div class="row">
                                    {{ Form::label('title','Post Title',array('class'=>'label col col-2')) }}
                                    <div class="col col-10">
                                        <label class="input">
                                            {{ Form::text('title') }}
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
                                    {{ Form::label('category','Category',array('class'=>'label col col-2')) }}
                                    <div class="col col-10">
                                        <label class="select select-multiple">
                                            @foreach ($post->categories as $category)
                                            {{-- */$categories_selected[]=$category->id;/* --}}
                                            @endforeach
                                            {{ Form::select('category[]',$category_details,$categories_selected,array('multiple'=>true,'class'=>'custom-scroll')); }}
                                        </label>
                                        <div class="note">
                                            <strong>Note:</strong> hold down the ctrl/cmd button to select multiple options.
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <section>
                                <div class="row">
                                    {{ Form::label('body','Body Message',array('class'=>'label col col-2')) }}
                                    <div class="col col-10">
                                        <label class="textarea">
                                            {{ Form::textarea('body') }}
                                        </label>
                                    </div>
                                </div>
                            </section>
                            <section>
                                <div class="row">
                                    {{ Form::label('user','User',array('class'=>'label col col-2')) }}
                                    <div class="col col-10">
                                        <label class="input">
                                            {{ Form::text('user') }}
                                        </label>
                                    </div>
                                </div>
                            </section>
                        </fieldset>

                        <footer>
                            {{ Form::submit('Edit',array('class'=>'btn btn-primary')) }}

                            {{ Form::button('Cancel',array('class'=>'btn btn-default','onClick'=>'history.go(-1);return true;' )) }}

                        </footer>
                        {{ Form::close() }}
                    </article>
                </div>
            </section>
        </div>

    </div><!-- /.modal-content -->



</div>



@stop

@section('script')

{{ HTML::script('js/plugin/jquery-form/jquery-form.min.js') }}

<script type="text/javascript">


    // DO NOT REMOVE : GLOBAL FUNCTIONS!

    $(document).ready(function() {


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

