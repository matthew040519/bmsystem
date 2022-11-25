@extends('layout.adminlayout')
@section('content')

      
      
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12 mb-3">
                   <button type="button" style="float: right;" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add Barangay</button>
              </div>
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Barangay List</h4>

                  </div>
                  <div class="card-body">

                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Barangay Name</th>
                            <th>Barangay Address</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Address</th>
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
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="formModal"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formModal">Add Barangay</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="POST">
                  {{ csrf_field() }}
                  <div class="form-group">
                    <label>Barangay Name</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-archive"></i>
                        </div>
                      </div>
                      <select class="form-control" id="barangay_name" name="barangay_name">
                        @foreach($barangay as $barangays)
                        <option value="{{ $barangays->id }}">{{ $barangays->barangay_name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Username</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-envelope"></i>
                        </div>
                      </div>
                      <input type="text" class="form-control" id="username" placeholder="Username" name="username">
                    </div>
                  </div>
                           <div class="form-group">
                            <label>Password</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <i class="fas fa-lock"></i>
                                </div>
                              </div>
                              <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                            </div>
                          </div>
                  <div class="row">
                      <div class="col-lg-6">
                           <div class="form-group">
                            <label>Email</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <i class="fas fa-archive"></i>
                                </div>
                              </div>
                              <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                            </div>
                          </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label>Contact Number</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-envelope"></i>
                              </div>
                            </div>
                            <input type="text" class="form-control" id="contactno" placeholder="Contact Number" name="contactno">
                          </div>
                        </div>
                      </div>
                  </div>
                  <div class="form-group">
                    <label>Address</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-envelope"></i>
                        </div>
                      </div>
                      <input type="text" class="form-control" id="address" placeholder="Address" name="address">
                    </div>
                  </div>
                 
                  <button type="button" id="save" class="btn btn-primary m-t-15 waves-effect">Save Changes</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          <a href="templateshub.net">Templateshub</a></a>
        </div>
        <div class="footer-right">
        </div>
      </footer>
      <script type="text/javascript">
     $(document).ready(function()
     {

       // Fetch all records
       $('#but_fetchall').click(function(){
   fetchRecords(0);
       });

       // Search by userid
       $('#but_search').click(function(){
          var userid = Number($('#search').val().trim());
        
    if(userid > 0){
      fetchRecords(userid);
    }

       });

       fetchRecords();

       $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

           $('#save').on('click', function() {
                    var barangay_name = $('#barangay_name').val();
                    var username = $('#username').val();
                    var password = $('#password').val();
                    var email = $('#email').val();
                    var contactno = $('#contactno').val();
                    var address = $('#address').val();

                    if(barangay_name!="" && username!=""  && password!="" && email!="" && contactno!="" && address!=""){
                      
                        $.ajax({
                            url: "/insert_barangay_admin",
                            type: "POST",
                            data: {
                                barangay_name: barangay_name,
                                username: username,
                                password: password,
                                email: email,
                                contactno: contactno,
                                address: address,
                            },
                            cache: false,
                            success: function(dataResult){
                                console.log(dataResult);
                                var dataResult = JSON.parse(dataResult);
                                if(dataResult.statusCode==200){
                                  fetchRecords();  
                                  document.getElementById('barangay_name').value = '';
                                  document.getElementById('username').value = '';
                                  document.getElementById('password').value = '';
                                  document.getElementById('email').value = '';
                                  document.getElementById('contactno').value = '';
                                  document.getElementById('address').value = '';
                                }
                                else if(dataResult.statusCode==201){
                                   alert("Error occured !");
                                }
                                
                            }
                        });
                    }
                    else{
                        alert('Please fill all the field !');
                    }
                });

         });

   //   
   // });

     function fetchRecords(){
       $.ajax({
         url: '/barangayadminlist',
         type: 'get',
         dataType: 'json',
         success: function(response){

          console.log(response);
           var len = 0;
           $('tbody').empty();
           if(response['data'] != null){
              len = response['data'].length;
           }

           if(len > 0){
              for(var i=0; i<len; i++){
                 var id = response['data'][i].id;
                 var username = response['data'][i].username;
                 var barangay_name = response['data'][i].barangay_name;
                 var barangay_address = response['data'][i].barangay_address;
                 var email = response['data'][i].email;
                 var contact = response['data'][i].contact_number;
                 var address = response['data'][i].address;

                 var tr_str = "<tr>" +
                   "<td>" + (i+1) + "</td>" +
                   "<td>" + username + "</td>" +
                   "<td>" + barangay_name + "</td>" +
                   "<td>" + barangay_address + "</td>" +
                   "<td>" + email + "</td>" +
                   "<td>" + contact + "</td>" +
                   "<td>" + address + "</td>" +
                 "</tr>";

                 $("tbody").append(tr_str);
              }
           }
           else{
              var tr_str = "<tr>" +
                  "<td align='center' colspan='7'>No record found.</td>" +
              "</tr>";

              $("tbody").append(tr_str);
           }
         }
       });
     }


     </script>
  @endsection

