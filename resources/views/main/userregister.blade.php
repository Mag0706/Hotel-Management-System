<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register - SB Admin</title>
        <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create User Account</h3></div>
                                    <div class="card-body">
                                         <form action="/addUser" method="post" id="register_form" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="name" id="inputFirstName" type="text" required/>
                                                <label for="inputFirstName">Full name<span style="color:red">*</span></label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="email" id="inputEmail" type="email" required/>
                                                <label for="inputEmail">Email address<span style="color:red">*</span></label>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="password" id="inputPassword" type="password" required/>
                                                        <label for="inputPassword">Password<span style="color:red">*</span></label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="con_password" id="inputPasswordConfirm" type="password" required/>
                                                        <label for="inputPasswordConfirm">Confirm Password<span style="color:red">*</span></label>
                                                    </div>
                                                    <span id="check_password_match"></span>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="aadhar_number" id="aadhar" type="text" required/>
                                                <label for="aadhar">Aadhar Number<span style="color:red">*</span></label>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary btn-block">Create Account</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="{{ route('/') }}">Have an account? Go to login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('js/scripts.js')}}"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script>
            $( document ).ready(function() {
                $(document).on('keyup', '#inputPasswordConfirm', function () {
                    let password = $("#inputPassword").val();
                    let confirm_password = $("#inputPasswordConfirm").val();
                    if (password != confirm_password) {
                        $("#check_password_match").html("Password does not match !").css("color", "red");
                    } else {
                        $("#check_password_match").html("Password match !").css("color", "green");
                    }
                });
            });
        </script>
    </body>
</html>
