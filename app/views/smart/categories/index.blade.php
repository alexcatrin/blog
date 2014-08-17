@extends('smart/layouts.default')
@section('ribon')
Administration Categories
@stop

@section('content')
<div id="content">
    <div class="row">
        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
            <h1 class="page-title txt-color-blueDark">

                <!-- PAGE HEADER -->
                <i class="fa-fw fa fa-pencil-square-o"></i>
                Administrating
                <span>>
                     Categories
                </span>
            </h1>
        </div>

        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
            <!-- Button trigger modal -->
            <a data-toggle="modal" href="#myModal" class="btn btn-success btn-lg pull-right header-btn hidden-mobile"><i class="fa fa-circle-arrow-up fa-lg"></i> Add Category</a>
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
                    <h4 class="modal-title">
                        <img src="img/logo.png" width="150" alt="SmartAdmin">
                    </h4>
                </div>
                <div class="modal-body no-padding">

                    {{ Form::open(array('url'=>"category",'id' => 'p_form', 'class' => 'smart-form' )) }}
                    <fieldset>
                        <section>
                            <div class="row">
                                {{ Form::label('category_name','New Category',array('class'=>'label col col-2')) }}
                                <div class="col col-10">
                                    <label class="input">
                                        {{ Form::text('category_name') }}
                                    </label>
                                </div>
                            </div>
                        </section>

                    </fieldset>


                    <footer>
                        {{ Form::submit('Create',array('class'=>'btn btn-primary')) }}

                        {{ Form::button('Cancel',array('class'=>'btn btn-default','data-dismiss'=>'modal' )) }}

                    </footer>
                    {{ Form::close() }}

                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->



    <!-- widget grid -->
    <section id="widget-grid" class="">

        <!-- row -->
        <div class="row">

            <!-- NEW WIDGET START -->
            <article class="col-sm-12">

                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget well" id="wid-id-0" data-widget-editbutton="false">
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


                    <!-- widget div-->
                    <div>

                        <!-- widget edit box -->
                        <div class="jarviswidget-editbox">
                            <!-- This area used as dropdown edit box -->

                        </div>
                        <!-- end widget edit box -->

                        <!-- widget content -->
                        <div class="widget-body">

                            <div id="nestable-menu">

                                <button type="button" class="btn btn-default" data-action="expand-all">
                                    Expand All
                                </button>
                                <button type="button" class="btn btn-default" data-action="collapse-all">
                                    Collapse All
                                </button>

                            </div>
                            <div class="row">
                                <div class="col-sm6 col-lg-8">
                                    <div class="dd" id="nestable">
                                        {{ $categoriesHelper->htmlList() }}
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- end widget content -->

                    </div>
                    <!-- end widget div -->

                </div>
                <!-- end widget -->

            </article>
            <!-- WIDGET END -->

        </div>

        <!-- end row -->

    </section>
    <!-- end widget grid -->
</div>



@stop

@section('script')

{{ HTML::script('js/plugin/jquery-nestable/jquery.nestable.js') }}

<script type="text/javascript">

    // DO NOT REMOVE : GLOBAL FUNCTIONS!

    $(document).ready(function() {

        pageSetUp();



        // PAGE RELATED SCRIPTS
        var $p_Form = $("#p_form").validate({
            // Rules for form validation
            rules : {
                category_name : {
                    required : true
                }
            },

            // Messages for form validation
            messages : {
                category_name : {
                    required : 'Please feel in the New Category Name'
                }
            },

            // Do not change code below
            errorPlacement : function(error, element) {
                error.insertAfter(element.parent());
            }
        });



        var updateOutput = function(e) {
            var list = e.length ? e : $(e.target), output = list.data('output');
            if (window.JSON) {
                output.val(window.JSON.stringify(list.nestable('serialize')));
                //, null, 2));
            } else {
                output.val('JSON browser support required for this demo.');
            }
        };

        // activate Nestable for list 1
        $('#nestable').nestable({
            group : 1
        }).on('change', updateOutput);


        // output initial serialised data
        updateOutput($('#nestable').data('output', $('#nestable-output')));

        $('#nestable-menu').on('click', function(e) {
            var target = $(e.target), action = target.data('action');
            if (action === 'expand-all') {
                $('.dd').nestable('expandAll');
            }
            if (action === 'collapse-all') {
                $('.dd').nestable('collapseAll');
            }
        });




    })

</script>


@stop

