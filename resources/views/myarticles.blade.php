<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    @include('layout.headerlink')
    <link rel="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
	<link rel="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" rel="stylesheet">
	<link rel="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/ckeditor5/10.0.1/classic/ckeditor.js"></script>
</head>

<body>

            @include('layout.header')


<!-- Start main content -->
<main>
    <!-- Start Blog -->
    <section id="mu-blog">
        @if(!empty(Session::get('success')))
        <div id ="msgs" class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        <div class="container">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                Add articles
              </button>

              <div class="modal" id="myModal">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title">Add articles</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="{{url('/uploadarticle')}}" enctype="multipart/form-data" method="POST" id="articleupload" name="articleupload" class="mu-contact-form">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Enter title" id="title" name="title">
                            </div>


                            <div class="form-group">
                                <textarea name="content" id="editor"></textarea>
                            </div>

                            <div class="form-group">
                                <input type="file" class="form-control" id="articleimg" name="articleimg">
                            </div>

                            <button type="submit" class="mu-send-msg-btn"><span>submit</span></button>
                        </form>
                    </div>

                  </div>
                </div>
              </div>

              <br><br>
            <div class="row">
                <div class="col-md-12">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($data as $rw)
                            @php $Image = url('public/images').'/'.$rw->articleimage @endphp
                            <tr>
                                <td>{{$rw->title}}</td>
                                <td>{!! $rw->description !!}</td>
                                <td><img src="{{$Image}}" height="100px" width="100px"></td>
                                <td> <a href="#" data-toggle="modal" data-target="#dynamic{{$rw->articleid}}"><i class='fas fa-pencil-alt' style='font-size:24px'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="{{url('removearticle',$rw->articleid)}}"><i class='fas fa-trash-alt' style='font-size:24px'></i></a></td>
                            </tr>


                            <div class="modal" id="dynamic{{$rw->articleid}}">
                                <div class="modal-dialog modal-lg">
                                  <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                      <h4 class="modal-title">Edit articles</h4>
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <form action="{{url('/updateuploadarticle')}}" enctype="multipart/form-data" method="POST" id="updatearticle" name="updatearticle" class="mu-contact-form">
                                            @csrf
                                            <input type="hidden" name="articalid" id="articalid" value="{{$rw->articleid}}">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Enter title" id="title" name="title" value="{{$rw->title}}">
                                            </div>


                                            <div class="form-group">
                                                <textarea name="contentnew" id="editornew{{$rw->articleid}}">{{$rw->description}}</textarea>
                                            </div>
                                             <script>
                                                 var sm = "{{$rw->articleid}}";
                                                  ClassicEditor
                                                    .create( document.querySelector( '#editornew'+sm ),{
                                                        minHeight: '300px'
                                                    } )
                                                    .catch( error => {
                                                        console.error( error );
                                                    } );
                                                 </script>
                                            <div class="form-group">
                                                <input type="file" class="form-control" id="articleimg" name="articleimg">
                                            </div>

                                            <button type="submit" class="mu-send-msg-btn"><span>submit</span></button>
                                        </form>
                                    </div>


                                  </div>
                                </div>
                              </div>


                            @endforeach
                            </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!-- End Blog -->

</main>

<!-- End main content -->

            @include('layout.footer')

    @include('layout.footerlink')
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>
    <script>
		$(document).ready(function () {
			$('#example').DataTable();
		});

        ClassicEditor
        .create( document.querySelector( '#editor' ), {
      minHeight: '300px'
    })
        .catch( error => {
            console.error( error );
        } );

    </script>

<script src="{{ url('public/assets/js/form-validation/jquery.validate.js') }}"></script>
<script src="{{ url('public/assets/js/form-validation/additional-methods.min.js') }}"></script>
<script src="{{ url('public/assets/js/form-validation/custom-form-validation.js') }}"></script>

<script>
    $(document).ready(function ()
    {
        // login form validation
        $('#articleupload').validate({ // initialize the plugin
            rules: {
                title: {
                    required: true
                },
                articleimg: {
                    required: true,
                    extension: "jpg,jpeg,png",
                },
            },
            messages: {
                title: {
                    required: "Please Enter Title."
                },
                articleimg: {
                    required: "Please upload image.",
                    extension: "only jpg,jpeg,png type allow",
                }
            }
        });
    });

    $(document).ready(function ()
    {
        // login form validation
        $('#updatearticle').validate({ // initialize the plugin
            rules: {
                title: {
                    required: true
                },
                articleimg: {
                    extension: "jpg,jpeg,png",
                },
            },
            messages: {
                title: {
                    required: "Please Enter Title."
                },
                articleimg: {
                    extension: "only jpg,jpeg,png type allow"
                }
            }
        });
    });
    </script>


  </body>
</html>
