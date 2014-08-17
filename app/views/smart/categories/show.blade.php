@extends('smart/layouts.default')
@section('ribon')
Adding SubCategories
@stop

@section('content')

<div id="content">
    <div class="row">
        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
            <h1 class="page-title txt-color-blueDark">

                <!-- PAGE HEADER -->
                <i class="fa-fw fa fa-pencil-square-o"></i>
                 Category
                <span>>
                     Add Child
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
                    <h2>Category add child</h2>
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
                        {{ Form::model($category,array('url'=>"category/{$category->id}",'id' => 'p_form', 'class' => 'smart-form' )) }}
                            <fieldset>
                                <section>
                                    <div class="row">
                                        {{ Form::label('parent_category','Parent Category',array('class'=>'label col col-2')) }}
                                        <div class="col col-10">
                                            <label class="input">
                                                {{ Form::text('name',null,array('disabled'=>'disabled')) }}
                                            </label>
                                        </div>
                                    </div>
                                </section>
                                <section>
                                    <div class="row">
                                        {{ Form::label('child_category','New Child Category',array('class'=>'label col col-2')) }}
                                        <div class="col col-10">
                                            <label class="input">
                                                {{ Form::text('child_category_name') }}
                                            </label>
                                        </div>
                                    </div>
                                </section>
                            </fieldset>


                            <footer>
                                {{ Form::submit('Save',array('class'=>'btn btn-primary')) }}

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

        var $p_Form = $("#p_form").validate({
            // Rules for form validation
            rules : {
                child_category_name : {
                    required : true
                }
            },

            // Messages for form validation
            messages : {
                child_category_name : {
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

