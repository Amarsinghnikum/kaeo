@include('templates.meta-tag')
<!-- Page Loader -->
<!-- Top Bar -->
@include('templates.top-bar')
<!-- Left Sidebar -->
@include('templates.left-sidebar')
<!-- Right Sidebar -->
@include('templates.right-sidebar')
<!-- Chat-launcher -->



<section class="content profile-page">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Profile
                <small>Welcome to KN Vidya Foundation</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">                
                <button class="btn btn-white btn-icon btn-round float-right m-l-10" type="button">
                    <i class="zmdi zmdi-edit"></i>
                </button>
                <ul class="breadcrumb float-md-right">
                <li class="breadcrumb-item"><a href="{{url('/index')}}"><i class="zmdi zmdi-home"></i>Home</a></li>
                    <li class="breadcrumb-item active">Profile</li>
                </ul>                
            </div>
        </div>
    </div>    
    <div class="container-fluid">
        <div class="row clearfix">
           
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <ul class="nav nav-tabs">
                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#about">Home List</a></li>
                    <li><button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#aboutModal1" style="color:#fff;background-color: #6572b8;border: none;">ABOUT OWNER</button></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane body active" id="about">
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover m-b-0" id="myTables">
                                    <thead>
                                        <tr>                                       
                                            <th style="">ID</th>
                                            <th>OWNER IMAGE</th>
                                            <th style="width:5px;">OWNER DESCRIPTION</th>
                                            <th style="width:0px;">ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                 </div>  
            </div>
        </div>
        
</section>
<!-- Add Banner -->
<div class="container-mt-5">
        <div class="modal" id="aboutModal1">
            <div class="modal-dialog">
                <div class="modal-content" style="width:150%;margin-left: -120px;">
                    <div class="modal-header">
                        <h5 class="modal-title">ADD ABOUT OWNER</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{url('/insert-owner')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label required">OWNER IMAGE</label>
                                <input type="file" name="owner_image" id="owner_image" class="form-control" value="">
                            </div>

                            <div class="mb-3">
                                <label class="form-label required">OWNER DESCRIPTION</label>
                                <textarea name="owner_description" id="owner_description" class="form-control"></textarea>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" onclick="InsertAboutowner()" class="btn btn-primary">Save</button>
                                <button type="button" class="btn btn-danger">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Jquery Core Js --> 
<script src="{{url('/assets/bundles/libscripts.bundle.js')}}"></script> <!-- Lib Scripts Plugin Js --> 
<script src="{{url('/assets/bundles/vendorscripts.bundle.js')}}"></script> <!-- Lib Scripts Plugin Js --> 

<script src="{{url('/assets/bundles/knob.bundle.js')}}"></script> <!-- Jquery Knob Plugin Js -->

<script src="{{url('/assets/bundles/mainscripts.bundle.js')}}"></script><!-- Custom Js -->
<script src="{{url('/assets/js/pages/charts/jquery-knob.js')}}"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js" ></script>
<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js" integrity="sha512-k2GFCTbp9rQU412BStrcD/rlwv1PYec9SNrkbQlo6RZCf75l6KcC3UwDY8H5n5hl4v77IDtIPwOk9Dqjs/mMBQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    @if(session('status'))
    <script>
        swal("{{ session('status') }}");
    </script>
    @endif

    <script type="text/javascript">
      function InsertAboutowner(id){
        var id = document.getElementById("id").value;
         //alert(id);
        $.ajax({
            type: "POST",  
            url: "{{url('/insert-owner')}}", 
            data: {
                id:id,
             _token: "{{ csrf_token() }}",
          },
          success: function(response){
              console.log(response);
          }
        });
      }      
    </script>

    <script>
$( document ).ready(function() {
    initTables();
});
</script>

<script>
    function initTables(){
        var table =$('#myTables').DataTable({
    pageLength: 10,
    paging:true,
    //autoWidth: false,
    responsive: true,
    dom: 'Bfrtip',
    buttons: [
        {extend: 'excel', title: 'ExampleFile', className: 'btn btn-primary btn-sm'},
        {extend: 'copy', title: 'ExampleFile', className: 'btn btn-warning btn-sm'},
        {extend: 'print',
            customize: function (win){
                $(win.document.body).addClass('white-bg');
                $(win.document.body).css('font-size', '10px');

                $(win.document.body).find('table')
                .addClass('compact')
                .css('font-size', 'inherit');
            },
            className: 'btn btn-success btn-sm'
        }
    ],
    /*buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
    ],*/
    
    //order: [[ 2, 'asc' ]],
    processing: true,
    serverSide: true,
    ajax: {
        type: 'POST',
        url:"{{url('/search-about-owner')}}",
        dataType: "json",
        data:{
          _token: "{{ csrf_token()}}"
        },
        complete: function(response) {
            console.log(response.responseJSON.data);
        }
    },
    columns: [
        { data: "id","searchable": false, "orderable": false, "visible": true },
        { data: "owner_image", "orderable": false, "visible": true },
        { data: "owner_description", "orderable": false, "visible": true },
        { data: "edit_btn", "orderable": false, "visible": true },
    ],
    
});
}
</script>
</body>
</html>