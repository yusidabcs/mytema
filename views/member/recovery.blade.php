    <div class="breadcrumbs-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 center-sm">
                    <div class="breadcrumbs">
                        <ul class="unstyled">
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li class="active">Reset Password</li>                                                
                        </ul>
                    </div>
                </div>
                
                <div class="col-xs-12 col-sm-12 space20 visible-xs"></div>
                
                <div class="col-xs-12 col-sm-6 center-sm">
                    <div class="display-mode">
                        <ul class="unstyled float-right"> Reset Password </ul>
                    </div>
                </div>
            </div>        
        </div>
    </div>
    <!-- /BREADCRUMBS -->
    
    <!-- SIDEBAR + MAIN CONTENT CONTAINER -->
    <div class="main-content">
        <div class="container">
            <div class="row">
                <!-- SIDE BAR -->
                <div class="col-xs-12 col-sm-4 col-lg-3 pull-right sidebar">
                    <!-- CHOOSE COLOR -->
                    @foreach(vertical_banner() as $key=>$banner)
                    <div class="section  module-list-items">
                        <div class="cat-image">
                            <a href="{{url($banner->url)}}">
                                <img src="{{banner_image_url($banner->gambar)}}" width="100%"/>
                            </a>                                    
                        </div>
                    </div>      
                    @endforeach
                    <!-- /CHOOSE COLOR -->
                </div>
                <!-- /SIDE BAR -->                      

                <!-- MAIN CONTENT -->
                <div class="col-xs-12 col-sm-8 col-lg-9 main">
                    <div class="section">
                        {{Form::open(array('url' => 'member/recovery/'.$id.'/'.$code, ))}}
                            <p>Silahkan masukkan password baru yang kamu inginkan dengan melengkapi form di bawah ini.</p>
                            <h2>Forget Password</h2>
                            <div class="content">
                                <table class="form">
                                    <tbody>
                                        <tr>
                                            <td>Password baru:</td>
                                            <td>
                                                <input type="password" name="password" id="inputPassword" placeholder="password baru" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Konfirmasi Password:</td>
                                            <td>
                                                <input type="password" name="password_confirmation" id="inputPassword" placeholder="konfirmasi password baru" required>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="buttons">
                                    <table class="form">
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <input type="submit" value="Reset Passwrod" class="button">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    
                            </div>
                        </form>
                    </div>
                </div>
                <!-- MAIN CONTENT -->
            </div>
        </div>
    </div>