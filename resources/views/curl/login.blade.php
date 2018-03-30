<form class="form-horizontal" method="POST" action="{{ url('cek-login') }}">
                        <input type="hidden" name="_token" value="sGhkf2YI8jvu5SmI0y82S9WWjlxsFqyziJYDhakg">

                        <div class="form-group">
                            <label for="usernamae" class="col-md-4 control-label">Username</label>

                            <div class="col-md-6">
                                <input id="usernamae" type="usernamae" class="form-control" name="usernamae" value="" required >

                                                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
                            </div>
                        </div>
                    </form>